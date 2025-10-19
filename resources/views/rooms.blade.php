<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Rooms - Luxury Hotel</title>
    
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
            transform: translateY(-8px);
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
                        <a href="{{ route('booking.index') }}" class="text-2xl font-bold text-gray-900">🏨 Luxury Hotel</a>
                    </div>
                </div>
                
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('booking.index') }}" class="text-gray-500 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Home</a>
                        <a href="{{ route('rooms') }}" class="text-gray-900 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">Rooms</a>
                        <a href="{{ route('booking.lookup') }}" class="text-gray-500 hover:text-primary-600 px-3 py-2 rounded-md text-sm font-medium transition-colors">My Booking</a>
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
                Our Luxury
                <span class="block bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                    Room Collection
                </span>
            </h1>
            <p class="text-lg text-white/90 mb-6 max-w-3xl mx-auto leading-relaxed">
                Discover our carefully curated selection of premium accommodations, each designed to provide the ultimate in comfort and luxury.
            </p>
        </div>
    </section>

    <!-- Room Categories Section -->
    <section class="py-12 bg-gray-50">
        <div class="mx-auto px-6 sm:px-8 md:px-12 lg:px-16 xl:px-20 2xl:px-24">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-gray-900 mb-3">Room Categories</h2>
                <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                    Choose from our diverse collection of luxury accommodations, each offering unique amenities and experiences
                </p>
            </div>
            
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8">
                @foreach($roomCategories as $category)
                <div class="room-card bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden group border border-gray-100">
                    <!-- Room Image -->
                    <div class="relative h-80 overflow-hidden">
                        @if(str_contains(strtolower($category->name), 'premium'))
                            <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                                 alt="Premium Deluxe Room" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @elseif(str_contains(strtolower($category->name), 'super'))
                            <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                                 alt="Super Deluxe Room" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @else
                            <img src="https://images.unsplash.com/photo-1595576508898-0ad5c879a061?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                                 alt="Standard Deluxe Room" 
                                 class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                        @endif
                        
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
                    <div class="p-6">
                        <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ $category->name }}</h3>
                        <p class="text-gray-600 mb-6 leading-relaxed">{{ $category->description }}</p>
                        
                        <!-- Features -->
                        <div class="flex flex-wrap gap-2 mb-6">
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
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 5a2 2 0 012-2h4a2 2 0 012 2v2H8V5z"></path>
                                </svg>
                                King Bed
                            </span>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 15a4 4 0 004 4h10a4 4 0 004-4V9a4 4 0 00-4-4H7a4 4 0 00-4 4v6z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v18"></path>
                                </svg>
                                City View
                            </span>
                        </div>
                        
                        <!-- Room Specifications -->
                        <div class="border-t border-gray-100 pt-4 mb-6">
                            <h4 class="text-sm font-semibold text-gray-900 mb-3">Room Specifications</h4>
                            <div class="grid grid-cols-2 gap-3 text-sm text-gray-600">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2m-9 0h10m-10 0v16a1 1 0 001 1h8a1 1 0 001-1V4"></path>
                                    </svg>
                                    {{ rand(25, 45) }} sqm
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    {{ rand(1, 4) }} Guests
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    </svg>
                                    {{ rand(1, 2) }} Bedroom{{ rand(1, 2) > 1 ? 's' : '' }}
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-primary-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                    </svg>
                                    {{ rand(1, 3) }} Bathroom{{ rand(1, 3) > 1 ? 's' : '' }}
                                </div>
                            </div>
                        </div>
                        
                        <!-- Book Now Button -->
                        <a href="{{ route('booking.index') }}" class="block w-full bg-primary-600 hover:bg-primary-700 text-white text-center py-3 rounded-lg font-semibold transition-colors">
                            Book This Room
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-20 bg-gradient-to-r from-primary-600 to-primary-700">
        <div class="max-w-4xl mx-auto text-center px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-white mb-6">
                Ready to Experience Luxury?
            </h2>
            <p class="text-xl text-white/90 mb-8 leading-relaxed">
                Book your stay today and discover why we're the preferred choice for discerning travelers worldwide.
            </p>
            <a href="{{ route('booking.index') }}" class="bg-white text-primary-700 hover:bg-gray-100 px-10 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-xl inline-block">
                Book Your Stay Now
            </a>
        </div>
    </section>

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
                        <li><a href="{{ route('rooms') }}" class="text-gray-400 hover:text-white transition-colors">Rooms</a></li>
                        <li><a href="{{ route('booking.index') }}#pricing-info" class="text-gray-400 hover:text-white transition-colors">Amenities</a></li>
                        <li><a href="#footer" class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
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

    <!-- JavaScript for smooth scrolling -->
    <script>
        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add scroll effect to navigation
        window.addEventListener('scroll', function() {
            const nav = document.querySelector('nav');
            if (window.scrollY > 100) {
                nav.classList.add('bg-white/95');
            } else {
                nav.classList.remove('bg-white/95');
            }
        });
    </script>
</body>
</html>
