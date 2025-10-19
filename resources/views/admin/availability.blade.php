<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Room Availability - Hotel Management</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body class="font-inter antialiased bg-gray-100">
    <div class="flex h-screen">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white">
            <div class="p-6">
                <div class="flex items-center mb-8">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center mr-3">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                    </div>
                    <h1 class="text-xl font-bold">Admin Panel</h1>
                </div>
                
                <nav class="space-y-2">
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                        Dashboard
                    </a>
                    <a href="{{ route('admin.bookings') }}" class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                        </svg>
                        Bookings
                    </a>
                    <a href="{{ route('admin.rooms') }}" class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Room Categories
                    </a>
                    <a href="{{ route('admin.availability') }}" class="flex items-center px-4 py-3 rounded-lg bg-blue-600 text-white">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Availability
                    </a>
                    <a href="{{ route('booking.index') }}" class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path>
                        </svg>
                        View Website
                    </a>
                </nav>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-hidden">
            <!-- Header -->
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h1 class="text-2xl font-bold text-gray-900">Room Availability Calendar</h1>
                        <div class="flex items-center space-x-4">
                            <span class="text-sm text-gray-600">{{ now()->format('M d, Y') }}</span>
                            <span class="text-sm font-medium text-gray-900">Hotel Admin</span>
                            <a href="{{ route('admin.logout') }}" class="text-red-600 hover:text-red-700 text-sm font-medium">Logout</a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-6">
                <!-- Availability Overview -->
                <div class="bg-white rounded-lg shadow p-6 mb-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-900">Availability Overview</h2>
                        <form method="GET" action="{{ route('admin.availability') }}" class="flex items-center space-x-2">
                            <input type="date" name="start_date" value="{{ $startDate }}" 
                                   class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <span class="text-gray-600">to</span>
                            <input type="date" name="end_date" value="{{ $endDate }}" 
                                   class="px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium">Filter</button>
                        </form>
                    </div>
                    
                    <!-- Legend -->
                    <div class="flex items-center space-x-6 mb-6">
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-green-500 rounded-full mr-2"></div>
                            <span class="text-sm text-gray-600">Available (3+ rooms)</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-yellow-500 rounded-full mr-2"></div>
                            <span class="text-sm text-gray-600">Limited (1-2 rooms)</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-red-500 rounded-full mr-2"></div>
                            <span class="text-sm text-gray-600">Fully Booked (0 rooms)</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-4 h-4 bg-gray-400 rounded-full mr-2"></div>
                            <span class="text-sm text-gray-600">No Data</span>
                        </div>
                    </div>
                </div>

                <!-- Room Availability Calendar -->
                <div class="bg-white rounded-lg shadow overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Room Availability Calendar</h3>
                    </div>
                    
                    <div class="overflow-x-auto">
                        <table class="min-w-full">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Room Category</th>
                                    @php
                                        $start = \Carbon\Carbon::parse($startDate);
                                        $end = \Carbon\Carbon::parse($endDate);
                                        $dates = [];
                                        for ($date = $start->copy(); $date->lte($end); $date->addDay()) {
                                            $dates[] = $date;
                                        }
                                    @endphp
                                    @foreach($dates as $date)
                                    <th class="px-2 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <div>{{ $date->format('M d') }}</div>
                                        <div class="text-gray-400">{{ $date->format('D') }}</div>
                                    </th>
                                    @endforeach
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach($availabilityData as $categoryData)
                                <tr>
                                    <td class="px-4 py-3 whitespace-nowrap">
                                        <div class="text-sm font-medium text-gray-900">{{ $categoryData['category']->name }}</div>
                                        <div class="text-sm text-gray-500">Base: ৳{{ number_format($categoryData['category']->base_price) }}</div>
                                    </td>
                                    @foreach($categoryData['availability'] as $dayAvailability)
                                    <td class="px-2 py-3 text-center">
                                        @if($dayAvailability['status'] === 'available')
                                            <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center mx-auto">
                                                <span class="text-white text-xs font-bold">{{ $dayAvailability['available'] }}</span>
                                            </div>
                                        @elseif($dayAvailability['status'] === 'limited')
                                            <div class="w-8 h-8 bg-yellow-500 rounded-full flex items-center justify-center mx-auto">
                                                <span class="text-white text-xs font-bold">{{ $dayAvailability['available'] }}</span>
                                            </div>
                                        @elseif($dayAvailability['status'] === 'booked')
                                            <div class="w-8 h-8 bg-red-500 rounded-full flex items-center justify-center mx-auto">
                                                <span class="text-white text-xs font-bold">0</span>
                                            </div>
                                        @else
                                            <div class="w-8 h-8 bg-gray-400 rounded-full flex items-center justify-center mx-auto">
                                                <span class="text-white text-xs font-bold">-</span>
                                            </div>
                                        @endif
                                    </td>
                                    @endforeach
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Summary Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 text-green-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Available Rooms</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $totalAvailable }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Limited Availability</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $totalLimited }}</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-red-100 text-red-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </div>
                            <div class="ml-4">
                                <p class="text-sm font-medium text-gray-600">Fully Booked</p>
                                <p class="text-2xl font-bold text-gray-900">{{ $totalBooked }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>
</html>