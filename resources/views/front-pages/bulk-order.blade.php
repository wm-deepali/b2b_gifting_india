@extends('layouts.app')

@section('content')

    <main class="aq-bulk-page">

        <!-- Hero Section -->
        <section class="aq-catpage-hero">
            <div class="aq-hero-glow"></div>
            <div class="aq-floating-gift-box aq-floating-shape-1">
                <i class="fa-solid fa-gift"></i>
            </div>
            <div class="aq-floating-gift-box aq-floating-shape-2">
                <i class="fa-solid fa-gem"></i>
            </div>
            <div class="aq-catpage-hero-content">
                <h1 class="aq-catpage-title">Bulk Corporate Gifting</h1>
                <div class="aq-catpage-breadcrumbs">
                    <span class="text-white opacity-75">BULK CORPORATE GIFTING</span>
                </div>
            </div>
        </section>

        <div class="aq-luxury-page-wrap pt-80 pb-100">
            <div class="container">

                <!-- Intro & Form Section -->
                <div class="row align-items-center mb-80 mt-50">
                    <div class="col-lg-5 mb-5 mb-lg-0">
                        <span class="aq-luxury-subtitle">Bulk Orders Made Simple & Efficient</span>
                        <h2 class="aq-luxury-title mb-4">Connecting Businesses Through Thoughtful Gifting</h2>
                        <p class="aq-luxury-desc mb-4">
                            Whether it’s employee gifting, client giveaways, or large-scale campaigns, we handle bulk
                            orders with customized solutions, consistent quality, and reliable delivery across India.
                        </p>
                        <div class="aq-luxury-contact-info">
                            <div class="info-item">
                                <i class="fa-solid fa-envelope"></i>
                                <div>
                                    <h6>Email Us</h6>
                                    <p>sales@b2bgifts.in</p>
                                </div>
                            </div>
                            <div class="info-item">
                                <i class="fa-solid fa-phone"></i>
                                <div>
                                    <h6>Call Us</h6>
                                    <p>+91 98765 43210</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="aq-luxury-form-wrapper">
                            <h3 class="form-title">Bulk Order Enquiry</h3>
                            <p class="form-subtitle">Please provide your details below. Our procurement team will
                                contact you within 48 hours.</p>

                            <form action="#" class="aq-luxury-form">
                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contact Person Name</label>
                                            <input type="text" class="form-control" placeholder="Enter full name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Company / Firm Name</label>
                                            <input type="text" class="form-control" placeholder="Your Company Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Email Address</label>
                                            <input type="email" class="form-control" placeholder="you@company.com">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Mobile / WhatsApp Number</label>
                                            <input type="text" class="form-control" placeholder="+91 98765 43210">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Product Category Interested In</label>
                                            <select class="form-control">
                                                <option value="">Select Main Category</option>
                                                <option>Drinkware</option>
                                                <option>Electronics & Tech</option>
                                                <option>Apparel & Bags</option>
                                                <option>Diaries & Pens</option>
                                                <option>Luxury Combos</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Estimated Quantity Required</label>
                                            <input type="text" class="form-control"
                                                placeholder="e.g. 500 - 1000 pieces">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Target Delivery Date</label>
                                            <input type="text" class="form-control" placeholder="e.g. 15th Aug 2026">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Delivery City</label>
                                            <input type="text" class="form-control"
                                                placeholder="e.g. Delhi, Mumbai, Pan-India">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Product / Branding Description</label>
                                            <textarea class="form-control" rows="3"
                                                placeholder="Describe the products you need, branding requirements, quality standards..."></textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-8 text-center mt-4 mx-auto">
                                        <button type="submit" class="aq-bulk-submit-btn w-100 text-center">Request Bulk
                                            Quote</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

@endsection