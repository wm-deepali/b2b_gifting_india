@extends('layouts.app')

@section('content')

<section class="about-hero py-20 md:py-20">
    <div class="max-w-6xl mx-auto px-6 text-center">
        <p class="text-lg text-gray-600 mb-4">Empowering Businesses • Creating Memorable Experiences</p>
        <h1 class="text-5xl md:text-6xl font-bold leading-tight text-gray-900 mb-6">
            About <span class="text-[#f4a261]">B2B</span><span class="text-[#2ec4b6]"> Gifts</span><span class="text-[#e07a5f]"> India</span>
        </h1>
        <p class="max-w-3xl mx-auto text-xl text-gray-700">
            Premium corporate gifting solutions that help Indian businesses strengthen relationships, appreciate employees, 
            and create lasting impressions with clients and partners.
        </p>

        <div class="mt-10">
            <a href="#" 
               class="inline-block bg-gradient-to-r from-[#e07a5f] to-[#f4a261] text-white px-10 py-4 rounded-2xl font-semibold text-lg hover:shadow-xl transition-all">
                Speak With Our Expert
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-white border-t border-b">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">

            <div class="stats-card bg-white p-8 rounded-3xl shadow-sm">
                <h3 class="text-4xl font-bold text-[#f4a261] mb-2">5000+</h3>
                <p class="text-gray-600 font-medium">Happy Corporate Clients</p>
            </div>

            <div class="stats-card bg-white p-8 rounded-3xl shadow-sm">
                <h3 class="text-4xl font-bold text-[#2ec4b6] mb-2">1,25,000+</h3>
                <p class="text-gray-600 font-medium">Gifts Delivered</p>
            </div>

            <div class="stats-card bg-white p-8 rounded-3xl shadow-sm">
                <h3 class="text-4xl font-bold text-[#e07a5f] mb-2">350+</h3>
                <p class="text-gray-600 font-medium">Premium Products</p>
            </div>

            <div class="stats-card bg-white p-8 rounded-3xl shadow-sm">
                <h3 class="text-4xl font-bold text-gray-800 mb-2">18</h3>
                <p class="text-gray-600 font-medium">Cities Across India</p>
            </div>

        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="grid md:grid-cols-2 gap-10">

            <!-- Vision -->
            <div class="bg-white p-10 rounded-3xl shadow-sm">
                <h2 class="text-3xl font-semibold mb-6 text-gray-800">Our Vision</h2>
                <p class="text-gray-700 leading-relaxed text-lg">
                    To become India’s most trusted and preferred corporate gifting partner, known for premium quality, 
                    creative customization, and exceptional service that helps businesses build stronger relationships.
                </p>
            </div>

            <!-- Mission -->
            <div class="bg-white p-10 rounded-3xl shadow-sm">
                <h2 class="text-3xl font-semibold mb-6 text-gray-800">Our Mission</h2>
                <p class="text-gray-700 leading-relaxed text-lg">
                    To deliver thoughtful, high-quality, and beautifully crafted corporate gifts that create memorable moments 
                    and reflect the values of the organizations we serve.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- Leadership / Team -->
<section class="py-20 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900">Meet Our Leadership</h2>
            <p class="text-gray-600 mt-3 text-lg">Passionate professionals dedicated to redefining corporate gifting in India</p>
        </div>

        <div class="grid md:grid-cols-3 gap-10">

            <!-- Leader 1 -->
            <div class="leadership-card bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm">
                <div class="h-80 bg-gray-200">
                    <!-- Replace with real photo -->
                    <img src="https://via.placeholder.com/600x600?text=Founder" 
                         alt="Founder" class="w-full h-full object-cover">
                </div>
                <div class="p-8">
                    <h3 class="font-semibold text-2xl">Rahul Sharma</h3>
                    <p class="text-[#f4a261] font-medium">Founder & CEO</p>
                    <p class="mt-4 text-gray-600">
                        With over 12 years in the gifting industry, Rahul is passionate about creating meaningful connections through premium corporate gifts.
                    </p>
                </div>
            </div>

            <!-- Leader 2 -->
            <div class="leadership-card bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm">
                <div class="h-80 bg-gray-200">
                    <img src="https://via.placeholder.com/600x600?text=Director" 
                         alt="Director" class="w-full h-full object-cover">
                </div>
                <div class="p-8">
                    <h3 class="font-semibold text-2xl">Priya Malhotra</h3>
                    <p class="text-[#2ec4b6] font-medium">Director - Operations</p>
                    <p class="mt-4 text-gray-600">
                        Priya ensures seamless execution of every order with her expertise in supply chain and customer experience.
                    </p>
                </div>
            </div>

            <!-- Leader 3 -->
            <div class="leadership-card bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm">
                <div class="h-80 bg-gray-200">
                    <img src="https://via.placeholder.com/600x600?text=Creative+Head" 
                         alt="Creative Head" class="w-full h-full object-cover">
                </div>
                <div class="p-8">
                    <h3 class="font-semibold text-2xl">Arjun Verma</h3>
                    <p class="text-[#e07a5f] font-medium">Creative & Customization Head</p>
                    <p class="mt-4 text-gray-600">
                        Arjun leads our design and customization team, turning ideas into beautiful branded gifts.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Connecting Section -->
<section class="py-20 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
            <div class="grid md:grid-cols-2">
                <!-- Left Image -->
                <div class="bg-gray-900 p-12 flex items-center justify-center">
                    <img src="https://via.placeholder.com/600x500?text=Corporate+Gifting+India" 
                         alt="B2B Gifts India" 
                         class="max-w-full rounded-2xl shadow-2xl">
                </div>

                <!-- Right Content -->
                <div class="p-12 md:p-16 flex flex-col justify-center">
                    <h2 class="text-3xl font-semibold mb-6">Connecting Businesses Through Thoughtful Gifting</h2>
                    <p class="text-gray-700 leading-relaxed text-lg">
                        At B2B Gifts India, we believe every gift tells a story. We help organizations express gratitude, celebrate milestones, 
                        and strengthen professional relationships with carefully curated corporate gifts.
                    </p>

                    <div class="mt-10 flex gap-4">
                        <a href="#" class="px-8 py-4 bg-[#f4a261] text-white rounded-2xl font-semibold">For Corporates</a>
                        <a href="#" class="px-8 py-4 border border-gray-300 hover:border-[#f4a261] rounded-2xl font-semibold transition-colors">Explore Our Collection</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection