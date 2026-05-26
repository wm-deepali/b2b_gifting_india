@extends('layouts.app')

@section('content')

    <main>

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
                <h1 class="aq-catpage-title">Gifting Occasions</h1>
                <div class="aq-catpage-breadcrumbs">
                    <a href="index.html">Home</a>
                    <span>/</span>
                    <span>occasions</span>
                </div>
            </div>
        </section> <!-- collection area start -->
        <section>
            <div class="aqf-collection-area fix">
                <div class="container">
                    <!-- Section Title -->
                    <div class="aqf-collection-top mb-40">
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="aq-creative-title-box">
                                    <span class="aq-creative-subtitle">Celebrate Moments</span>
                                    <h4 class="aq-creative-title">Gifting Occasions</h4>
                                    <div class="aq-creative-title-line"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Main Occasions 4x2 Grid -->
                    <!-- <div class="aq-occasion-grid">


                                </div> -->

                    <div class="gifting_occasions">
                        <div class="aq-occasion-grid">

                            @forelse($occasions as $occasion)

                                <div class="aqf-collection-item p-relative" style="cursor: pointer;">
                                    <div class="aqf-collection-thumb">

                                        <img src="{{ $occasion->image ? asset('storage/' . $occasion->image) : asset('assets/img/no-image.png') }}"
                                            alt="{{ $occasion->title }}" loading="lazy" />

                                    </div>

                                    <div class="aqf-collection-content-wrap d-flex align-items-center justify-content-between">

                                        <div class="aqf-collection-content">

                                            <h4 class="aqf-collection-title">
                                                <a href="#" onclick="openEnquiryDrawer(event)">
                                                    {{ $occasion->title }}
                                                </a>
                                            </h4>

                                            <span>{{ $occasion->sub_title }}</span>

                                        </div>

                                        <div class="aqf-collection-link-wrap">
                                            <a class="aqf-collection-link" href="#" onclick="openEnquiryDrawer(event)">
                                                <span>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                        viewBox="0 0 12 12" fill="none">
                                                        <path d="M0.75 5.75H10.75M10.75 5.75L5.75 0.75M10.75 5.75L5.75 10.75"
                                                            stroke="currentcolor" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                        </path>
                                                    </svg>
                                                </span>
                                            </a>
                                        </div>

                                    </div>
                                </div>

                            @empty

                                <div class="col-12 text-center">
                                    <p>No occasions found.</p>
                                </div>

                            @endforelse

                        </div>

                        <div class="readmore-btn">
                            <div class="aq-header-top-bulk-orders d-none d-lg-inline-block">
                                <a href="occasions.html" class="aq-bulk-orders-btn">
                                    <i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round">
                                            <path
                                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                                            </path>
                                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                                        </svg>
                                    </i>
                                    <span>LOAD MORE CATEGORY</span>
                                </a>
                            </div>
                        </div>


                    </div>
                </div>
        </section>
        <!-- collection area end -->
    </main>
    


@endsection
