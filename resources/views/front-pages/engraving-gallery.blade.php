@extends('layouts.app')


@section('content')

  <main>


        <!-- Hero Section -->
        <!-- <section class="about-hero text-center">
            <div class="container">
                <span class="about-hero-tagline">Empowering Businesses • Creating Memorable Experiences</span>
                <h1 class="about-hero-title">Discover <span>B2B Gifts India</span></h1>
                <p class="about-hero-desc">
                    We create premium corporate gifting solutions that help businesses build stronger relationships,
                    enhance brand value, and leave lasting impressions on clients, employees, and partners.
                </p>
                <a href="#bulk-enquiry" class="aq-about-btn-gold enquiry-btn">Speak With Our Expert</a>
            </div>
        </section> -->


                <!-- 1. Luxury Inner Banner / Hero Section -->
        <section class="aq-catpage-hero">
            <div class="aq-hero-glow"></div>
            <div class="aq-floating-gift-box aq-floating-shape-1">
                <i class="fa-solid fa-pen-nib"></i>
            </div>
            <div class="aq-floating-gift-box aq-floating-shape-2">
                <i class="fa-solid fa-gem"></i>
            </div>
            <div class="aq-catpage-hero-content">
                <h1 class="aq-catpage-title">Engraving Gallery</h1>
                <div class="aq-catpage-breadcrumbs">
                    <a href="index.html">Home</a>
                    <span>/</span>
                    <span>Engraving Gallery</span>
                </div>
            </div>
        </section>

        <div class="aq-engraving-page-wrap">
            
            <!-- Intro Section -->
            <section class="aq-engraving-intro-section">
                <div class="container">
                    <div class="row justify-content-center text-center">
                        <div class="col-lg-8">
                            <span class="aq-section-title-sm aq-engraving-title-sm">PRECISION ENGRAVING SOLUTIONS</span>
                            <h2 class="aq-section-title aq-engraving-main-title">Engraved Corporate Gifts</h2>
                            <p class="aq-section-desc aq-engraving-desc">
                                Discover a curated range of premium products crafted for precision engraving. From logo detailing to personalized branding, we help you create refined, long-lasting impressions with every gift.
                            </p>
                            <button type="button" class="aq-engraving-btn" data-bs-toggle="modal" data-bs-target="#bulkOrderModal">
                                Get Your Brand Engraved <i class="fa-solid fa-arrow-right-long"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Gallery Section -->
            <section class="aq-engraving-gallery-section">
                <div class="container">
                    <div class="row justify-content-center text-center mb-50">
                        <div class="col-lg-8">
                            <h2 class="aq-section-title aq-engraving-main-title">Our Finest Engraving & Customization Work</h2>
                            <p class="aq-section-desc aq-engraving-desc" style="margin-bottom: 0;">
                                Real Products • Premium finishes • Memorable branding
                            </p>
                        </div>
                    </div>

                    <div class="row g-4 justify-content-center">
                        <!-- Item 1 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="aq-engraving-card">
                                <div class="aq-engraving-img-wrap">
                                    <img src="assets/img/corporate/premium_gadgets_1778668027534.webp" alt="Testing product">
                                    <div class="aq-engraving-overlay">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                    </div>
                                </div>
                                <div class="aq-engraving-content">
                                    <h3 class="aq-engraving-card-title">Testing product</h3>
                                    <p class="aq-engraving-card-desc">Product is high quality</p>
                                    <div class="aq-engraving-card-details">
                                        <span class="aq-engraving-price">₹1,250</span>
                                        <span class="aq-engraving-moq">MOQ: 50 pcs</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item 2 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="aq-engraving-card">
                                <div class="aq-engraving-img-wrap">
                                    <img src="assets/img/corporate/stationery_gifts_1778668654881.webp" alt="Blue Custom Personalised Mug Gift">
                                    <div class="aq-engraving-overlay">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                    </div>
                                </div>
                                <div class="aq-engraving-content">
                                    <h3 class="aq-engraving-card-title">Blue Custom Personalised Mug Gift</h3>
                                    <p class="aq-engraving-card-desc">Lorem Ipsum is simply dummy text of the printing</p>
                                    <div class="aq-engraving-card-details">
                                        <span class="aq-engraving-price">₹450</span>
                                        <span class="aq-engraving-moq">MOQ: 100 pcs</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item 3 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="aq-engraving-card">
                                <div class="aq-engraving-img-wrap">
                                    <img src="assets/img/corporate/welcome_kit_1778668006890.webp" alt="Larah by Borosil Lavender Cup n Saucer Set">
                                    <div class="aq-engraving-overlay">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                    </div>
                                </div>
                                <div class="aq-engraving-content">
                                    <h3 class="aq-engraving-card-title">Larah by Borosil Lavender Cup n Saucer Set</h3>
                                    <p class="aq-engraving-card-desc">Premium branding for corporate gifting</p>
                                    <div class="aq-engraving-card-details">
                                        <span class="aq-engraving-price">₹999</span>
                                        <span class="aq-engraving-moq">MOQ: 50 pcs</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Item 4 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="aq-engraving-card">
                                <div class="aq-engraving-img-wrap">
                                    <img src="assets/img/corporate/apparel_gifts_1778668621245.webp" alt="2 in 1 Dual Ten and Brown Colour Dairy">
                                    <div class="aq-engraving-overlay">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                    </div>
                                </div>
                                <div class="aq-engraving-content">
                                    <h3 class="aq-engraving-card-title">2 in 1 Dual Ten and Brown Colour Dairy with Black Metal Pen</h3>
                                    <p class="aq-engraving-card-desc">Custom engraved with precision detailing</p>
                                    <div class="aq-engraving-card-details">
                                        <span class="aq-engraving-price">₹850</span>
                                        <span class="aq-engraving-moq">MOQ: 100 pcs</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item 5 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="aq-engraving-card">
                                <div class="aq-engraving-img-wrap">
                                    <img src="assets/img/corporate/backpack_gifts_1778668040094.webp" alt="Premium Metal Keychain">
                                    <div class="aq-engraving-overlay">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                    </div>
                                </div>
                                <div class="aq-engraving-content">
                                    <h3 class="aq-engraving-card-title">Premium Metal Keychain & Wallet Set</h3>
                                    <p class="aq-engraving-card-desc">Laser engraved for a long-lasting impression</p>
                                    <div class="aq-engraving-card-details">
                                        <span class="aq-engraving-price">₹1,500</span>
                                        <span class="aq-engraving-moq">MOQ: 25 pcs</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Item 6 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="aq-engraving-card">
                                <div class="aq-engraving-img-wrap">
                                    <img src="assets/img/corporate/welcome_kit_1778668006890.webp" alt="Stainless Steel Thermal Flask">
                                    <div class="aq-engraving-overlay">
                                        <i class="fa-solid fa-magnifying-glass-plus"></i>
                                    </div>
                                </div>
                                <div class="aq-engraving-content">
                                    <h3 class="aq-engraving-card-title">Stainless Steel Thermal Flask</h3>
                                    <p class="aq-engraving-card-desc">Sleek matte finish with custom brand etching</p>
                                    <div class="aq-engraving-card-details">
                                        <span class="aq-engraving-price">₹750</span>
                                        <span class="aq-engraving-moq">MOQ: 50 pcs</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row mt-50">
                        <div class="col-12 text-center">
                            <a href="#" class="aq-engraving-btn-outline">View More Engravings</a>
                        </div>
                    </div>
                </div>
            </section>

            <!-- CTA Section -->
            <section class="aq-engraving-cta-section">
                <div class="container">
                    <div class="aq-engraving-cta-box">
                        <div class="row align-items-center">
                            <div class="col-lg-8 text-center text-lg-start mb-4 mb-lg-0">
                                <h2 class="aq-engraving-cta-title">Want Your Brand Engraved?</h2>
                                <p class="aq-engraving-cta-desc">From diaries to drinkware — we make your logo look premium and memorable.</p>
                            </div>
                            <div class="col-lg-4 text-center text-lg-end">
                                <button type="button" class="aq-engraving-btn-solid" data-bs-toggle="modal" data-bs-target="#bulkOrderModal">
                                    Start Your Customization Project
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>

    </main>


@endsection