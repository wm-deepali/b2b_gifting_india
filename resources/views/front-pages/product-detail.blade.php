@extends('layouts.app')

@section('content')


    <div class="max-w-7xl mx-auto px-6 py-12">

        <div class="text-sm text-gray-500 mb-6 flex flex-wrap gap-1 items-center">

            <a href="/" class="hover:text-black">Home</a>

            @if($product->categories && $product->categories->count())
                @php $cat = $product->categories->first(); @endphp
                <span>/</span>
                <a href="#" class="hover:text-black">{{ $cat->name }}</a>
            @endif

            @if($product->subcategories && $product->subcategories->count())
                @php $sub = $product->subcategories->first(); @endphp
                <span>/</span>
                <a href="#" class="hover:text-black">{{ $sub->name }}</a>
            @endif

            <span>/</span>
            <span class="text-gray-800 font-medium">{{ $product->name }}</span>

        </div>

        <div class="grid lg:grid-cols-2 gap-12">

            <!-- ==================== LEFT: IMAGE SLIDER ==================== -->
            <div>
                <div>
                    <!-- Main Slider -->
                    <div class="product-slider h-[520px] bg-gray-100 relative" id="mainSlider">

                        @php
                            $images = [];

                            // main image
                            if ($product->image) {
                                $images[] = $product->image;
                            }

                            // future support (if you add multiple images)
                            if (isset($product->images)) {
                                foreach ($product->images as $img) {
                                    $images[] = $img->image;
                                }
                            }
                        @endphp

                        @if(count($images))
                            @foreach($images as $key => $img)
                                <img src="{{ asset('storage/' . $img) }}"
                                    class="slide {{ $key == 0 ? 'active' : '' }} w-full h-full object-cover"
                                    alt="{{ $product->name }}">
                            @endforeach
                        @else
                            <img src="/default-product.png" class="w-full h-full object-cover">
                        @endif

                    </div>

                    <!-- Thumbnail Strip -->
                    <div class="flex gap-4 mt-6">
                        @foreach($images as $key => $img)
                            <img onclick="changeSlide({{ $key }})" src="{{ asset('storage/' . $img) }}"
                                class="thumb w-20 h-20 object-cover rounded-2xl cursor-pointer {{ $key == 0 ? 'active' : '' }}">
                        @endforeach
                    </div>

                </div>

            </div>

            <!-- ==================== RIGHT: PRODUCT INFO ==================== -->
            <div>

                <h1 class="text-4xl font-bold leading-tight text-gray-900 mb-2">
                    {{ $product->name }}
                </h1>
                <div class="flex gap-2 flex-wrap mt-2">

                    @if($product->featured)
                        <span class="bg-blue-100 text-blue-700 text-xs px-2 py-1 rounded">Featured</span>
                    @endif

                    @if($product->new_arrival)
                        <span class="bg-green-100 text-green-700 text-xs px-2 py-1 rounded">New</span>
                    @endif

                    @if($product->best_seller)
                        <span class="bg-yellow-100 text-yellow-700 text-xs px-2 py-1 rounded">Best Seller</span>
                    @endif

                    @if($product->sale)
                        <span class="bg-red-100 text-red-700 text-xs px-2 py-1 rounded">Sale</span>
                    @endif

                    @if($product->is_premium)
                        <span class="bg-purple-100 text-purple-700 text-xs px-2 py-1 rounded">Premium</span>
                    @endif

                    @if($product->bulk_available)
                        <span class="bg-gray-200 text-gray-800 text-xs px-2 py-1 rounded">Bulk</span>
                    @endif

                    @if($product->gift_hamper)
                        <span class="bg-pink-100 text-pink-700 text-xs px-2 py-1 rounded">Gift</span>
                    @endif

                    @if($product->is_engraving)
                        <span class="bg-indigo-100 text-indigo-700 text-xs px-2 py-1 rounded">Engraving</span>
                    @endif

                    @if($product->ready_to_ship)
                        <span class="bg-green-200 text-green-800 text-xs px-2 py-1 rounded">Ready</span>
                    @endif

                </div>
                <p class="text-gray-500 text-lg">{{ $product->sub_title }}</p>
                <div class="text-sm text-gray-600 mt-3 space-y-2">

                    @if($product->brand)
                        <p><span class="font-medium text-gray-800">Brand:</span> {{ $product->brand->name }}</p>
                    @endif

                    @if($product->sku)
                        <p><span class="font-medium text-gray-800">SKU:</span> {{ $product->sku }}</p>
                    @endif

                    @if($product->product_code)
                        <p><span class="font-medium text-gray-800">Product Code:</span> {{ $product->product_code }}</p>
                    @endif

                </div>

               @php
    $price = (float) $product->price;
    $mrp = (float) $product->mrp;

    $hasDiscount = $mrp > $price && $price > 0;

    $discountAmount = $mrp - $price;
    $discountPercent = $mrp > 0 ? round(($discountAmount / $mrp) * 100) : 0;
@endphp

@if($price > 0)
    <div class="mt-6">

        <!-- PRICE ROW -->
        <div class="flex items-center gap-3">
            <span class="text-4xl font-bold text-gray-800">₹{{ $price }}</span>

            @if($hasDiscount)
                <span class="text-gray-400 line-through text-lg">₹{{ $mrp }}</span>
            @endif
        </div>

        <!-- SAVE TEXT -->
        @if($hasDiscount)
            <div class="mt-2 text-green-600 font-medium text-sm">

                @if($product->discount_type == 'percentage')
                    You Save {{ $discountPercent }}%
                @else
                    You Save ₹{{ $discountAmount }}
                @endif

            </div>
        @endif

    </div>
@endif
                @if($product->customizations && $product->customizations->count())
                    <div class="mt-8">
                        <h3 class="font-semibold mb-3">Customization Options</h3>
                        <div class="flex gap-3">
                            @foreach($product->customizations as $custom)
                                <button class="px-6 py-3 border-2 border-[#f4a261] text-[#f4a261] rounded-2xl font-medium">
                                    {{ $custom->name }}
                                </button>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($product->summary)
                    <div class="mt-10">
                        <h3 class="font-semibold mb-4">Product Summary</h3>
                        <p class="text-gray-600 leading-relaxed">
                            {{ $product->summary }}
                        </p>
                    </div>
                @endif

                <div class="mt-10 grid grid-cols-2 gap-4">
                    @if($product->min_qty)
                        <div>
                            <p class="text-sm text-gray-500">Minimum Order Quantity</p>
                            <p class="font-semibold text-xl">{{ $product->min_qty }} Pieces</p>
                        </div>
                    @endif
                    @if($product->delivery_time)
                        <div>
                            <p class="text-sm text-gray-500">Delivery Time</p>
                            <p class="font-semibold text-xl">{{ $product->delivery_time }}</p>
                        </div>
                    @endif
                </div>

                <!-- Action Buttons -->
                <div class="mt-12 flex flex-col sm:flex-row gap-4">

                    @if($product->cart)
                        <button data-id="{{ $product->id }}"
                            class="quote-btn flex-1 py-5 rounded-3xl text-lg font-semibold add-to-cart">
                            Add to Cart
                        </button>
                    @endif

                    @if($product->whatsapp)
                        <a href="https://wa.me/919876543210" target="_blank"
                            class="whatsapp-btn flex-1 py-5 rounded-3xl text-lg font-semibold text-white flex items-center justify-center gap-3">
                            <i class="fa-brands fa-whatsapp text-2xl"></i>
                            Chat on WhatsApp
                        </a>
                    @endif

                    @if($product->call)
                        <a href="tel:919876543210"
                            class="flex-1 py-5 rounded-3xl text-lg font-semibold flex items-center justify-center gap-3 border border-blue-500 text-blue-600 hover:bg-blue-500 hover:text-white transition">
                            <i class="fa-solid fa-phone text-xl"></i>
                            Call Now
                        </a>
                    @endif

                </div>
                <div class="flex gap-6 mt-8 text-sm">
                    <div class="flex items-center gap-2 text-gray-600">
                        @if($product->pan_india)
                            <i class="fa-solid fa-truck"></i>
                            <span>Pan India Delivery</span>
                        @endif
                    </div>
                    <div class="flex items-center gap-2 text-gray-600">
                        @if($product->quality)
                            <i class="fa-solid fa-shield-halved"></i>
                            <span>Quality Guaranteed</span>
                        @endif
                    </div>
                </div>

                <div class="mt-10 border-t pt-6">

                    <!-- ITEM 2 -->
                    @if($product->details)
                        <div class="border-b py-4">
                            <button onclick="toggleAccordion(this)"
                                class="w-full flex justify-between items-center font-semibold text-lg">
                                Product Details
                                <span class="text-xl">+</span>
                            </button>

                            <div class="hidden mt-3 text-gray-600 leading-relaxed">
                                {!! $product->details !!}
                            </div>
                        </div>
                    @endif

                    <!-- ITEM 3 -->
                    @if($product->delivery_returns)
                        <div class="border-b py-4">
                            <button onclick="toggleAccordion(this)"
                                class="w-full flex justify-between items-center font-semibold text-lg">
                                Delivery & Returns
                                <span class="text-xl">+</span>
                            </button>

                            <div class="hidden mt-3 text-gray-600 leading-relaxed">
                                {!! $product->delivery_returns !!}
                            </div>
                        </div>
                    @endif

                    @if($product->inclusions && $product->inclusions->count())
                        <div class="border-b py-4">
                            <button onclick="toggleAccordion(this)"
                                class="w-full flex justify-between items-center font-semibold text-lg">
                                What's Included
                                <span class="text-xl">+</span>
                            </button>

                            <div class="hidden mt-3 text-gray-600">
                                <ul class="list-disc pl-5 space-y-1">
                                    @foreach($product->inclusions as $inc)
                                        <li>{{ $inc->title ?? $inc->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                    @if($product->occasions && $product->occasions->count())
                        <div class="border-b py-4">
                            <button onclick="toggleAccordion(this)"
                                class="w-full flex justify-between items-center font-semibold text-lg">
                                Suitable For
                                <span class="text-xl">+</span>
                            </button>

                            <div class="hidden mt-3 text-gray-600">
                                <div class="flex flex-wrap gap-2">
                                    @foreach($product->occasions as $o)
                                        <span class="px-3 py-1 bg-gray-100 rounded-full text-sm">
                                            {{ $o->title }}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif

                </div>

            </div>

        </div>

    </div>

    @if($newArrivals->count())
        <section class="py-16 bg-gray-50">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-10">New Arrivals</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($newArrivals as $item)
                        @php $price = (float) $item->price; @endphp

                        <a href="{{ route('product.detail', $item->slug) }}" class="block">

                            <div class="product-card bg-white rounded-3xl overflow-hidden">
                                <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-56 object-cover">

                                <div class="p-5">
                                    <h3 class="font-semibold">{{ $item->name }}</h3>
                                    <p class="text-gray-500 text-sm">{{ $item->sub_title }}</p>

                                    @if($price > 0)
                                        <p class="font-bold mt-2">₹{{ $price }}</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- ==================== RELATED PRODUCTS SECTION ==================== -->
    @if($relatedProducts->count())
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-10">Related Products</h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($relatedProducts as $item)
                        @php $price = (float) $item->price; @endphp
                        <a href="{{ route('product.detail', $item->slug) }}" class="block">
                            <div class="product-card bg-white rounded-3xl overflow-hidden">
                                <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-56 object-cover">

                                <div class="p-5">
                                    <h3 class="font-semibold">{{ $item->name }}</h3>
                                    <p class="text-gray-500 text-sm">{{ $item->sub_title }}</p>
                                    @if($price > 0)
                                        <p class="font-bold mt-2">₹{{ $price }}</p>
                                    @endif
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <script>
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');

        function changeSlide(n) {
            slides.forEach(slide => slide.classList.remove('active'));
            slides[n].classList.add('active');

            // Update active thumbnail
            document.querySelectorAll('.thumb').forEach((thumb, i) => {
                thumb.classList.toggle('active', i === n);
            });

            currentSlide = n;
        }

        // Auto slide every 5 seconds
        setInterval(() => {
            currentSlide = (currentSlide + 1) % slides.length;
            changeSlide(currentSlide);
        }, 5000);

        function addToQuote() {
            alert("Product added to your quote request! Our team will contact you shortly.");
        }

        function toggleAccordion(el) {
            const content = el.nextElementSibling;
            const icon = el.querySelector('span');

            content.classList.toggle('hidden');

            if (content.classList.contains('hidden')) {
                icon.innerText = '+';
            } else {
                icon.innerText = '−';
            }
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