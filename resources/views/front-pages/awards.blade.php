@extends('layouts.app')

@section('content')

<section class="py-20 md:py-28 bg-gradient-to-br from-[#f8f4f0] to-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">
            Awards &amp; Recognition
        </h1>
        <p class="max-w-2xl mx-auto text-xl text-gray-600">
            Celebrating excellence in corporate gifting. Our commitment to quality, innovation, and customer satisfaction has been recognized by industry leaders.
        </p>
    </div>
</section>

<!-- Awards Grid -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">

            <!-- Award 1 -->
            <div class="award-card bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm">
                <div class="h-64 bg-gray-100 flex items-center justify-center p-8">
                    <img src="https://via.placeholder.com/400x300?text=Award+Logo+1" 
                         alt="Best Corporate Gifting Company 2025" 
                         class="max-h-full object-contain">
                </div>
                <div class="p-8">
                    <div class="award-year inline-block px-5 py-2 rounded-full text-sm mb-4">
                        2025
                    </div>
                    <h3 class="text-2xl font-semibold mb-3">Best Corporate Gifting Company of the Year</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Awarded by Indian Chamber of Commerce for outstanding contribution in premium corporate gifting and client satisfaction across India.
                    </p>
                </div>
            </div>

            <!-- Award 2 -->
            <div class="award-card bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm">
                <div class="h-64 bg-gray-100 flex items-center justify-center p-8">
                    <img src="https://via.placeholder.com/400x300?text=Award+Logo+2" 
                         alt="Excellence in Customization" 
                         class="max-h-full object-contain">
                </div>
                <div class="p-8">
                    <div class="award-year inline-block px-5 py-2 rounded-full text-sm mb-4">
                        2024
                    </div>
                    <h3 class="text-2xl font-semibold mb-3">Excellence in Customization & Innovation</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Recognized by Gift & Promo Association of India for exceptional creativity and customization capabilities in corporate gifting solutions.
                    </p>
                </div>
            </div>

            <!-- Award 3 -->
            <div class="award-card bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm">
                <div class="h-64 bg-gray-100 flex items-center justify-center p-8">
                    <img src="https://via.placeholder.com/400x300?text=Award+Logo+3" 
                         alt="Sustainability Award" 
                         class="max-h-full object-contain">
                </div>
                <div class="p-8">
                    <div class="award-year inline-block px-5 py-2 rounded-full text-sm mb-4">
                        2024
                    </div>
                    <h3 class="text-2xl font-semibold mb-3">Most Sustainable Gifting Brand</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Honored for promoting eco-friendly corporate gifts and commitment towards sustainable business practices across the industry.
                    </p>
                </div>
            </div>

            <!-- Award 4 -->
            <div class="award-card bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm">
                <div class="h-64 bg-gray-100 flex items-center justify-center p-8">
                    <img src="https://via.placeholder.com/400x300?text=Award+Logo+4" 
                         alt="Fastest Growing Company" 
                         class="max-h-full object-contain">
                </div>
                <div class="p-8">
                    <div class="award-year inline-block px-5 py-2 rounded-full text-sm mb-4">
                        2023
                    </div>
                    <h3 class="text-2xl font-semibold mb-3">Fastest Growing Corporate Gifting Company</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Awarded by Business Excellence Awards for rapid growth and expanding presence across 18+ cities in India.
                    </p>
                </div>
            </div>

            <!-- Award 5 -->
            <div class="award-card bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm">
                <div class="h-64 bg-gray-100 flex items-center justify-center p-8">
                    <img src="https://via.placeholder.com/400x300?text=Award+Logo+5" 
                         alt="Customer Choice Award" 
                         class="max-h-full object-contain">
                </div>
                <div class="p-8">
                    <div class="award-year inline-block px-5 py-2 rounded-full text-sm mb-4">
                        2023
                    </div>
                    <h3 class="text-2xl font-semibold mb-3">Customer Choice Award 2023</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Voted by our corporate clients for delivering exceptional service, quality products, and consistent timely delivery.
                    </p>
                </div>
            </div>

            <!-- Award 6 -->
            <div class="award-card bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm">
                <div class="h-64 bg-gray-100 flex items-center justify-center p-8">
                    <img src="https://via.placeholder.com/400x300?text=Award+Logo+6" 
                         alt="Emerging Brand Award" 
                         class="max-h-full object-contain">
                </div>
                <div class="p-8">
                    <div class="award-year inline-block px-5 py-2 rounded-full text-sm mb-4">
                        2022
                    </div>
                    <h3 class="text-2xl font-semibold mb-3">Emerging Brand of the Year</h3>
                    <p class="text-gray-600 leading-relaxed">
                        Recognized as one of the most promising new brands in the corporate gifting industry by India Retail Forum.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Bottom Message -->
<section class="py-16 bg-gray-50">
    <div class="max-w-4xl mx-auto px-6 text-center">
        <h2 class="text-3xl font-semibold mb-6 text-gray-800">
            Every Award Reflects Our Promise
        </h2>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto">
            These recognitions motivate us to continue delivering excellence in quality, creativity, and customer experience. 
            Thank you to all our clients and partners for trusting B2B Gifts India.
        </p>
    </div>
</section>


@endsection