<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation - Luxury Hotel</title>
    
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
    
    <!-- Custom Styles -->
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }
        .success-animation {
            animation: successPulse 2s ease-in-out infinite;
        }
        @keyframes successPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        .price-highlight {
            background: linear-gradient(135deg, #10b981, #059669);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
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
                        <a href="{{ route('booking.index') }}" class="text-gray-900 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Home</a>
                        <a href="{{ route('rooms') }}" class="text-gray-500 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Rooms</a>
                        <a href="{{ route('booking.lookup') }}" class="text-gray-500 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">My Booking</a>
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
            <div class="absolute inset-0 bg-gradient-to-r from-green-900/70 to-emerald-900/70"></div>
        </div>
        
        <!-- Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full floating"></div>
            <div class="absolute top-40 right-20 w-16 h-16 bg-white/10 rounded-full floating" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-20 left-20 w-24 h-24 bg-white/10 rounded-full floating" style="animation-delay: 2s;"></div>
        </div>
        
        <div class="relative z-10 mx-auto px-6 sm:px-8 md:px-12 lg:px-16 xl:px-20 2xl:px-24 text-center">
            <div class="success-animation mb-8">
                <div class="w-24 h-24 bg-white/20 rounded-full flex items-center justify-center mx-auto mb-6">
                    <svg class="w-12 h-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                    </svg>
                </div>
            </div>
            
            <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 leading-tight">
                Booking
                <span class="block">Confirmed!</span>
            </h1>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto leading-relaxed">
                Thank you for choosing our hotel. Your booking has been successfully confirmed and you will receive a confirmation email shortly.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-gray-50">
        <div class="mx-auto px-6 sm:px-8 md:px-12 lg:px-16 xl:px-20 2xl:px-24">
            <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
                <!-- Header -->
                <div class="bg-gradient-to-r from-primary-600 to-primary-700 px-8 py-6">
                    <h2 class="text-2xl font-bold text-white flex items-center">
                        <svg class="w-6 h-6 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Booking Details
                    </h2>
                    </div>
                
                <div class="p-8">
                        <!-- Booking Reference -->
                    <div class="text-center mb-8">
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Booking Reference</h3>
                        <div class="inline-block bg-gray-100 px-6 py-3 rounded-lg">
                            <span class="font-mono text-xl font-bold text-primary-600">{{ $booking->booking_reference }}</span>
                        </div>
                    </div>

                    <!-- Guest Information & Stay Details -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-8">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Guest Information
                            </h4>
                            <div class="space-y-3">
                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <span class="font-medium text-gray-600">Name:</span>
                                    <span class="text-gray-900">{{ $booking->guest_name }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <span class="font-medium text-gray-600">Email:</span>
                                    <span class="text-gray-900">{{ $booking->guest_email }}</span>
                                </div>
                                <div class="flex justify-between py-2">
                                    <span class="font-medium text-gray-600">Phone:</span>
                                    <span class="text-gray-900">{{ $booking->guest_phone }}</span>
                                </div>
                            </div>
                        </div>

                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                </svg>
                                Stay Details
                            </h4>
                            <div class="space-y-3">
                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <span class="font-medium text-gray-600">Room:</span>
                                    <span class="text-gray-900">{{ $booking->roomCategory->name }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <span class="font-medium text-gray-600">Check-in:</span>
                                    <span class="text-gray-900">{{ $booking->check_in_date->format('M d, Y') }}</span>
                                </div>
                                <div class="flex justify-between py-2 border-b border-gray-100">
                                    <span class="font-medium text-gray-600">Check-out:</span>
                                    <span class="text-gray-900">{{ $booking->check_out_date->format('M d, Y') }}</span>
                                </div>
                                <div class="flex justify-between py-2">
                                    <span class="font-medium text-gray-600">Nights:</span>
                                    <span class="text-gray-900">{{ $booking->total_nights }}</span>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!-- Price Breakdown -->
                    <div class="bg-gray-50 rounded-xl p-6 mb-8">
                        <h4 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                            Price Breakdown
                        </h4>
                        
                        <div class="space-y-3">
                            <div class="flex justify-between py-2">
                                <span class="text-gray-600">Base Price:</span>
                                <span class="font-medium">৳{{ number_format($booking->base_price, 2) }}</span>
                            </div>
                            
                                    @if($booking->weekend_surcharge > 0)
                            <div class="flex justify-between py-2">
                                <span class="text-gray-600">Weekend Surcharge (+20%):</span>
                                <span class="font-medium">৳{{ number_format($booking->weekend_surcharge, 2) }}</span>
                            </div>
                                    @endif
                            
                            @if($booking->consecutive_discount > 0)
                            <div class="flex justify-between py-2">
                                <span class="text-gray-600">Consecutive Discount (-10%):</span>
                                <span class="font-medium text-green-600">-৳{{ number_format($booking->consecutive_discount, 2) }}</span>
                                </div>
                                    @endif
                            
                            <div class="border-t border-gray-200 pt-3 mt-3">
                                <div class="flex justify-between">
                                    <span class="text-lg font-semibold text-gray-900">Total Price:</span>
                                    <span class="text-xl font-bold price-highlight">৳{{ number_format($booking->total_price, 2) }}</span>
                                </div>
                                </div>
                            </div>
                        </div>

                        <!-- Status -->
                    <div class="text-center mb-8">
                        <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium bg-green-100 text-green-800">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            Status: {{ ucfirst($booking->status) }}
                        </span>
                        </div>
                    </div>
                </div>

                <!-- Next Steps -->
            <div class="bg-white rounded-2xl shadow-xl p-8 mt-8">
                <h3 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                    <svg class="w-6 h-6 mr-3 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Next Steps
                </h3>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Before Your Stay</h4>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-green-500 mr-3 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-gray-700">Confirmation email sent to {{ $booking->guest_email }}</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <span class="text-gray-700">Save your booking reference: <strong>{{ $booking->booking_reference }}</strong></span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-yellow-500 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-gray-700">Check-in time: 2:00 PM</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-blue-500 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                                </svg>
                                <span class="text-gray-700">Bring valid ID for check-in</span>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <h4 class="text-lg font-semibold text-gray-900 mb-4">Contact Information</h4>
                        <div class="space-y-3">
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary-500 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                </svg>
                                <span class="text-gray-700">Hotel: +880-XXX-XXXX</span>
                            </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary-500 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                                </svg>
                                <span class="text-gray-700">Email: info@luxuryhotel.com</span>
                    </div>
                            <div class="flex items-start">
                                <svg class="w-5 h-5 text-primary-500 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                <span class="text-gray-700">Address: Hotel Location</span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Actions -->
            <div class="text-center mt-8 space-x-4">
                <a href="{{ route('booking.lookup') }}" 
                   class="inline-flex items-center bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    Find My Booking Later
                </a>
                <a href="{{ route('booking.index') }}" 
                   class="inline-flex items-center bg-primary-600 hover:bg-primary-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Make Another Booking
                </a>
                <button onclick="window.print()" 
                        class="inline-flex items-center border border-gray-300 text-gray-700 hover:bg-gray-50 px-8 py-3 rounded-lg font-semibold transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Print Confirmation
                    </button>
                </div>
            </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-12">
        <div class="mx-auto px-6 sm:px-8 md:px-12 lg:px-16 xl:px-20 2xl:px-24">
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
                        <li><a href="#rooms" class="text-gray-400 hover:text-white transition-colors">Rooms</a></li>
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

    <!-- Print Styles -->
    <style>
        @media print {
            .no-print { display: none !important; }
            body { background: white !important; }
            .hero-gradient { background: #10b981 !important; }
        }
    </style>
</body>
</html>
