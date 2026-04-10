@extends('layouts.app')

@section('content')


<section class="pt-8 pb-12 bg-gradient-to-b from-gray-50 to-white">
    <div class="max-w-4xl mx-auto px-6">
        
        <!-- Category & Date -->
        <div class="flex items-center gap-4 text-sm mb-6">
            <span class="bg-orange-100 text-[#f4a261] px-5 py-2 rounded-full font-medium">Corporate Trends</span>
            <span class="text-gray-500">• April 8, 2026</span>
            <span class="text-gray-500">• 8 min read</span>
        </div>

        <!-- Blog Title -->
        <h1 class="text-4xl md:text-5xl font-bold leading-tight text-gray-900 mb-8">
            Top 10 Corporate Gifting Trends for 2026 in India
        </h1>

        <!-- Author Info -->
        <div class="flex items-center gap-4">
            <div class="w-12 h-12 bg-gray-200 rounded-2xl overflow-hidden">
                <img src="https://plus.unsplash.com/premium_photo-1720744786849-a7412d24ffbf?q=80&w=809&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Author" class="w-full h-full object-cover">
            </div>
            <div>
                <p class="font-semibold text-gray-800">B2B Gifts India Team</p>
                <p class="text-sm text-gray-500">Marketing & Insights</p>
            </div>
        </div>
    </div>
</section>

<!-- Featured Image -->
<div class="max-w-5xl mx-auto px-6 -mt-6 relative z-10">
    <img src="https://plus.unsplash.com/premium_photo-1720744786849-a7412d24ffbf?q=80&w=809&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" 
         alt="Corporate Gifting Trends 2026" 
         class="w-full rounded-3xl shadow-2xl object-cover">
</div>

<!-- Main Content -->
<section class="max-w-4xl mx-auto px-6 py-16">
    <div class="blog-content prose prose-lg max-w-none">

        <p>As we step into 2026, corporate gifting in India is evolving rapidly. Companies are moving beyond traditional diaries and pens towards more meaningful, sustainable, and personalized gifting solutions.</p>

        <h2>1. Sustainability is No Longer Optional</h2>
        <p>Eco-friendly gifts made from bamboo, recycled materials, and organic cotton are seeing massive demand. Companies are actively choosing green gifts to align with their ESG goals.</p>

        <h2>2. Personalized Tech Gadgets</h2>
        <p>Wireless chargers, custom-engraved power banks, smart bottles, and noise-cancelling earbuds with company branding are becoming the new norm.</p>

        <h2>3. Experience-Based Gifting</h2>
        <p>Instead of physical products, many organizations are now gifting experiences like wellness sessions, online cooking classes, or adventure trips.</p>

        <h2>4. Local & Handcrafted Gifts</h2>
        <p>Supporting Indian artisans is gaining popularity. Gifts like Madhubani paintings, Dhokra art, and handwoven products are being widely appreciated by clients.</p>

        <h2>5. Health & Wellness Focused Gifts</h2>
        <p>Yoga mats, essential oil diffusers, fitness trackers, and premium immunity-boosting gift hampers are in high demand post-pandemic.</p>

        <!-- More Content -->
        <h3>Why These Trends Matter?</h3>
        <p>Corporate gifting is no longer just about giving a product — it's about conveying your brand values, appreciation, and building long-term relationships.</p>

        <ul>
            <li>Boosts employee and client engagement</li>
            <li>Enhances brand recall</li>
            <li>Shows that your company cares about sustainability and innovation</li>
        </ul>

        <h2>Conclusion</h2>
        <p>The future of corporate gifting in India lies in thoughtful, sustainable, and personalized solutions. At B2B Gifts India, we help businesses choose gifts that truly make an impact.</p>

    </div>

    <!-- Tags -->
    <div class="mt-12 flex flex-wrap gap-3">
        <span class="bg-gray-100 hover:bg-gray-200 transition-colors text-gray-700 px-5 py-2 rounded-3xl text-sm cursor-pointer">#CorporateGifting</span>
        <span class="bg-gray-100 hover:bg-gray-200 transition-colors text-gray-700 px-5 py-2 rounded-3xl text-sm cursor-pointer">#Sustainability</span>
        <span class="bg-gray-100 hover:bg-gray-200 transition-colors text-gray-700 px-5 py-2 rounded-3xl text-sm cursor-pointer">#EmployeeEngagement</span>
        <span class="bg-gray-100 hover:bg-gray-200 transition-colors text-gray-700 px-5 py-2 rounded-3xl text-sm cursor-pointer">#2026Trends</span>
    </div>

    <!-- Share Buttons -->
    <div class="mt-10 border-t border-gray-200 pt-8">
        <p class="text-gray-600 font-medium mb-4">Share this article</p>
        <div class="flex gap-5 text-3xl text-gray-400">
            <a href="#" class="share-btn"><i class="fa-brands fa-linkedin"></i></a>
            <a href="#" class="share-btn"><i class="fa-brands fa-twitter"></i></a>
            <a href="#" class="share-btn"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="share-btn"><i class="fa-brands fa-whatsapp"></i></a>
        </div>
    </div>
</section>

<!-- Related Articles -->
<section class="bg-gray-50 py-16">
    <div class="max-w-6xl mx-auto px-6">
        <h3 class="text-2xl font-semibold mb-8">Related Articles</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all">
                <img src="https://plus.unsplash.com/premium_photo-1720744786849-a7412d24ffbf?q=80&w=809&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="w-full h-44 object-cover">
                <div class="p-5">
                    <h4 class="font-semibold leading-tight mb-2">7 Best Employee Appreciation Gift Ideas for 2026</h4>
                    <p class="text-sm text-gray-500">March 25, 2026</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all">
                <img src="https://plus.unsplash.com/premium_photo-1720744786849-a7412d24ffbf?q=80&w=809&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="w-full h-44 object-cover">
                <div class="p-5">
                    <h4 class="font-semibold leading-tight mb-2">Why Companies Should Switch to Eco-Friendly Corporate Gifts</h4>
                    <p class="text-sm text-gray-500">March 12, 2026</p>
                </div>
            </div>

            <div class="bg-white rounded-2xl overflow-hidden shadow-sm hover:shadow-md transition-all">
                <img src="https://plus.unsplash.com/premium_photo-1720744786849-a7412d24ffbf?q=80&w=809&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="" class="w-full h-44 object-cover">
                <div class="p-5">
                    <h4 class="font-semibold leading-tight mb-2">Health & Wellness Gifts That Employees Actually Love</h4>
                    <p class="text-sm text-gray-500">February 28, 2026</p>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection