@extends('layouts.app')

@section('content')

    <main class="aq-about-page">


        <!-- 1. Luxury Inner Banner / Hero Section -->
        <section class="aq-catpage-hero">
            <div class="aq-hero-glow"></div>
            <div class="aq-floating-gift-box aq-floating-shape-1">
                <i class="fa-solid fa-gift"></i>
            </div>
            <div class="aq-floating-gift-box aq-floating-shape-2">
                <i class="fa-solid fa-gem"></i>
            </div>
            <div class="aq-catpage-hero-content">
                <h1 class="aq-catpage-title">{{ $about->hero_title ?? 'About' }}</h1>
                <div class="aq-catpage-breadcrumbs">
                    <a href="{{ route('home') }}">Home</a>
                    <span>/</span>
                    <span>About</span>
                </div>
            </div>
        </section> <!-- collection area start -->

        <!-- Breadcrumb Bar -->
        <!-- <div class="aq-about-breadcrumb-wrap">
                                                <div class="container">
                                                    <div class="aq-details-breadcrumbs">
                                                        <a href="index.html">Home</a>
                                                        <span class="divider">/</span>
                                                        <span class="current">About Us</span>
                                                    </div>
                                                </div>
                                            </div> -->


        <!-- Luxury Stats Overlap Wrap -->
        <section class="aq-stats-wrap">
            <div class="container">

                <div class="row g-4">
                    @foreach(($about->stats ?? []) as $stat)
                        <div class="col-xl-3 col-md-6 col-sm-6">
                            <div class="stat-card">
                                <div class="stat-icon">
                                    <i class="{{ $stat['icon'] }}"></i>
                                </div>
                                <h3 class="stat-number">{{ $stat['number'] }}</h3>
                                <span class="stat-label">{{ $stat['label'] }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Journey & Goal (Discover Segment) -->
        <section class="aq-discover-section">
            <div class="container">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <span class="aq-section-title-sm">{{ $about->discover_subtitle ?? '' }}</span>
                        <h2 class="aq-section-title">{{ $about->discover_title ?? '' }}</h2>
                        <p class="aq-section-desc">
                            {{ $about->discover_para1 ?? '' }}
                        </p>
                        <p class="aq-section-desc">
                            {{ $about->discover_para2 ?? '' }}
                        </p>
                        <a href="javascript:void(0);" onclick="openGlobalDrawer('about_page')"
                            class="aq-about-btn-gold mt-10 enquiry-btn">{{ $about->discover_button_text ?? 'Get Started' }}</a>

                    </div>
                    <div class="col-lg-6">
                        <div class="aq-image-box-premium">
                            <img src="{{ $about->discover_image ? asset('storage/' . $about->discover_image) : asset('assets/img/corporate/welcome_kit_1778668006890.webp') }}"
                                alt="Corporate Welcome Gifting Kits Showcase" />
                            <div class="aq-image-box-overlay"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Philosophy / Tech section -->
        <section class="aq-tech-section">
            <div class="container">
                <div class="row justify-content-center text-center mb-50">
                    <div class="col-lg-8">
                        <span class="aq-section-title-sm">{{ $about->tech_subtitle ?? '' }}</span>
                        <h2 class="aq-section-title">{{ $about->tech_title ?? '' }}</h2>
                        <p class="aq-section-desc" style="max-width: 700px; margin: 0 auto;">
                            {{ $about->tech_description ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="row g-4">
                    @foreach(($about->tech_features ?? []) as $feature)
                        <div class="col-lg-4">
                            <div class="tech-feature-card">
                                <span class="tech-feature-icon"><i class="{{ $feature['icon'] }}"></i></span>
                                <h4 class="tech-feature-title">{{ $feature['title'] }}</h4>
                                <p class="tech-feature-desc">{{ $feature['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- CTA banner inside -->
                <div class="aq-reach-cta-banner d-flex align-items-center justify-content-between flex-wrap gap-4">
                    <div>
                        <h3 class="aq-reach-title">{{ $about->cta_title ?? '' }}</h3>
                        <p class="aq-reach-desc">{{ $about->cta_desc ?? '' }}</p>
                    </div>
                    <a href="javascript:void(0);" onclick="openGlobalDrawer('about_page')"
                        class="aq-about-btn-gold enquiry-btn"
                        style="background:#ffffff; color:#003108 !important; border-color:#ffffff; box-shadow:0 10px 20px rgba(0,0,0,0.1);">{{ $about->cta_button_text ?? 'Get a Custom Proposal' }}</a>
                </div>
            </div>
        </section>

        <!-- Brand Promise -->
        <section class="aq-promise-section">
            <div class="container">
                <div class="row justify-content-center text-center mb-50">
                    <div class="col-lg-8">
                        <span class="aq-section-title-sm">{{ $about->promise_subtitle ?? '' }}</span>
                        <h2 class="aq-section-title">{{ $about->promise_title ?? '' }}</h2>
                        <p class="aq-section-desc" style="max-width: 700px; margin: 0 auto;">
                            {{ $about->promise_description ?? '' }}
                        </p>
                    </div>
                </div>
                <div class="row g-4">
                    @foreach(($about->promise_cards ?? []) as $card)
                        <div class="col-lg-4 col-md-6">
                            <div class="promise-card">
                                <div class="promise-icon"><i class="{{ $card['icon'] }}"></i></div>
                                <h3 class="promise-title">{{ $card['title'] }}</h3>
                                <p class="promise-desc">{{ $card['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Vision Mission Splits -->
        <section class="aq-vision-mission-section">
            <div class="container">
                <div class="row g-5">
                    <!-- Vision Card -->
                    <div class="col-lg-6">
                        <div class="vision-mission-card">
                            <span class="vm-badge">{{ $about->vision_badge ?? '' }}</span>
                            <h3 class="vm-title">{{ $about->vision_title ?? '' }}</h3>
                            <p class="vm-desc">
                                {{ $about->vision_desc ?? '' }}
                            </p>
                        </div>
                    </div>
                    <!-- Mission Card -->
                    <div class="col-lg-6">
                        <div class="vision-mission-card">
                            <span class="vm-badge mission-badge">{{ $about->mission_badge ?? '' }}</span>
                            <h3 class="vm-title">{{ $about->mission_title ?? '' }}</h3>
                            <p class="vm-desc">
                                {{ $about->mission_desc ?? '' }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Meet Our Leadership Section -->
        <section class="aq-leadership-section">
            <div class="container">
                <div class="aq-section-title-wrapper text-center mb-50">
                    <h2 class="aq-section-title">Meet Our Leadership</h2>
                    <p class="aq-section-subtitle">
                        Passionate professionals dedicated to redefining corporate gifting in India
                    </p>
                </div>

                <div class="row g-4 justify-content-center">

                    @forelse($teams as $team)
                        <div class="col-lg-4 col-md-6">
                            <div class="aq-leader-card">
                                <div class="aq-leader-img-wrapper">

                                    <img src="{{ asset('storage/' . $team->image) }}" alt="{{ $team->name }}"
                                        class="aq-leader-img" loading="lazy">

                                    <div class="aq-leader-socials">
                                        <a href="#"><i class="fa-brands fa-linkedin-in"></i></a>
                                        <a href="#"><i class="fa-brands fa-twitter"></i></a>
                                        <a href="#"><i class="fa-regular fa-envelope"></i></a>
                                    </div>

                                </div>

                                <div class="aq-leader-info">
                                    <h4 class="aq-leader-name">
                                        {{ $team->name }}
                                    </h4>

                                    <span class="aq-leader-designation">
                                        {{ $team->designation }}
                                    </span>

                                    <p class="aq-leader-bio">
                                        {{ $team->description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12 text-center">
                            <p>No team members found.</p>
                        </div>
                    @endforelse

                </div>
            </div>
        </section>


        <!-- 6. Bottom Sticky Category Link Area (For SEO/Footer Links) -->
        <section class="aq-footer-categories-section">
            <div class="container">
                <div class="aq-footer-cat-container">
                    <div class="aq-footer-cat-group">
                        <span class="aq-footer-cat-label">Shop by Recipient</span>
                        <div class="aq-footer-cat-links">
                            @foreach($footerCategories as $footerCategory)
                                <a href="{{ route('category.products', $footerCategory->slug) }}" class="aq-footer-cat-link">
                                    {{ $footerCategory->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                    <div class="aq-footer-cat-group">
                        <span class="aq-footer-cat-label">Shop by Occasion</span>
                        <div class="aq-footer-cat-links">
                            @foreach($occasions->take(10) as $occasion)
                                <a href="{{ route('products', ['occasion' => $occasion->slug]) }}" class="aq-footer-cat-link">
                                    {{ $occasion->title }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection