@extends('layouts.app')

@section('content')


<div class="max-w-7xl mx-auto px-6 py-12">

    <div class="grid lg:grid-cols-2 gap-12">

        <!-- ==================== LEFT: IMAGE SLIDER ==================== -->
        <div>

            <!-- Main Slider -->
            <div class="product-slider h-[520px] bg-gray-100 relative" id="mainSlider">
                <img src="https://b2bgiftsindia.com/b2bcrm/category/2387/2b560048ca5ec8eb75568e4f4f2bd999.jpg" 
                     class="slide active w-full h-full object-cover" alt="Leather Diary 1">
                <img src="https://b2bgiftsindia.com/b2bcrm/category/2391/73e38095fa9b1e7e8e5ecd7f45e9bf4b.jpg" 
                     class="slide w-full h-full object-cover" alt="Leather Diary 2">
                <img src="https://b2bgiftsindia.com/b2bcrm/category/2394/4e817f617204a854b853b9aefca0cd9f.jpg" 
                     class="slide w-full h-full object-cover" alt="Leather Diary 3">
            </div>

            <!-- Thumbnail Strip -->
            <div class="flex gap-4 mt-6">
                <img onclick="changeSlide(0)" src="https://b2bgiftsindia.com/b2bcrm/category/2387/2b560048ca5ec8eb75568e4f4f2bd999.jpg" 
                     class="thumb w-20 h-20 object-cover rounded-2xl cursor-pointer active" alt="">
                <img onclick="changeSlide(1)" src="https://b2bgiftsindia.com/b2bcrm/category/2391/73e38095fa9b1e7e8e5ecd7f45e9bf4b.jpg" 
                     class="thumb w-20 h-20 object-cover rounded-2xl cursor-pointer" alt="">
                <img onclick="changeSlide(2)" src="https://b2bgiftsindia.com/b2bcrm/category/2394/4e817f617204a854b853b9aefca0cd9f.jpg" 
                     class="thumb w-20 h-20 object-cover rounded-2xl cursor-pointer" alt="">
            </div>

        </div>

        <!-- ==================== RIGHT: PRODUCT INFO ==================== -->
        <div>

            <h1 class="text-4xl font-bold leading-tight text-gray-900 mb-2">
                Premium Leather Diary
            </h1>
            <p class="text-gray-500 text-lg">A5 Size • 256 Pages • With Logo Engraving</p>

            <div class="flex items-center gap-4 mt-6">
                <span class="text-4xl font-bold text-gray-800">₹899</span>
                <span class="text-gray-400 line-through text-xl">₹1,299</span>
                <span class="bg-green-100 text-green-700 text-sm font-medium px-4 py-1 rounded-full">30% OFF</span>
            </div>

            <div class="mt-8">
                <h3 class="font-semibold mb-3">Customization Options</h3>
                <div class="flex gap-3">
                    <button class="px-6 py-3 border-2 border-[#f4a261] text-[#f4a261] rounded-2xl font-medium active">Laser Engraving</button>
                    <button class="px-6 py-3 border border-gray-300 rounded-2xl hover:border-gray-400 transition">Debossing</button>
                    <button class="px-6 py-3 border border-gray-300 rounded-2xl hover:border-gray-400 transition">Screen Printing</button>
                </div>
            </div>

            <div class="mt-10">
                <h3 class="font-semibold mb-4">Product Description</h3>
                <p class="text-gray-600 leading-relaxed">
                    Premium genuine leather diary with 256 high-quality pages. Perfect for corporate gifting, employee onboarding, 
                    and client appreciation. Fully customizable with your company logo and name.
                </p>
            </div>

            <div class="mt-10 grid grid-cols-2 gap-4">
                <div>
                    <p class="text-sm text-gray-500">Minimum Order Quantity</p>
                    <p class="font-semibold text-xl">50 Pieces</p>
                </div>
                <div>
                    <p class="text-sm text-gray-500">Delivery Time</p>
                    <p class="font-semibold text-xl">7-10 Days</p>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-12 flex flex-col sm:flex-row gap-4">
                <button onclick="addToQuote()" 
                        class="quote-btn flex-1 py-5 rounded-3xl text-lg font-semibold">
                    Add to Quote
                </button>
                
                <a href="https://wa.me/919876543210" target="_blank"
                   class="whatsapp-btn flex-1 py-5 rounded-3xl text-lg font-semibold text-white flex items-center justify-center gap-3">
                    <i class="fa-brands fa-whatsapp text-2xl"></i>
                    Chat on WhatsApp
                </a>
            </div>

            <div class="flex gap-6 mt-8 text-sm">
                <div class="flex items-center gap-2 text-gray-600">
                    <i class="fa-solid fa-truck"></i>
                    <span>Pan India Delivery</span>
                </div>
                <div class="flex items-center gap-2 text-gray-600">
                    <i class="fa-solid fa-shield-halved"></i>
                    <span>Quality Guaranteed</span>
                </div>
            </div>

        </div>
    </div>

</div>
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-10">New Arrivals</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="product-card bg-white rounded-3xl overflow-hidden">
                <img src="https://images.unsplash.com/photo-1602143407151-7111542de6e8" class="w-full h-56 object-cover" alt="">
                <div class="p-5">
                    <h3 class="font-semibold">Vacuum Copper Bottle</h3>
                    <p class="text-gray-500 text-sm">With Engraving</p>
                    <p class="font-bold mt-2">₹599</p>
                </div>
            </div>
            <div class="product-card bg-white rounded-3xl overflow-hidden">
                <img src="https://images.unsplash.com/photo-1586953208448-b95a79798f07" class="w-full h-56 object-cover" alt="">
                <div class="p-5">
                    <h3 class="font-semibold">Wireless Earbuds Pro</h3>
                    <p class="text-gray-500 text-sm">Custom Branded</p>
                    <p class="font-bold mt-2">₹1,899</p>
                </div>
            </div>
            <div class="product-card bg-white rounded-3xl overflow-hidden">
                <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a9c" class="w-full h-56 object-cover" alt="">
                <div class="p-5">
                    <h3 class="font-semibold">Luxury Wooden Pen Set</h3>
                    <p class="text-gray-500 text-sm">Gift Box Included</p>
                    <p class="font-bold mt-2">₹1,299</p>
                </div>
            </div>
            <div class="product-card bg-white rounded-3xl overflow-hidden">
                <img src="https://images.unsplash.com/photo-1518709268805-4e9042af2176" class="w-full h-56 object-cover" alt="">
                <div class="p-5">
                    <h3 class="font-semibold">Crystal Award Trophy</h3>
                    <p class="text-gray-500 text-sm">Deep Engraving</p>
                    <p class="font-bold mt-2">₹2,799</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ==================== RELATED PRODUCTS SECTION ==================== -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-3xl font-bold text-center mb-10">Related Products</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <div class="product-card bg-white rounded-3xl overflow-hidden">
                <img src="https://images.unsplash.com/photo-1544947958-cf3f4a4e3c0b" class="w-full h-56 object-cover" alt="">
                <div class="p-5">
                    <h3 class="font-semibold">Executive Leather Folder</h3>
                    <p class="text-gray-500 text-sm">With Notepad</p>
                    <p class="font-bold mt-2">₹1,499</p>
                </div>
            </div>
            <div class="product-card bg-white rounded-3xl overflow-hidden">
                <img src="https://images.unsplash.com/photo-1600585154526-990dced4cb0d" class="w-full h-56 object-cover" alt="">
                <div class="p-5">
                    <h3 class="font-semibold">Bamboo Desk Organizer</h3>
                    <p class="text-gray-500 text-sm">Eco-Friendly</p>
                    <p class="font-bold mt-2">₹799</p>
                </div>
            </div>
            <div class="product-card bg-white rounded-3xl overflow-hidden">
                <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9" class="w-full h-56 object-cover" alt="">
                <div class="p-5">
                    <h3 class="font-semibold">Smart Business Card Holder</h3>
                    <p class="text-gray-500 text-sm">Tech Gift</p>
                    <p class="font-bold mt-2">₹1,099</p>
                </div>
            </div>
            <div class="product-card bg-white rounded-3xl overflow-hidden">
                <img src="https://images.unsplash.com/photo-1586023492125-27b2c045efd7" class="w-full h-56 object-cover" alt="">
                <div class="p-5">
                    <h3 class="font-semibold">Wellness Gift Hamper</h3>
                    <p class="text-gray-500 text-sm">Complete Set</p>
                    <p class="font-bold mt-2">₹2,299</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Floating Action Buttons -->
<!-- <div class="fixed bottom-6 right-6 flex flex-col gap-4 z-50">
    <a href="https://wa.me/919876543210" target="_blank"
       class="whatsapp-btn w-14 h-14 rounded-full flex items-center justify-center shadow-2xl text-white text-3xl hover:scale-110 transition">
        <i class="fa-brands fa-whatsapp"></i>
    </a>
    
    <a href="tel:+919876543210"
       class="bg-blue-600 w-14 h-14 rounded-full flex items-center justify-center shadow-2xl text-white text-3xl hover:scale-110 transition">
        <i class="fa-solid fa-phone"></i>
    </a>
</div> -->

<script>
    let currentSlide = 0;
    const slides = document.querySelectorAll('.slide');

    function changeSlide(n) {
        slides.forEach(slide => slide.classList.remove('active'));
        slides[n].classList.add('active');
        
        // Update active thumbnail
        document.querySelectorAll('.thumb').forEach((thumb, i) => {
            thumb.classList.toggle('active', i === n);
        });
        
        currentSlide = n;
    }

    // Auto slide every 5 seconds
    setInterval(() => {
        currentSlide = (currentSlide + 1) % slides.length;
        changeSlide(currentSlide);
    }, 5000);

    function addToQuote() {
        alert("Product added to your quote request! Our team will contact you shortly.");
    }
</script>


@endsection