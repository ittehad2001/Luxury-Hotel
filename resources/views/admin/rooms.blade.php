<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Room Categories - Hotel Management</title>
    
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
                    <a href="{{ route('admin.rooms') }}" class="flex items-center px-4 py-3 rounded-lg bg-blue-600 text-white">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Room Categories
                    </a>
                    <a href="{{ route('admin.availability') }}" class="flex items-center px-4 py-3 rounded-lg text-gray-300 hover:bg-gray-700 hover:text-white">
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
                        <h1 class="text-2xl font-bold text-gray-900">Room Categories</h1>
                        <div class="flex items-center space-x-4">
                            <button onclick="openAddModal()" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium">Add Room Category</button>
                            <span class="text-sm text-gray-600">{{ now()->format('M d, Y') }}</span>
                            <span class="text-sm font-medium text-gray-900">Hotel Admin</span>
                            <form method="POST" action="{{ route('admin.logout') }}" class="inline">
                                @csrf
                                <button type="submit" class="text-red-600 hover:text-red-700 text-sm font-medium">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($roomCategories as $category)
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <!-- Room Image -->
                        <div class="relative h-64 overflow-hidden">
                            @if(str_contains(strtolower($category->name), 'premium'))
                                <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                                     alt="Premium Deluxe Room" 
                                     class="w-full h-full object-cover">
                            @elseif(str_contains(strtolower($category->name), 'super'))
                                <img src="https://images.unsplash.com/photo-1618773928121-c32242e63f39?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                                     alt="Super Deluxe Room" 
                                     class="w-full h-full object-cover">
                            @elseif(str_contains(strtolower($category->name), 'presidential'))
                                <img src="https://images.unsplash.com/photo-1564501049412-61c2a3083791?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                                     alt="Presidential Suite" 
                                     class="w-full h-full object-cover">
                            @elseif(str_contains(strtolower($category->name), 'executive'))
                                <img src="https://images.unsplash.com/photo-1595576508898-0ad5c879a061?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                                     alt="Executive Room" 
                                     class="w-full h-full object-cover">
                            @else
                                <img src="https://images.unsplash.com/photo-1595576508898-0ad5c879a061?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80" 
                                     alt="Standard Deluxe Room" 
                                     class="w-full h-full object-cover">
                            @endif
                            
                            <!-- Price Badge -->
                            <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-xl px-4 py-2 shadow-lg">
                                <div class="text-2xl font-bold text-green-600">৳{{ number_format($category->base_price) }}</div>
                                <div class="text-xs text-gray-600">per night</div>
                            </div>
                            
                            <!-- Category Badge -->
                            <div class="absolute top-4 left-4 bg-blue-600/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-sm font-medium">
                                {{ $category->name }}
                            </div>
                        </div>
                        
                        <!-- Room Details -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3">{{ $category->name }}</h3>
                            <p class="text-gray-600 mb-4 leading-relaxed">{{ $category->description }}</p>
                            
                            <!-- Room Specifications -->
                            <div class="grid grid-cols-2 gap-3 text-sm text-gray-600 mb-4">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    {{ $category->max_guests ?? 2 }} Guests
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                                    </svg>
                                    {{ $category->bedrooms ?? 1 }} Bedroom{{ ($category->bedrooms ?? 1) > 1 ? 's' : '' }}
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"></path>
                                    </svg>
                                    {{ $category->bathrooms ?? 1 }} Bathroom{{ ($category->bathrooms ?? 1) > 1 ? 's' : '' }}
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                                    </svg>
                                    {{ $category->size ?? 400 }} sq ft
                                </div>
                            </div>
                            
                            <!-- Actions -->
                            <div class="flex justify-between items-center">
                                <div class="flex space-x-2">
                                    <button onclick="editRoom({{ $category->id }})" class="text-blue-600 hover:text-blue-900 text-sm font-medium">Edit</button>
                                    <button onclick="deleteRoom({{ $category->id }})" class="text-red-600 hover:text-red-900 text-sm font-medium">Delete</button>
                                </div>
                                <div class="text-xs text-gray-500">ID: {{ $category->id }}</div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </main>
        </div>
    </div>

    <!-- Add/Edit Room Modal -->
    <div id="roomModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-semibold text-gray-900" id="modalTitle">Add Room Category</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-gray-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
                
                <form id="roomForm" class="space-y-4">
                    @csrf
                    <input type="hidden" id="roomId" name="id">
                    
                    <!-- Room Type Selection -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Room Type</label>
                        <select id="roomType" name="room_type" onchange="autoFillRoomDetails()" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Select Room Type</option>
                            <option value="premium_deluxe">Premium Deluxe</option>
                            <option value="super_deluxe">Super Deluxe</option>
                            <option value="standard_deluxe">Standard Deluxe</option>
                        </select>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Room Name</label>
                            <input type="text" id="roomName" name="name" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Base Price (৳)</label>
                            <input type="number" id="roomPrice" name="base_price" step="0.01" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <textarea id="roomDescription" name="description" rows="3"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"></textarea>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Max Guests</label>
                            <input type="number" id="roomGuests" name="max_guests" min="1" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bedrooms</label>
                            <input type="number" id="roomBedrooms" name="bedrooms" min="1" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bathrooms</label>
                            <input type="number" id="roomBathrooms" name="bathrooms" min="1" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Size (sq ft)</label>
                            <input type="number" id="roomSize" name="size" min="1" required
                                   class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        </div>
                    </div>
                    
                    <!-- Room Image Preview -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Room Image</label>
                        <div id="roomImagePreview" class="w-full h-48 bg-gray-100 rounded-lg border-2 border-dashed border-gray-300 flex items-center justify-center">
                            <div class="text-center text-gray-500">
                                <svg class="w-12 h-12 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <p>Image will be auto-selected based on room type</p>
                            </div>
                        </div>
                        <input type="hidden" id="roomImage" name="image_url">
                    </div>
                    
                    <div class="flex justify-end space-x-3 pt-4">
                        <button type="button" onclick="closeModal()" 
                                class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50">
                            Cancel
                        </button>
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">
                            Save Room Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function openAddModal() {
            document.getElementById('modalTitle').textContent = 'Add Room Category';
            document.getElementById('roomForm').reset();
            document.getElementById('roomId').value = '';
            document.getElementById('roomForm').action = '{{ route("admin.rooms.store") }}';
            document.getElementById('roomForm').method = 'POST';
            document.getElementById('roomModal').classList.remove('hidden');
            document.getElementById('roomModal').classList.add('flex');
        }

        function autoFillRoomDetails() {
            const roomType = document.getElementById('roomType').value;
            const roomDetails = {
                'premium_deluxe': {
                    name: 'Premium Deluxe',
                    base_price: 12000,
                    description: 'Luxurious room with premium amenities and stunning city views',
                    max_guests: 4,
                    bedrooms: 2,
                    bathrooms: 2,
                    size: 800,
                    image: 'https://images.unsplash.com/photo-1631049307264-da0ec9d70304?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'
                },
                'super_deluxe': {
                    name: 'Super Deluxe',
                    base_price: 10000,
                    description: 'Comfortable room with modern amenities and elegant decor',
                    max_guests: 3,
                    bedrooms: 1,
                    bathrooms: 1,
                    size: 600,
                    image: 'https://images.unsplash.com/photo-1618773928121-c32242e63f39?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'
                },
                'standard_deluxe': {
                    name: 'Standard Deluxe',
                    base_price: 8000,
                    description: 'Standard room with essential amenities and cozy atmosphere',
                    max_guests: 2,
                    bedrooms: 1,
                    bathrooms: 1,
                    size: 400,
                    image: 'https://images.unsplash.com/photo-1595576508898-0ad5c879a061?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'
                }
            };

            if (roomType && roomDetails[roomType]) {
                const details = roomDetails[roomType];
                document.getElementById('roomName').value = details.name;
                document.getElementById('roomPrice').value = details.base_price;
                document.getElementById('roomDescription').value = details.description;
                document.getElementById('roomGuests').value = details.max_guests;
                document.getElementById('roomBedrooms').value = details.bedrooms;
                document.getElementById('roomBathrooms').value = details.bathrooms;
                document.getElementById('roomSize').value = details.size;
                document.getElementById('roomImage').value = details.image;
                
                // Update image preview
                const preview = document.getElementById('roomImagePreview');
                preview.innerHTML = `
                    <img src="${details.image}" alt="${details.name}" class="w-full h-full object-cover rounded-lg">
                `;
            }
        }

        function editRoom(id) {
            fetch(`/admin/rooms/${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById('modalTitle').textContent = 'Edit Room Category';
                    document.getElementById('roomId').value = data.id;
                    document.getElementById('roomName').value = data.name;
                    document.getElementById('roomPrice').value = data.base_price;
                    document.getElementById('roomDescription').value = data.description || '';
                    document.getElementById('roomGuests').value = data.max_guests || 2;
                    document.getElementById('roomBedrooms').value = data.bedrooms || 1;
                    document.getElementById('roomBathrooms').value = data.bathrooms || 1;
                    document.getElementById('roomSize').value = data.size || 400;
                    
                    document.getElementById('roomForm').action = `/admin/rooms/${id}`;
                    document.getElementById('roomForm').method = 'PUT';
                    
                    document.getElementById('roomModal').classList.remove('hidden');
                    document.getElementById('roomModal').classList.add('flex');
                });
        }

        function deleteRoom(id) {
            if (confirm('Are you sure you want to delete this room category?')) {
                fetch(`/admin/rooms/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        location.reload();
                    } else {
                        alert('Error: ' + data.message);
                    }
                });
            }
        }

        function closeModal() {
            document.getElementById('roomModal').classList.add('hidden');
            document.getElementById('roomModal').classList.remove('flex');
        }

        // Handle form submission
        document.getElementById('roomForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const method = this.method;
            const action = this.action;
            
            fetch(action, {
                method: method,
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error: ' + data.message);
                }
            });
        });

        // Close modal when clicking outside
        document.getElementById('roomModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>
</body>
</html>
</body>
</html>