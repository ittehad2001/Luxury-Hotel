<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Your Booking - Luxury Hotel</title>
    
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
                    },
                    colors: {
                        primary: {
                            50: '#eff6ff',
                            500: '#3b82f6',
                            600: '#2563eb',
                            700: '#1d4ed8',
                            900: '#1e3a8a',
                        }
                    }
                }
            }
        }
    </script>
</head>

<body class="font-inter antialiased bg-gray-50">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 bg-white/90 backdrop-blur-md border-b border-gray-200">
        <div class="mx-auto px-6 sm:px-8 md:px-12 lg:px-16 xl:px-20 2xl:px-24">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <h1 class="text-2xl font-bold text-gray-900">🏨 Luxury Hotel</h1>
                    </div>
                </div>
                
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('booking.index') }}" class="text-gray-500 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Home</a>
                        <a href="{{ route('rooms') }}" class="text-gray-500 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Rooms</a>
                        <a href="{{ route('booking.lookup') }}" class="text-gray-900 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">My Booking</a>
                        <a href="{{ route('booking.index') }}" class="bg-primary-600 text-white hover:bg-primary-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-20 pb-16 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1564501049412-61c2a3083791?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                 alt="Luxury Hotel Suite" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-purple-900/70"></div>
        </div>
        
        <div class="relative z-10 mx-auto px-6 sm:px-8 md:px-12 lg:px-16 xl:px-20 2xl:px-24 text-center">
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                Select Your
                <span class="block bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                    Booking
                </span>
            </h1>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto leading-relaxed">
                You have multiple bookings. Please select which one you'd like to view.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-gray-50">
        <div class="mx-auto px-6 sm:px-8 md:px-12 lg:px-16 xl:px-20 2xl:px-24">
            <div class="text-center mb-8">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Your Bookings</h2>
                <p class="text-gray-600">Choose the booking you want to view</p>
            </div>

            <div class="grid gap-6">
                @foreach($bookings as $booking)
                <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden border border-gray-100">
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $booking->roomCategory->name }}</h3>
                                <p class="text-gray-600 mb-2">Booking Reference: <span class="font-mono text-primary-600">{{ $booking->booking_reference }}</span></p>
                            </div>
                            <div class="text-right">
                                <div class="text-2xl font-bold text-primary-600">৳{{ number_format($booking->total_price, 0) }}</div>
                                <div class="text-sm text-gray-500">{{ $booking->total_nights }} night(s)</div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="text-sm text-gray-600 mb-1">Check-in</div>
                                <div class="font-semibold text-gray-900">{{ \Carbon\Carbon::parse($booking->check_in_date)->format('M d, Y') }}</div>
                                <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($booking->check_in_date)->format('l') }}</div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="text-sm text-gray-600 mb-1">Check-out</div>
                                <div class="font-semibold text-gray-900">{{ \Carbon\Carbon::parse($booking->check_out_date)->format('M d, Y') }}</div>
                                <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($booking->check_out_date)->format('l') }}</div>
                            </div>
                            <div class="bg-gray-50 rounded-lg p-4">
                                <div class="text-sm text-gray-600 mb-1">Status</div>
                                <div class="font-semibold text-gray-900 capitalize">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                        @if($booking->status === 'confirmed') bg-green-100 text-green-800
                                        @elseif($booking->status === 'cancelled') bg-red-100 text-red-800
                                        @else bg-blue-100 text-blue-800 @endif">
                                        {{ $booking->status }}
                                    </span>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-between items-center">
                            <div class="text-sm text-gray-600">
                                <div>Guest: {{ $booking->guest_name }}</div>
                                <div>Email: {{ $booking->guest_email }}</div>
                                <div>Phone: {{ $booking->guest_phone }}</div>
                            </div>
                            <a href="{{ route('booking.thank-you', $booking->id) }}" 
                               class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors shadow-lg">
                                <span class="flex items-center">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    View Details
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="mt-8 text-center">
                <a href="{{ route('booking.lookup') }}" 
                   class="text-primary-600 hover:text-primary-700 font-medium">
                    ← Back to Search
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <div class="col-span-1 md:col-span-2">
                    <h3 class="text-2xl font-bold mb-4">🏨 Luxury Hotel</h3>
                    <p class="text-gray-400 mb-4 leading-relaxed">
                        Experience the epitome of luxury and comfort at our world-class hotel. 
                        We're committed to providing exceptional service and unforgettable memories.
                    </p>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Quick Links</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('booking.index') }}" class="text-gray-400 hover:text-white transition-colors">Home</a></li>
                        <li><a href="{{ route('rooms') }}" class="text-gray-400 hover:text-white transition-colors">Rooms</a></li>
                        <li><a href="#amenities" class="text-gray-400 hover:text-white transition-colors">Amenities</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                    </ul>
                </div>
                
                <div>
                    <h4 class="text-lg font-semibold mb-4">Contact Info</h4>
                    <div class="space-y-2 text-gray-400">
                        <p>📍 123 Luxury Avenue, City</p>
                        <p>📞 +1 (555) 123-4567</p>
                        <p>✉️ info@luxuryhotel.com</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; {{ date('Y') }} Luxury Hotel. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
