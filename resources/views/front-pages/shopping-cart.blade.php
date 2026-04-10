@extends('layouts.app')

@section('content')



<div class="max-w-7xl mx-auto px-6 py-12">

    <h1 class="text-4xl font-bold text-gray-900 mb-2">Your Cart</h1>
    <p class="text-gray-600">Review your selected products before requesting a final quote</p>

    <div class="grid lg:grid-cols-12 gap-10 mt-10">

        <!-- Cart Items -->
        <div class="lg:col-span-8">

            <!-- Cart Item 1 -->
            <div class="cart-item flex gap-6 bg-white border border-gray-100 rounded-3xl p-6 mb-6">
                <div class="w-32 h-32 bg-gray-100 rounded-2xl overflow-hidden flex-shrink-0">
                    <img src="https://images.unsplash.com/photo-1586966956234-1c1e4a0f9f9a" 
                         alt="Leather Diary" class="w-full h-full object-cover">
                </div>
                <div class="flex-1">
                    <div class="flex justify-between">
                        <div>
                            <h3 class="font-semibold text-xl">Premium Leather Diary</h3>
                            <p class="text-gray-500">A5 Size • With Logo Engraving • Quantity: 50 pcs</p>
                        </div>
                        <button class="text-red-500 hover:text-red-600 text-sm">Remove</button>
                    </div>
                    <div class="mt-6 flex justify-between items-end">
                        <div>
                            <span class="text-2xl font-bold">₹899</span>
                            <span class="text-sm text-gray-400">per piece</span>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-600">Subtotal</p>
                            <p class="text-2xl font-semibold text-gray-800">₹44,950</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart Item 2 -->
            <div class="cart-item flex gap-6 bg-white border border-gray-100 rounded-3xl p-6 mb-6">
                <div class="w-32 h-32 bg-gray-100 rounded-2xl overflow-hidden flex-shrink-0">
                    <img src="https://images.unsplash.com/photo-1602143407151-7111542de6e8" 
                         alt="Steel Bottle" class="w-full h-full object-cover">
                </div>
                <div class="flex-1">
                    <div class="flex justify-between">
                        <div>
                            <h3 class="font-semibold text-xl">Vacuum Stainless Steel Bottle</h3>
                            <p class="text-gray-500">500ml • Laser Engraved • Quantity: 100 pcs</p>
                        </div>
                        <button class="text-red-500 hover:text-red-600 text-sm">Remove</button>
                    </div>
                    <div class="mt-6 flex justify-between items-end">
                        <div>
                            <span class="text-2xl font-bold">₹449</span>
                            <span class="text-sm text-gray-400">per piece</span>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-600">Subtotal</p>
                            <p class="text-2xl font-semibold text-gray-800">₹44,900</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Cart Item 3 -->
            <div class="cart-item flex gap-6 bg-white border border-gray-100 rounded-3xl p-6">
                <div class="w-32 h-32 bg-gray-100 rounded-2xl overflow-hidden flex-shrink-0">
                    <img src="https://images.unsplash.com/photo-1586953208448-b95a79798f07" 
                         alt="Power Bank" class="w-full h-full object-cover">
                </div>
                <div class="flex-1">
                    <div class="flex justify-between">
                        <div>
                            <h3 class="font-semibold text-xl">Wireless Power Bank 10000mAh</h3>
                            <p class="text-gray-500">Custom Printed • Quantity: 30 pcs</p>
                        </div>
                        <button class="text-red-500 hover:text-red-600 text-sm">Remove</button>
                    </div>
                    <div class="mt-6 flex justify-between items-end">
                        <div>
                            <span class="text-2xl font-bold">₹1,299</span>
                            <span class="text-sm text-gray-400">per piece</span>
                        </div>
                        <div class="text-right">
                            <p class="text-gray-600">Subtotal</p>
                            <p class="text-2xl font-semibold text-gray-800">₹38,970</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Order Summary Sidebar -->
        <div class="lg:col-span-4">
            <div class="bg-white border border-gray-100 rounded-3xl p-8 sticky top-24">

                <h3 class="font-semibold text-2xl mb-6">Order Summary</h3>

                <div class="space-y-4 text-gray-600">
                    <div class="flex justify-between">
                        <span>Subtotal (3 items)</span>
                        <span class="font-medium">₹1,28,820</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Shipping Charges</span>
                        <span class="text-green-600">Free</span>
                    </div>
                    <div class="flex justify-between">
                        <span>Customization Charges</span>
                        <span>₹4,500</span>
                    </div>
                </div>

                <div class="border-t border-gray-200 my-6"></div>

                <div class="flex justify-between text-xl font-semibold">
                    <span>Total Estimated Amount</span>
                    <span>₹1,33,320</span>
                </div>

                <p class="text-xs text-gray-500 mt-8 text-center">
                    Prices are just for reference. Actual price will be shared in final quote.
                </p>

                <!-- Request Final Quote Button -->
                <button onclick="requestQuote()" 
                        class="quote-btn w-full mt-8 text-lg">
                    Request a Final Quote
                </button>

                <p class="text-center text-xs text-gray-500 mt-6">
                    Our team will review your cart and send you a detailed customized quote within 24 hours.
                </p>

            </div>
        </div>

    </div>
</div>

<script>
    function requestQuote() {
        alert("Thank you! Your quote request has been received.\n\nOur sales team will contact you shortly with the final customized quote.");
    }
</script>


@endsection