<?php

namespace App\Http\Controllers;

use App\Models\RoomCategory;
use App\Models\Booking;
use App\Models\RoomAvailability;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BookingController extends Controller
{
    /**
     * Show the booking form
     */
    public function index()
    {
        $roomCategories = RoomCategory::all();
        return view('booking.index', compact('roomCategories'));
    }

    /**
     * Check availability and pricing for selected dates
     */
    public function checkAvailability(Request $request)
    {
        try {
            $request->validate([
                'check_in_date' => 'required|date|after_or_equal:today',
                'check_out_date' => 'required|date|after:check_in_date'
            ]);

            $checkInDate = Carbon::parse($request->check_in_date);
            $checkOutDate = Carbon::parse($request->check_out_date);
            $totalNights = $checkInDate->diffInDays($checkOutDate);

            $roomCategories = RoomCategory::all();
            $availability = [];

            foreach ($roomCategories as $category) {
                $isAvailable = true;
                $totalBasePrice = 0;
                $totalWeekendSurcharge = 0;
                $dates = [];

                // Check availability for each date in the range
                for ($date = $checkInDate->copy(); $date->lt($checkOutDate); $date->addDay()) {
                    $availabilityRecord = RoomAvailability::getOrCreateAvailability($category->id, $date->format('Y-m-d'));
                    
                    if (!$availabilityRecord->hasAvailability()) {
                        $isAvailable = false;
                        break;
                    }

                    $dayPrice = $category->getPriceForDate($date->format('Y-m-d'));
                    $basePrice = (float) $category->base_price;
                    $weekendSurcharge = $dayPrice - $basePrice;

                    $totalBasePrice += $basePrice;
                    $totalWeekendSurcharge += $weekendSurcharge;

                    $dates[] = [
                        'date' => $date->format('Y-m-d'),
                        'day_name' => $date->format('l'),
                        'price' => $dayPrice,
                        'is_weekend' => in_array($date->dayOfWeek, [5, 6])
                    ];
                }

                $subtotal = $totalBasePrice + $totalWeekendSurcharge;
                
                // Apply consecutive nights discount (10% for 3+ nights)
                $consecutiveDiscount = 0;
                if ($totalNights >= 3) {
                    $consecutiveDiscount = $subtotal * 0.10;
                }

                $finalPrice = $subtotal - $consecutiveDiscount;

                $availability[] = [
                    'category' => $category,
                    'is_available' => $isAvailable,
                    'total_nights' => $totalNights,
                    'base_price' => $totalBasePrice,
                    'weekend_surcharge' => $totalWeekendSurcharge,
                    'consecutive_discount' => $consecutiveDiscount,
                    'final_price' => $finalPrice,
                    'dates' => $dates
                ];
            }

            return response()->json([
                'check_in_date' => $checkInDate->format('Y-m-d'),
                'check_out_date' => $checkOutDate->format('Y-m-d'),
                'total_nights' => $totalNights,
                'availability' => $availability
            ]);
        } catch (\Exception $e) {
            \Log::error('Availability check error: ' . $e->getMessage());
            return response()->json(['error' => 'Error checking availability. Please try again.'], 500);
        }
    }

    /**
     * Process the booking
     */
    public function store(Request $request)
    {
        $request->validate([
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
            'guest_phone' => 'required|string|regex:/^[0-9+\-\s()]+$/',
            'room_category_id' => 'required|exists:room_categories,id',
            'check_in_date' => 'required|date|after_or_equal:today',
            'check_out_date' => 'required|date|after:check_in_date'
        ]);

        $checkInDate = Carbon::parse($request->check_in_date);
        $checkOutDate = Carbon::parse($request->check_out_date);
        $totalNights = $checkInDate->diffInDays($checkOutDate);

        $roomCategory = RoomCategory::findOrFail($request->room_category_id);

        // Check availability again before booking
        $isAvailable = true;
        for ($date = $checkInDate->copy(); $date->lt($checkOutDate); $date->addDay()) {
            $availabilityRecord = RoomAvailability::getOrCreateAvailability($roomCategory->id, $date->format('Y-m-d'));
            if (!$availabilityRecord->hasAvailability()) {
                $isAvailable = false;
                break;
            }
        }

        if (!$isAvailable) {
            return back()->withErrors(['room_category_id' => 'Selected room category is no longer available for the selected dates.']);
        }

        // Calculate pricing
        $totalBasePrice = 0;
        $totalWeekendSurcharge = 0;

        for ($date = $checkInDate->copy(); $date->lt($checkOutDate); $date->addDay()) {
            $dayPrice = $roomCategory->getPriceForDate($date->format('Y-m-d'));
            $basePrice = $roomCategory->base_price;
            $weekendSurcharge = $dayPrice - $basePrice;

            $totalBasePrice += $basePrice;
            $totalWeekendSurcharge += $weekendSurcharge;
        }

        $subtotal = $totalBasePrice + $totalWeekendSurcharge;
        
        // Apply consecutive nights discount
        $consecutiveDiscount = 0;
        if ($totalNights >= 3) {
            $consecutiveDiscount = $subtotal * 0.10;
        }

        $finalPrice = $subtotal - $consecutiveDiscount;

        // Create booking
        $booking = DB::transaction(function () use ($request, $checkInDate, $checkOutDate, $totalNights, $roomCategory, $totalBasePrice, $totalWeekendSurcharge, $consecutiveDiscount, $finalPrice) {
            $booking = Booking::create([
                'booking_reference' => Booking::generateBookingReference(),
                'guest_name' => $request->guest_name,
                'guest_email' => $request->guest_email,
                'guest_phone' => $request->guest_phone,
                'room_category_id' => $request->room_category_id,
                'check_in_date' => $checkInDate,
                'check_out_date' => $checkOutDate,
                'total_nights' => $totalNights,
                'base_price' => $totalBasePrice,
                'weekend_surcharge' => $totalWeekendSurcharge,
                'consecutive_discount' => $consecutiveDiscount,
                'total_price' => $finalPrice,
                'status' => 'confirmed'
            ]);

            // Update room availability
            for ($date = $checkInDate->copy(); $date->lt($checkOutDate); $date->addDay()) {
                $availabilityRecord = RoomAvailability::getOrCreateAvailability($roomCategory->id, $date->format('Y-m-d'));
                $availabilityRecord->decreaseAvailability();
            }

            return $booking;
        });

        return redirect()->route('booking.thank-you', $booking->id);
    }

    /**
     * Show thank you page
     */
    public function thankYou($id)
    {
        $booking = Booking::with('roomCategory')->findOrFail($id);
        return view('booking.thank-you', compact('booking'));
    }

    /**
     * Get unavailable dates for calendar
     */
    public function getUnavailableDates()
    {
        $unavailableDates = [];
        
        $roomCategories = RoomCategory::all();
        
        foreach ($roomCategories as $category) {
            $fullyBookedDates = RoomAvailability::where('room_category_id', $category->id)
                ->where('available_rooms', 0)
                ->pluck('date')
                ->toArray();
            
            $unavailableDates = array_merge($unavailableDates, $fullyBookedDates);
        }
        
        $unavailableDates = array_unique($unavailableDates);
        sort($unavailableDates);
        
        return response()->json($unavailableDates);
    }

    /**
     * Show rooms page
     */
    public function rooms()
    {
        $roomCategories = RoomCategory::all();
        return view('rooms', compact('roomCategories'));
    }

    /**
     * Show booking lookup form
     */
    public function lookup()
    {
        return view('booking.lookup');
    }

    /**
     * Find booking by email
     */
    public function findBooking(Request $request)
    {
        $request->validate([
            'guest_email' => 'required|email'
        ]);

        $bookings = Booking::where('guest_email', $request->guest_email)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($bookings->isEmpty()) {
            return back()->withErrors(['guest_email' => 'No bookings found for this email address.']);
        }

        // If only one booking, redirect directly to thank you page
        if ($bookings->count() === 1) {
            return redirect()->route('booking.thank-you', $bookings->first()->id);
        }

        // If multiple bookings, show selection page
        return view('booking.select', compact('bookings'));
    }
}
