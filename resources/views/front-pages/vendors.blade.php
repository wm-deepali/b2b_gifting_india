@extends('layouts.app')

<style>
    .form-input {
        width: 100%;
        padding: 16px 20px;
        border: 2px solid #e5e7eb;
        border-radius: 14px;
        background: #fff;
        transition: all 0.3s ease;
        font-size: 1.05rem;
    }

    .form-input:focus {
        border-color: var(--primary-orange);
        box-shadow: 0 0 0 5px rgba(244, 162, 97, 0.12);
        outline: none;
    }

    .select-input {
        width: 100%;
        padding: 16px 20px;
        border: 2px solid #e5e7eb;
        border-radius: 14px;
        background: #fff;
        font-size: 1.05rem;
    }

    .enquiry-btn {
        background: linear-gradient(135deg, #e07a5f, #f4a261);
        color: white;
        padding: 18px 40px;
        border-radius: 9999px;
        font-weight: 600;
        font-size: 1.1rem;
        transition: all 0.4s ease;
    }

    .enquiry-btn:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(224, 122, 95, 0.4);
    }
</style>

@section('content')

    <!-- Hero Section -->
   <section class="py-24 md:py-32 bg-white">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <p class="uppercase tracking-widest text-sm font-medium text-gray-500 mb-4">
            Partner With Us
        </p>
        <h1 class="text-5xl md:text-6xl font-bold leading-tight text-gray-900 mb-6">
            Grow with <span class="text-[#f4a261]">B2B Gifts</span><span class="text-[#2ec4b6]"> India</span>
        </h1>
        <p class="max-w-3xl mx-auto text-xl text-gray-600">
            We collaborate with manufacturers, suppliers, designers, and service providers to deliver high-quality corporate gifting solutions. 
            Partner with us to access consistent business opportunities, bulk orders, and long-term growth.
        </p>

        <div class="mt-12">
            <a href="#enquiry-form"
                class="inline-block bg-gradient-to-r from-[#e07a5f] to-[#f4a261] text-white px-10 py-4 rounded-2xl font-semibold text-lg hover:shadow-xl transition-all">
                Submit Your Enquiry
            </a>
        </div>
    </div>
</section>

    <!-- Benefits -->
    <section class="py-20 bg-gray-50">
    <div class="max-w-6xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-3xl font-semibold">Why Partner With Us?</h2>
        </div>

        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-8 rounded-3xl text-center">
                <div class="text-5xl mb-6">📦</div>
                <h3 class="font-semibold text-xl mb-3">Consistent Bulk Orders</h3>
                <p class="text-gray-600">
                    Access regular, high-volume order opportunities from a growing network of corporate clients across multiple industries.
                </p>
            </div>

            <div class="bg-white p-8 rounded-3xl text-center">
                <div class="text-5xl mb-6">₹</div>
                <h3 class="font-semibold text-xl mb-3">Transparent & Timely Payments</h3>
                <p class="text-gray-600">
                    Structured and reliable payment processes with clear terms, ensuring smooth and hassle-free transactions.
                </p>
            </div>

            <div class="bg-white p-8 rounded-3xl text-center">
                <div class="text-5xl mb-6">🤝</div>
                <h3 class="font-semibold text-xl mb-3">Long-Term Business Growth</h3>
                <p class="text-gray-600">
                    Build a sustainable partnership with opportunities to scale as we expand our reach and client base across India.
                </p>
            </div>
        </div>
    </div>
</section>


    <!-- <section class="py-20 bg-gray-50">
                                <div class="max-w-6xl mx-auto px-6">
                                    <div class="text-center mb-12">
                                        <h2 class="text-4xl font-bold text-gray-900">Investor Benefits</h2>
                                        <p class="text-gray-600 mt-3">Maximize impact and reduce hidden costs with B2B Gifts India</p>
                                    </div>

                                    <div class="grid md:grid-cols-3 gap-8">

                                        <div class="benefit-card bg-white p-8 rounded-3xl shadow-sm text-center">
                                            <div class="text-5xl mb-6">🏢</div>
                                            <h3 class="font-semibold text-xl mb-3">No Excessive Fees</h3>
                                            <p class="text-gray-600">Transparent pricing with zero hidden registration or management charges.</p>
                                        </div>

                                        <div class="benefit-card bg-white p-8 rounded-3xl shadow-sm text-center">
                                            <div class="text-5xl mb-6">📈</div>
                                            <h3 class="font-semibold text-xl mb-3">Exclusive Discounts</h3>
                                            <p class="text-gray-600">Up to 25% off on bulk orders + priority access to new collections.</p>
                                        </div>

                                        <div class="benefit-card bg-white p-8 rounded-3xl shadow-sm text-center">
                                            <div class="text-5xl mb-6">🤝</div>
                                            <h3 class="font-semibold text-xl mb-3">Dedicated Support</h3>
                                            <p class="text-gray-600">Personal account manager + customized gifting strategy for your business.</p>
                                        </div>

                                    </div>
                                </div>
                            </section> -->

    <!-- Investment Opportunities -->
    <section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold">Our Gifting Capabilities</h2>
            <p class="text-gray-600 mt-3">Comprehensive solutions designed for modern corporate gifting needs</p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">

            <div class="bg-gray-50 p-8 rounded-3xl">
                <h3 class="text-[#f4a261] font-semibold mb-1">Customized Solutions</h3>
                <div class="text-4xl font-bold text-gray-800 mb-4">Tailored</div>
                <p class="text-gray-600 text-sm">
                    Personalized gifting solutions with branding options like logo printing, engraving, and custom packaging.
                </p>
            </div>

            <div class="bg-gray-50 p-8 rounded-3xl">
                <h3 class="text-[#2ec4b6] font-semibold mb-1">Bulk Order Handling</h3>
                <div class="text-4xl font-bold text-gray-800 mb-4">Scalable</div>
                <p class="text-gray-600 text-sm">
                    Efficient handling of large-volume orders with consistent quality and timely execution.
                </p>
            </div>

            <div class="bg-gray-50 p-8 rounded-3xl">
                <h3 class="text-[#e07a5f] font-semibold mb-1">Product Variety</h3>
                <div class="text-4xl font-bold text-gray-800 mb-4">Wide Range</div>
                <p class="text-gray-600 text-sm">
                    Extensive selection of corporate gifts across categories including lifestyle, tech, drinkware, and more.
                </p>
            </div>

            <div class="bg-gray-50 p-8 rounded-3xl">
                <h3 class="text-gray-700 font-semibold mb-1">Pan-India Delivery</h3>
                <div class="text-4xl font-bold text-gray-800 mb-4">Nationwide</div>
                <p class="text-gray-600 text-sm">
                    Reliable delivery network ensuring smooth and timely fulfillment across multiple locations in India.
                </p>
            </div>

        </div>
    </div>
</section>


    <!-- Our Trusted Partners / Team -->
    <!-- <section class="py-20 bg-gray-50">
                                <div class="max-w-6xl mx-auto px-6">
                                    <div class="text-center mb-12">
                                        <h2 class="text-4xl font-bold">Our Trusted Network</h2>
                                        <p class="text-gray-600 mt-3">Backed by visionary leaders and corporate partners</p>
                                    </div>

                                    <div class="grid md:grid-cols-3 gap-10">

                                        <div class="text-center">
                                            <div class="mx-auto w-48 h-48 bg-gray-200 rounded-3xl overflow-hidden mb-6">
                                                <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a" alt="Rahul Sharma"
                                                    class="w-full h-full object-cover">
                                            </div>
                                            <h3 class="font-semibold text-xl">Rahul Sharma</h3>
                                            <p class="text-[#f4a261]">Founder & CEO</p>
                                        </div>

                                        <div class="text-center">
                                            <div class="mx-auto w-48 h-48 bg-gray-200 rounded-3xl overflow-hidden mb-6">
                                                <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2" alt="Priya Malhotra"
                                                    class="w-full h-full object-cover">
                                            </div>
                                            <h3 class="font-semibold text-xl">Priya Malhotra</h3>
                                            <p class="text-[#2ec4b6]">Director - Operations</p>
                                        </div>

                                        <div class="text-center">
                                            <div class="mx-auto w-48 h-48 bg-gray-200 rounded-3xl overflow-hidden mb-6">
                                                <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d" alt="Arjun Verma"
                                                    class="w-full h-full object-cover">
                                            </div>
                                            <h3 class="font-semibold text-xl">Arjun Verma</h3>
                                            <p class="text-[#e07a5f]">Creative Head</p>
                                        </div>

                                    </div>
                                </div>
                            </section> -->

    <!-- Our Process -->
  <section class="py-20 bg-white">
    <div class="max-w-5xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold">Our Process</h2>
            <p class="text-gray-600 mt-4">A streamlined approach to deliver seamless corporate gifting solutions</p>
        </div>

        <div
            class="max-w-3xl mx-auto space-y-16 relative before:absolute before:left-8 before:top-10 before:bottom-10 before:w-0.5 before:bg-gradient-to-b before:from-[#f4a261] before:to-[#e07a5f]">

            <div class="process-step flex gap-10">
                <div class="w-16 h-16 bg-[#f4a261] text-white rounded-2xl flex items-center justify-center text-2xl font-bold flex-shrink-0"
                    style="z-index: 10;">1</div>
                <div>
                    <h3 class="text-2xl font-semibold mb-3">Requirement Understanding</h3>
                    <p class="text-gray-600">
                        We begin by understanding your gifting needs, target audience, quantity, and branding requirements to plan the right solution.
                    </p>
                </div>
            </div>

            <div class="process-step flex gap-10">
                <div class="w-16 h-16 bg-[#2ec4b6] text-white rounded-2xl flex items-center justify-center text-2xl font-bold flex-shrink-0"
                    style="z-index: 10;">2</div>
                <div>
                    <h3 class="text-2xl font-semibold mb-3">Product Selection & Approval</h3>
                    <p class="text-gray-600">
                        We share curated product options with customization details, followed by design mockups and approvals before production.
                    </p>
                </div>
            </div>

            <div class="process-step flex gap-10">
                <div class="w-16 h-16 bg-[#e07a5f] text-white rounded-2xl flex items-center justify-center text-2xl font-bold flex-shrink-0"
                    style="z-index: 10;">3</div>
                <div>
                    <h3 class="text-2xl font-semibold mb-3">Production & Delivery</h3>
                    <p class="text-gray-600">
                        Once approved, we manage production, quality checks, and timely delivery to ensure a smooth and hassle-free experience.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>



    <!-- Vendor Enquiry Form -->
    <section id="enquiry-form" class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900">Vendor / Partner Enquiry Form</h2>
                <p class="text-gray-600 mt-3">Please fill the details below. Our team will get back to you within 48 hours.
                </p>
            </div>

            <div class="bg-white border border-gray-100 shadow-xl rounded-3xl p-10 md:p-14">

                @if(session('success'))
                    <div class="mb-4 text-green-600 font-medium">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-4 text-red-500">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>• {{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form method="POST" action="{{ route('vendor.enquiry') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Full Name / Company Contact Person
                            </label>
                            <input type="text" name="name" placeholder="Enter your name" class="form-input"
                                value="{{ old('name') }}" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Company Name
                            </label>
                            <input type="text" name="company" placeholder="Your Company Name" class="form-input"
                                value="{{ old('company') }}" required>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Email Address
                            </label>
                            <input type="email" name="email" placeholder="you@company.com" value="{{ old('email') }}"
                                class="form-input" required>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Mobile Number
                            </label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" pattern="[6-9]{1}[0-9]{9}"
                                maxlength="10" placeholder="+91 98765 43210" class="form-input" required>
                        </div>
                    </div>

                    <!-- 🔥 ONE SELECT (Business + Category) -->
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Business Type / Category
                        </label>

                        <select name="vendor_type_id" class="select-input" required>
                            <option value="">Select Option</option>

                            <optgroup label="Business Type">
                                @foreach($vendorTypes->where('type', 'business') as $type)
                                    <option value="{{ $type->id }}" {{ old('vendor_type_id') == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </optgroup>

                            <optgroup label="Categories">
                                @foreach($vendorTypes->where('type', 'category') as $type)
                                    <option value="{{ $type->id }}" {{ old('vendor_type_id') == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </optgroup>
                        </select>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Product / Service Description
                        </label>
                        <textarea name="description" rows="5"
                            placeholder="Briefly describe your products, capacity, MOQ, etc..."
                            class="form-input">{{ old('description') }}</textarea>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Monthly Production Capacity
                            </label>
                            <input type="text" name="capacity" placeholder="e.g. 10,000 units/month"
                                value="{{ old('capacity') }}" class="form-input">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                City / Location
                            </label>
                            <input type="text" name="city" value="{{ old('city') }}" placeholder="e.g. Delhi, Mumbai, Surat"
                                class="form-input">
                        </div>
                    </div>

                    <!-- FILE -->
                    <div class="mt-8">
                        <label class="block text-sm font-medium text-gray-700 mb-3">
                            Upload Catalogue / Company Profile
                        </label>
                        <input type="file" name="catalogue" class="form-input">
                    </div>

                    <!-- CAPTCHA -->
                    <div class="mt-6">
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    </div>

                    @error('g-recaptcha-response')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="enquiry-btn w-full mt-12">
                        Submit Partnership Enquiry
                    </button>

                </form>


            </div>
        </div>
    </section>


@endsection