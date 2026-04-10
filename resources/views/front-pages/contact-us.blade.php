@extends('layouts.app')

@section('content')

    <style>
        .form-input {
            width: 100%;
            padding: 14px 18px;
            border: 1.5px solid #e5e7eb;
            border-radius: 12px;
            background: #fff;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            border-color: var(--primary-orange);
            box-shadow: 0 0 0 4px rgba(244, 162, 97, 0.15);
            outline: none;
        }

        .office-card {
            transition: all 0.4s ease;
        }

        .office-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 20px 45px rgba(244, 162, 97, 0.12);
        }

        .send-btn {
            background: linear-gradient(135deg, #e07a5f, #f4a261);
            color: white;
            font-weight: 600;
            padding: 16px 40px;
            border-radius: 9999px;
            transition: all 0.3s ease;
        }

        .send-btn:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(224, 122, 95, 0.3);
        }
    </style>


    <section class="py-20 bg-gradient-to-br from-[#f8f4f0] to-white">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <h1 class="text-5xl md:text-6xl font-bold text-gray-900 mb-6">Get In Touch</h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                Have questions about corporate gifting? Our team is ready to help you find the perfect solution.
            </p>
        </div>
    </section>

    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid lg:grid-cols-5 gap-12">

            <!-- Contact Form -->
            <div class="lg:col-span-3">
                <div class="bg-white rounded-3xl shadow-sm p-10">
                    <h2 class="text-3xl font-semibold mb-8">Send us a Message</h2>

                    <form>
                        <div class="grid md:grid-cols-2 gap-6">
                            <input type="text" placeholder="Your Name" class="form-input">
                            <input type="email" placeholder="Email Address" class="form-input">
                        </div>
                        <input type="tel" placeholder="Mobile Number" class="form-input mt-6">
                        <input type="text" placeholder="Company Name" class="form-input mt-6">

                        <select class="form-input mt-6">
                            <option>Select Inquiry Type</option>
                            <option>Bulk Corporate Order</option>
                            <option>Customization Inquiry</option>
                            <option>Sample Request</option>
                            <option>Partnership Opportunity</option>
                            <option>General Inquiry</option>
                        </select>

                        <textarea rows="5" placeholder="Your Message..." class="form-input mt-6"></textarea>

                        <button type="submit"
                            class="contact-btn w-full mt-8 text-white py-5 rounded-2xl font-semibold text-lg">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>

            <!-- Offices -->
            <div class="lg:col-span-2 space-y-8">

                <!-- Head Office -->
                <div class="office-card bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                    <div class="flex items-center gap-4 mb-6">
                        <div
                            class="w-12 h-12 bg-[#f4a261] text-white rounded-2xl flex items-center justify-center text-2xl">
                            🏢</div>
                        <div>
                            <h3 class="font-semibold text-xl">Head Office - Delhi</h3>
                            <p class="text-[#f4a261] font-medium">Corporate Headquarters</p>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">
                        B-45, Sector 63, Noida, Uttar Pradesh 201301
                    </p>
                    <div class="space-y-3 text-sm">
                        <p><strong>Phone:</strong> +91 98765 43210</p>
                        <p><strong>Email:</strong> info@b2bgiftsindia.com</p>
                        <p><strong>Working Hours:</strong> Mon - Sat, 9:00 AM - 6:00 PM</p>
                    </div>
                </div>

                <!-- Branch 1 -->
                <div class="office-card bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                    <div class="flex items-center gap-4 mb-6">
                        <div
                            class="w-12 h-12 bg-[#2ec4b6] text-white rounded-2xl flex items-center justify-center text-2xl">
                            📍</div>
                        <div>
                            <h3 class="font-semibold text-xl">Mumbai Branch</h3>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">
                        Unit 12, Andheri East, Mumbai, Maharashtra 400069
                    </p>
                    <div class="space-y-3 text-sm">
                        <p><strong>Phone:</strong> +91 98765 43211</p>
                        <p><strong>Email:</strong> mumbai@b2bgiftsindia.com</p>
                    </div>
                </div>

                <!-- Branch 2 -->
                <div class="office-card bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
                    <div class="flex items-center gap-4 mb-6">
                        <div
                            class="w-12 h-12 bg-[#e07a5f] text-white rounded-2xl flex items-center justify-center text-2xl">
                            📍</div>
                        <div>
                            <h3 class="font-semibold text-xl">Bangalore Branch</h3>
                        </div>
                    </div>
                    <p class="text-gray-600 mb-4">
                        No. 78, Koramangala, Bangalore, Karnataka 560034
                    </p>
                    <div class="space-y-3 text-sm">
                        <p><strong>Phone:</strong> +91 98765 43212</p>
                        <p><strong>Email:</strong> bangalore@b2bgiftsindia.com</p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Map / Quick Contact -->
    <section class="bg-gray-50 py-12">
        <div class="max-w-6xl mx-auto px-6 text-center">
            <p class="text-gray-500">We serve clients across 18+ cities in India</p>
        </div>
    </section>

@endsection