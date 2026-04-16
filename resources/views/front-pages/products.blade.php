@extends('layouts.app')

@section('content')

    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="flex flex-col lg:flex-row gap-10">

            <!-- ==================== LEFT SIDEBAR ==================== -->
            <div class="lg:w-80 flex-shrink-0">
                <div class="sidebar-card">

                    <h2 class="font-bold text-2xl mb-6 text-gray-800">Categories</h2>

                    @foreach($categories as $cat)
                        <button onclick="window.location='{{ route('products', ['subcategory' => $cat->slug]) }}'"
                            class="category-btn flex justify-between items-center mt-6 
                                                                        {{ $parentCategory && $parentCategory->id == $cat->id ? 'active' : '' }}">

                            {{ $cat->name }}
                            <span class="text-xl transition-transform">›</span>
                        </button>

                        <div
                            class="sub-category pl-4 space-y-2 mt-2 
                                                                        {{ $parentCategory && $parentCategory->id == $cat->id ? '' : 'hidden' }}">

                            @foreach($cat->children as $sub)
                                <a href="{{ route('products', ['subcategory' => $sub->slug]) }}"
                                    class="block py-1 hover:text-[#f4a261] 
                                                                                                                       {{ request('subcategory') == $sub->slug ? 'text-[#f4a261] font-semibold' : '' }}">

                                    {{ $sub->name }}
                                </a>
                            @endforeach

                        </div>
                    @endforeach

                    <!-- Filters -->
                    <form method="GET" class="mt-12">

                        <input type="hidden" name="subcategory" value="{{ request('subcategory') }}">

                        <h3 class="font-semibold text-lg mb-5 text-gray-800">Filters</h3>

                        <!-- Price Range -->
                        <div class="mb-8">
                            <h4 class="font-medium mb-3">Price Range</h4>
                            <div class="flex gap-3">
                                <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="Min"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-2xl text-sm">

                                <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="Max"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-2xl text-sm">
                            </div>
                        </div>

                        <!-- Customization -->
                        <div class="mb-8">
                            <h4 class="font-medium mb-3">Customization</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($customizations as $custom)
                                    <label>
                                        <input type="checkbox" name="customization[]" value="{{ $custom->id }}" class="hidden"
                                            {{ in_array($custom->id, request('customization', [])) ? 'checked' : '' }}>

                                        <span onclick="this.classList.toggle('active')"
                                            class="filter-chip 
                                                      {{ in_array($custom->id, request('customization', [])) ? 'active' : '' }}">

                                            {{ $custom->name }}
                                        </span>
                                    </label>
                                @endforeach
                            </div>
                        </div>

                        <!-- Gifting Occasions -->
<div class="mb-8">
    <h4 class="font-medium mb-3">Gifting Occasion</h4>

    <div class="flex flex-wrap gap-2">
        @foreach($occasions as $occ)
            <label>
                <input type="checkbox" name="occasion[]" value="{{ $occ->slug }}" class="hidden"
                    {{ in_array($occ->slug, request('occasion', [])) ? 'checked' : '' }}>

                <span onclick="this.classList.toggle('active')"
                    class="filter-chip 
                    {{ in_array($occ->slug, request('occasion', [])) ? 'active' : '' }}">
                    
                    {{ $occ->title }}
                </span>
            </label>
        @endforeach
    </div>
</div>

                        <!-- Delivery -->
                        <div class="mb-8">
                            <h4 class="font-medium mb-3">Delivery</h4>
                            <label class="flex items-center gap-2 mb-2">
                                <input type="checkbox" class="accent-[#f4a261]" name="pan_india" value="1" {{ request('pan_india') ? 'checked' : '' }}>
                                Pan India Delivery
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" class="accent-[#f4a261]"> Ready to Ship
                            </label>
                        </div>

                        <!-- New & Featured -->
                        <div>
                            <h4 class="font-medium mb-3">Special</h4>
                            <label class="flex items-center gap-2 mb-2">
                                <input type="checkbox" class="accent-[#f4a261]" name="new_arrival" value="1" {{ request('new_arrival') ? 'checked' : '' }}>
                                New Arrivals
                            </label>
                            <label class="flex items-center gap-2">
                                <input type="checkbox" class="accent-[#f4a261]" name="featured" value="1" {{ request('featured') ? 'checked' : '' }}>
                                Featured Products
                            </label>
                        </div>

                        <button type="submit"
                            class="w-full mt-6 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white py-3 rounded-2xl font-medium">
                            Apply Filters
                        </button>
                    </form>

                </div>
            </div>

            <!-- ==================== RIGHT SIDE - PRODUCTS ==================== -->
            <div class="flex-1">

                <!-- Top Bar -->
                <div class="flex flex-col md:flex-row justify-between items-center mb-8 gap-4">
                    <div>
                        <span class="text-gray-600">Showing</span>
                        <span class="font-semibold text-gray-800">{{ $products->total() }} Products</span>
                    </div>

                    <div class="flex items-center gap-4">
                        <span class="text-gray-600 whitespace-nowrap">Sort by:</span>
                        <select id="sortSelect" onchange="applySort(this.value)"
                            class="border border-gray-300 rounded-2xl px-6 py-3 focus:outline-none focus:border-[#f4a261]">
                            <option value="best">Best Match</option>
                            <option value="low">Price: Low to High</option>
                            <option value="high">Price: High to Low</option>
                            <option value="new">Newest First</option>
                            <option value="popular">Most Popular</option>
                        </select>
                    </div>
                </div>
                <!-- Product Grid (3 Columns) -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

                    @foreach($products as $product)
                        <div class="product-card bg-white">
                            <div class="relative">
                                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                    class="product-img w-full">

                                {{-- Badge Logic --}}
                                @if($product->new_arrival)
                                    <span class="absolute top-4 right-4 bg-white text-xs font-bold px-3 py-1 rounded-full shadow">
                                        New
                                    </span>
                                @elseif($product->featured)
                                    <span
                                        class="absolute top-4 right-4 bg-emerald-100 text-emerald-700 text-xs font-bold px-3 py-1 rounded-full shadow">
                                        Featured
                                    </span>
                                @elseif($product->sale)
                                    <span
                                        class="absolute top-4 right-4 bg-red-100 text-red-700 text-xs font-bold px-3 py-1 rounded-full shadow">
                                        Sale
                                    </span>
                                @endif
                            </div>

                            <div class="p-5">
                                <h3 class="font-semibold text-xl">{{ $product->name }}</h3>

                                <p class="text-gray-500 text-sm mt-1">
                                    {{ $product->sub_title }}
                                </p>

                                <div class="mt-4 flex items-baseline justify-between">
                                    <div>
                                        <span class="text-3xl font-bold text-gray-800">
                                            ₹{{ $product->price }}
                                        </span>

                                        @if($product->mrp && $product->mrp > $product->price)
                                            <span class="text-sm text-gray-400 line-through ml-2">
                                                ₹{{ $product->mrp }}
                                            </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="mt-6 flex gap-3">
                                    <a href="{{ route('product.detail', $product->slug) }}"
                                        class="flex-1 text-center py-3 border border-[#f4a261] text-[#f4a261] rounded-2xl font-medium hover:bg-[#f4a261] hover:text-white transition-all">
                                        View Details
                                    </a>

                                    <button data-id="{{ $product->id }}"
                                        class="flex-1 py-3 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white rounded-2xl font-medium add-to-cart">
                                        Add to Cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="mt-10 flex justify-center">
    {{ $products->links() }}
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
        document.getElementById('sortSelect').addEventListener('change', function () {
            const value = this.value;
            alert(`Sorted by: ${this.options[this.selectedIndex].text}`);
            // Here you can add actual sorting logic later
        });

        function applySort(value) {
            const url = new URL(window.location.href);
            url.searchParams.set('sort', value);
            window.location.href = url.toString();
        }

        document.querySelectorAll('.add-to-cart').forEach(btn => {
            btn.addEventListener('click', function () {

                let productId = this.getAttribute('data-id');

                fetch("{{ route('cart.add') }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}"
                    },
                    body: JSON.stringify({
                        product_id: productId
                    })
                })
                    .then(res => res.json())
                    .then(data => {

                        // ✅ Update Cart Count
                        document.getElementById('cart-count').innerText = data.cart_count;

                        // ✅ Swal
                        Swal.fire({
                            icon: 'success',
                            title: 'Added!',
                            text: data.message,
                            showCancelButton: true,
                            confirmButtonText: 'Go to Cart',
                            cancelButtonText: 'Continue Shopping'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = "{{ route('shopping-cart') }}";
                            }
                        });

                    });

            });
        });

    </script>


@endsection