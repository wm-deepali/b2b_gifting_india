@extends('layouts.app')


@section('content')

<section class="py-20 md:py-28 bg-gradient-to-br from-[#f8f4f0] to-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6 leading-tight">
            Why Choose <span class="text-[#f4a261]">B2B</span><span class="text-[#2ec4b6]"> Gifts</span><span class="text-[#e07a5f]"> India</span>
        </h1>
        <p class="max-w-3xl mx-auto text-xl text-gray-600">
            We don’t just sell gifts — we help you create meaningful connections and lasting impressions.
        </p>
    </div>
</section>

<!-- Key Benefits Grid -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Benefit 1 -->
            <div class="why-card bg-white border border-gray-100 rounded-3xl p-10">
                <div class="benefit-icon mb-6 text-4xl">🎨</div>
                <h3 class="text-2xl font-semibold mb-4">Premium Quality & Customization</h3>
                <p class="text-gray-600 leading-relaxed">
                    Every product is carefully selected for superior quality. We offer extensive customization options — laser engraving, printing, embroidery, and more — to make your brand shine.
                </p>
            </div>

            <!-- Benefit 2 -->
            <div class="why-card bg-white border border-gray-100 rounded-3xl p-10">
                <div class="benefit-icon mb-6 text-4xl">🚚</div>
                <h3 class="text-2xl font-semibold mb-4">Fast & Reliable Delivery</h3>
                <p class="text-gray-600 leading-relaxed">
                    On-time delivery across India. Standard orders delivered in 7–12 days. Urgent requirements handled with express delivery options.
                </p>
            </div>

            <!-- Benefit 3 -->
            <div class="why-card bg-white border border-gray-100 rounded-3xl p-10">
                <div class="benefit-icon mb-6 text-4xl">🌱</div>
                <h3 class="text-2xl font-semibold mb-4">Eco-Friendly Options</h3>
                <p class="text-gray-600 leading-relaxed">
                    Wide range of sustainable and environmentally responsible gifts made from bamboo, recycled materials, and organic fabrics.
                </p>
            </div>

            <!-- Benefit 4 -->
            <div class="why-card bg-white border border-gray-100 rounded-3xl p-10">
                <div class="benefit-icon mb-6 text-4xl">💰</div>
                <h3 class="text-2xl font-semibold mb-4">Best Value for Money</h3>
                <p class="text-gray-600 leading-relaxed">
                    Competitive pricing with no compromise on quality. Bulk order discounts and seasonal offers make us the smartest choice for corporates.
                </p>
            </div>

            <!-- Benefit 5 -->
            <div class="why-card bg-white border border-gray-100 rounded-3xl p-10">
                <div class="benefit-icon mb-6 text-4xl">🛡️</div>
                <h3 class="text-2xl font-semibold mb-4">100% Satisfaction Guarantee</h3>
                <p class="text-gray-600 leading-relaxed">
                    We stand behind every gift we deliver. Dedicated support team to resolve any issues quickly and professionally.
                </p>
            </div>

            <!-- Benefit 6 -->
            <div class="why-card bg-white border border-gray-100 rounded-3xl p-10">
                <div class="benefit-icon mb-6 text-4xl">🤝</div>
                <h3 class="text-2xl font-semibold mb-4">Dedicated Corporate Support</h3>
                <p class="text-gray-600 leading-relaxed">
                    Personal account manager for large orders, artwork approval process, and complete assistance from selection to delivery.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- Trust Signals -->
<section class="py-16 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-semibold text-gray-800">Trusted by Leading Indian Companies</h2>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 opacity-75">
            <div class="text-center font-medium text-gray-500">Tata Group</div>
            <div class="text-center font-medium text-gray-500">Reliance</div>
            <div class="text-center font-medium text-gray-500">HDFC Bank</div>
            <div class="text-center font-medium text-gray-500">Infosys</div>
            <div class="text-center font-medium text-gray-500">Aditya Birla</div>
            <div class="text-center font-medium text-gray-500">Mahindra</div>
            <div class="text-center font-medium text-gray-500">ICICI Bank</div>
            <div class="text-center font-medium text-gray-500">Wipro</div>
        </div>
    </div>
</section>

<!-- Final CTA -->
<section class="py-20 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready to Gift Smarter?</h2>
        <p class="text-xl mb-10 opacity-90">
            Let us help you choose the perfect corporate gifts that reflect your brand values and strengthen your relationships.
        </p>
        <div class="flex flex-col sm:flex-row gap-5 justify-center">
            <a href="#" 
               class="px-10 py-5 bg-white text-[#e07a5f] font-semibold rounded-2xl text-lg hover:bg-gray-100 transition-all">
                Browse Our Collection
            </a>
            <a href="#" 
               class="px-10 py-5 border-2 border-white font-semibold rounded-2xl text-lg hover:bg-white hover:text-[#e07a5f] transition-all">
                Get a Custom Quote
            </a>
        </div>
    </div>
</section>


@endsection