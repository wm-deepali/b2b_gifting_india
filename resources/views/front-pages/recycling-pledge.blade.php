@extends('layouts.app')


@section('content')


<section class="about-hero py-20 md:py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <p class="text-lg text-gray-600 mb-4">Sustainable Gifting • Responsible Choices • Better Impact</p>
        <h1 class="text-5xl md:text-6xl font-bold leading-tight text-gray-900 mb-6">
            Eco-Friendly <span class="text-[#f4a261]">Corporate</span><span class="text-[#2ec4b6]"> Gifting</span><span class="text-[#e07a5f]"> Solutions</span>
        </h1>
        <p class="max-w-3xl mx-auto text-xl text-gray-700">
            We help businesses make a positive impact with sustainable corporate gifts crafted from eco-conscious materials — combining thoughtful gifting with environmental responsibility.
        </p>

        <div class="mt-10">
           <a href="javascript:void(0)" onclick="openGlobalDrawer('Speak With Our Expert', 'recycling_pledge_page')"
               class="inline-block bg-gradient-to-r from-[#e07a5f] to-[#f4a261] text-white px-10 py-4 rounded-2xl font-semibold text-lg hover:shadow-xl transition-all">
                Speak With Our Expert
            </a>
        </div>
    </div>
</section>


<!-- ==================== ABOUT US SECTION ==================== -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <!-- Left Side - Image -->
            <div class="relative">
              
                <img src="{{ asset('images/recycling-pledge.webp') }}" 
                     alt="B2B Gifts India Team" 
                     class="rounded-3xl shadow-2xl w-full">
                
                <!-- Overlay Badge -->
                <div class="absolute -bottom-6 -right-6 bg-white rounded-3xl shadow-xl p-6 max-w-[220px]">
                    <div class="flex items-center gap-4">
                        <div class="w-12 h-12 bg-[#f4a261] text-white rounded-2xl flex items-center justify-center text-3xl">🎁</div>
                        <div>
                            <p class="font-semibold text-gray-800">Since 2020</p>
                            <p class="text-sm text-gray-500">Elevating Corporate Gifting Experiences</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Side - Content -->
            <div class="space-y-8">
                <div>
    <span class="uppercase tracking-widest text-sm font-medium text-[#f4a261]">Our Pledge</span>
    <h2 class="text-4xl font-bold text-gray-900 mt-3 leading-tight">
    Thoughtful Gifting with <span class="text-[#f4a261]">Quality & Precision</span>
</h2>

</div>

<p class="text-gray-600 text-lg leading-relaxed">
    We deliver high-quality, customized corporate gifts that reflect your brand, with a focus on reliability and seamless execution.
</p>

<ul class="list-disc pl-6 space-y-4 text-gray-600 text-lg leading-relaxed">
    <li>
        Promoting responsible waste management by encouraging proper segregation of recyclable and non-recyclable materials.
    </li>
    <li>
        Staying aligned with local recycling guidelines and continuously improving our processes to ensure effective sustainability practices.
    </li>
    <li>
        Reducing waste through conscious efforts such as reusing materials, optimizing packaging, and minimizing unnecessary consumption.
    </li>
    <li>
        Prioritizing eco-friendly, sustainable, and recyclable products within our corporate gifting solutions.
    </li>
    <li>
        Encouraging awareness among clients and partners about responsible gifting and environmentally conscious choices.
    </li>
    <li>
        Supporting sustainable initiatives, including recycling programs and community-driven environmental efforts.
    </li>
    <li>
        Continuously evolving by adopting better practices, materials, and innovations that contribute to a greener future.
    </li>
</ul>


             <!--   <div class="grid grid-cols-2 gap-8">
                    <div>
                        <h4 class="font-semibold text-xl text-gray-800 mb-2">Our Mission</h4>
                        <p class="text-gray-600">
                            To deliver thoughtful, high-quality and perfectly customized gifts that create lasting impressions and strengthen business relationships.
                        </p>
                    </div>
                    <div>
                        <h4 class="font-semibold text-xl text-gray-800 mb-2">Our Vision</h4>
                        <p class="text-gray-600">
                            To become India’s most preferred corporate gifting partner, known for excellence, innovation and unmatched customer experience.
                        </p>
                    </div>
                </div> -->

                <div class="pt-6">
                    <a href="#" 
                       class="inline-flex items-center gap-3 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white px-8 py-4 rounded-2xl font-semibold hover:shadow-lg transition-all">
                        Know Our Journey
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>

                <!-- Trust Signals -->
              <!--  <div class="flex items-center gap-10 pt-8 border-t">
                    <div>
                        <p class="text-3xl font-bold text-gray-800">5000+</p>
                        <p class="text-sm text-gray-500">Happy Clients</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-gray-800">1.25 Lakh+</p>
                        <p class="text-sm text-gray-500">Gifts Delivered</p>
                    </div>
                    <div>
                        <p class="text-3xl font-bold text-gray-800">18</p>
                        <p class="text-sm text-gray-500">Cities Served</p>
                    </div>
                </div> -->
            </div>

        </div>
    </div>
</section>

<!-- ==================== BRAND PROMISE SECTION ==================== -->
<section class="relative py-24 md:py-32 bg-cover bg-center bg-no-repeat" 
         style="background-image: url('https://images.unsplash.com/photo-1511795409834-ef04bbd61622');">
    
    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-black/60"></div>

    <div class="relative max-w-7xl mx-auto px-6">
        
        <!-- Centered Card -->
        <div class="max-w-3xl mx-auto bg-white rounded-3xl shadow-2xl p-12 md:p-16 text-center">
            
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 leading-tight mb-8">
    Our Sustainability Commitment
</h2>

<p class="text-lg md:text-xl text-gray-700 leading-relaxed">
    We believe corporate gifting should not only create meaningful impressions but also contribute responsibly to the environment. 
    At <span class="font-semibold text-[#f4a261]">B2B Gifts India</span>, we are committed to promoting sustainable practices by 
    offering eco-friendly solutions and encouraging conscious gifting choices that support a greener future.
</p>


            <!-- Decorative Line -->
            <div class="w-24 h-1 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] mx-auto mt-10 rounded-full"></div>
        </div>

    </div>
</section>



@endsection