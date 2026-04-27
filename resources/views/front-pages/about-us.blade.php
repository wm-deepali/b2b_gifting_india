@extends('layouts.app')

@section('content')

    <section class="about-hero py-8 md:py-20">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <p class="text-lg text-gray-600 mb-4">Empowering Businesses • Creating Memorable Experiences</p>
            <h1 class="text-5xl md:text-6xl font-bold leading-tight text-gray-900 mb-6">
                About <span class="text-[#f4a261]">B2B</span><span class="text-[#2ec4b6]"> Gifts</span><span
                    class="text-[#e07a5f]"> India</span>
            </h1>
            <p class="max-w-3xl mx-auto text-xl text-gray-700">
    We create premium corporate gifting solutions that help businesses build stronger relationships, 
    enhance brand value, and leave lasting impressions on clients, employees, and partners.
</p>


            <div class="mt-10">
                <a href="javascript:void(0)" onclick="openGlobalDrawer('Speak With Our Expert', 'about_page')"
                    class="inline-block bg-gradient-to-r from-[#e07a5f] to-[#f4a261] text-white px-10 py-4 rounded-2xl font-semibold text-lg hover:shadow-xl transition-all">
                    Speak With Our Expert
                </a>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-8 md:py-24 bg-white border-t border-b">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-10 text-center">

                <div class="stats-card bg-white p-8 rounded-3xl shadow-sm">
                    <h3 class="text-2xl md:text-4xl font-bold text-[#f4a261] mb-2">500+</h3>
                    <p class="text-gray-600 font-medium">Happy Corporate Clients</p>
                </div>

                <div class="stats-card bg-white p-8 rounded-3xl shadow-sm">
                    <h3 class="text-2xl md:text-4xl font-bold text-[#2ec4b6] mb-2">1,25,000+</h3>
                    <p class="text-gray-600 font-medium">Gifts Delivered</p>
                </div>

                <div class="stats-card bg-white p-8 rounded-3xl shadow-sm">
                    <h3 class="text-2xl md:text-4xl font-bold text-[#e07a5f] mb-2">700+</h3>
                    <p class="text-gray-600 font-medium">Premium Products</p>
                </div>

                <div class="stats-card bg-white p-8 rounded-3xl shadow-sm">
                    <h3 class="text-2xl md:text-4xl font-bold text-gray-800 mb-2">100</h3>
                    <p class="text-gray-600 font-medium">Partners / Vendors</p>
                </div>

            </div>
        </div>
    </section>
    
   


    <section class="py-16 md:py-24 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Left Image -->
               <div class="relative">
    <div class="absolute -inset-4 bg-gradient-to-br from-[#f4a261]/10 to-[#2ec4b6]/10 rounded-3xl"></div>
    <img 
        src="{{ asset('images/aboutus-intro.webp') }}" 
        alt="B2b Gift India About Us"
        class="relative rounded-3xl shadow-2xl w-full h-full object-cover">
</div>

                <!-- Right Content -->
                <div>
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">Discover B2B Gifts India</h2>
                    <div class="space-y-6 text-lg text-gray-700 leading-relaxed">
                       
                       <p>
                            Our Giftech platform provides access to the next level corporate gifting, Sharing successful journey of over 5 years, 
                            we've been spreading joy and fostering connections through thoughtfully chosen Gifts.
                        </p>
                        <p>
                            Our goal is to offer you the finest selection of options that cater to your specific corporate needs for any occasion. 
We will closely collaborate with you to gain a comprehensive understanding of your choices, budget and timelines.
                        </p>
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
     <section class="w-full bg-[#f8f5f0] py-12 md:py-20 px-4 md:px-6">
  <div class="max-w-7xl mx-auto">

    <!-- Card -->
    <div class="bg-white rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 p-8 md:p-14 text-center md:text-left flex flex-col md:flex-row items-center justify-between gap-8">

      <!-- Left Content -->
      <div class="">
        <h2 class="text-2xl md:text-4xl font-semibold text-gray-900 leading-tight">
          Elevate Your Corporate Gifting Experience
        </h2>

      
        <p class="mt-4 md:mt-6 text-gray-600 text-sm md:text-lg leading-relaxed">
          We, as a Gift-Tech company, distinguish ourselves from others through our cutting-edge technological tools, 
including an E-commerce website, CRM system, and well-defined processes and policies. These elements shape our unique 
approach, vision, and mission, ensuring customer satisfaction, exceptional service, and a strong brand value..
        </p>
        <p>We efficiently handle a wide range of over 5000+ products & Serving a client base of over 400 plus corporate 
        and established corporate partnerships with more than 150 national and international brands across 18 major categories and 100 subcategories.
</p>
<p>To promote local trade, support local artisans, and contribute to the growth of the Indian economy, 
the majority of our products are manufactured in India. We are delighted to offer an exciting opportunity for brand partnerships.
</p>
<p>Reach us for extraordinary gifting experience. </p>        
      </div>

      <!-- Optional Button -->
      

    </div>

  </div>
</section>

    <!-- ==================== BRAND PROMISE SECTION ==================== -->
    <section class="py-16 md:py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-900 mb-4">Our Brand Promise</h2>
            <p class="text-gray-600 max-w-2xl mx-auto">
                We go beyond gifting — we deliver experiences that strengthen relationships, elevate your brand, and create lasting impressions.
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div
                class="brand-promise-card p-8 bg-white border border-gray-100 rounded-3xl hover:border-[#f4a261] transition-all group">
                <div
                    class="w-14 h-14 bg-[#f4a261]/10 text-[#f4a261] rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform">
                    ✨
                </div>
                <h3 class="font-semibold text-2xl mb-3">Premium Quality</h3>
                <p class="text-gray-600">
                    Carefully curated, high-quality products that reflect your brand standards and leave a lasting impression.
                </p>
            </div>

            <div
                class="brand-promise-card p-8 bg-white border border-gray-100 rounded-3xl hover:border-[#2ec4b6] transition-all group">
                <div
                    class="w-14 h-14 bg-[#2ec4b6]/10 text-[#2ec4b6] rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform">
                    🎨
                </div>
                <h3 class="font-semibold text-2xl mb-3">Creative Customization</h3>
                <p class="text-gray-600">
                    Tailored branding solutions including logo printing, engraving, and premium packaging to make every gift uniquely yours.
                </p>
            </div>

            <div
                class="brand-promise-card p-8 bg-white border border-gray-100 rounded-3xl hover:border-[#e07a5f] transition-all group">
                <div
                    class="w-14 h-14 bg-[#e07a5f]/10 text-[#e07a5f] rounded-2xl flex items-center justify-center text-3xl mb-6 group-hover:scale-110 transition-transform">
                    🤝
                </div>
                <h3 class="font-semibold text-2xl mb-3">Exceptional Service</h3>
                <p class="text-gray-600">
                    End-to-end support from consultation to delivery, ensuring a smooth, reliable, and hassle-free gifting experience.
                </p>
            </div>
        </div>
    </div>
</section>


    <!-- Vision & Mission -->
    <section class="py-8 md:py-24 bg-gray-50">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-10">

                <!-- Vision -->
<div class="bg-white p-4 md:p-10 rounded-3xl shadow-sm">
    <h2 class="text-3xl font-semibold mb-6 text-gray-800">Our Vision</h2>
    <p class="text-gray-700 leading-relaxed text-lg">
        To redefine corporate gifting by making it more meaningful, personalized, and result-driven — helping businesses create real impact through every gift they share.
    </p>
</div>

<!-- Mission -->
<div class="bg-white p-4 md:p-10 rounded-3xl shadow-sm">
    <h2 class="text-3xl font-semibold mb-6 text-gray-800">Our Mission</h2>
    <p class="text-gray-700 leading-relaxed text-lg">
        To provide reliable, high-quality, and customized gifting solutions with seamless execution — ensuring every order reflects our client’s brand and delivers a smooth, hassle-free experience from start to finish.
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
                <p class="text-gray-600 mt-3 text-lg">Passionate professionals dedicated to redefining corporate gifting in
                    India</p>
            </div>

            <div class="grid md:grid-cols-3 gap-4 md:gap-10">


                @foreach($teams as $team)
                    <div class="leadership-card bg-white border border-gray-100 rounded-3xl overflow-hidden shadow-sm">

                        <div class="h-80 bg-gray-200">
                            <img src="{{ $team->image ? asset('storage/' . $team->image) : 'https://via.placeholder.com/600x600' }}"
                                alt="{{ $team->name }}" class="w-full h-full object-cover">
                        </div>

                        <div class="p-8">
                            <h3 class="font-semibold text-2xl">
                                {{ $team->name }}
                            </h3>

                            <p class="text-[#f4a261] font-medium">
                                {{ $team->designation }}
                            </p>

                            <p class="mt-4 text-gray-600">
                                {{ $team->description }}
                            </p>
                        </div>

                    </div>
                @endforeach



            </div>
        </div>
    </section>

    <!-- Connecting Section -->
    <section class="py-8 md:py-24 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-5xl mx-auto px-6">
            <div class="bg-white rounded-3xl shadow-xl overflow-hidden">
                <div class="grid md:grid-cols-2">
                    <!-- Left Image -->
                    <div class="bg-gray-900 p-12 flex items-center justify-center">
    <img 
        src="{{ asset('images/aboutus-corporates.webp') }}" 
        alt="B2B Gifts India"
        class="max-w-full rounded-2xl shadow-2xl"
    >
</div>

                    <!-- Right Content -->
                    <div class="p-4 md:p-16 flex flex-col justify-center">
                        <h2 class="text-3xl font-semibold mb-6">Turn Every Gift into a Powerful Business Impression</h2>
<p class="text-gray-700 leading-relaxed text-lg">
    From employee appreciation to client engagement, we help you deliver thoughtful, 
    customized corporate gifts that truly stand out. Let’s create gifting experiences that strengthen relationships and elevate your brand.
</p>


                        <div class="mt-10 flex flex-col sm:flex-col gap-4">
                            <a href="#" class="px-8 py-4 bg-[#f4a261] text-white text-center rounded-2xl font-semibold">For
                                Corporates</a>
                            <a href="{{ route('products') }}"
                                class="px-8 py-4 border border-gray-300 text-center hover:border-[#f4a261] rounded-2xl font-semibold transition-colors">Explore
                                Our Collection</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



@endsection