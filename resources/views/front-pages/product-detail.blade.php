@extends('layouts.app')

@section('content')


    <div class="max-w-7xl mx-auto px-6 py-12">

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

                        @foreach($images as $key => $img)
                            <img src="{{ asset('storage/' . $img) }}"
                                class="slide {{ $key == 0 ? 'active' : '' }} w-full h-full object-cover"
                                alt="{{ $product->name }}">
                        @endforeach

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
                <p class="text-gray-500 text-lg">{{ $product->sub_title }}</p>

                <div class="flex items-center gap-4 mt-6">
                    <span class="text-4xl font-bold text-gray-800">₹{{ $product->price }}</span>
                    @if($product->mrp)
                        <span class="text-gray-400 line-through text-xl">₹{{ $product->mrp }}</span>
                    @endif
                    @if($product->mrp && $product->price)
                        <span
                            class="bg-green-100 text-green-700 text-sm font-medium px-4 py-1 rounded-full">{{ round((($product->mrp - $product->price) / $product->mrp) * 100) }}%
                            OFF</span>
                    @endif
                </div>

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

                <div class="mt-10">
                    <h3 class="font-semibold mb-4">Product Summary</h3>
                    <p class="text-gray-600 leading-relaxed">
                        {{ $product->summary }}
                    </p>
                </div>

                <div class="mt-10 grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-sm text-gray-500">Minimum Order Quantity</p>
                        <p class="font-semibold text-xl">{{ $product->min_qty }} Pieces</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-500">Delivery Time</p>
                        <p class="font-semibold text-xl">{{ $product->delivery_time }}</p>
                    </div>
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

    <section class="py-16 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-10">New Arrivals</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($newArrivals as $item)
                    <div class="product-card bg-white rounded-3xl overflow-hidden">
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-56 object-cover">

                        <div class="p-5">
                            <h3 class="font-semibold">{{ $item->name }}</h3>
                            <p class="text-gray-500 text-sm">{{ $item->sub_title }}</p>
                            <p class="font-bold mt-2">₹{{ $item->price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- ==================== RELATED PRODUCTS SECTION ==================== -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-10">Related Products</h2>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($relatedProducts as $item)
                    <div class="product-card bg-white rounded-3xl overflow-hidden">
                        <img src="{{ asset('storage/' . $item->image) }}" class="w-full h-56 object-cover">

                        <div class="p-5">
                            <h3 class="font-semibold">{{ $item->name }}</h3>
                            <p class="text-gray-500 text-sm">{{ $item->sub_title }}</p>
                            <p class="font-bold mt-2">₹{{ $item->price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

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