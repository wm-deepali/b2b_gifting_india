@extends('layouts.app')


<style>
    .trusted-brand::-webkit-scrollbar{
        display:none;
    }
</style>
@section('content')

<section class="py-8 md:py-28 bg-gradient-to-br from-[#f8f4f0] to-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
    <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
        Why Choose <span class="text-[#f4a261]">B2B</span><span class="text-[#2ec4b6]"> Gifts</span><span class="text-[#e07a5f]"> India</span>
    </h1>
    <p class="max-w-3xl mx-auto text-xl text-gray-600">
        From premium product selection to seamless customization and reliable delivery, we provide end-to-end 
        corporate gifting solutions designed to save your time and elevate your brand.
    </p>
</div>

</section>

<!-- Key Benefits Grid -->
<section class="py-8 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Benefit 1 -->
<div class="why-card bg-white border border-gray-100 rounded-3xl p-4 md:p-10">
    <div class="benefit-icon mb-6 text-4xl">🎨</div>
    <h3 class="text-2xl font-semibold mb-4">Premium Quality & Customization</h3>
    <p class="text-gray-600 leading-relaxed">
        We offer meticulously curated products that meet high-quality standards, complemented by advanced customization options such as laser engraving, precision printing, and bespoke branding solutions.
    </p>
</div>

<!-- Benefit 2 -->
<div class="why-card bg-white border border-gray-100 rounded-3xl p-4 md:p-10">
    <div class="benefit-icon mb-6 text-4xl">🚚</div>
    <h3 class="text-2xl font-semibold mb-4">Efficient & Reliable Delivery</h3>
    <p class="text-gray-600 leading-relaxed">
        Our streamlined logistics ensure timely and dependable delivery across India, with the flexibility to accommodate urgent requirements through expedited processing.
    </p>
</div>

<!-- Benefit 3 -->
<div class="why-card bg-white border border-gray-100 rounded-3xl p-4 md:p-10">
    <div class="benefit-icon mb-6 text-4xl">🌱</div>
    <h3 class="text-2xl font-semibold mb-4">Sustainable Gifting Solutions</h3>
    <p class="text-gray-600 leading-relaxed">
        We offer a thoughtfully curated range of eco-conscious products crafted from sustainable materials, enabling your brand to align with responsible and environmentally mindful practices.
    </p>
</div>

<!-- Benefit 4 -->
<div class="why-card bg-white border border-gray-100 rounded-3xl p-4 md:p-10">
    <div class="benefit-icon mb-6 text-4xl">💰</div>
    <h3 class="text-2xl font-semibold mb-4">Cost-Effective Value</h3>
    <p class="text-gray-600 leading-relaxed">
        We deliver optimal value through competitive pricing structures, ensuring high-quality gifting solutions without compromising on standards, especially for bulk and recurring requirements.
    </p>
</div>

<!-- Benefit 5 -->
<div class="why-card bg-white border border-gray-100 rounded-3xl p-4 md:p-10">
    <div class="benefit-icon mb-6 text-4xl">🛡️</div>
    <h3 class="text-2xl font-semibold mb-4">Quality Assurance & Support</h3>
    <p class="text-gray-600 leading-relaxed">
        Every order undergoes strict quality checks, supported by a responsive team committed to addressing concerns promptly and ensuring a smooth client experience.
    </p>
</div>

<!-- Benefit 6 -->
<div class="why-card bg-white border border-gray-100 rounded-3xl p-4 md:p-10">
    <div class="benefit-icon mb-6 text-4xl">🤝</div>
    <h3 class="text-2xl font-semibold mb-4">Dedicated Corporate Assistance</h3>
    <p class="text-gray-600 leading-relaxed">
        We provide end-to-end support with structured coordination, including requirement consultation, artwork approvals, and seamless execution from product selection to final delivery.
    </p>
</div>


        </div>
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
    Backed by a strong vendor network, we ensure access to quality products, 
    efficient sourcing, and consistent delivery for all your corporate gifting requirements.
</p>


        <!-- Logo Trail -->
        <div class="overflow-x-auto scrollbar-hide trusted-brand">
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

<!-- Final CTA -->
<section class="py-20 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready to Gift Smarter?</h2>
        <p class="text-xl mb-10 opacity-90">
            Let us help you choose the perfect corporate gifts that reflect your brand values and strengthen your relationships.
        </p>
        <div class="flex flex-col sm:flex-row gap-5 justify-center">
            <a href="{{ route('products') }}" 
               class="px-10 py-5 bg-white text-[#e07a5f] font-semibold rounded-2xl text-lg hover:bg-gray-100 transition-all">
                Browse Our Collection
            </a>
            <a href="javascript:void(0)" onclick="openGlobalDrawer('Get a Custom Quote', 'why_us_page')"
               class="px-10 py-5 border-2 border-white font-semibold rounded-2xl text-lg hover:bg-white hover:text-[#e07a5f] transition-all">
                Get a Custom Quote
            </a>
        </div>
    </div>
</section>


@endsection