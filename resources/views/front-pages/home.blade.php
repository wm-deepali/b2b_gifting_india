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
  }
</style>

@section('content')


  <!-- Fixed Hero Section – Clean, no broken images, buttons single line, less spacing -->
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

          <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight tracking-tight text-gray-900">
            Premium Corporate Gifting<br class="hidden sm:block">That Builds Lasting Relationships
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
          <img
            src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
            alt="Premium Corporate Gift Set"
            class="relative rounded-2xl shadow-2xl object-cover w-full h-[380px] md:h-[480px] lg:h-[520px] border border-gray-200/40"
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


  <!-- POPULAR CATEGORIES -->
  <section class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6">
      <div class="flex justify-between items-end mb-10">
        <div>
          <span class="text-[#2ec4b6] font-medium tracking-widest">EXPLORE</span>
          <h2 class="text-4xl font-bold tracking-tighter">Popular Categories</h2>
        </div>
        <a href="{{ route('category') }}" class="flex items-center gap-2 text-[#f4a261] font-medium">
          View all categories
          <i class="fa-solid fa-arrow-right"></i>
        </a>
      </div>

      <div class="grid grid-cols-5 gap-6">

        @foreach($popularCategories as $cat)
          @php
            $url = $cat->children_count > 0
              ? url('category/' . $cat->slug)
              : url('products?subcategory=' . $cat->slug);
          @endphp

          <!-- Category -->
          <div onclick="window.location='{{ $url }}'"
            class="category-card bg-[#f8f4ed] rounded-3xl overflow-hidden cursor-pointer">

            <img src="{{ asset('storage/' . $cat->image) }}" class="w-full h-56 object-cover">

            <div class="p-6">
              <h3 class="font-semibold text-xl">
                {{ $cat->name }}
              </h3>

              <p class="text-sm text-[#6b635a]">
                {{ $cat->sub_title ?? 'Premium corporate gifts' }}
              </p>
            </div>

          </div>
        @endforeach

      </div>
    </div>
  </section>

  <!-- COMPANY INTRODUCTION -->
  <section class="max-w-7xl mx-auto px-6 py-24">
    <div class="grid md:grid-cols-2 gap-16 items-center">
      <div>
        <span class="inline-block bg-[#f4a261]/10 text-[#f4a261] px-6 py-2 rounded-full text-sm font-medium mb-6">Trusted
          by 5000+ Companies Across India</span>
        <h2 class="text-5xl font-bold tracking-tight mb-8 leading-tight">Premium Corporate Gifting Partner</h2>
        <p class="text-lg text-[#6b7280] mb-8">
          B2B Gifts India specializes in high-quality, customizable corporate gifts that strengthen professional
          relationships. From executive desk accessories and branded tech to eco-friendly collections and luxury hampers —
          we deliver memorable experiences with your brand identity at the core.
        </p>
        <div class="flex gap-6">
          <a href="#featured" class="bg-[#2ec4b6] text-white px-8 py-4 rounded-full font-semibold">Browse Gifts</a>
          <a href="#contact"
            class="border-2 border-[#2d2d2d] text-[#2d2d2d] px-8 py-4 rounded-full font-semibold hover:bg-[#2d2d2d] hover:text-white transition">Get
            Quote</a>
        </div>
      </div>
      <img
        src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"" alt="
        Corporate Team" class="rounded-2xl shadow-2xl">
    </div>
  </section>

  <!-- FEATURED PRODUCTS -->
  <section id="shop-section" class="max-w-7xl mx-auto px-6 py-24">
    <div class="flex justify-between items-center mb-12">
      <h2 class="text-4xl font-bold tracking-tighter">Featured Products</h2>
      <a href="{{ route('products') }}" class="text-[#2ec4b6] flex items-center gap-2 text-lg font-medium">
        Shop entire collection
        <span class="text-2xl">→</span>
      </a>
    </div>

    <div class="grid grid-cols-4 gap-8">

      @foreach($featuredProducts as $product)

        <!-- Product Card -->
        <div class="product-card bg-white rounded-3xl overflow-hidden shadow-xl">
          <div class="relative">

            <img src="{{ asset('storage/' . $product->image) }}" class="w-full h-72 object-cover">

            @if($product->featured)
              <div class="absolute top-4 right-4 bg-white px-4 py-1 rounded-3xl text-xs font-medium shadow">
                BESTSELLER
              </div>
            @endif

            @if($product->new_arrival)
              <div class="absolute top-4 left-4 bg-[#2ec4b6] text-white text-xs px-3 py-1 rounded-full">
                NEW
              </div>
            @endif

          </div>

          <div class="p-6">
            <div class="flex justify-between">
              <div>
                <h4 class="font-semibold text-lg">{{ $product->name }}</h4>
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
  </section>


  <!-- Daily Deals Banner Section - Exact match to your reference screenshot style & proportions -->
  <section class="max-w-7xl mx-auto px-6 py-8 bg-white overflow-hidden">
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
      <!-- Left: Main Daily Deals Banner (wide, lower height) -->
      <div class="lg:col-span-8 relative rounded-2xl overflow-hidden bg-gradient-to-br from-gray-50 to-white shadow-lg">
        <div
          class="absolute inset-0 bg-[url('https://pyxis.nymag.com/v1/imgs/e98/aac/983dc9aa8e221f7b6c888a35e30870f60e-DOTD-02-02-26.2x.rsocial.w600.jpg')] bg-cover bg-center opacity-30">
        </div>
        <div class="relative p-10 md:p-12 lg:p-16 flex flex-col justify-center h-full min-h-[380px] md:min-h-[420px]">
          <div class="text-sm uppercase tracking-wider font-semibold text-[#f4a261] mb-3 flex items-center gap-2">
            Daily Deals →
          </div>
          <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold leading-tight mb-4">
            AirPods<br>Earphones
          </h2>
          <p class="text-2xl md:text-3xl font-bold text-[#e07a5f] mb-6">
            Today: $247.99
          </p>
          <button
            class="w-fit bg-[#f4a261] hover:bg-[#e07a5f] text-white font-semibold px-8 py-4 rounded-full text-lg transition-all shadow-md hover:shadow-lg">
            Click Here →
          </button>
        </div>
      </div>

      <!-- Right: Sidebar promotional cards (narrower, stacked, shorter height each) -->
      <div class="lg:col-span-4 flex flex-col gap-5">
        <!-- Top Product Card -->
        <div class="bg-[#fefaf5] rounded-xl p-5 shadow-md hover:shadow-lg transition-all">
          <div class="text-sm font-medium text-gray-600 mb-1">Top Product</div>
          <h3 class="font-semibold text-lg mb-2">Edifier Stereo Bluetooth</h3>
          <div class="flex items-center gap-4">
            <img
              src="https://helios-i.mashable.com/imagery/articles/04NVF89pRb3ROhEvc1zz3QU/hero-image.fill.size_1200x900.v1762274812.png"
              alt="Edifier Headphones" class="w-20 h-20 object-contain rounded-lg bg-white p-1 shadow-sm">
            <div>
              <p class="text-[#e07a5f] font-bold">Shop Now →</p>
            </div>
          </div>
        </div>

        <!-- Clearance Card -->
        <div class="bg-[#f0fdfa] rounded-xl p-5 shadow-md hover:shadow-lg transition-all">
          <div class="text-sm font-medium text-gray-600 mb-1">Clearance</div>
          <h3 class="font-semibold text-lg mb-2">GoPro - Fusion 360 Save $70</h3>
          <div class="flex items-center gap-4">
            <img src="https://cdn.mos.cms.futurecdn.net/B8wSMxeqLipsscckdRhdFi.jpg" alt="GoPro Camera"
              class="w-20 h-20 object-contain rounded-lg bg-white p-1 shadow-sm">
            <div>
              <p class="text-[#e07a5f] font-bold">Shop Now →</p>
            </div>
          </div>
        </div>

        <!-- Featured Card -->
        <div class="bg-[#f0f9ff] rounded-xl p-5 shadow-md hover:shadow-lg transition-all">
          <div class="text-sm font-medium text-gray-600 mb-1">Featured</div>
          <h3 class="font-semibold text-lg mb-2">Apple Watch 4 Our Hottest Deals</h3>
          <div class="flex items-center gap-4">
            <img
              src="https://platform.theverge.com/wp-content/uploads/sites/2/chorus/uploads/chorus_asset/file/24980065/236765_Prime_Big_Deal_Days_LPham_2.jpg?quality=90&strip=all&crop=0%2C0%2C100%2C100&w=2400"
              alt="Apple Watch" class="w-20 h-20 object-contain rounded-lg bg-white p-1 shadow-sm">
            <div>
              <p class="text-[#e07a5f] font-bold">Shop Now →</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Most Popular Section - Compact & Styled like your reference screenshot -->
  <section class="max-w-7xl mx-auto px-6 py-12 bg-white">
    <div class="flex flex-col md:flex-row justify-between items-baseline mb-8">
      <h2 class="text-3xl md:text-4xl font-bold tracking-tight">Most Popular Products</h2>

      <div class="flex gap-8 md:gap-12 mt-4 md:mt-0 text-base font-medium text-gray-600">
        <button data-type="popular" class="tab-btn pb-1 border-b-2 border-[#f4a261] text-[#f4a261] font-semibold">
          Most Popular
        </button>

        <button data-type="sale" class="tab-btn pb-1 hover:text-[#f4a261] transition-colors">
          On Sale
        </button>

        <button data-type="top" class="tab-btn pb-1 hover:text-[#f4a261] transition-colors">
          Top Rated
        </button>
      </div>
    </div>

    <div id="productContainer" class="grid grid-cols-2 md:grid-cols-4 gap-6 lg:gap-8">

    </div>

    <!-- Optional: Dots / Pagination like in screenshot -->
    <div class="flex justify-center gap-3 mt-10">
      <div class="w-3 h-3 rounded-full bg-[#f4a261]"></div>
      <div class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 cursor-pointer"></div>
      <div class="w-3 h-3 rounded-full bg-gray-300 hover:bg-gray-400 cursor-pointer"></div>
    </div>
  </section>

  <!-- Gifting Occasions – Finished & Working Version -->
  <section class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8 py-16 bg-white">
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

          <div
            class="min-w-[280px] sm:min-w-[300px] lg:min-w-[320px] snap-start group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300 border border-gray-100">

            <div class="relative h-44 sm:h-48 overflow-hidden">

              <img src="{{ asset('storage/' . $occ->image) }}" alt="{{ $occ->title }}"
                class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">

              <div class="absolute inset-0 bg-gradient-to-t from-black/65 via-black/30 to-transparent"></div>

              <div class="absolute bottom-4 left-5 right-5 text-white">
                <span class="inline-block bg-amber-600 text-xs font-bold px-3 py-1 rounded-full mb-2">
                  Occasion
                </span>

                <h3 class="text-lg sm:text-xl font-bold leading-tight">
                  {{ $occ->title }}
                </h3>
              </div>
            </div>

            <div class="p-5 sm:p-6">
              <p class="text-sm text-gray-600 mb-4 line-clamp-2">
                {{ $occ->short_description }}
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


  <!-- FAQ -->
  <section class="max-w-4xl mx-auto px-6 py-24">
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
  </section>

  <!-- CONTACT FORM + NEWSLETTER -->
  <section id="contact-section" class="bg-[#f4f0e8] py-24">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-2 gap-16">
      <!-- Left: Company Intro + CTA -->
      <div>
        <h2 class="text-5xl font-bold tracking-tighter leading-none mb-8">Let's create something special for your brand
        </h2>
        <p class="text-[#6b635a] text-lg mb-10">Our team of gifting experts will help you choose the perfect combination
          that matches your budget and brand identity.</p>

        <div class="bg-white rounded-3xl p-8 shadow">
          <div class="flex gap-6">
            <div class="flex-1">
              <div class="text-[#2ec4b6] text-6xl font-bold">5000+</div>
              <div class="text-sm">Corporate clients served</div>
            </div>
            <div class="flex-1">
              <div class="text-[#e07a5f] text-6xl font-bold">98%</div>
              <div class="text-sm">Repeat business</div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right: Form -->
      <form onsubmit="submitForm(event)" class="bg-white rounded-3xl p-10 shadow-xl">
        <h3 class="font-semibold text-2xl mb-8">Get in touch today</h3>

        <div class="grid grid-cols-2 gap-6">
          <input type="text" placeholder="Your Name"
            class="border border-[#e0d6c7] focus:border-[#2ec4b6] rounded-2xl px-6 py-4">
          <input type="email" placeholder="Business Email"
            class="border border-[#e0d6c7] focus:border-[#2ec4b6] rounded-2xl px-6 py-4">
        </div>

        <input type="text" placeholder="Company Name"
          class="mt-6 w-full border border-[#e0d6c7] focus:border-[#2ec4b6] rounded-2xl px-6 py-4">

        <textarea placeholder="Tell us about your gifting requirement (budget, quantity, occasion)"
          class="mt-6 w-full h-40 border border-[#e0d6c7] focus:border-[#2ec4b6] rounded-3xl px-6 py-5 resize-none"></textarea>

        <button type="submit"
          class="mt-8 w-full bg-[#f4a261] hover:bg-[#e07a5f] transition-colors text-white font-semibold py-6 rounded-3xl">
          SEND MESSAGE — WE'LL REPLY IN 2 HOURS
        </button>
      </form>
    </div>
  </section>

  <!-- Our Partners / Trusted Brands Section -->
  <section class="bg-white py-16 border-t border-gray-100">
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
          <!-- Apple -->
          <div class="flex flex-col items-center min-w-[100px]">
            <img src="https://raw.githubusercontent.com/simple-icons/simple-icons/master/icons/apple.svg" alt="Apple"
              class="h-10 md:h-12 grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
          </div>

          <!-- Cello -->

          <div class="flex flex-col items-center min-w-[100px]">
            <img src="https://upload.wikimedia.org/wikipedia/commons/2/20/Adidas_Logo.svg" alt="Adidas"
              class="h-10 md:h-12 grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
          </div>


          <!-- Dubblin -->
          <div class="flex flex-col items-center min-w-[100px]">
            <div class="text-3xl md:text-4xl font-bold text-[#e07a5f] tracking-tight">DUBBLIN</div>
          </div>


          <!-- Safari -->
          <div class="flex flex-col items-center min-w-[100px]">
            <div class="text-3xl md:text-4xl font-bold text-[#f4a261] tracking-wider">SAFARI</div>
          </div>

          <!-- Milton -->
          <div class="flex flex-col items-center min-w-[100px]">
            <div class="text-3xl md:text-4xl font-bold text-[#2ec4b6] tracking-tight">MILTON</div>
          </div>
          <div class="flex flex-col items-center min-w-[100px]">
            <div class="text-2xl md:text-3xl font-bold text-gray-700">Cross</div>
          </div>
          <div class="flex flex-col items-center min-w-[100px]">
            <img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/38/Cello_World.svg/250px-Cello_World.svg.png"
              alt="Cello"
              class="h-10 md:h-12 grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
          </div>

          <!-- Bose -->
          <div class="flex flex-col items-center min-w-[100px]">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Bose_logo.svg" alt="Bose"
              class="h-9 md:h-11 grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
          </div>

          <div class="flex flex-col items-center min-w-[100px]">
            <img src="https://upload.wikimedia.org/wikipedia/commons/0/02/Swiss_Army_logo.svg" alt="Swiss Military"
              class="h-10 md:h-12 grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
          </div>


          <!-- Extra common partners (optional - you can remove if not needed) -->
          <div class="flex flex-col items-center min-w-[100px]">
            <img
              src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3e/Borosil_logo.svg/2560px-Borosil_logo.svg.png"
              alt="Borosil"
              class="h-10 md:h-12 grayscale opacity-80 hover:grayscale-0 hover:opacity-100 transition-all duration-300">
          </div>



        </div>
      </div>

      <!-- Optional subtle scroll hint for mobile -->
      <div class="text-center text-sm text-gray-400 mt-4 md:hidden">
        ← Scroll to see more partners →
      </div>
    </div>
  </section>

  </div>
  </section>



  <!-- Client Testimonials Reel – Portrait Video Style (Fixed: Balanced Fade, No Blank Space) -->
  <section class="bg-gradient-to-b from-white to-[#f9f7f3] py-16 md:py-20">
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

          <!-- Testimonial Card 1 – Portrait -->
          <div
            class="snap-start flex-shrink-0 w-[280px] sm:w-[320px] md:w-[360px] bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
            <div class="relative aspect-[9/16] overflow-hidden">
              <img
                src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=800&h=1200&dpr=2"
                alt="Client Reel" class="w-full h-full object-cover" loading="lazy">
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
            <div class="p-5 md:p-6">
              <p class="text-gray-700 text-sm md:text-base italic mb-4 leading-relaxed line-clamp-4">
                "The Diwali hampers were outstanding — premium quality, perfect customization, and delivered on time!"
              </p>
              <div class="flex items-center gap-3">
                <div
                  class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold text-sm md:text-base">
                  SK
                </div>
                <div>
                  <h4 class="font-semibold text-gray-900 text-sm md:text-base">Sanjay Kumar</h4>
                  <p class="text-xs md:text-sm text-gray-600">HR Head, Tech Mahindra</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Repeat similar portrait cards for more testimonials -->
          <!-- Card 2 -->
          <div
            class="snap-start flex-shrink-0 w-[280px] sm:w-[320px] md:w-[360px] bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
            <div class="relative aspect-[9/16] overflow-hidden">
              <img
                src="https://images.pexels.com/photos/3184292/pexels-photo-3184292.jpeg?auto=compress&cs=tinysrgb&w=800&h=1200&dpr=2"
                alt="Client Reel" class="w-full h-full object-cover" loading="lazy">
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
            <div class="p-5 md:p-6">
              <p class="text-gray-700 text-sm md:text-base italic mb-4 leading-relaxed line-clamp-4">
                "Excellent engraving and packaging — our clients were truly impressed!"
              </p>
              <div class="flex items-center gap-3">
                <div
                  class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold text-sm md:text-base">
                  RP
                </div>
                <div>
                  <h4 class="font-semibold text-gray-900 text-sm md:text-base">Riya Patel</h4>
                  <p class="text-xs md:text-sm text-gray-600">Marketing Lead, Deloitte India</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Add more portrait cards here as needed -->
          <!-- Card 3 -->
          <div
            class="snap-start flex-shrink-0 w-[280px] sm:w-[320px] md:w-[360px] bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
            <div class="relative aspect-[9/16] overflow-hidden">
              <img
                src="https://images.pexels.com/photos/3184292/pexels-photo-3184292.jpeg?auto=compress&cs=tinysrgb&w=800&h=1200&dpr=2"
                alt="Client Reel" class="w-full h-full object-cover" loading="lazy">
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
            <div class="p-5 md:p-6">
              <p class="text-gray-700 text-sm md:text-base italic mb-4 leading-relaxed line-clamp-4">
                "Excellent engraving and packaging — our clients were truly impressed!"
              </p>
              <div class="flex items-center gap-3">
                <div
                  class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold text-sm md:text-base">
                  RP
                </div>
                <div>
                  <h4 class="font-semibold text-gray-900 text-sm md:text-base">Riya Patel</h4>
                  <p class="text-xs md:text-sm text-gray-600">Marketing Lead, Deloitte India</p>
                </div>
              </div>
            </div>
          </div>
          <!-- Card 4 -->
          <div
            class="snap-start flex-shrink-0 w-[280px] sm:w-[320px] md:w-[360px] bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-300 group">
            <div class="relative aspect-[9/16] overflow-hidden">
              <img
                src="https://images.pexels.com/photos/3184292/pexels-photo-3184292.jpeg?auto=compress&cs=tinysrgb&w=800&h=1200&dpr=2"
                alt="Client Reel" class="w-full h-full object-cover" loading="lazy">
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
            <div class="p-5 md:p-6">
              <p class="text-gray-700 text-sm md:text-base italic mb-4 leading-relaxed line-clamp-4">
                "Excellent engraving and packaging — our clients were truly impressed!"
              </p>
              <div class="flex items-center gap-3">
                <div
                  class="w-10 h-10 md:w-12 md:h-12 rounded-full bg-gray-200 flex items-center justify-center text-gray-600 font-bold text-sm md:text-base">
                  RP
                </div>
                <div>
                  <h4 class="font-semibold text-gray-900 text-sm md:text-base">Riya Patel</h4>
                  <p class="text-xs md:text-sm text-gray-600">Marketing Lead, Deloitte India</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Mobile swipe hint -->
        <div class="text-center text-sm text-gray-500 mt-6 md:hidden">
          ← Swipe to watch more client stories →
        </div>
      </div>
    </div>

    <!-- Hide scrollbar -->

  </section>


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


        </div>
      </div>

    </div>
  </section>

  <script>

    document.addEventListener("DOMContentLoaded", function () {

      // Trigger default tab (Most Popular)
      const defaultTab = document.querySelector('.tab-btn[data-type="popular"]');

      if (defaultTab) {
        defaultTab.click(); // 🔥 auto load
      }

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


    document.querySelectorAll('.tab-btn').forEach(btn => {
      btn.addEventListener('click', function () {

        // UI active state (no design change)
        document.querySelectorAll('.tab-btn').forEach(b => {
          b.classList.remove('border-[#f4a261]', 'text-[#f4a261]', 'font-semibold');
        });

        this.classList.add('border-[#f4a261]', 'text-[#f4a261]', 'font-semibold');

        let type = this.getAttribute('data-type');

        fetch(`/products/filter?type=${type}`)
          .then(res => res.json())
          .then(data => {

            let html = '';

            data.forEach(product => {

              let category = product.categories?.[0]?.name ?? 'Corporate Gifts';

              html += `
                <div class="group bg-white rounded-xl overflow-hidden shadow-md hover:shadow-xl transition-all duration-300">

                    <div class="relative h-64 overflow-hidden">
                        <img src="/storage/${product.image}" 
                             class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">

                        ${product.new_arrival ? `
                        <div class="absolute top-3 right-3 bg-white/90 px-3 py-1 rounded-full text-xs font-medium shadow">
                            New
                        </div>` : ''}
                    </div>

                    <div class="p-5 text-center">
                        <p class="text-sm text-gray-500 mb-1">${category}</p>

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

            document.getElementById('productContainer').innerHTML = html;
          });
      });
    });
  </script>

@endsection