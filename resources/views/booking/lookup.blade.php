<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find My Booking - Luxury Hotel</title>
    
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
                Find Your
                <span class="block bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                    Booking
                </span>
            </h1>
            <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto leading-relaxed">
                Enter your email address to view your reservation details and manage your stay.
            </p>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-16 bg-gray-50">
        <div class="mx-auto px-6 sm:px-8 md:px-12 lg:px-16 xl:px-20 2xl:px-24">
            <div class="bg-white rounded-2xl shadow-xl p-8">
                <div class="text-center mb-8">
                    <div class="w-16 h-16 bg-primary-100 rounded-full flex items-center justify-center mx-auto mb-4">
                        <svg class="w-8 h-8 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-gray-900 mb-2">Find Your Booking</h2>
                    <p class="text-gray-600">Enter your email address to view your reservation details</p>
                </div>

                <form method="POST" action="{{ route('booking.find') }}" class="space-y-6">
                    @csrf
                    
                    <div>
                        <label for="guest_email" class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                        <input type="email" 
                               class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-transparent transition-all duration-200 @error('guest_email') border-red-500 @enderror" 
                               id="guest_email" 
                               name="guest_email" 
                               placeholder="Enter your email address"
                               value="{{ old('guest_email') }}"
                               required>
                        @error('guest_email')
                            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" 
                                class="bg-primary-600 hover:bg-primary-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-lg">
                            <span class="flex items-center justify-center">
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Find My Booking
                            </span>
                        </button>
                    </div>
                </form>

                <div class="mt-8 p-4 bg-blue-50 rounded-lg border border-blue-200">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        <div>
                            <h4 class="text-sm font-semibold text-blue-800 mb-1">Need Help?</h4>
                            <p class="text-sm text-blue-700">Enter the email address you used when making the reservation. If you have multiple bookings, you'll be able to select which one to view.</p>
                        </div>
                    </div>
                </div>
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