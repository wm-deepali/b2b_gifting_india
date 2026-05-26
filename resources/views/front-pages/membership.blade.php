@extends('layouts.app')

@section('content')

    <main class="aq-membership-page">

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
            <h1 class="aq-catpage-title">Our Membership Plans</h1>
            <div class="aq-catpage-breadcrumbs">
                <span class="text-white opacity-75">PREMIUM CORPORATE SOLUTIONS</span>
            </div>
            <p class="text-white mt-3 mx-auto" style="max-width: 600px; font-size: 16px; line-height: 1.5;">
                Choose the perfect membership that suits your corporate gifting needs. From occasional orders to
                enterprise-level solutions — we have a plan for every business.
            </p>
            <div class="mt-4">
                <a href="#plans" class="aq-cta-btn-primary">Compare All Plans</a>
            </div>
        </div>
    </section>

    <div class="aq-membership-page-wrap pt-100 pb-120">

        <div class="container">
            <!-- Intro Section -->
            <div class="row justify-content-center mb-40 mt-40">
                <div class="col-lg-9 text-center">
                    <span class="aq-membership-subtitle">Thoughtful Gifting</span>
                    <h2 class="aq-membership-title">Connecting Businesses Through Thoughtful Gifting</h2>
                    <p class="aq-membership-desc">
                        We help companies build stronger relationships with employees and clients through premium,
                        customized corporate gifts. Our membership plans are designed to make gifting seamless,
                        cost-effective, and impactful.
                    </p>
                </div>
            </div>

            <!-- Features Section -->
            <div class="row g-4 mb-50 justify-content-center">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="aq-feature-box p-4 bg-white rounded-4 shadow-sm h-100 border border-light">
                        <h3 class="display-4 fw-bold text-black-50 mb-3 opacity-25">01</h3>
                        <h4 class="fs-4 fw-bold text-dark mb-3">Flexible Gifting Solutions</h4>
                        <p class="text-muted mb-0">Choose from one-time orders or enjoy priority access with our
                            membership plans.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="aq-feature-box p-4 bg-white rounded-4 shadow-sm h-100 border border-light">
                        <h3 class="display-4 fw-bold text-black-50 mb-3 opacity-25">02</h3>
                        <h4 class="fs-4 fw-bold text-dark mb-3">Exclusive Discounts & Benefits</h4>
                        <p class="text-muted mb-0">Members get up to 25% off on bulk orders, free customization, and
                            priority support.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="aq-feature-box p-4 bg-white rounded-4 shadow-sm h-100 border border-light">
                        <h3 class="display-4 fw-bold text-black-50 mb-3 opacity-25">03</h3>
                        <h4 class="fs-4 fw-bold text-dark mb-3">Dedicated Account Manager</h4>
                        <p class="text-muted mb-0">Get personalized assistance for all your gifting needs throughout
                            the year.</p>
                    </div>
                </div>
            </div>

            <!-- Tiers Title -->
            <div class="row justify-content-center mb-40" id="plans">
                <div class="col-12 text-center">
                    <span class="aq-membership-subtitle">Pricing Plans</span>
                    <h2 class="aq-membership-title">Choose Your Membership</h2>
                    <p class="aq-membership-desc">Three plans designed for different business needs</p>
                </div>
            </div>

            <!-- Tiers Section -->
            <div class="row g-4 justify-content-center">

                <!-- Starter Tier -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="aq-membership-card">
                        <div class="aq-membership-card-bg"></div>
                        <div class="aq-membership-card-inner">
                            <div class="aq-membership-icon">
                                <i class="fa-solid fa-award"></i>
                            </div>
                            <h3 class="aq-membership-tier-name">Starter</h3>
                            <p class="aq-membership-tier-desc fw-bold text-dark mb-2 border-0 pb-0">Occasional
                                Gifting</p>
                            <div class="aq-membership-price">
                                <span class="currency">₹</span><span class="amount">15,000</span><span
                                    class="period">/yr</span>
                            </div>

                            <ul class="aq-membership-features pt-4 border-top">
                                <li><i class="fa-solid fa-check"></i> Up to 5 bulk orders per year</li>
                                <li><i class="fa-solid fa-check"></i> Standard customization</li>
                                <li><i class="fa-solid fa-check"></i> 10% discount on orders</li>
                                <li><i class="fa-solid fa-check"></i> Email support</li>
                            </ul>

                            <a href="contact.html" class="aq-membership-btn aq-membership-btn-outline">Choose
                                Starter</a>
                        </div>
                    </div>
                </div>

                <!-- Premium Tier -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="aq-membership-card aq-membership-card-popular">
                        <div class="aq-membership-card-bg"></div>
                        <div class="aq-membership-badge">MOST POPULAR</div>
                        <div class="aq-membership-card-inner">
                            <div class="aq-membership-icon">
                                <i class="fa-solid fa-crown"></i>
                            </div>
                            <h3 class="aq-membership-tier-name">Premium</h3>
                            <p class="aq-membership-tier-desc fw-bold text-dark mb-2 border-0 pb-0">Regular
                                Corporate Gifting</p>
                            <div class="aq-membership-price">
                                <span class="currency">₹</span><span class="amount">45,000</span><span
                                    class="period">/yr</span>
                            </div>

                            <ul class="aq-membership-features pt-4 border-top">
                                <li><i class="fa-solid fa-check"></i> Unlimited orders</li>
                                <li><i class="fa-solid fa-check"></i> Free premium customization</li>
                                <li><i class="fa-solid fa-check"></i> 20% discount on all orders</li>
                                <li><i class="fa-solid fa-check"></i> Dedicated account manager</li>
                                <li><i class="fa-solid fa-check"></i> Priority delivery</li>
                            </ul>

                            <a href="contact.html" class="aq-membership-btn aq-membership-btn-solid">Choose
                                Premium</a>
                        </div>
                    </div>
                </div>

                <!-- Enterprise Tier -->
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="aq-membership-card">
                        <div class="aq-membership-card-bg"></div>
                        <div class="aq-membership-card-inner">
                            <div class="aq-membership-icon">
                                <i class="fa-solid fa-building"></i>
                            </div>
                            <h3 class="aq-membership-tier-name">Enterprise</h3>
                            <p class="aq-membership-tier-desc fw-bold text-dark mb-2 border-0 pb-0">Large
                                Organizations</p>
                            <div class="aq-membership-price">
                                <span class="currency">₹</span><span class="amount">50,000</span><span
                                    class="period">/yr</span>
                            </div>

                            <ul class="aq-membership-features pt-4 border-top">
                                <li><i class="fa-solid fa-check"></i> Everything in Premium</li>
                                <li><i class="fa-solid fa-check"></i> Custom branding solutions</li>
                                <li><i class="fa-solid fa-check"></i> API integration</li>
                                <li><i class="fa-solid fa-check"></i> Monthly gifting calendar</li>
                                <li><i class="fa-solid fa-check"></i> On-site support</li>
                            </ul>

                            <a href="contact.html" class="aq-membership-btn aq-membership-btn-outline">Choose
                                Enterprise</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
    </main>


@endsection