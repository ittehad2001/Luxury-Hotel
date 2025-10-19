<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\RoomCategory;
use App\Models\RoomAvailability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminController extends Controller
{
    /**
     * Admin Dashboard
     */
    public function dashboard()
    {
        $totalBookings = Booking::count();
        $totalRevenue = Booking::sum('total_price');
        $todayBookings = Booking::whereDate('created_at', today())->count();
        $activeGuests = Booking::where('status', 'confirmed')->count();

        $recentBookings = Booking::with('roomCategory')
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        $thisMonthRevenue = Booking::whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total_price');

        $lastMonthRevenue = Booking::whereMonth('created_at', now()->subMonth()->month)
            ->whereYear('created_at', now()->subMonth()->year)
            ->sum('total_price');

        return view('admin.dashboard', compact(
            'totalBookings',
            'totalRevenue',
            'todayBookings',
            'activeGuests',
            'recentBookings',
            'thisMonthRevenue',
            'lastMonthRevenue'
        ));
    }

    /**
     * Manage Bookings
     */
    public function bookings(Request $request)
    {
        $query = Booking::with('roomCategory');

        // Search functionality
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('booking_reference', 'like', "%{$search}%")
                  ->orWhere('guest_name', 'like', "%{$search}%")
                  ->orWhere('guest_email', 'like', "%{$search}%");
            });
        }

        // Status filter
        if ($request->filled('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        // Date range filter
        if ($request->filled('date_from')) {
            $query->whereDate('check_in_date', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('check_out_date', '<=', $request->date_to);
        }

        $bookings = $query->orderBy('created_at', 'desc')->paginate(10);

        return view('admin.bookings', compact('bookings'));
    }

    /**
     * Get single booking
     */
    public function getBooking($id)
    {
        $booking = Booking::with('roomCategory')->findOrFail($id);
        return response()->json($booking);
    }

    /**
     * Cancel booking
     */
    public function cancelBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'cancelled']);

        // Restore room availability
        for ($date = Carbon::parse($booking->check_in_date); $date->lt($booking->check_out_date); $date->addDay()) {
            $availability = RoomAvailability::where('room_category_id', $booking->room_category_id)
                ->where('date', $date->format('Y-m-d'))
                ->first();
            
            if ($availability) {
                $availability->available_rooms = min(3, $availability->available_rooms + 1);
                $availability->save();
            }
        }

        return response()->json(['success' => true, 'message' => 'Booking cancelled successfully']);
    }

    /**
     * Confirm booking
     */
    public function confirmBooking($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update(['status' => 'confirmed']);
        
        return response()->json(['success' => true, 'message' => 'Booking confirmed successfully']);
    }

    /**
     * Room Categories Management
     */
    public function rooms()
    {
        $roomCategories = RoomCategory::all();
        return view('admin.rooms', compact('roomCategories'));
    }

    /**
     * Store new room category
     */
    public function storeRoomCategory(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'base_price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'max_guests' => 'nullable|integer|min:1',
            'bedrooms' => 'nullable|integer|min:1',
            'bathrooms' => 'nullable|integer|min:1',
            'size' => 'nullable|integer|min:1',
            'image_url' => 'nullable|string|url'
        ]);

        RoomCategory::create($request->all());

        return response()->json(['success' => true, 'message' => 'Room category created successfully']);
    }

    /**
     * Get single room category
     */
    public function getRoomCategory($id)
    {
        $roomCategory = RoomCategory::findOrFail($id);
        return response()->json($roomCategory);
    }

    /**
     * Update room category
     */
    public function updateRoomCategory(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'base_price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'max_guests' => 'nullable|integer|min:1',
            'bedrooms' => 'nullable|integer|min:1',
            'bathrooms' => 'nullable|integer|min:1',
            'size' => 'nullable|integer|min:1'
        ]);

        $roomCategory = RoomCategory::findOrFail($id);
        $roomCategory->update($request->all());

        return response()->json(['success' => true, 'message' => 'Room category updated successfully']);
    }

    /**
     * Delete room category
     */
    public function deleteRoomCategory($id)
    {
        $roomCategory = RoomCategory::findOrFail($id);
        
        // Check if there are any bookings for this category
        $hasBookings = Booking::where('room_category_id', $id)->exists();
        
        if ($hasBookings) {
            return response()->json(['success' => false, 'message' => 'Cannot delete room category with existing bookings']);
        }

        $roomCategory->delete();
        return response()->json(['success' => true, 'message' => 'Room category deleted successfully']);
    }

    /**
     * Room Availability Calendar
     */
    public function availability(Request $request)
    {
        $startDate = $request->get('start_date', now()->format('Y-m-d'));
        $endDate = $request->get('end_date', now()->addMonth()->format('Y-m-d'));

        $roomCategories = RoomCategory::all();
        $availabilityData = [];

        foreach ($roomCategories as $category) {
            $categoryData = [
                'category' => $category,
                'availability' => []
            ];

            for ($date = Carbon::parse($startDate); $date->lte(Carbon::parse($endDate)); $date->addDay()) {
                $availability = RoomAvailability::where('room_category_id', $category->id)
                    ->where('date', $date->format('Y-m-d'))
                    ->first();

                $availableRooms = $availability ? $availability->available_rooms : 3;
                
                $categoryData['availability'][] = [
                    'date' => $date->format('Y-m-d'),
                    'available' => $availableRooms,
                    'status' => $availableRooms >= 3 ? 'available' : ($availableRooms > 0 ? 'limited' : 'booked')
                ];
            }

            $availabilityData[] = $categoryData;
        }

        // Calculate summary statistics
        $totalAvailable = 0;
        $totalLimited = 0;
        $totalBooked = 0;

        foreach ($availabilityData as $categoryData) {
            foreach ($categoryData['availability'] as $dayAvailability) {
                if ($dayAvailability['status'] === 'available') {
                    $totalAvailable++;
                } elseif ($dayAvailability['status'] === 'limited') {
                    $totalLimited++;
                } else {
                    $totalBooked++;
                }
            }
        }

        return view('admin.availability', compact(
            'roomCategories',
            'availabilityData',
            'startDate',
            'endDate',
            'totalAvailable',
            'totalLimited',
            'totalBooked'
        ));
    }
}
