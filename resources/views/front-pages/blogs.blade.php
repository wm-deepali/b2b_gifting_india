@extends('layouts.app')

@section('content')

<section class="py-16 md:py-24 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        
        <!-- Section Header -->
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-3">
                Latest from <span class="text-[#f4a261]">B2B</span><span class="text-[#2ec4b6]"> Gifts</span><span class="text-[#e07a5f]"> India</span>
            </h2>
            <p class="text-gray-600 max-w-2xl mx-auto text-lg">
                Insights, trends, and ideas to help your business choose the perfect corporate gifts
            </p>
        </div>

        <!-- Blog Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- Blog Card 1 -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="h-56 bg-gray-200 overflow-hidden">
                    <img src="https://plus.unsplash.com/premium_photo-1720744786849-a7412d24ffbf?q=80&w=809&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                         alt="Corporate Gifting Trends" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 text-xs text-gray-500 mb-3">
                        <span class="bg-orange-100 text-[#f4a261] px-3 py-1 rounded-full">Trends</span>
                        <span>April 8, 2026</span>
                    </div>
                    <h3 class="text-xl font-semibold leading-tight mb-3 line-clamp-2 group-hover:text-[#f4a261] transition-colors">
                        Top 10 Corporate Gifting Trends for 2026 in India
                    </h3>
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                        From sustainable gifts to personalized tech gadgets — discover what Indian companies are gifting this year.
                    </p>
                    <a href="#" class="inline-flex items-center text-[#f4a261] font-medium hover:text-[#e07a5f] transition-colors">
                        Read Article →
                    </a>
                </div>
            </div>

            <!-- Blog Card 2 -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="h-56 bg-gray-200 overflow-hidden">
                    <img src="https://plus.unsplash.com/premium_photo-1720744786849-a7412d24ffbf?q=80&w=809&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                         alt="Employee Appreciation" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 text-xs text-gray-500 mb-3">
                        <span class="bg-cyan-100 text-[#2ec4b6] px-3 py-1 rounded-full">HR Tips</span>
                        <span>March 25, 2026</span>
                    </div>
                    <h3 class="text-xl font-semibold leading-tight mb-3 line-clamp-2 group-hover:text-[#f4a261] transition-colors">
                        7 Thoughtful Employee Appreciation Gift Ideas That Actually Work
                    </h3>
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                        Boost morale and retention with meaningful gifts that show you truly value your team.
                    </p>
                    <a href="#" class="inline-flex items-center text-[#f4a261] font-medium hover:text-[#e07a5f] transition-colors">
                        Read Article →
                    </a>
                </div>
            </div>

            <!-- Blog Card 3 -->
            <div class="group bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-300 border border-gray-100">
                <div class="h-56 bg-gray-200 overflow-hidden">
                    <img src="https://plus.unsplash.com/premium_photo-1720744786849-a7412d24ffbf?q=80&w=809&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
                         alt="Eco Friendly Gifts" 
                         class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                </div>
                <div class="p-6">
                    <div class="flex items-center gap-3 text-xs text-gray-500 mb-3">
                        <span class="bg-emerald-100 text-emerald-600 px-3 py-1 rounded-full">Sustainability</span>
                        <span>March 12, 2026</span>
                    </div>
                    <h3 class="text-xl font-semibold leading-tight mb-3 line-clamp-2 group-hover:text-[#f4a261] transition-colors">
                        Why Eco-Friendly Corporate Gifts Are the Future in India
                    </h3>
                    <p class="text-gray-600 text-sm line-clamp-3 mb-4">
                        How going green with your corporate gifting strategy can improve brand image and client relationships.
                    </p>
                    <a href="#" class="inline-flex items-center text-[#f4a261] font-medium hover:text-[#e07a5f] transition-colors">
                        Read Article →
                    </a>
                </div>
            </div>

        </div>

        <!-- View All Button -->
        <div class="text-center mt-12">
            <a href="#" 
               class="inline-flex items-center gap-3 bg-gradient-to-r from-[#f4a261] to-[#e07a5f] text-white px-8 py-4 rounded-2xl font-semibold hover:shadow-lg transition-all hover:scale-105">
                View All Articles 
                <i class="fa-solid fa-arrow-right"></i>
            </a>
        </div>

    </div>
</section>



@endsection