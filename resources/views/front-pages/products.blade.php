@extends('layouts.app')

@section('content')

<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="flex flex-col lg:flex-row gap-10">

        <!-- ==================== LEFT SIDEBAR ==================== -->
        <div class="lg:w-80 flex-shrink-0">
            <div class="sidebar-card">

                <h2 class="font-bold text-2xl mb-6 text-gray-800">Categories</h2>

                <!-- Desktop Gifts -->
                <button onclick="toggleSub(this)" class="category-btn active flex justify-between items-center">
                    Desktop Gifts
                    <span class="text-xl transition-transform">›</span>
                </button>
                <div class="sub-category pl-4 space-y-2 mt-2">
                    <a href="#" class="block py-1 hover:text-[#f4a261]">Diaries & Notebooks</a>
                    <a href="#" class="block py-1 hover:text-[#f4a261]">Pen Sets & Stationery</a>
                    <a href="#" class="block py-1 hover:text-[#f4a261]">Desk Organizers</a>
                    <a href="#" class="block py-1 hover:text-[#f4a261]">Executive Gifts</a>
                </div>

                <!-- Drinkware -->
                <button onclick="toggleSub(this)" class="category-btn flex justify-between items-center mt-6">
                    Drinkware
                    <span class="text-xl transition-transform">›</span>
                </button>
                <div class="sub-category hidden pl-4 space-y-2 mt-2">
                    <a href="#" class="block py-1 hover:text-[#f4a261]">Steel Bottles</a>
                    <a href="#" class="block py-1 hover:text-[#f4a261]">Copper Bottles</a>
                    <a href="#" class="block py-1 hover:text-[#f4a261]">Travel Mugs</a>
                </div>

                <!-- More categories -->
                <button onclick="toggleSub(this)" class="category-btn flex justify-between items-center mt-6">
                    Bags & Trolleys
                    <span class="text-xl transition-transform">›</span>
                </button>

                <button onclick="toggleSub(this)" class="category-btn flex justify-between items-center mt-6">
                    Tech Gadgets
                    <span class="text-xl transition-transform">›</span>
                </button>

                <button onclick="toggleSub(this)" class="category-btn flex justify-between items-center mt-6">
                    Eco-Friendly Gifts
                    <span class="text-xl transition-transform">›</span>
                </button>

                <!-- Filters -->
                <div class="mt-12">
                    <h3 class="font-semibold text-lg mb-5 text-gray-800">Filters</h3>

                    <!-- Price Range -->
                    <div class="mb-8">
                        <h4 class="font-medium mb-3">Price Range</h4>
                        <div class="flex gap-3">
                            <input type="number" placeholder="Min" class="w-full px-4 py-3 border border-gray-300 rounded-2xl text-sm">
                            <input type="number" placeholder="Max" class="w-full px-4 py-3 border border-gray-300 rounded-2xl text-sm">
                        </div>
                    </div>

                    <!-- Customization -->
                    <div class="mb-8">
                        <h4 class="font-medium mb-3">Customization</h4>
                        <div class="flex flex-wrap gap-2">
                            <button onclick="this.classList.toggle('active')" class="filter-chip">Laser Engraving</button>
                            <button onclick="this.classList.toggle('active')" class="filter-chip">Debossing</button>
                            <button onclick="this.classList.toggle('active')" class="filter-chip">Screen Printing</button>
                        </div>
                    </div>

                    <!-- Delivery -->
                    <div class="mb-8">
                        <h4 class="font-medium mb-3">Delivery</h4>
                        <label class="flex items-center gap-2 mb-2">
                            <input type="checkbox" class="accent-[#f4a261]"> Pan India Delivery
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="accent-[#f4a261]"> Ready to Ship
                        </label>
                    </div>

                    <!-- New & Featured -->
                    <div>
                        <h4 class="font-medium mb-3">Special</h4>
                        <label class="flex items-center gap-2 mb-2">
                            <input type="checkbox" class="accent-[#f4a261]"> New Arrivals
                        </label>
                        <label class="flex items-center gap-2">
                            <input type="checkbox" class="accent-[#f4a261]"> Featured Products
                        </label>
                    </div>
                </div>

            </div>
        </div>

        <!-- ==================== RIGHT SIDE - PRODUCTS ==================== -->
        <div class="flex-1">

            <!-- Top Bar -->
            <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                <div>
                    <span class="text-gray-600">Showing</span>
                    <span class="font-semibold text-gray-800">248 Products</span>
                </div>

                <div class="flex items-center gap-4">
                    <span class="text-gray-600 whitespace-nowrap">Sort by:</span>
                    <select id="sortSelect" class="border border-gray-300 rounded-2xl px-6 py-3 focus:outline-none focus:border-[#f4a261]">
                        <option value="best">Best Match</option>
                        <option value="low">Price: Low to High</option>
                        <option value="high">Price: High to Low</option>
                        <option value="new">Newest First</option>
                        <option value="popular">Most Popular</option>
                    </select>
                </div>
            </div>

            <!-- Product Grid (3 Columns) -->
           <!-- Product Grid (3 Columns) -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

    <!-- Product 1 -->
    <div class="product-card bg-white">
        <div class="relative">
            <img src="https://images.unsplash.com/photo-1586966956234-1c1e4a0f9f9a" 
                 alt="Leather Diary" class="product-img w-full">
            <span class="absolute top-4 right-4 bg-white text-xs font-bold px-3 py-1 rounded-full shadow">New</span>
        </div>
        <div class="p-5">
            <h3 class="font-semibold text-xl">Premium Leather Diary</h3>
            <p class="text-gray-500 text-sm mt-1">With Logo Engraving</p>
            <div class="mt-4 flex items-baseline justify-between">
                <div>
                    <span class="text-3xl font-bold text-gray-800">₹899</span>
                    <span class="text-sm text-gray-400 line-through ml-2">₹1,299</span>
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <a href="#" class="flex-1 text-center py-3 border border-[#f4a261] text-[#f4a261] rounded-2xl font-medium hover:bg-[#f4a261] hover:text-white transition-all">
                    View Details
                </a>
                <button class="flex-1 py-3 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white rounded-2xl font-medium">
                    Add to Quote
                </button>
            </div>
        </div>
    </div>

    <!-- Product 2 -->
    <div class="product-card bg-white">
        <div class="relative">
            <img src="https://images.unsplash.com/photo-1602143407151-7111542de6e8" 
                 alt="Steel Bottle" class="product-img w-full">
        </div>
        <div class="p-5">
            <h3 class="font-semibold text-xl">Vacuum Stainless Steel Bottle</h3>
            <p class="text-gray-500 text-sm mt-1">500ml | Laser Engraved</p>
            <div class="mt-4 flex items-baseline justify-between">
                <div>
                    <span class="text-3xl font-bold text-gray-800">₹449</span>
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <a href="#" class="flex-1 text-center py-3 border border-[#f4a261] text-[#f4a261] rounded-2xl font-medium hover:bg-[#f4a261] hover:text-white transition-all">
                    View Details
                </a>
                <button class="flex-1 py-3 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white rounded-2xl font-medium">
                    Add to Quote
                </button>
            </div>
        </div>
    </div>

    <!-- Product 3 -->
    <div class="product-card bg-white">
        <div class="relative">
            <img src="https://images.unsplash.com/photo-1586953208448-b95a79798f07" 
                 alt="Power Bank" class="product-img w-full">
        </div>
        <div class="p-5">
            <h3 class="font-semibold text-xl">Wireless Power Bank 10000mAh</h3>
            <p class="text-gray-500 text-sm mt-1">Custom Printed & Engraved</p>
            <div class="mt-4 flex items-baseline justify-between">
                <div>
                    <span class="text-3xl font-bold text-gray-800">₹1,299</span>
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <a href="#" class="flex-1 text-center py-3 border border-[#f4a261] text-[#f4a261] rounded-2xl font-medium hover:bg-[#f4a261] hover:text-white transition-all">
                    View Details
                </a>
                <button class="flex-1 py-3 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white rounded-2xl font-medium">
                    Add to Quote
                </button>
            </div>
        </div>
    </div>

    <!-- Product 4 -->
    <div class="product-card bg-white">
        <div class="relative">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a9c" 
                 alt="Wooden Gift Box" class="product-img w-full">
            <span class="absolute top-4 right-4 bg-emerald-100 text-emerald-700 text-xs font-bold px-3 py-1 rounded-full shadow">Best Seller</span>
        </div>
        <div class="p-5">
            <h3 class="font-semibold text-xl">Custom Wooden Gift Box</h3>
            <p class="text-gray-500 text-sm mt-1">With Engraving</p>
            <div class="mt-4 flex items-baseline justify-between">
                <div>
                    <span class="text-3xl font-bold text-gray-800">₹2,499</span>
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <a href="#" class="flex-1 text-center py-3 border border-[#f4a261] text-[#f4a261] rounded-2xl font-medium hover:bg-[#f4a261] hover:text-white transition-all">
                    View Details
                </a>
                <button class="flex-1 py-3 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white rounded-2xl font-medium">
                    Add to Quote
                </button>
            </div>
        </div>
    </div>

    <!-- Product 5 -->
    <div class="product-card bg-white">
        <div class="relative">
            <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9" 
                 alt="Tech Gadget Set" class="product-img w-full">
        </div>
        <div class="p-5">
            <h3 class="font-semibold text-xl">Executive Tech Gift Set</h3>
            <p class="text-gray-500 text-sm mt-1">Power Bank + Earbuds</p>
            <div class="mt-4 flex items-baseline justify-between">
                <div>
                    <span class="text-3xl font-bold text-gray-800">₹2,899</span>
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <a href="#" class="flex-1 text-center py-3 border border-[#f4a261] text-[#f4a261] rounded-2xl font-medium hover:bg-[#f4a261] hover:text-white transition-all">
                    View Details
                </a>
                <button class="flex-1 py-3 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white rounded-2xl font-medium">
                    Add to Quote
                </button>
            </div>
        </div>
    </div>

    <!-- Product 6 -->
    <div class="product-card bg-white">
        <div class="relative">
            <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7" 
                 alt="Wellness Kit" class="product-img w-full">
            <span class="absolute top-4 right-4 bg-amber-100 text-amber-700 text-xs font-bold px-3 py-1 rounded-full shadow">Eco</span>
        </div>
        <div class="p-5">
            <h3 class="font-semibold text-xl">Wellness Gift Kit</h3>
            <p class="text-gray-500 text-sm mt-1">Yoga Mat + Essential Oil</p>
            <div class="mt-4 flex items-baseline justify-between">
                <div>
                    <span class="text-3xl font-bold text-gray-800">₹1,799</span>
                </div>
            </div>
            <div class="mt-6 flex gap-3">
                <a href="#" class="flex-1 text-center py-3 border border-[#f4a261] text-[#f4a261] rounded-2xl font-medium hover:bg-[#f4a261] hover:text-white transition-all">
                    View Details
                </a>
                <button class="flex-1 py-3 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white rounded-2xl font-medium">
                    Add to Quote
                </button>
            </div>
        </div>
    </div>

</div>
        </div>
    </div>
</div>

<script>
    function toggleSub(btn) {
        const sub = btn.nextElementSibling;
        const isHidden = sub.classList.contains('hidden');

        document.querySelectorAll('.sub-category').forEach(el => {
            if (el !== sub) el.classList.add('hidden');
        });

        if (isHidden) {
            sub.classList.remove('hidden');
            document.querySelectorAll('.category-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
        } else {
            sub.classList.add('hidden');
            btn.classList.remove('active');
        }
    }

    // Sort functionality (demo alert)
    document.getElementById('sortSelect').addEventListener('change', function() {
        const value = this.value;
        alert(`Sorted by: ${this.options[this.selectedIndex].text}`);
        // Here you can add actual sorting logic later
    });
</script>

<!-- <div class="max-w-7xl mx-auto px-6 py-10">

    <div class="flex flex-col lg:flex-row gap-10">

      
        <div class="lg:w-80 flex-shrink-0">
            <div class="sidebar-card">

                <h2 class="font-bold text-2xl mb-6 text-gray-800">Categories</h2>

                
                <button onclick="toggleSub(this)" class="category-btn active flex justify-between items-center">
                    Desktop Gifts
                    <span class="text-xl transition-transform">›</span>
                </button>
                <div class="sub-category hidden pl-4 space-y-2 mt-2">
                    <a href="#" class="block py-1 hover:text-[#f4a261]">Diaries & Notebooks</a>
                    <a href="#" class="block py-1 hover:text-[#f4a261]">Pen Sets & Stationery</a>
                    <a href="#" class="block py-1 hover:text-[#f4a261]">Desk Organizers</a>
                    <a href="#" class="block py-1 hover:text-[#f4a261]">Executive Gifts</a>
                </div>

              
                <button onclick="toggleSub(this)" class="category-btn flex justify-between items-center">
                    Drinkware
                    <span class="text-xl transition-transform">›</span>
                </button>
                <div class="sub-category hidden pl-4 space-y-2 mt-2">
                    <a href="#" class="block py-1 hover:text-[#f4a261]">Steel Bottles</a>
                    <a href="#" class="block py-1 hover:text-[#f4a261]">Copper Bottles</a>
                    <a href="#" class="block py-1 hover:text-[#f4a261]">Travel Mugs & Tumblers</a>
                </div>

                
                <button onclick="toggleSub(this)" class="category-btn flex justify-between items-center">
                    Bags & Trolleys
                    <span class="text-xl transition-transform">›</span>
                </button>

               
                <button onclick="toggleSub(this)" class="category-btn flex justify-between items-center">
                    Tech Gadgets
                    <span class="text-xl transition-transform">›</span>
                </button>

              
                <button onclick="toggleSub(this)" class="category-btn flex justify-between items-center">
                    Eco-Friendly Gifts
                    <span class="text-xl transition-transform">›</span>
                </button>

             
                <button onclick="toggleSub(this)" class="category-btn flex justify-between items-center">
                    Apparel & Merch
                    <span class="text-xl transition-transform">›</span>
                </button>

            </div>
        </div>

       
        <div class="flex-1">

            
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
                <div>
                    <span class="text-gray-600">Showing</span>
                    <span class="font-semibold text-gray-800">248 Products</span>
                </div>

                <div class="flex items-center gap-4">
                    <span class="text-gray-600">Sort by</span>
                    <div class="sort-btn flex items-center gap-2 cursor-pointer">
                        Best Match 
                        <i class="fa-solid fa-chevron-down text-sm"></i>
                    </div>
                </div>
            </div>

            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                <div class="product-card bg-white">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1586966956234-1c1e4a0f9f9a" 
                             alt="Leather Diary" class="product-img w-full">
                        <span class="absolute top-4 right-4 bg-white text-xs font-bold px-3 py-1 rounded-full shadow">New</span>
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-xl">Premium Leather Diary</h3>
                        <p class="text-gray-500 text-sm mt-1">With Logo Engraving</p>
                        <div class="mt-4 flex items-baseline justify-between">
                            <div>
                                <span class="text-3xl font-bold text-gray-800">₹899</span>
                                <span class="text-sm text-gray-400 line-through ml-2">₹1,299</span>
                            </div>
                        </div>

                        <div class="mt-6 flex gap-3">
                            <a href="#" class="flex-1 text-center py-3 border border-[#f4a261] text-[#f4a261] rounded-2xl font-medium hover:bg-[#f4a261] hover:text-white transition-all">
                                View Details
                            </a>
                            <button class="flex-1 py-3 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white rounded-2xl font-medium">
                                Add to Quote
                            </button>
                        </div>
                    </div>
                </div>

                
                <div class="product-card bg-white">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1602143407151-7111542de6e8" 
                             alt="Steel Bottle" class="product-img w-full">
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-xl">Vacuum Stainless Steel Bottle</h3>
                        <p class="text-gray-500 text-sm mt-1">500ml | Laser Engraved</p>
                        <div class="mt-4 flex items-baseline justify-between">
                            <div>
                                <span class="text-3xl font-bold text-gray-800">₹449</span>
                            </div>
                        </div>

                        <div class="mt-6 flex gap-3">
                            <a href="#" class="flex-1 text-center py-3 border border-[#f4a261] text-[#f4a261] rounded-2xl font-medium hover:bg-[#f4a261] hover:text-white transition-all">
                                View Details
                            </a>
                            <button class="flex-1 py-3 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white rounded-2xl font-medium">
                                Add to Quote
                            </button>
                        </div>
                    </div>
                </div>

               
                <div class="product-card bg-white">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1586953208448-b95a79798f07" 
                             alt="Power Bank" class="product-img w-full">
                    </div>
                    <div class="p-5">
                        <h3 class="font-semibold text-xl">Wireless Power Bank 10000mAh</h3>
                        <p class="text-gray-500 text-sm mt-1">Custom Printed & Engraved</p>
                        <div class="mt-4 flex items-baseline justify-between">
                            <div>
                                <span class="text-3xl font-bold text-gray-800">₹1,299</span>
                            </div>
                        </div>

                        <div class="mt-6 flex gap-3">
                            <a href="#" class="flex-1 text-center py-3 border border-[#f4a261] text-[#f4a261] rounded-2xl font-medium hover:bg-[#f4a261] hover:text-white transition-all">
                                View Details
                            </a>
                            <button class="flex-1 py-3 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white rounded-2xl font-medium">
                                Add to Quote
                            </button>
                        </div>
                    </div>
                </div>

              

            </div>
        </div>
    </div>
</div>

<script>
    function toggleSub(btn) {
        const sub = btn.nextElementSibling;
        const isHidden = sub.classList.contains('hidden');

        // Close all others
        document.querySelectorAll('.sub-category').forEach(el => {
            if (el !== sub) el.classList.add('hidden');
        });

        // Toggle current
        if (isHidden) {
            sub.classList.remove('hidden');
            btn.classList.add('active');
        } else {
            sub.classList.add('hidden');
            btn.classList.remove('active');
        }
    }
</script> -->



@endsection