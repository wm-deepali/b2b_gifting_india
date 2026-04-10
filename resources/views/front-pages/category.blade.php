@extends('layouts.app')

@section('content')


<!-- Categories Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-3">Shop by Category</h2>
            <p class="text-gray-600 text-lg">Premium corporate gifting solutions for every occasion</p>
        </div>

        <!-- Categories Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

            <!-- Category 1 -->
            <a href="#" class="group">
                <div class="relative overflow-hidden rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1586966956234-1c1e4a0f9f9a" 
                         alt="Desktop Gifts" 
                         class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/30 to-transparent"></div>
                    
                    <!-- Product Count Badge -->
                    <div class="absolute top-5 right-5 bg-white text-[#f4a261] text-xs font-bold px-4 py-2 rounded-2xl shadow">
                        48 Products
                    </div>

                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-semibold">Desktop Gifts</h3>
                        <p class="text-sm opacity-90 mt-1">Diaries, Pen Sets, Organizers</p>
                    </div>
                </div>
            </a>

            <!-- Category 2 -->
            <a href="#" class="group">
                <div class="relative overflow-hidden rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a9c" 
                         alt="Drinkware" 
                         class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/30 to-transparent"></div>
                    
                    <div class="absolute top-5 right-5 bg-white text-[#f4a261] text-xs font-bold px-4 py-2 rounded-2xl shadow">
                        62 Products
                    </div>

                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-semibold">Bottles & Drinkware</h3>
                        <p class="text-sm opacity-90 mt-1">Steel, Copper, Tumblers</p>
                    </div>
                </div>
            </a>

            <!-- Category 3 -->
            <a href="#" class="group">
                <div class="relative overflow-hidden rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1542291026-7eec264c27ff" 
                         alt="Bags" 
                         class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/30 to-transparent"></div>
                    
                    <div class="absolute top-5 right-5 bg-white text-[#f4a261] text-xs font-bold px-4 py-2 rounded-2xl shadow">
                        35 Products
                    </div>

                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-semibold">Bags & Trolleys</h3>
                        <p class="text-sm opacity-90 mt-1">Laptop Bags, Travel Trolleys</p>
                    </div>
                </div>
            </a>

            <!-- Category 4 -->
            <a href="#" class="group">
                <div class="relative overflow-hidden rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9" 
                         alt="Tech Gadgets" 
                         class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/30 to-transparent"></div>
                    
                    <div class="absolute top-5 right-5 bg-white text-[#f4a261] text-xs font-bold px-4 py-2 rounded-2xl shadow">
                        41 Products
                    </div>

                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-semibold">Tech Gadgets</h3>
                        <p class="text-sm opacity-90 mt-1">Power Banks, Earbuds, Chargers</p>
                    </div>
                </div>
            </a>

            <!-- Category 5 -->
            <a href="#" class="group">
                <div class="relative overflow-hidden rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1600585154526-990dced4cb0d" 
                         alt="Eco Friendly" 
                         class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/30 to-transparent"></div>
                    
                    <div class="absolute top-5 right-5 bg-white text-[#f4a261] text-xs font-bold px-4 py-2 rounded-2xl shadow">
                        29 Products
                    </div>

                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-semibold">Eco-Friendly Gifts</h3>
                        <p class="text-sm opacity-90 mt-1">Bamboo, Jute & Recycled</p>
                    </div>
                </div>
            </a>

            <!-- Category 6 -->
            <a href="#" class="group">
                <div class="relative overflow-hidden rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d" 
                         alt="Apparel" 
                         class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/30 to-transparent"></div>
                    
                    <div class="absolute top-5 right-5 bg-white text-[#f4a261] text-xs font-bold px-4 py-2 rounded-2xl shadow">
                        33 Products
                    </div>

                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-semibold">Apparel & Merch</h3>
                        <p class="text-sm opacity-90 mt-1">T-Shirts, Hoodies, Caps</p>
                    </div>
                </div>
            </a>

            <!-- Category 7 -->
            <a href="#" class="group">
                <div class="relative overflow-hidden rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7" 
                         alt="Wellness" 
                         class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/30 to-transparent"></div>
                    
                    <div class="absolute top-5 right-5 bg-white text-[#f4a261] text-xs font-bold px-4 py-2 rounded-2xl shadow">
                        18 Products
                    </div>

                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-semibold">Wellness & Lifestyle</h3>
                        <p class="text-sm opacity-90 mt-1">Yoga Mats, Essential Oils</p>
                    </div>
                </div>
            </a>

            <!-- Category 8 -->
            <a href="#" class="group">
                <div class="relative overflow-hidden rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-300">
                    <img src="https://images.unsplash.com/photo-1518709268805-4e9042af2176" 
                         alt="Home Decor" 
                         class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/30 to-transparent"></div>
                    
                    <div class="absolute top-5 right-5 bg-white text-[#f4a261] text-xs font-bold px-4 py-2 rounded-2xl shadow">
                        24 Products
                    </div>

                    <div class="absolute bottom-6 left-6 text-white">
                        <h3 class="text-2xl font-semibold">Home & Decor</h3>
                        <p class="text-sm opacity-90 mt-1">Idols, Luxury Decor Items</p>
                    </div>
                </div>
            </a>

        </div>

    </div>
</section>


@endsection