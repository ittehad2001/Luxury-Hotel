<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Book Your Stay - Luxury Hotel</title>
    
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
                    },
                    maxWidth: {
                        '8xl': '88rem',
                        '9xl': '96rem',
                    }
                }
            }
        }
    </script>
    
    <style>
        @media (min-width: 1536px) {
            .max-w-8xl {
                max-width: 88rem;
            }
        }
        @media (min-width: 1920px) {
            .max-w-8xl {
                max-width: 96rem;
            }
        }
    </style>
    
    <!-- Custom Styles -->
    <style>
        .hero-gradient {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .glass-effect {
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        .room-card {
            transition: all 0.3s ease;
        }
        .room-card:hover {
            transform: translateY(-5px);
        }
        .loading {
            display: none;
        }
        .price-highlight {
            background: linear-gradient(135deg, #10b981, #059669);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
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
                        <!-- <a href="{{ route('admin.login') }}" class="text-gray-500 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Admin</a> -->
                        <a href="{{ route('booking.index') }}" class="bg-primary-600 text-white hover:bg-primary-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors">Book Now</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative pt-16 pb-12 overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                 alt="Luxury Hotel Interior" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-gradient-to-r from-blue-900/70 to-purple-900/70"></div>
    </div>

        <!-- Background Elements -->
        <div class="absolute inset-0">
            <div class="absolute top-20 left-10 w-20 h-20 bg-white/10 rounded-full floating"></div>
            <div class="absolute top-40 right-20 w-16 h-16 bg-white/10 rounded-full floating" style="animation-delay: 1s;"></div>
            <div class="absolute bottom-20 left-20 w-24 h-24 bg-white/10 rounded-full floating" style="animation-delay: 2s;"></div>
        </div>

        <div class="relative z-10 mx-auto px-6 sm:px-8 md:px-12 lg:px-16 xl:px-20 2xl:px-24 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white mb-4 leading-tight">
                Book Your
                <span class="block bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                    Perfect Stay
                </span>
            </h1>
            <p class="text-lg text-white/90 mb-6 max-w-3xl mx-auto leading-relaxed">
                Experience luxury and comfort like never before. Find and book your ideal room with our modern booking system.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-12 bg-gray-50">
        <div class="mx-auto px-6 sm:px-8 md:px-12 lg:px-16 xl:px-20 2xl:px-24">
            <div class="grid grid-cols-1 xl:grid-cols-4 gap-8">
        <!-- Booking Form -->
                <div class="xl:col-span-3">
                    <div class="bg-white rounded-2xl shadow-xl p-6">
                        <div class="mb-6">
                            <h2 class="text-2xl font-bold text-gray-900 mb-2">Select Your Dates</h2>
                            <p class="text-gray-600">Choose your check-in and check-out dates to see available rooms</p>
                    </div>
                        
                        <form id="bookingForm" class="space-y-6">
                            @csrf
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div>
                                    <label for="check_in_date" class="block text-sm font-medium text-gray-700 mb-2">Check-in Date</label>
                                    <input type="date" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200" 
                                           id="check_in_date" 
                                           name="check_in_date" 
                                           required>
                                </div>
                                <div>
                                    <label for="check_out_date" class="block text-sm font-medium text-gray-700 mb-2">Check-out Date</label>
                                    <input type="date" 
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200" 
                                           id="check_out_date" 
                                           name="check_out_date" 
                                           required>
                                </div>
                            </div>
                            
                            <div class="text-center">
                                <button type="submit" 
                                        class="bg-primary-600 hover:bg-primary-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                                    <span class="flex items-center justify-center">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                        Check Availability
                                    </span>
                                </button>
                            </div>
                        </form>
                </div>

                <!-- Availability Results -->
                    <div id="availabilityResults" class="mt-6 bg-white rounded-2xl shadow-xl p-6" style="display: none;">
                        <div class="mb-4">
                            <h3 class="text-xl font-bold text-gray-900 mb-2">Available Rooms</h3>
                            <p class="text-gray-600">Choose from our available rooms for your selected dates</p>
                        </div>
                        <div id="roomsList" class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-6"></div>
                    </div>
            </div>

                <!-- Sidebar -->
                <div class="xl:col-span-1 space-y-6">
                <!-- Room Categories Info -->
                    <div id="room-categories" class="bg-white rounded-2xl shadow-xl p-5">
                        <div class="mb-4">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h4 class="text-lg font-bold text-gray-900 mb-1">Room Categories</h4>
                                    <p class="text-gray-600 text-sm">Explore our premium room options</p>
                                </div>
                                <a href="{{ route('rooms') }}" class="text-primary-600 hover:text-primary-700 text-sm font-medium transition-colors">
                                    View All Rooms →
                                </a>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-1 gap-4">
                        @foreach($roomCategories as $category)
                            <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group border border-gray-100">
                                <!-- Room Image -->
                                <div class="relative h-48 overflow-hidden">
                                    @php
                                        $roomImages = [
                                            'Premium Deluxe' => 'https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                                            'Super Deluxe' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                                            'Standard Deluxe' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                                            'Presidential Suite' => 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
                                            'Executive Room' => 'https://images.unsplash.com/photo-1595576508898-0ad5c879a061?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'
                                        ];
                                        $roomImage = $roomImages[$category->name] ?? 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80';
                                    @endphp
                                    <img src="{{ $roomImage }}" 
                                         alt="{{ $category->name }}" 
                                         class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                    
                                    <!-- Price Badge -->
                                    <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-xl px-4 py-2 shadow-lg">
                                        <div class="text-2xl font-bold text-green-600">৳{{ number_format($category->base_price, 0) }}</div>
                                        <div class="text-xs text-gray-600">per night</div>
                                    </div>
                                    
                                    <!-- Category Badge -->
                                    <div class="absolute top-4 left-4 bg-primary-600/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-medium">
                                        {{ $category->name }}
                                    </div>
                                </div>
                                
                                <!-- Room Details -->
                                <div class="p-4">
                                    <h5 class="text-lg font-bold text-gray-900 mb-2">{{ $category->name }}</h5>
                                    <p class="text-gray-600 mb-3 leading-relaxed text-sm">{{ $category->description }}</p>
                                    
                                    <!-- Features -->
                                    <div class="flex flex-wrap gap-2 mb-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                            </svg>
                                            Premium
                                        </span>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            WiFi
                                        </span>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                            </svg>
                                            Luxury
                                        </span>
                                    </div>
                                </div>
                        </div>
                        @endforeach
                        
                        <!-- More Rooms Notice -->
                        <div class="mt-4 p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl border border-blue-200">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                                    </svg>
                                    <span class="text-sm text-blue-700 font-medium">More room types available</span>
                                </div>
                                <a href="{{ route('rooms') }}" class="text-blue-600 hover:text-blue-700 text-sm font-medium transition-colors">
                                    View All →
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pricing Info -->
                    <div id="pricing-info" class="bg-gradient-to-br from-blue-50 to-indigo-100 rounded-2xl shadow-xl p-6">
                        <div class="mb-6">
                            <h5 class="text-lg font-bold text-gray-900 mb-2">Pricing Information</h5>
                            <p class="text-gray-600 text-sm">Transparent pricing with no hidden fees</p>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center text-sm">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-3"></div>
                                <span class="text-gray-700">Weekend (Fri-Sat): +20% surcharge</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mr-3"></div>
                                <span class="text-gray-700">3+ consecutive nights: 10% discount</span>
                            </div>
                            <div class="flex items-center text-sm">
                                <div class="w-2 h-2 bg-purple-500 rounded-full mr-3"></div>
                                <span class="text-gray-700">3 rooms available per category</span>
                            </div>
                        </div>
                    </div>

                    <!-- Features -->
                    <div class="bg-white rounded-2xl shadow-xl p-6 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-24 h-24 opacity-10">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                                 alt="Hotel Amenities" 
                                 class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div class="relative z-10">
                            <h5 class="text-lg font-bold text-gray-900 mb-4">Hotel Features</h5>
                            <div class="grid grid-cols-2 gap-3">
                                <div class="flex items-center text-sm text-gray-600">
                                    <span class="mr-2">🏊‍♂️</span>
                                    Pool
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <span class="mr-2">🍽️</span>
                                    Restaurant
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <span class="mr-2">🚗</span>
                                    Parking
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <span class="mr-2">🏋️‍♂️</span>
                                    Gym
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <span class="mr-2">📶</span>
                                    WiFi
                                </div>
                                <div class="flex items-center text-sm text-gray-600">
                                    <span class="mr-2">🛎️</span>
                                    Concierge
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Booking Modal -->
    <div id="bookingModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-2xl shadow-2xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="p-8">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-2xl font-bold text-gray-900">Complete Your Booking</h3>
                    <button type="button" class="text-gray-400 hover:text-gray-600" onclick="closeBookingModal()">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                    <form id="finalBookingForm" method="POST" action="{{ route('booking.store') }}">
                        @csrf
                        <input type="hidden" id="selected_room_category" name="room_category_id">
                        <input type="hidden" id="selected_check_in" name="check_in_date">
                        <input type="hidden" id="selected_check_out" name="check_out_date">
                        
                        <!-- Debug info -->
                        <div class="hidden" id="debugInfo">
                            <p>Debug: Form will submit to {{ route('booking.store') }}</p>
                            </div>
                        
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label for="guest_name" class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input type="text" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200" 
                                   id="guest_name" 
                                   name="guest_name" 
                                   required>
                            </div>
                        <div>
                            <label for="guest_email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                            <input type="email" 
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200" 
                                   id="guest_email" 
                                   name="guest_email" 
                                   required>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <label for="guest_phone" class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                        <input type="tel" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200" 
                               id="guest_phone" 
                               name="guest_phone" 
                               required>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-6 mb-6">
                        <h6 class="text-lg font-semibold text-gray-900 mb-3">Booking Summary</h6>
                        <div id="bookingSummary" class="text-gray-700"></div>
                        </div>
                        
                    <div class="flex justify-end space-x-4">
                        <button type="button" 
                                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors" 
                                onclick="closeBookingModal()">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="bg-primary-600 hover:bg-primary-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                            Confirm Booking
                        </button>
                        </div>
                    </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer id="footer" class="bg-gray-900 text-white py-12">
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set minimum date to today
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('check_in_date').min = today;
            document.getElementById('check_out_date').min = today;

            // Update checkout date minimum when checkin date changes
            document.getElementById('check_in_date').addEventListener('change', function() {
                const checkInDate = new Date(this.value);
                checkInDate.setDate(checkInDate.getDate() + 1);
                document.getElementById('check_out_date').min = checkInDate.toISOString().split('T')[0];
            });

            // Handle form submission
            document.getElementById('bookingForm').addEventListener('submit', function(e) {
                e.preventDefault();
                checkAvailability();
            });
        });

        function checkAvailability() {
            const formData = new FormData(document.getElementById('bookingForm'));
            
            fetch('{{ route("booking.check-availability") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || 
                                   document.querySelector('input[name="_token"]').value
                }
            })
            .then(response => {
                console.log('Response status:', response.status);
                if (!response.ok) {
                    return response.text().then(text => {
                        console.error('Error response:', text);
                        throw new Error(`HTTP error! status: ${response.status}`);
                    });
                }
                return response.json();
            })
            .then(data => {
                console.log('Availability data:', data);
                if (data.error) {
                    throw new Error(data.error);
                }
                displayAvailability(data);
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Error checking availability: ' + error.message);
            });
        }

        function displayAvailability(data) {
            const resultsDiv = document.getElementById('availabilityResults');
            const roomsList = document.getElementById('roomsList');
            
            // Check if any rooms are available
            const availableRooms = data.availability.filter(room => room.is_available);
            
            if (availableRooms.length === 0) {
                roomsList.innerHTML = `
                    <div class="text-center py-12">
                        <div class="w-16 h-16 bg-gray-100 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold text-gray-900 mb-2">No rooms available</h3>
                        <p class="text-gray-600">Sorry, no rooms are available for the selected dates. Please try different dates.</p>
                    </div>
                `;
            } else {
                let html = '';
                availableRooms.forEach(room => {
                    // Determine room image based on category name
                    let roomImage = '';
                    if (room.category.name.toLowerCase().includes('premium')) {
                        roomImage = 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
                    } else if (room.category.name.toLowerCase().includes('super')) {
                        roomImage = 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
                    } else {
                        roomImage = 'https://images.unsplash.com/photo-1595576508898-0ad5c879a061?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80';
                    }

                    html += `
                        <div class="bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group border border-gray-100">
                            <!-- Room Image -->
                            <div class="relative h-64 overflow-hidden">
                                <img src="${roomImage}" 
                                     alt="${room.category.name}" 
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                                
                                <!-- Price Badge -->
                                <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-xl px-4 py-2 shadow-lg">
                                    <div class="text-2xl font-bold text-green-600">৳${room.final_price.toLocaleString()}</div>
                                    <div class="text-xs text-gray-600">${data.total_nights} night(s)</div>
                                </div>
                                
                                <!-- Category Badge -->
                                <div class="absolute top-4 left-4 bg-primary-600/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-medium">
                                    ${room.category.name}
                                    </div>
                                
                                <!-- Book Now Button -->
                                <div class="absolute bottom-4 right-4">
                                    <button class="bg-primary-600 hover:bg-primary-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors shadow-lg" 
                                            onclick="openBookingModal(${room.category.id}, '${room.category.name}', ${room.final_price}, ${room.category.base_price})">
                                        <span class="flex items-center">
                                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Book Now
                                        </span>
                                        </button>
                                    </div>
                            </div>
                            
                            <!-- Room Details -->
                            <div class="p-6">
                                <h4 class="text-xl font-bold text-gray-900 mb-3">${room.category.name}</h4>
                                <p class="text-gray-600 mb-4 leading-relaxed">${room.category.description}</p>
                                
                                <!-- Price Breakdown -->
                                <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                    <div class="text-sm space-y-1">
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Base Price:</span>
                                            <span>৳${room.base_price.toLocaleString()}</span>
                                        </div>
                                        ${room.weekend_surcharge > 0 ? `
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Weekend Surcharge:</span>
                                            <span class="text-orange-600">+৳${room.weekend_surcharge.toLocaleString()}</span>
                                        </div>
                                        ` : ''}
                                        ${room.consecutive_discount > 0 ? `
                                        <div class="flex justify-between">
                                            <span class="text-gray-600">Consecutive Discount:</span>
                                            <span class="text-green-600">-৳${room.consecutive_discount.toLocaleString()}</span>
                                        </div>
                                        ` : ''}
                                        <div class="flex justify-between font-semibold border-t pt-1">
                                            <span>Total:</span>
                                            <span class="text-primary-600">৳${room.final_price.toLocaleString()}</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Features -->
                                <div class="flex flex-wrap gap-2">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        Premium
                                    </span>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        WiFi
                                    </span>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                                        <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                        </svg>
                                        Luxury
                                    </span>
                                </div>
                            </div>
                        </div>
                    `;
                });
                roomsList.innerHTML = html;
            }
            
            resultsDiv.style.display = 'block';
            resultsDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }

        function openBookingModal(roomCategoryId, roomName, totalPrice, basePrice) {
            document.getElementById('selected_room_category').value = roomCategoryId;
            document.getElementById('selected_check_in').value = document.getElementById('check_in_date').value;
            document.getElementById('selected_check_out').value = document.getElementById('check_out_date').value;
            
            // Calculate nights
            const checkInDate = new Date(document.getElementById('check_in_date').value);
            const checkOutDate = new Date(document.getElementById('check_out_date').value);
            const nights = Math.ceil((checkOutDate - checkInDate) / (1000 * 60 * 60 * 24));
            
            // Calculate base total
            const baseTotal = parseFloat(basePrice) * nights;
            
            // Calculate weekend surcharge (assuming Friday=5, Saturday=6)
            let weekendSurcharge = 0;
            let weekendNights = 0;
            for (let i = 0; i < nights; i++) {
                const currentDate = new Date(checkInDate);
                currentDate.setDate(currentDate.getDate() + i);
                const dayOfWeek = currentDate.getDay();
                if (dayOfWeek === 5 || dayOfWeek === 6) { // Friday or Saturday
                    weekendNights++;
                }
            }
            if (weekendNights > 0) {
                weekendSurcharge = (parseFloat(basePrice) * weekendNights) * 0.2; // 20% surcharge
            }
            
            // Calculate consecutive discount (3+ nights)
            let consecutiveDiscount = 0;
            if (nights >= 3) {
                consecutiveDiscount = baseTotal * 0.1; // 10% discount
            }
            
            // Calculate final total
            const finalTotal = baseTotal + weekendSurcharge - consecutiveDiscount;
            
            const summary = `
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="font-medium">Room:</span>
                        <span>${roomName}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium">Check-in:</span>
                        <span>${document.getElementById('check_in_date').value}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium">Check-out:</span>
                        <span>${document.getElementById('check_out_date').value}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="font-medium">Nights:</span>
                        <span>${nights} night(s)</span>
                    </div>
                    
                    <div class="border-t pt-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Base Price (${nights} nights):</span>
                            <span>৳${baseTotal.toLocaleString()}</span>
                        </div>
                        
                        ${weekendSurcharge > 0 ? `
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Weekend Surcharge (+20%):</span>
                            <span class="text-orange-600">+৳${weekendSurcharge.toLocaleString()}</span>
                        </div>
                        ` : ''}
                        
                        ${consecutiveDiscount > 0 ? `
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Consecutive Discount (-10%):</span>
                            <span class="text-green-600">-৳${consecutiveDiscount.toLocaleString()}</span>
                        </div>
                        ` : ''}
                    </div>
                    
                    <div class="flex justify-between border-t pt-3">
                        <span class="font-bold text-lg">Total Price:</span>
                        <span class="font-bold text-lg text-primary-600">৳${finalTotal.toLocaleString()}</span>
                    </div>
                    
                    ${consecutiveDiscount > 0 ? `
                    <div class="bg-green-50 border border-green-200 rounded-lg p-3 mt-3">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="text-green-800 font-medium text-sm">Great! You saved ৳${consecutiveDiscount.toLocaleString()} with our consecutive night discount!</span>
                        </div>
                    </div>
                    ` : ''}
                </div>
            `;
            document.getElementById('bookingSummary').innerHTML = summary;
            
            document.getElementById('bookingModal').classList.remove('hidden');
            document.getElementById('bookingModal').classList.add('flex');
        }

        function closeBookingModal() {
            document.getElementById('bookingModal').classList.add('hidden');
            document.getElementById('bookingModal').classList.remove('flex');
        }

        // Close modal when clicking outside
        document.getElementById('bookingModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeBookingModal();
            }
        });

        // Add form submission debugging
        document.getElementById('finalBookingForm').addEventListener('submit', function(e) {
            console.log('Form is being submitted...');
            console.log('Form action:', this.action);
            console.log('Form method:', this.method);
            
            // Check if all required fields are filled
            const roomCategory = document.getElementById('selected_room_category').value;
            const checkIn = document.getElementById('selected_check_in').value;
            const checkOut = document.getElementById('selected_check_out').value;
            const guestName = document.getElementById('guest_name').value;
            const guestEmail = document.getElementById('guest_email').value;
            const guestPhone = document.getElementById('guest_phone').value;
            
            console.log('Form data:', {
                roomCategory,
                checkIn,
                checkOut,
                guestName,
                guestEmail,
                guestPhone
            });
            
            if (!roomCategory || !checkIn || !checkOut || !guestName || !guestEmail || !guestPhone) {
                e.preventDefault();
                alert('Please fill in all required fields.');
                return false;
            }
        });
    </script>
</body>
</html>