@extends('layouts.app')

@section('content')


<section class="hero-bg py-24 md:py-32">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <p class="uppercase tracking-widest text-sm font-medium text-gray-500 mb-4">
            Premium Corporate Solutions
        </p>
        <h1 class="text-5xl md:text-6xl font-bold leading-tight text-gray-900 mb-6">
            Our Membership Plans
        </h1>
        <p class="max-w-3xl mx-auto text-xl text-gray-600">
            Choose the perfect membership that suits your corporate gifting needs. From occasional orders to enterprise-level solutions — we have a plan for every business.
        </p>

        <div class="mt-12">
            <a href="#" 
               class="inline-block bg-gradient-to-r from-[#e07a5f] to-[#f4a261] text-white px-10 py-4 rounded-2xl font-semibold text-lg hover:shadow-xl transition-all">
                Compare All Plans
            </a>
        </div>
    </div>
</section>

<!-- How We Create Value -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid md:grid-cols-12 gap-12 items-center">

            <!-- Left Content -->
            <div class="md:col-span-5">
                <div class="bg-gray-900 text-white p-10 rounded-3xl h-full">
                    <h2 class="text-3xl font-semibold mb-6">Connecting Businesses Through Thoughtful Gifting</h2>
                    <p class="text-gray-300 leading-relaxed">
                        We help companies build stronger relationships with employees and clients through premium, customized corporate gifts. 
                        Our membership plans are designed to make gifting seamless, cost-effective, and impactful.
                    </p>
                </div>
            </div>

            <!-- Right Value Points -->
            <div class="md:col-span-7 space-y-6">

                <div class="flex gap-6 bg-white p-7 rounded-3xl shadow-sm service-card">
                    <div class="card-number w-10 h-10 flex-shrink-0 rounded-2xl flex items-center justify-center text-lg">01</div>
                    <div>
                        <h3 class="font-semibold text-xl mb-2">Flexible Gifting Solutions</h3>
                        <p class="text-gray-600">Choose from one-time orders or enjoy priority access with our membership plans.</p>
                    </div>
                </div>

                <div class="flex gap-6 bg-white p-7 rounded-3xl shadow-sm service-card">
                    <div class="card-number w-10 h-10 flex-shrink-0 rounded-2xl flex items-center justify-center text-lg">02</div>
                    <div>
                        <h3 class="font-semibold text-xl mb-2">Exclusive Discounts & Benefits</h3>
                        <p class="text-gray-600">Members get up to 25% off on bulk orders, free customization, and priority support.</p>
                    </div>
                </div>

                <div class="flex gap-6 bg-white p-7 rounded-3xl shadow-sm service-card">
                    <div class="card-number w-10 h-10 flex-shrink-0 rounded-2xl flex items-center justify-center text-lg">03</div>
                    <div>
                        <h3 class="font-semibold text-xl mb-2">Dedicated Account Manager</h3>
                        <p class="text-gray-600">Get personalized assistance for all your gifting needs throughout the year.</p>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- Membership Plans Cards -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900">Choose Your Membership</h2>
            <p class="text-gray-600 mt-3 text-lg">Three plans designed for different business needs</p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <!-- Basic Plan -->
            <div class="service-card bg-white rounded-3xl p-8 text-center">
                <h3 class="text-2xl font-semibold mb-2">Starter</h3>
                <p class="text-[#f4a261] font-medium mb-6">Occasional Gifting</p>
                <div class="text-5xl font-bold text-gray-800 mb-1">₹15,000</div>
                <p class="text-sm text-gray-500 mb-8">per year</p>

                <ul class="text-left space-y-4 mb-10 text-gray-600">
                    <li>✓ Up to 5 bulk orders per year</li>
                    <li>✓ Standard customization</li>
                    <li>✓ 10% discount on orders</li>
                    <li>✓ Email support</li>
                </ul>

                <a href="#" class="block w-full py-4 border-2 border-[#f4a261] text-[#f4a261] rounded-2xl font-semibold hover:bg-[#f4a261] hover:text-white transition-all">
                    Choose Starter
                </a>
            </div>

            <!-- Premium Plan (Most Popular) -->
            <div class="service-card bg-white rounded-3xl p-8 text-center ring-2 ring-[#f4a261] relative">
                <div class="absolute -top-4 left-1/2 -translate-x-1/2 bg-[#f4a261] text-white text-xs font-bold px-6 py-1.5 rounded-full">
                    MOST POPULAR
                </div>
                <h3 class="text-2xl font-semibold mb-2">Premium</h3>
                <p class="text-[#2ec4b6] font-medium mb-6">Regular Corporate Gifting</p>
                <div class="text-5xl font-bold text-gray-800 mb-1">₹45,000</div>
                <p class="text-sm text-gray-500 mb-8">per year</p>

                <ul class="text-left space-y-4 mb-10 text-gray-600">
                    <li>✓ Unlimited orders</li>
                    <li>✓ Free premium customization</li>
                    <li>✓ 20% discount on all orders</li>
                    <li>✓ Dedicated account manager</li>
                    <li>✓ Priority delivery</li>
                </ul>

                <a href="#" class="block w-full py-4 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white rounded-2xl font-semibold">
                    Choose Premium
                </a>
            </div>

            <!-- Enterprise Plan -->
            <div class="service-card bg-white rounded-3xl p-8 text-center">
                <h3 class="text-2xl font-semibold mb-2">Enterprise</h3>
                <p class="text-[#e07a5f] font-medium mb-6">Large Organizations</p>
                <div class="text-5xl font-bold text-gray-800 mb-1">Custom</div>
                <p class="text-sm text-gray-500 mb-8">Tailored for you</p>

                <ul class="text-left space-y-4 mb-10 text-gray-600">
                    <li>✓ Everything in Premium</li>
                    <li>✓ Custom branding solutions</li>
                    <li>✓ API integration</li>
                    <li>✓ Monthly gifting calendar</li>
                    <li>✓ On-site support</li>
                </ul>

                <a href="#" class="block w-full py-4 border-2 border-gray-300 text-gray-700 rounded-2xl font-semibold hover:border-gray-400 transition-all">
                    Contact Sales
                </a>
            </div>

        </div>
    </div>
</section>

@endsection