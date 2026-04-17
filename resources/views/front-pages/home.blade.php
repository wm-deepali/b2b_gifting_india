@extends('layouts.app')

<style>
  .scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }

  .scrollbar-hide::-webkit-scrollbar {
    display: none;
  }

  .scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }

  .scrollbar-hide::-webkit-scrollbar {
    display: none;
  }

  /* Hide scrollbar but keep scrollable */
  .scrollbar-hide {
    -ms-overflow-style: none;
    /* IE and Edge */
    scrollbar-width: none;
    /* Firefox */
  }

  .scrollbar-hide::-webkit-scrollbar {
    display: none;
    /* Chrome, Safari, Opera */
  }

  .scrollbar-hide {
    -ms-overflow-style: none;
    scrollbar-width: none;
  }

  .scrollbar-hide::-webkit-scrollbar {
    display: none;
  }

  .marquee-wrapper {
    width: max-content;
    animation: marquee 35s linear infinite;
    will-change: transform;
  }

  @keyframes marquee {
    0% {
      transform: translateX(0);
    }

    100% {
      transform: translateX(-50%);
    }
  }

  .marquee-wrapper:hover {
    animation-play-state: paused;
  }

  .client-logo img {
    max-width: 140px;
    object-fit: contain;
    filter: grayscale(100%) opacity(0.7);
    transition: all 0.4s ease;
  }

  .client-logo:hover img {
    filter: grayscale(0%) opacity(1);
    transform: scale(1.08);
  }

  /* Important fix */
  body {
    overflow-x: hidden;
    font-family: "Playfair Display", "Playfair Display Fallback", ui-serif, Georgia, serif !important;

  }
</style>
<style>
  .why-heading {
    font-size: 2.75rem;
    line-height: 1.1;
    font-weight: 700;
    color: #1f2937;
  }

  .category-product-image img {
    border: 2px solid #fff;
  }

  @media (min-width: 768px) {
    .why-heading {
      font-size: 3.25rem;
    }
  }

  .why-card {
    background: white;
    padding: 2.25rem 1.75rem;
    border-radius: 20px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06);
    transition: all 0.4s ease;
    height: 100%;
    text-align: center;
  }

  .why-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
  }

  .why-icon {
    width: 80px;
    height: 80px;
    margin: 0 auto 1.5rem;
    background: #fff7ed;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 2.25rem;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
  }

  .why-card:hover .why-icon {
    transform: scale(1.08);
    background: #fef3c7;
  }

  .why-icon img {
    width: 50px;
    height: 50px;
  }

  .why-card-title {
    font-size: 1.35rem;
    font-weight: 700;
    color: #1f2937;
    margin-bottom: 1rem;
    line-height: 1.3;
  }

  .why-card-text {
    font-size: 1.02rem;
    line-height: 1.65;
    color: #4b5563;
  }

  .category-card {
    width: 100%;
    display: flex;
    flex-direction: column;
  }

  .category-card img {
    width: 95%;
    margin: auto;
  }

  .category-card {
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
  }

  .category-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1),
      0 8px 10px -6px rgb(0 0 0 / 0.1);
  }

  /* Gloss Wave Effect */
  .category-card .relative::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -100%;
    width: 50%;
    height: 200%;
    background: linear-gradient(120deg,
        transparent 30%,
        rgba(255, 255, 255, 0.6) 50%,
        transparent 70%);
    transform: skewX(-25deg);
    transition: left 0.8s ease;
    pointer-events: none;
  }

  .category-card:hover .relative::after {
    left: 150%;
  }

  /* Optional: Slight shine on image */
  .category-card img {
    filter: brightness(0.98);
  }

  .category-card:hover img {
    filter: brightness(1.05);
  }

  /* Mobile Optimization */
  @media (max-width: 640px) {
    .why-card {
      padding: 2rem 1.5rem;
    }

    .why-icon {
      width: 70px;
      height: 70px;
      font-size: 2rem;
    }

    .why-card-title {
      font-size: 1.25rem;
    }
  }

  /* ===================== B2B FEATURE SECTION CSS ===================== */
  .b2b-feature-section {
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
  }

  .b2b-feature-grid {
    gap: 2rem;
  }

  .b2b-feature-card {
    transition: all 0.5s cubic-bezier(0.4, 0.0, 0.2, 1);
  }

  .b2b-feature-card:hover {
    transform: translateY(-12px);
    box-shadow: 0 25px 50px -12px rgb(0 0 0 / 0.15);
  }

  .b2b-feature-image-wrapper {
    overflow: hidden;
  }

  .b2b-feature-image {
    transition: transform 0.8s cubic-bezier(0.4, 0.0, 0.2, 1);
  }

  .b2b-feature-card:hover .b2b-feature-image {
    transform: scale(1.08);
  }

  .b2b-feature-title {
    font-size: 1.75rem;
    font-weight: 700;
    color: #1f2937;
    line-height: 1.3;
  }

  .b2b-feature-desc {
    color: #6b635a;
    font-size: 1.02rem;
    line-height: 1.5;
  }

  .b2b-feature-btn {
    font-weight: 600;
    letter-spacing: 0.5px;
    transition: all 0.3s ease;
  }

  .b2b-feature-btn:hover {
    transform: translateY(-2px);
  }

  .banner-hero-title {
    line-height: 55px;
    letter-spacing: 1px;
  }

  /* Mobile Responsive */
  @media (max-width: 768px) {
    .b2b-feature-grid {
      gap: 1.5rem;
    }

    .b2b-feature-card {
      margin-bottom: 1rem;
    }

    .banner-hero-title {
      line-height: 35px;
      letter-spacing: 1px;
    }

    .b2b-feature-btn {
      width: 100%;
    }
  }

  .slider-slide {
    transition: opacity 1200ms ease-in-out;
  }

  .slider-dot {
    transition: all 0.3s ease;
  }

  .slider-dot:hover {
    transform: scale(1.2);
  }
</style>

@section('content')


  <!-- Start Hero Section -->
  <section class="relative bg-gradient-to-br from-[#f9f7f3] via-[#f8f6f2] to-[#f0ede5] overflow-hidden">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-16 md:py-20 lg:py-24">
      <div class="grid lg:grid-cols-2 gap-10 lg:gap-16 items-center">
        <!-- Left: Text -->
        <div class="space-y-6 md:space-y-8">
          <div
            class="inline-flex items-center gap-3 bg-[#2ec4b6]/10 text-[#2ec4b6] px-5 py-2 rounded-full text-sm font-semibold tracking-wide">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
              <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.707 8.707a1 1 0 011.414 0L9 11.586l5.293-5.293a1 1 0 111.414 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414z"
                clip-rule="evenodd" />
            </svg>
            Trusted by 5000+ Companies
          </div>

          <h1
            class="text-4xl sm:text-5xl lg:text-5xl font-bold leading-[1.05] tracking-tighter text-dark-600 banner-hero-title">
            Premium Corporate Gifting That
            <span class="bg-gradient-to-r from-[#2ec4b6] to-[#f4a261] bg-clip-text text-transparent">
              Builds Lasting
            </span>
            Relationships
          </h1>

          <p class="text-lg sm:text-xl text-gray-700 font-light max-w-xl">
            Branded, customizable & thoughtful gifts for employees, clients & partners — delivered with your brand
            identity.
          </p>

          <!-- Buttons – forced single line with flex-nowrap -->
          <div class="flex flex-col sm:flex-row flex-nowrap gap-4 sm:gap-5 pt-4">
            <a href="#featured"
              class="inline-flex items-center justify-center bg-[#2ec4b6] hover:bg-[#26a395] text-white font-semibold px-8 py-4 rounded-full shadow-md transition-all duration-300 min-w-[220px] text-center">
              Browse Premium Collection
            </a>

            <a href="#contact"
              class="inline-flex items-center justify-center border-2 border-gray-800 hover:bg-gray-800 hover:text-white text-gray-800 font-semibold px-8 py-4 rounded-full transition-all duration-300 min-w-[180px] text-center">
              Get Custom Quote
            </a>
          </div>

          <!-- Trust badges – tighter spacing -->
          <div class="flex flex-wrap gap-6 pt-6 text-sm text-gray-600">
            <div class="flex items-center gap-2">
              <svg class="w-5 h-5 text-[#2ec4b6]" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.707 8.707a1 1 0 011.414 0L9 11.586l5.293-5.293a1 1 0 111.414 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
              Pan-India Delivery
            </div>
            <div class="flex items-center gap-2">
              <svg class="w-5 h-5 text-[#2ec4b6]" fill="currentColor" viewBox="0 0 20 20">
                <path fill-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM4.707 8.707a1 1 0 011.414 0L9 11.586l5.293-5.293a1 1 0 111.414 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 010-1.414z"
                  clip-rule="evenodd" />
              </svg>
              Free Logo Proof
            </div>
          </div>
        </div>

        <!-- Right: Image – reliable Pexels direct link -->
        <div class="relative mt-8 lg:mt-0">
          <div class="absolute -inset-6 bg-[#2ec4b6]/5 rounded-3xl blur-2xl opacity-50"></div>
          <img src="{{ asset('images/hero-banner.webp') }}" alt="Premium Corporate Gift Set"
            class="relative rounded-2xl shadow-2xl object-cover w-full h-[300px] md:h-[480px] lg:h-[520px] border border-gray-200/40"
            loading="lazy" onerror="this.src='https://via.placeholder.com/800x520/2ec4b6/ffffff?text=Corporate+Gifts';">
          <!-- Floating badge -->
          <div
            class="absolute -bottom-6 right-6 bg-white px-6 py-3 rounded-xl shadow-lg text-base font-semibold text-gray-800 flex items-center gap-2 border border-gray-100">
            <span class="text-xl text-[#2ec4b6]">✓</span>
            Fully Customizable
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Hero Section -->


  <!-- ===================== WHY CHOOSE SECTION ===================== -->
  <section class="why-choose-section py-8 md:py-24 bg-[#faf9f6]">
    <div class="max-w-7xl mx-auto px-6">

      <!-- Heading -->
      <div class="text-center mb-12 md:mb-16">
        <h2 class="why-heading text-4xl md:text-5xl font-bold text-gray-900 tracking-tight">
          Why Choose B2B Gift India
        </h2>
        <p class="mt-4 text-lg text-gray-600 max-w-2xl mx-auto leading-relaxed">
          We go beyond just food. Every order is an experience designed to delight your senses and warm your heart.
        </p>
      </div>

      <!-- Features Grid -->
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8 md:gap-10">

        <!-- Card 1 -->
        <div class="why-card group">
          <div class="why-icon">
            <img src="{{ asset('images/premium (1).png') }}" alt="Premium Quality">
          </div>
          <h3 class="why-card-title">Premium Quality</h3>
          <p class="why-card-text">
            Every product is carefully sourced from the finest artisans and producers.
            We partner only with those who share our obsession with quality.
          </p>
        </div>

        <!-- Card 2 -->
        <div class="why-card group">
          <div class="why-icon">
            <img src="{{ asset('images/hamper.png') }}" alt="Handcrafted Hampers">
          </div>
          <h3 class="why-card-title">Handcrafted Hampers</h3>
          <p class="why-card-text">
            Each hamper is assembled by hand with meticulous attention to detail.
            We combine flavours and textures to create a truly memorable unboxing experience.
          </p>
        </div>

        <!-- Card 3 -->
        <div class="why-card group">
          <div class="why-icon">
            <img src="{{ asset('images/fast-delivery.png') }}" alt="Express Mumbai Delivery">
          </div>
          <h3 class="why-card-title">Express Mumbai Delivery</h3>
          <p class="why-card-text">
            Same-day and next-day delivery available across Mumbai. Pan-India shipping with
            careful temperature-controlled packaging for freshness.
          </p>
        </div>

        <!-- Card 4 -->
        <div class="why-card group">
          <div class="why-icon">
            <img src="{{ asset('images/gift-wrap.png') }}" alt="Beautiful Gift Wrapping">
          </div>
          <h3 class="why-card-title">Beautiful Gift Wrapping</h3>
          <p class="why-card-text">
            Complimentary luxury gift wrapping with every order. Add a personalised message
            card to make your gift extra special for any occasion.
          </p>
        </div>

      </div>
    </div>
  </section>
  <!-- ===================== CUSTOM CSS ===================== -->


  <!-- Start POPULAR CATEGORIES Section -->
  <section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">
      <div class="flex justify-between items-end mb-5 md:mb-10">
        <div>
          <span class="text-[#2ec4b6] font-medium tracking-widest">EXPLORE</span>
          <h2 class="text-4xl font-bold tracking-tighter">Popular Categories</h2>
        </div>
        <!-- 📱 Mobile only -->


        <!-- 💻 Desktop only -->
        <a href="{{ route('category') }}" class="hidden md:flex items-center gap-2 text-[#f4a261] font-medium text-base">
          View all categories
          <i class="fa-solid fa-arrow-right"></i>
        </a>

      </div>

      <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 md:gap-6">
        @foreach($popularCategories as $cat)
          @php
            $url = $cat->children_count > 0
              ? url('category/' . $cat->slug)
              : url('products?subcategory=' . $cat->slug);

            // Different pastel colors for each card
            $colors = [
              'bg-[#f8f0e8]',
              'bg-[#f0f8f5]',
              'bg-[#f5f0fa]',
              'bg-[#fff4e6]',
              'bg-[#f0f9ff]'
            ];
            $colorClass = $colors[$loop->index % 5];
          @endphp

          <!-- Category Card -->
          <div onclick="window.location='{{ $url }}'"
            class="category-card group relative overflow-hidden rounded-xl cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500 {{$colorClass}}">

            <!-- Image -->
            <div class="relative h-40 md:h-56 overflow-hidden">
              <img src="{{ asset('storage/' . $cat->image) }}"
                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110"
                alt="{{ $cat->name }}">

              <!-- Gloss Wave Overlay -->
              <div
                class="absolute inset-0 bg-gradient-to-r from-transparent via-white/30 to-transparent 
                                                                                                                                        -skew-x-12 translate-x-[-150%] group-hover:translate-x-[150%] 
                                                                                                                                        transition-transform duration-700 ease-out">
              </div>
            </div>

            <!-- Content -->
            <div class="p-3 md:p-6">
              <h3 class="font-semibold text-sm md:text-xl text-gray-800 group-hover:text-[#d97706] transition-colors">
                {{ $cat->name }}
              </h3>
              <p class="text-sm text-[#6b635a] mt-1 line-clamp-2">
                {{ $cat->sub_title ?? 'Premium corporate gifts' }}
              </p>
            </div>
          </div>
        @endforeach


      </div>
      <div class="" style="display:flex; margin:auto;margin-top:10px; justify-content: center;">

        <a href="{{ route('category') }}" class="flex md:hidden items-center gap-2 text-[#f4a261] font-medium text-sm">
          View all categories
          <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>
    </div>
  </section>
  <!-- End POPULAR CATEGORIES Section -->


  <!-- Start FEATURED PRODUCTS Section -->
  <section id="shop-section" class="max-w-7xl mx-auto px-6 py-8 md:py-24">
    <div class="flex justify-between items-center mb-12">
      <h2 class="text-4xl font-bold tracking-tighter">Featured Products</h2>
      <a href="#" class="hidden md:flex text-[#2ec4b6] flex items-center gap-2 text-lg font-medium">
        Shop entire collection
        <span class="text-2xl">→</span>
      </a>
    </div>

    <div class="gap-8 grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4">

      @foreach($featuredProducts as $product)

        <div class="product-card bg-white rounded-xl overflow-hidden shadow-xl">

          <div class="relative">

            <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-72 object-cover">

            @php
              $tags = [];

              if ($product->sale) {
                $tags[] = ['label' => 'SALE', 'class' => 'bg-red-500 text-white'];
              }

              if ($product->best_seller) {
                $tags[] = ['label' => 'BESTSELLER', 'class' => 'bg-white text-black'];
              }

              if ($product->new_arrival) {
                $tags[] = ['label' => 'NEW', 'class' => 'bg-[#e07a5f] text-white'];
              }

              if ($product->is_premium) {
                $tags[] = ['label' => 'PREMIUM', 'class' => 'bg-purple-500 text-white'];
              }

              if ($product->gift_hamper) {
                $tags[] = ['label' => 'GIFT', 'class' => 'bg-pink-500 text-white'];
              }

              if ($product->bulk_available) {
                $tags[] = ['label' => 'BULK', 'class' => 'bg-gray-700 text-white'];
              }

              // 👇 LIMIT to 2 tags only
              $tags = array_slice($tags, 0, 2);
            @endphp

            @foreach($tags as $index => $tag)
              <div
                class="absolute {{ $index == 0 ? 'top-4 right-4' : 'top-4 left-4' }} 
                                                                                                                                                        {{ $tag['class'] }} px-4 py-1 rounded-3xl text-xs font-medium shadow">
                {{ $tag['label'] }}
              </div>
            @endforeach

          </div>

          <div class="p-6">
            <div class="flex justify-between">

              <div>
                <h4 class="font-semibold text-lg">
                  {{ $product->name }}
                </h4>

                <p class="text-[#6b635a] text-sm">
                  {{ $product->sub_title ?? 'Premium corporate gift' }}
                </p>
              </div>

              <div class="text-right">
                <div class="text-[#e07a5f] font-bold">
                  ₹{{ number_format($product->price) }}
                </div>
              </div>

            </div>

            <button data-id="{{ $product->id }}"
              class="mt-6 w-full bg-[#2ec4b6] text-white py-4 rounded-2xl font-semibold hover:bg-[#26a395] add-to-cart">
              Add to Cart
            </button>

          </div>

        </div>

      @endforeach

    </div>

    <div class="" style="display:flex; margin:auto;margin-top:10px; justify-content: center;">

      <a href="{{ route('products') }}" class="flex md:hidden items-center gap-2 text-[#f4a261] font-medium text-sm">
        Shop entire collection
        <i class="fa-solid fa-arrow-right"></i>
      </a>
    </div>
  </section>
  <!-- End FEATURED PRODUCTS Section -->


  <!-- ===================== GIFTING FEATURE SECTION ===================== -->
  <section class="b2b-feature-section px-6 py-8 md:py-24 bg-white">
    <div class="b2b-feature-container max-w-7xl mx-auto ">

      <div class="b2b-feature-grid grid grid-cols-1 md:grid-cols-3 gap-3 md:gap-8">

        <!-- Card 1: Gift Hampers -->
        <div onclick="window.location.href='{{ route('products', ['gift_hamper' => 1]) }}'"
          class="b2b-feature-card group cursor-pointer overflow-hidden rounded-3xl bg-[#f8f5f0] hover:shadow-2xl transition-all duration-500">

          <div class="b2b-feature-image-wrapper relative h-80 overflow-hidden">
            <img src="{{ asset('images/gifthampers.webp') }}" alt="Gift Hampers"
              class="b2b-feature-image w-full h-full object-fill transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
          </div>

          <div class="b2b-feature-content p-8">
            <h3 class="b2b-feature-title text-2xl font-semibold text-gray-900">Gift Hampers</h3>
            <p class="b2b-feature-desc mt-2 text-gray-600">Browse our gifting collection</p>

            <button
              class=" b2b-feature-btn mt-8 bg-gray-900 hover:bg-black text-white px-8 py-3.5 rounded-2xl text-sm font-medium transition-all">
              SHOP NOW
            </button>
          </div>
        </div>

        <!-- Card 2: Bulk Orders -->
        <div onclick="window.location.href='{{ route('products', ['bulk_available' => 1]) }}'"
          class="b2b-feature-card group cursor-pointer overflow-hidden rounded-3xl bg-[#f8f5f0] hover:shadow-2xl transition-all duration-500">

          <div class="b2b-feature-image-wrapper relative h-80 overflow-hidden">
            <img src="{{ asset('images/bulkorders.webp') }}" alt="Bulk Orders"
              class="b2b-feature-image w-full h-full object-fill transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
          </div>

          <div class="b2b-feature-content p-8">
            <h3 class="b2b-feature-title text-2xl font-semibold text-gray-900">Bulk Orders</h3>
            <p class="b2b-feature-desc mt-2 text-gray-600">Bulk Gifting, Handled Smoothly</p>

            <button
              class="b2b-feature-btn mt-8 bg-white border-2 border-gray-900 hover:bg-gray-900 hover:text-white text-gray-900 px-8 py-3.5 rounded-2xl text-sm font-medium transition-all">
              ORDER NOW
            </button>
          </div>
        </div>

        <!-- Card 3: Ready-to-Ship -->
        <div onclick="window.location.href='{{ route('products', ['ready_to_ship' => 1]) }}'"
          class="b2b-feature-card group cursor-pointer overflow-hidden rounded-3xl bg-[#f8f5f0] hover:shadow-2xl transition-all duration-500">

          <div class="b2b-feature-image-wrapper relative h-80 overflow-hidden">
            <img src="{{ asset('images/readytodeliver.webp') }}" alt="Ready to Ship"
              class="b2b-feature-image w-full h-full object-fill transition-transform duration-700 group-hover:scale-110">
            <div class="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent"></div>
          </div>

          <div class="b2b-feature-content p-8">
            <h3 class="b2b-feature-title text-2xl font-semibold text-gray-900">Ready-to-Ship</h3>
            <p class="b2b-feature-desc mt-2 text-gray-600">Stress-Free Ordering Experience</p>

            <button
              class="b2b-feature-btn mt-8 bg-gray-900 hover:bg-black text-white px-8 py-3.5 rounded-2xl text-sm font-medium transition-all">
              SHOP NOW
            </button>
          </div>
        </div>

      </div>
    </div>
  </section>


  <!-- Daily Deals Banner Section - Exact match to your reference screenshot style & proportions -->
  <section class="b2b-feature-section px-6 py-8 md:py-24">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-3 md:gap-6">
      <!-- Left: Main Daily Deals Banner (wide, lower height) -->
      <!-- ===================== PROFESSIONAL FADE SLIDER ===================== -->
      <div
        class="lg:col-span-8 relative rounded-xl overflow-hidden bg-gradient-to-br from-gray-50 to-white shadow-xl h-[255px] md:h-[580px] lg:h-[580px]">

        <!-- Slider Container -->
        <div id="heroSlider" class="relative w-full h-full">

          <!-- Slide 1 -->
          <div class="slider-slide absolute inset-0 bg-cover bg-center transition-opacity duration-1000"
            style="background-image: url('https://makoba.com/cdn/shop/articles/WhatsApp_Image_2026-02-18_at_2.59.59_PM_2_540x.jpg?v=1772009464')">
          </div>

          <!-- Slide 2 -->
          <div class="slider-slide absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
            style="background-image: url('https://images.pexels.com/photos/5632402/pexels-photo-5632402.jpeg')">
          </div>

          <!-- Slide 3 -->
          <div class="slider-slide absolute inset-0 bg-cover bg-center opacity-0 transition-opacity duration-1000"
            style="background-image: url('https://images.pexels.com/photos/5632410/pexels-photo-5632410.jpeg')">
          </div>

        </div>

        <!-- Optional Overlay for better text readability (if needed later) -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/20 via-transparent to-transparent"></div>

        <!-- Slider Dots (Modern & Clean) -->
        <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex gap-3 z-10">
          <button onclick="goToSlide(0)"
            class="slider-dot w-3 h-3 rounded-full bg-white/70 hover:bg-white transition-all"></button>
          <button onclick="goToSlide(1)"
            class="slider-dot w-3 h-3 rounded-full bg-white/70 hover:bg-white transition-all"></button>
          <button onclick="goToSlide(2)"
            class="slider-dot w-3 h-3 rounded-full bg-white/70 hover:bg-white transition-all"></button>
        </div>

      </div>

      <!-- Right: Sidebar promotional cards (narrower, stacked, shorter height each) -->
      <!-- ===================== VERTICAL AUTO SCROLL SECTION ===================== -->
      <div class="lg:col-span-4">
        <div id="verticalScroller" class="relative h-[580px] overflow-hidden rounded-xl  ">

          <div id="scrollContainer" class="absolute top-0 left-0 w-full transition-transform duration-1000 ease-in-out">

            @foreach($scrollProducts as $product)

              @php
                // 🎯 LABEL LOGIC
                $label = 'Featured';
                $bg = 'bg-[#f0f9ff]';

                if ($product->sale) {
                  $label = 'Clearance';
                  $bg = 'bg-[#f0fdfa]';
                } elseif ($product->best_seller) {
                  $label = 'Top Product';
                  $bg = 'bg-[#fefaf5]';
                }
              @endphp

              <div class="scroll-card {{ $bg }} rounded-2xl p-6 mb-5 shadow-sm hover:shadow-md transition-all">

                <div class="text-sm font-medium text-gray-600 mb-1">
                  {{ $label }}
                </div>

                <h3 class="font-semibold text-lg mb-3">
                  {{ $product->name }}
                </h3>

                <div class="flex items-center gap-5">

                  <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                    class="w-20 h-20 rounded-xl object-contain bg-white p-2 shadow">

                  <div>
                    <a href="{{ url('product/' . $product->slug) }}" class="text-[#e07a5f] font-bold text-lg">
                      Shop Now →
                    </a>
                  </div>

                </div>

              </div>

            @endforeach

            <a href="{{ route('products') }}">

              <div class="scroll-card border-2 border-dashed border-gray-300 rounded-2xl p-6 mb-5 
          flex items-center justify-center text-center 
          hover:border-[#e07a5f] hover:shadow-md transition-all cursor-pointer">

                <p class="text-gray-600 font-semibold text-lg">
                  + Show more Products
                </p>

              </div>

            </a>


          </div>

        </div>
      </div>
    </div>
  </section>


  <!-- Most Popular Section - Compact & Styled like your reference screenshot -->
  <section class="bg-white w-full">
    <div class="max-w-7xl mx-auto px-6 py-8 md:py-24  ">
      <div class="flex flex-col md:flex-row justify-between items-baseline mb-8">
        <h2 id="sectionTitle" class="text-3xl md:text-4xl font-bold tracking-tight">Premi Products</h2>

        <div class="flex gap-8 md:gap-12 mt-4 md:mt-0 text-base font-medium text-gray-600">
          <button onclick="changeTab(0)" id="tab0"
            class="pb-1 border-b-2 border-[#f4a261] text-[#f4a261] font-semibold">Premium</button>
          <button onclick="changeTab(1)" id="tab1">On Sale</button>
          <button onclick="changeTab(2)" id="tab2">Best Seller</button>

        </div>
      </div>

      <div class="overflow-hidden">
        <div id="sliderTrack" class="flex transition-transform duration-500 " style="padding:0px 0 30px 0">

          <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8 w-full flex-shrink-0"></div>

          <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8 w-full flex-shrink-0"></div>

          <div class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8 w-full flex-shrink-0"></div>

        </div>
      </div>


    </div>
  </section>
  <!-- Gifting Occasions – Finished & Working Version -->

  @if (count($occasions) > 0)
    <section class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-8 md:py-24  ">
      <div class="text-center mb-10 md:mb-12">
        <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight mb-3 md:mb-4">
          Gifting Occasions
        </h2>
        <p class="text-base sm:text-lg text-gray-600 max-w-3xl mx-auto px-4">
          Premium corporate gifts curated specially for every important business & festive moment
        </p>
      </div>

      <!-- Horizontal scrollable cards – mobile swipe friendly -->
      <div class="overflow-x-auto pb-6 scrollbar-hide snap-x snap-mandatory">
        <div class="flex gap-5 sm:gap-6 lg:gap-8 min-w-max px-1">

          @foreach($occasions as $occ)

            @php
              // 🎨 Optional dynamic badge color (rotating)
              $colors = [
                'bg-amber-600',
                'bg-blue-700',
                'bg-emerald-700',
                'bg-violet-700',
                'bg-rose-700'
              ];

              $colorClass = $colors[$loop->index % 5];
            @endphp

            <div
              class="min-w-[280px] sm:min-w-[300px] lg:min-w-[320px] snap-start group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">

              <div class="relative h-44 sm:h-48 overflow-hidden">

                <img src="{{ asset('storage/' . $occ->image) }}" alt="{{ $occ->title }}"
                  class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">

                <div class="absolute inset-0 bg-gradient-to-t from-black/65 via-black/30 to-transparent"></div>

                <div class="absolute bottom-4 left-5 right-5 text-white">

                  <span class="inline-block {{ $colorClass }} text-xs font-bold px-3 py-1 rounded-full mb-2">
                    Occasion
                  </span>

                  <h3 class="text-lg sm:text-xl font-bold leading-tight">
                    {{ $occ->title }}
                  </h3>

                </div>
              </div>

              <div class="p-5 sm:p-6">

                <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                  {{ $occ->short_description ?? 'Premium corporate gifting options' }}
                </p>

                <a href="{{ url('products?occasion[]=' . $occ->slug) }}"
                  class="text-[#e07a5f] font-medium text-sm flex items-center gap-2 hover:gap-3 transition-all">
                  View Collection →
                </a>

              </div>
            </div>

          @endforeach

        </div>
      </div>

      <!-- Mobile scroll hint -->
      <div class="text-center text-sm text-gray-500 mt-4 md:hidden">
        ← Swipe to see more occasions →
      </div>

      <!-- Final CTA -->
      <div class="text-center mt-10">
        <a href="{{ route('products') }}"
          class="inline-flex items-center bg-gray-900 hover:bg-gray-800 text-white font-semibold px-8 py-4 rounded-full shadow-md transition-all duration-300">
          View All Occasion Collections
          <svg class="ml-3 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
          </svg>
        </a>
      </div>
    </section>

  @endif

  @if (count($faqs) > 0)

    <section class="w-full ">
      <!-- FAQ -->
      <div class="max-w-4xl mx-auto px-6 py-8 md:py-24 ">
        <h2 class="text-4xl font-bold tracking-tighter text-center mb-16">
          Frequently Asked Questions
        </h2>

        <div class="space-y-4">

          @foreach($faqs as $faq)
            <details class="group bg-white rounded-3xl p-8">

              <summary class="flex justify-between items-center cursor-pointer font-semibold text-lg">
                {{ $faq->question }}
                <i class="fa-solid fa-plus group-open:rotate-45 transition-transform"></i>
              </summary>

              <p class="mt-6 text-[#6b635a]">
                {{ $faq->answer }}
              </p>

            </details>
          @endforeach

        </div>
      </div>
    </section>

  @endif

  <!-- CONTACT FORM + NEWSLETTER -->
  <section id="contact-section" class="bg-[#f4f0e8] py-8 md:py-24 ">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-16">

      <!-- Left: Company Intro + CTA -->
      <div>
        <h2 class="text-5xl font-bold tracking-tighter leading-none mb-8">Let's create something special for your brand
        </h2>
        <p class="text-[#6b635a] text-lg mb-10">Our team of gifting experts will help you choose the perfect combination
          that matches your budget and brand identity.</p>

        <div class="bg-white rounded-3xl p-8 shadow">
          <div class="flex gap-6">

            <div class="flex-1">
              <div class="text-[#2ec4b6] text-2xl md:text-6xl font-bold">5000+</div>
              <div class="text-xs md:text-sm">Corporate clients served</div>
            </div>

            <div class="flex-1">
              <div class="text-[#e07a5f] text-2xl md:text-6xl font-bold">98%</div>
              <div class="text-xs md:text-sm">Repeat business</div>
            </div>

          </div>
        </div>

      </div>

      <!-- Right: Form -->
      <form method="POST" action="{{ route('home.enquiry') }}" class="bg-white rounded-3xl p-4 md:p-10 shadow-xl">
        @csrf
        <h3 class="font-semibold text-2xl mb-8">Get in touch today</h3>

        @if(session('success'))
          <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
          </div>
        @endif

        @if($errors->any())
          <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            {{ $errors->first() }}
          </div>
        @endif

        <!-- 🔥 yaha change -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <input type="text" placeholder="Your Name" name="name"
            class="border border-[#e0d6c7] focus:border-[#2ec4b6] rounded-2xl px-6 py-4">

          <input type="email" placeholder="Business Email" name="email"
            class="border border-[#e0d6c7] focus:border-[#2ec4b6] rounded-2xl px-6 py-4">
        </div>

        <input type="text" placeholder="Mobile Number" name="phone"
          class="mt-6 w-full border border-[#e0d6c7] focus:border-[#2ec4b6] rounded-2xl px-6 py-4">

        <input type="text" placeholder="Company Name" name="company"
          class="mt-6 w-full border border-[#e0d6c7] focus:border-[#2ec4b6] rounded-2xl px-6 py-4">

        <textarea name="message" placeholder="Tell us about your gifting requirement (budget, quantity, occasion)"
          class="mt-6 w-full h-40 border border-[#e0d6c7] focus:border-[#2ec4b6] rounded-3xl px-6 py-5 resize-none"></textarea>

        <div class="mt-6">
           <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
        </div>

        <button type="submit"
          class="mt-8 w-full bg-[#f4a261] hover:bg-[#e07a5f] transition-colors text-white font-semibold py-6 p-2 rounded-3xl">
          SEND MESSAGE — WE'LL REPLY IN 2 HOURS
        </button>
      </form>

    </div>
  </section>


  @if (count($brands) > 0)

    <!-- Our Partners / Trusted Brands Section -->
    <section class="bg-white py-8 md:py-24 border-t border-gray-100">
      <div class="max-w-7xl mx-auto px-6 text-center">
        <!-- Heading & Description -->
        <h2 class="text-3xl md:text-4xl font-bold tracking-tight mb-4">
          Our Trusted Brand Partners
        </h2>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-12">
          We proudly collaborate with leading premium brands to bring you the highest quality corporate gifts, customized
          with your logo and delivered across India.
        </p>

        <!-- Logo Trail -->
        <div class="overflow-x-auto scrollbar-hide">
          <div class="flex items-center justify-center gap-12 md:gap-16 lg:gap-20 min-w-max py-6 px-4">

            @foreach($brands as $brand)
              <div class="flex flex-col items-center min-w-[100px]">
                <img src="{{ asset('storage/' . $brand->logo) }}" alt="{{ $brand->name }}"
                  class="h-10 md:h-12 grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
              </div>
            @endforeach

          </div>
        </div>

        <!-- Optional subtle scroll hint for mobile -->
        <div class="text-center text-sm text-gray-400 mt-4 md:hidden">
          ← Scroll to see more partners →
        </div>
      </div>
    </section>

  @endif


  @if (count($testimonials) > 0)
    <!-- Client Testimonials Reel – Portrait Video Style (Fixed: Balanced Fade, No Blank Space) -->
    <section class="bg-gradient-to-b from-white to-[#f9f7f3] py-8 md:py-24">
      <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <!-- Heading -->
        <div class="text-center mb-10 md:mb-14">
          <h2 class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight text-gray-900">
            Client Testimonials
          </h2>
          <p class="mt-4 text-lg md:text-xl text-gray-600 max-w-3xl mx-auto">
            Real stories from companies who trust us for their corporate gifting
          </p>
        </div>

        <!-- Portrait Reel Carousel – Fixed fade & no blank space -->
        <div class="relative overflow-hidden">
          <!-- Symmetrical fade edges on BOTH sides -->
          <div
            class="absolute inset-y-0 left-0 w-16 md:w-32 bg-gradient-to-r from-white to-transparent z-10 pointer-events-none">
          </div>
          <div
            class="absolute inset-y-0 right-0 w-16 md:w-32 bg-gradient-to-l from-white to-transparent z-10 pointer-events-none">
          </div>

          <!-- Scrollable container – flush with edges, no extra space -->
          <div
            class="flex gap-5 sm:gap-6 md:gap-8 overflow-x-auto snap-x snap-mandatory scrollbar-hide pb-6 -mx-5 sm:-mx-6 lg:-mx-8 px-5 sm:px-6 lg:px-8">

            @foreach($testimonials as $t)

              <div
                class="snap-start flex-shrink-0 w-[280px] sm:w-[320px] md:w-[360px] bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">

                <!-- VIDEO / IMAGE -->
                <div class="relative aspect-[9/16] overflow-hidden">

                  @if($t->type == 'reel')

                    @if($t->reel_file)
                      <video class="w-full h-full object-cover" preload="metadata">
                        <source src="{{ asset('storage/' . $t->reel_file) }}">
                      </video>
                    @elseif($t->reel_url)
                      <iframe src="{{ $t->reel_url }}" class="w-full h-full object-cover"></iframe>
                    @endif

                  @else

                    <img src="{{ asset('storage/' . $t->photo) }}" alt="{{ $t->name }}" class="w-full h-full object-cover"
                      loading="lazy">

                  @endif

                  <!-- PLAY BUTTON (UI SAME) -->
                  <div
                    class="absolute inset-0 flex items-center justify-center bg-black/35 group-hover:bg-black/50 transition-all duration-300">

                    <button
                      class="w-20 h-20 md:w-24 md:h-24 bg-[#2ec4b6] rounded-full flex items-center justify-center shadow-2xl transform group-hover:scale-110 transition-transform duration-300 ring-4 ring-white/30">

                      <svg class="w-10 h-10 md:w-12 md:h-12 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z" />
                      </svg>

                    </button>

                  </div>
                </div>

                <!-- CONTENT -->
                <div class="p-5 md:p-6">

                  <p class="text-gray-700 text-sm md:text-base italic mb-4 leading-relaxed line-clamp-4">
                    "{{ $t->feedback }}"
                  </p>

                  <div class="flex items-center gap-3">

                    <!-- INITIALS (same UI) -->
                    <div
                      class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold text-sm md:text-base">

                      {{ strtoupper(substr($t->name, 0, 1)) }}

                    </div>

                    <div>
                      <h4 class="font-semibold text-gray-900 text-sm md:text-base">
                        {{ $t->name }}
                      </h4>

                      <p class="text-xs md:text-sm text-gray-600">
                        {{ $t->designation ?? 'Verified Client' }}
                      </p>
                    </div>

                  </div>

                </div>

              </div>

            @endforeach

          </div>

          <!-- Mobile swipe hint -->
          <div class="text-center text-sm text-gray-500 mt-6 md:hidden">
            ← Swipe to watch more client stories →
          </div>
        </div>
      </div>

      <!-- Hide scrollbar -->

    </section>

  @endif

  @if (count($clients) > 0)

    <!-- Our Clientele – Infinite Logo Marquee -->
    <section class="bg-white py-16 border-t border-gray-100">
      <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 text-center">
        <!-- Heading -->
        <h2 class="text-3xl sm:text-4xl font-bold tracking-tight mb-3">
          Our Valued Clientele
        </h2>
        <p class="text-lg text-gray-600 max-w-3xl mx-auto mb-10 md:mb-12">
          Trusted by leading companies across India for premium corporate gifting solutions
        </p>

        <!-- Marquee Container -->
        <div class="relative overflow-hidden w-full">

          <div class="marquee-wrapper flex whitespace-nowrap py-6">

            <!-- Logo Group 1 -->
            <div class="flex items-center gap-12 md:gap-16 lg:gap-20 px-4 shrink-0">

              @foreach($clients as $client)
                <div class="client-logo">
                  <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="h-10 md:h-12">
                </div>
              @endforeach

            </div>

            <!-- Duplicate -->
            <div class="flex items-center gap-12 md:gap-16 lg:gap-20 px-4 shrink-0">

              @foreach($clients as $client)
                <div class="client-logo">
                  <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}" class="h-10 md:h-12">
                </div>
              @endforeach

            </div>

          </div>
        </div>
      </div>
    </section>

  @endif

  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <script>
    let index = 0;
    const track = document.getElementById('sliderTrack');
    const total = 3; // total slides

    // AUTO SLIDE (full grid slide hoga)
    setInterval(() => {
      index++;

      if (index >= total) {
        index = 0;
      }

      track.style.transform = `translateX(-${index * 100}%)`;
    }, 6000);

    document.addEventListener("DOMContentLoaded", function () {

      const types = ['premium', 'sale', 'best_seller'];

      types.forEach((type, i) => {
        fetch(`/products/filter?type=${type}`)
          .then(res => res.json())
          .then(data => {
            console.log('Loaded:', type, data); // debug
            renderProducts(data, i);
          });
      });

      changeTab(0);
    });

    // TAB CHANGE
    function changeTab(i) {

      const types = ['premium', 'sale', 'best_seller'];
      const titles = [
        "Premium Products",
        "On Sale Products",
        "Best Seller Products"
      ];

      document.getElementById('sectionTitle').innerText = titles[i];

      // active tab UI
      for (let j = 0; j < 3; j++) {
        document.getElementById('tab' + j).classList.remove(
          'border-b-2', 'border-[#f4a261]', 'text-[#f4a261]'
        );
      }

      document.getElementById('tab' + i).classList.add(
        'border-b-2', 'border-[#f4a261]', 'text-[#f4a261]'
      );

      // 🔥 LOAD DATA AGAIN
      fetch(`/products/filter?type=${types[i]}`)
        .then(res => res.json())
        .then(data => {
          renderProducts(data, i);

          // move slider AFTER data loads
          index = i;
          track.style.transform = `translateX(-${index * 100}%)`;
        });
    }

    function renderProducts(products, slideIndex) {

      const grids = document.querySelectorAll('#sliderTrack > div');

      let html = '';

      products.forEach(product => {

        html += `
                                              <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">

                                                <div class="relative h-40 md:h-64 overflow-hidden">
                                                  <img src="${BASE_URL}storage/${product.image}" 
                                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                                                  ${product.new_arrival ? `
                                                    <div class="absolute top-3 left-3 bg-[#e07a5f] text-white text-xs px-3 py-1 rounded-full">
                                                      New
                                                    </div>` : ''}
                                                </div>

                                                <div class="p-3 md:p-5 text-center">
                                                  <p class="text-sm text-gray-500 mb-1">${product.sub_title ?? ''}</p>

                                                  <h4 class="font-semibold text-base leading-tight mb-3">
                                                    ${product.name}
                                                  </h4>

                                                  <p class="text-[#e07a5f] font-bold text-xl">
                                                    ₹${parseInt(product.price).toLocaleString()}
                                                  </p>
                                                </div>

                                              </div>
                                            `;
      });

      // 🔥 replace ONLY that slide content
      grids[slideIndex].innerHTML = html;
    }


    let currentSlide = 0;
    const slides = document.querySelectorAll('.slider-slide');
    const dots = document.querySelectorAll('.slider-dot');

    function showSlide(index) {
      slides.forEach((slide, i) => {
        slide.style.opacity = (i === index) ? '1' : '0';
      });

      dots.forEach((dot, i) => {
        dot.style.backgroundColor = (i === index) ? '#fff' : 'rgba(255,255,255,0.6)';
      });

      currentSlide = index;
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % slides.length;
      showSlide(currentSlide);
    }

    // Auto slide every 5 seconds
    let slideInterval = setInterval(nextSlide, 5000);

    // Manual dot click
    function goToSlide(index) {
      clearInterval(slideInterval);
      showSlide(index);
      slideInterval = setInterval(nextSlide, 5000);
    }

    // Initialize
    window.onload = function () {
      showSlide(0);
    };

    const container = document.getElementById('scrollContainer');
    let scrollPosition = 0;
    const cardHeight = 180; // Approx height of one card + margin
    const totalCards = 3;

    function autoScroll() {
      scrollPosition -= cardHeight;

      container.style.transform = `translateY(${scrollPosition}px)`;

      // Reset after last card
      if (scrollPosition <= -(cardHeight * (totalCards - 1))) {
        setTimeout(() => {
          container.style.transition = 'none';
          scrollPosition = 0;
          container.style.transform = `translateY(0px)`;

          // Force reflow
          container.offsetHeight;

          container.style.transition = 'transform 1000ms ease-in-out';
        }, 9000);
      }
    }

    // Start auto scroll every 4 seconds
    setInterval(autoScroll, 3000);

    // Initial setup
    window.addEventListener('load', () => {
      container.style.transition = 'transform 1000ms ease-in-out';
    });

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