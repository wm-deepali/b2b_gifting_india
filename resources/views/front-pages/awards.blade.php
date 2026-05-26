@extends('layouts.app')

@section('content')

       <main>

        <!-- 1. Luxury Inner Banner / Hero Section -->
        <section class="aq-catpage-hero">
            <div class="aq-hero-glow"></div>
            <div class="aq-floating-gift-box aq-floating-shape-1">
                <i class="fa-solid fa-trophy"></i>
            </div>
            <div class="aq-floating-gift-box aq-floating-shape-2">
                <i class="fa-solid fa-medal"></i>
            </div>
            <div class="aq-catpage-hero-content">
                <h1 class="aq-catpage-title">Awards</h1>
                <div class="aq-catpage-breadcrumbs">
                    <a href="index.html">Home</a>
                    <span>/</span>
                    <span>Awards</span>
                </div>
            </div>
        </section>

        <div class="aq-awards-page-wrap">
            <section class="aq-awards-section pt-100 pb-100">
                <div class="container">
                    <div class="row align-items-center g-5">
                        <div class="col-lg-6">
                            <div class="aq-awards-content">
                                <span class="aq-section-title-sm aq-awards-title-sm">Our Achievements</span>
                                <h2 class="aq-section-title aq-awards-main-title">Awards & Recognition</h2>
                                <p class="aq-section-desc aq-awards-desc">
                                    Celebrating excellence in corporate gifting. Our commitment to quality, innovation, and customer satisfaction has been recognized by industry leaders.
                                </p>
                                
                                <div class="aq-awards-promise-box">
                                    <h3 class="aq-section-title aq-awards-promise-title">Every Award Reflects Our Promise</h3>
                                    <p class="aq-section-desc aq-awards-promise-desc">
                                        These recognitions motivate us to continue delivering excellence in quality, creativity, and customer experience. Thank you to all our clients and partners for trusting B2B Gifts India.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="aq-awards-image-wrap">
                                <div class="aq-image-box-premium">
                                    <img src="assets/img/corporate/welcome_kit_1778668006890.webp" alt="Awards & Recognition" class="aq-awards-img" />
                                    <div class="aq-image-box-overlay"></div>
                                </div>
                                <div class="aq-floating-badge aq-awards-badge">
                                    <div class="d-flex align-items-center gap-4">
                                        <div class="aq-awards-icon"><i class="fa-solid fa-award"></i></div>
                                        <div>
                                            <h4 class="aq-awards-rank">Top 10</h4>
                                            <p class="aq-awards-label">Corporate Gifting<br>Partner 2025</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="aq-floating-shape aq-awards-shape"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

    </main>

@endsection