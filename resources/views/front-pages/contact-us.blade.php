@extends('layouts.app')

@section('content')
  <main class="aq-contact-page">
        <!-- Contact Hero Section -->
        <section class="aq-contact-hero p-relative pt-120 pb-80">
            <div class="container text-center">
                <span class="aq-section-title-sm mb-15 d-inline-block text-white">Reach Out</span>
                <h1 class="font-family-heading text-white mb-20">Let's Connect</h1>
                <p class="aq-contact-hero-desc text-white">
                    Need a custom solution or bulk order assistance? Reach out — we’re happy to help.
                </p>
            </div>
        </section>

        <!-- Contact Content Section -->
        <section class="aq-contact-content pt-100 pb-100">
            <div class="container">
                <div class="row g-5">
                    <!-- Left: Locations -->
                    <div class="col-lg-5">
                        <div class="aq-contact-info-wrapper pe-lg-4">
                            <h3 class="font-family-heading mb-40">Our Offices</h3>
                            
                            <div class="aq-office-card corporate-card mb-30 p-4">
                                <div class="d-flex align-items-start">
                                    <div class="aq-office-icon me-3 mt-1">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-family-heading mb-2">Corporate Office</h4>
                                        <p class="aq-office-address mb-2">
                                            Unit No 319, iThum Tower - C, Sector 62,<br> Noida, Uttar Pradesh - 201301
                                        </p>
                                        <div class="aq-office-details">
                                            <strong>Phone:</strong> +91 80104 78073<br>
                                            <strong>Email:</strong> sales@b2bgiftsindia.com<br>
                                            <strong>Working Hours:</strong> 10:00 AM - 7:00 PM
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="aq-office-card mb-30 p-4">
                                <div class="d-flex align-items-start">
                                    <div class="aq-office-icon me-3 mt-1">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-family-heading mb-2">Branch Office - Mumbai</h4>
                                        <p class="aq-office-address mb-2">
                                            502, Donde Heights, Vasai,<br> Mumbai, Maharashtra - 401201
                                        </p>
                                        <div class="aq-office-details">
                                            <strong>Phone:</strong> +91 96507 94454<br>
                                            <strong>Email:</strong> sales@b2bgiftsindia.com<br>
                                            <strong>Working Hours:</strong> 10:00 AM - 7:00 PM
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="aq-office-card p-4">
                                <div class="d-flex align-items-start">
                                    <div class="aq-office-icon me-3 mt-1">
                                        <i class="fa-solid fa-location-dot"></i>
                                    </div>
                                    <div>
                                        <h4 class="font-family-heading mb-2">Branch Office - Vadodara</h4>
                                        <p class="aq-office-address mb-2">
                                            79, Mangalya, Akapuri,<br> Vadodara, Gujarat - 390007
                                        </p>
                                        <div class="aq-office-details">
                                            <strong>Phone:</strong> +91 99101 34826<br>
                                            <strong>Email:</strong> sales@b2bgiftsindia.com<br>
                                            <strong>Working Hours:</strong> 10:00 AM - 7:00 PM
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Right: Form -->
                    <div class="col-lg-7">
                        <div class="aq-contact-form-wrapper p-5">
                            <h3 class="font-family-heading mb-4 aq-contact-form-title">Send us a Message</h3>
                            
                            <form id="aqContactPageForm" onsubmit="event.preventDefault(); window.location.href='thankyou.html';">
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="aq-contact-label">Your Name *</label>
                                        <div class="position-relative">
                                            <i class="fa-regular fa-user position-absolute aq-contact-input-icon"></i>
                                            <input type="text" class="form-control aq-contact-input" required placeholder="E.g. Rajesh Kumar" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="aq-contact-label">Email Address *</label>
                                        <div class="position-relative">
                                            <i class="fa-regular fa-envelope position-absolute aq-contact-input-icon"></i>
                                            <input type="email" class="form-control aq-contact-input" required placeholder="rajesh@company.com" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6 mb-4">
                                        <label class="aq-contact-label">Mobile Number *</label>
                                        <div class="position-relative">
                                            <i class="fa-solid fa-phone position-absolute aq-contact-input-icon"></i>
                                            <input type="tel" class="form-control aq-contact-input" required placeholder="+91 98765 43210" />
                                        </div>
                                    </div>
                                    <div class="col-md-6 mb-4">
                                        <label class="aq-contact-label">Company Name *</label>
                                        <div class="position-relative">
                                            <i class="fa-solid fa-building position-absolute aq-contact-input-icon"></i>
                                            <input type="text" class="form-control aq-contact-input" required placeholder="E.g. XYZ Corp" />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label class="aq-contact-label">Select Inquiry Type *</label>
                                    <select class="form-select aq-contact-input" required>
                                        <option value="" disabled selected>What can we help you with?</option>
                                        <option value="Bulk Corporate Gifting">Bulk Corporate Gifting</option>
                                        <option value="Custom Product Development">Custom Product Development</option>
                                        <option value="Partnership / Vendor">Partnership / Vendor Inquiry</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="aq-contact-label">Your Message...</label>
                                    <textarea class="form-control aq-contact-input" required placeholder="Tell us about your requirements..." rows="4"></textarea>
                                </div>
                                <button type="submit" class="aq-contact-btn-submit w-100">
                                    <span>Send Message</span>
                                    <i class="fa-solid fa-paper-plane ml-10"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    
@endsection