<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Luxury Hotel - Experience Premium Hospitality</title>

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
        .feature-card {
            transition: all 0.3s ease;
        }
        .feature-card:hover {
            transform: translateY(-8px);
        }
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0px);气候}
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
            @if (Route::has('login'))
                    @auth
                                <a href="{{ url('/home') }}" class="bg-primary-600 text-white hover:bg-primary-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors">Dashboard</a>
                    @else
                                <a href="{{ route('login') }}" class="bg-primary-600 text-white hover:bg-primary-700 px-4 py-2 rounded-lg text-sm font-medium transition-colors">Login</a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80" 
                 alt="Luxury Hotel" 
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
            <div class="mb-8">
                <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 leading-tight">
                    Experience
                    <span class="block bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                        Luxury
                    </span>
                    Like Never Before
                </h1>
                <p class="text-xl md:text-2xl text-white/90 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Indulge in unparalleled comfort and sophistication at our premium hotel. 
                    Book your stay and discover a world of elegance and exceptional service.
                                </p>
                            </div>

            <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                <a href="{{ route('booking.index') }}" class="bg-white text-primary-700 hover:bg-gray-100 px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-xl">
                    Book Your Stay
                </a>
                <a href="#rooms" class="glass-effect text-white hover:bg-white/20 px-8 py-4 rounded-full text-lg font-semibold transition-all duration-300">
                    Explore Rooms
                </a>
                                </div>

            <!-- Scroll Indicator -->
            <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2">
                <div class="w-6 h-10 border-2 border-white/50 rounded-full flex justify-center">
                    <div class="w-1 h-3 bg-white/70 rounded-full mt-2 animate-bounce"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white">
        <div class="mx-auto px-6 sm:px-8 md:px-12 lg:px-16 xl:px-20 2xl:px-24">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-gray-900 mb-4">Why Choose Our Hotel?</h2>
                <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                    Experience world-class amenities and exceptional service that sets us apart from the rest
                                </p>
                            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div class="feature-card bg-white p-8 rounded-2xl shadow-lg relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 opacity-10">
                        <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                             alt="Luxury Room" 
                             class="w-full h-full object-cover rounded-lg">
                    </div>
                    <div class="w-16 h-16 bg-primary-600 rounded-xl flex items-center justify-center mb-6 relative z-10">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4 relative z-10">Luxurious Rooms</h3>
                    <p class="text-gray-600 leading-relaxed relative z-10">
                        Spacious, elegantly designed rooms with premium amenities and breathtaking views for an unforgettable stay.
                    </p>
                </div>
                
                <!-- Feature 2 -->
                <div class="feature-card bg-white p-8 rounded-2xl shadow-lg relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 opacity-10">
                        <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                             alt="Hotel Service" 
                             class="w-full h-full object-cover rounded-lg">
                    </div>
                    <div class="w-16 h-16 bg-green-600 rounded-xl flex items-center justify-center mb-6 relative z-10">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4 relative z-10">24/7 Service</h3>
                    <p class="text-gray-600 leading-relaxed relative z-10">
                        Round-the-clock concierge service and premium amenities to ensure your comfort and satisfaction at all times.
                                </p>
                            </div>

                <!-- Feature 3 -->
                <div class="feature-card bg-white p-8 rounded-2xl shadow-lg relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 opacity-10">
                        <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?ixlib=rb-4.0.3&auto=format&fit=crop&w=500&q=80" 
                             alt="Mountain View" 
                             class="w-full h-full object-cover rounded-lg">
                    </div>
                    <div class="w-16 h-16 bg-purple-600 rounded-xl flex items-center justify-center mb-6 relative z-10">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                    <h3 class="text-2xl font-semibold text-gray-900 mb-4 relative z-10">Prime Location</h3>
                    <p class="text-gray-600 leading-relaxed relative z-10">
                        Strategically located in the heart of the city with easy access to major attractions and business districts.
                                </p>
                            </div>
                        </div>
                    </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-primary-600 to-primary-700">
        <div class="mx-auto text-center px-6 sm:px-8 md:px-12 lg:px-16 xl:px-20 2xl:px-24">
            <h2 class="text-4xl font-bold text-white mb-6">
                Ready for an Unforgettable Experience?
            </h2>
            <p class="text-xl text-white/90 mb-8 leading-relaxed">
                Book your stay today and discover why we're the preferred choice for discerning travelers worldwide.
            </p>
            <a href="{{ route('booking.index') }}" class="bg-white text-primary-700 hover:bg-gray-100 px-10 py-4 rounded-full text-lg font-semibold transition-all duration-300 transform hover:scale-105 shadow-xl inline-block">
                Start Your Journey
            </a>
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