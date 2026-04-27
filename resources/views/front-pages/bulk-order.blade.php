@extends('layouts.app')

@section('content')

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

    <!-- Hero Section -->
    <section class="py-24 md:py-32 bg-white">
    <div class="max-w-5xl mx-auto px-6 text-center">
        <p class="uppercase tracking-widest text-sm font-medium text-gray-500 mb-4">
            Bulk Corporate Gifting
        </p>
        <h1 class="text-5xl md:text-6xl font-bold leading-tight text-gray-900 mb-6">
            Bulk Orders Made <span class="text-[#f4a261]">Simple</span> & <span class="text-[#2ec4b6]">Efficient</span>
        </h1>
        <p class="max-w-3xl mx-auto text-xl text-gray-600">
            Whether it’s employee gifting, client giveaways, or large-scale campaigns, we handle bulk orders with 
            customized solutions, consistent quality, and reliable delivery across India.
        </p>

        <div class="mt-12">
            <a href="#enquiry-form"
                class="inline-block bg-gradient-to-r from-[#e07a5f] to-[#f4a261] text-white px-10 py-4 rounded-2xl font-semibold text-lg hover:shadow-xl transition-all">
                Request Bulk Quote
            </a>
        </div>
    </div>
</section>

    <!-- Vendor Enquiry Form -->
    <section id="enquiry-form" class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900">Bulk Order Enquiry</h2>
                <p class="text-gray-600 mt-3">Please provide your details below. Our procurement team will contact you
                    within 48 hours.</p>
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
                <form method="POST" action="{{ route('supplier.enquiry') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Contact Person Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" placeholder="Enter full name"
                                class="form-input" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Company / Firm Name</label>
                            <input type="text" name="company" value="{{ old('company') }}" placeholder="Your Company Name"
                                class="form-input" required>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                            <input type="email" name="email" value="{{ old('email') }}" placeholder="you@company.com"
                                class="form-input" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Mobile / WhatsApp Number</label>
                            <input type="tel" name="phone" value="{{ old('phone') }}" placeholder="+91 98765 43210"
                                class="form-input" pattern="[6-9]{1}[0-9]{9}" maxlength="10" required>
                        </div>
                    </div>

                    <!-- ✅ CATEGORY (DYNAMIC, UI SAME) -->
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Product Category You Supply</label>
                        <select name="category_id" class="select-input" required>
                            <option value="">Select Main Category</option>

                            @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id') == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                            @endforeach

                        </select>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Monthly Production / Supply
                            Capacity</label>
                        <input type="text" name="capacity" value="{{ old('capacity') }}"
                            placeholder="e.g. 15,000 units per month" class="form-input" required>
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Minimum Order Quantity (MOQ)</label>
                        <input type="text" name="moq" value="{{ old('moq') }}" placeholder="e.g. 500 - 1000 pieces"
                            class="form-input">
                    </div>

                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Product / Service Description</label>
                        <textarea name="description" rows="5"
                            placeholder="Describe your products, quality standards, customization capabilities, and why we should partner with you..."
                            class="form-input">{{ old('description') }}</textarea>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6 mt-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">City / Manufacturing
                                Location</label>
                            <input type="text" name="city" value="{{ old('city') }}"
                                placeholder="e.g. Delhi, Mumbai, Surat, Chennai" class="form-input">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">GST Number (Optional)</label>
                            <input type="text" name="gst" value="{{ old('gst') }}" placeholder="22AAAAA0000A1Z5"
                                class="form-input">
                        </div>
                    </div>

                    <!-- ✅ FILE (UI SAME LOOK) -->
                    <div class="mt-8">
                        <label class="block text-sm font-medium text-gray-700 mb-3">Upload Catalogue / Product Images /
                            Price List (Optional)</label>
                        <input type="file" name="catalogue" class="form-input">
                    </div>

                    <!-- ✅ CAPTCHA -->
                    <div class="mt-6">
                        <div class="g-recaptcha" data-sitekey="{{ env('RECAPTCHA_SITE_KEY') }}"></div>
                    </div>

                    @error('g-recaptcha-response')
                        <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                    @enderror

                    <button type="submit" class="enquiry-btn w-full mt-12">
                        Submit Bulk Supply Enquiry
                    </button>

                    <p class="text-center text-xs text-gray-500 mt-6">
                        All information is kept confidential. Our team will review and get back to you shortly.
                    </p>
                </form>


            </div>
        </div>
    </section>


@endsection