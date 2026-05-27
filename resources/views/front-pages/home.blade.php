@extends('layouts.app')
@section('content')

    <main>
        <!-- slider area start -->
        <div class="aqf-slider-area">
            <div class="swiper aqf-slider-active p-relative">

                <div class="swiper-wrapper">

                    @foreach($sliders as $slider)

                        <div class="swiper-slide">

                            <div class="aqf-slider-item aqf-slider-height d-flex align-items-center" data-bg-color="#F5F5F5">

                                <a href="{{ $slider->link ?: '#' }}" class="aq-slider-banner-overlay-link">
                                </a>

                                <div class="aqf-slider-thumb include-bg"
                                    data-background="{{ asset('storage/' . $slider->image) }}">
                                </div>

                                <div class="container">
                                    <div class="row align-items-center">
                                        <div class="col-xl-6 col-lg-7 col-md-8">
                                            <div class="aqf-slider-content">

                                                {{-- Keep existing content exactly as it is --}}

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    @endforeach

                </div>

                <div class="aqf-slider-dot"></div>

            </div>
        </div>
        <!-- slider area end -->

        <!-- text slide area start -->
        <div class="aqf-text-slide-area aqf-text-slide-bdr fix">

            <div class="aqf-text-slide-wrap pt-20 pb-20">

                @foreach($textSliders as $item)

                    <div class="aqf-text-slide-item">

                        <p>{{ $item->title }}</p>

                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="17" viewBox="0 0 15 17" fill="none">

                                <path d="M8.27778 0.5L0.5 10.1H7.5L6.72222 16.5L14.5 6.9H7.5L8.27778 0.5Z" stroke="currentcolor"
                                    stroke-linecap="round" stroke-linejoin="round">
                                </path>

                            </svg>
                        </span>

                    </div>

                @endforeach

            </div>

        </div>
        <!-- text slide area end -->

        <!-- categories area start -->
        <section class="aqf-categories-area">

            <div class="aqf-cat-floating-shape aqf-cat-shape-1">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
                </svg>
            </div>

            <div class="aqf-cat-floating-shape aqf-cat-shape-2">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                    stroke-linejoin="round">
                    <rect x="3" y="8" width="18" height="13" rx="2" ry="2" />
                    <path d="M12 8V21M3 13h18M12 8L7 2M12 8l5-6" />
                </svg>
            </div>

            <div class="container">

                <div class="row align-items-center mb-40">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
                        <div class="aq-creative-title-box">
                            <span class="aq-creative-subtitle">
                                Curated For You
                            </span>

                            <h4 class="aq-creative-title">
                                Shop by Category
                            </h4>

                            <div class="aq-creative-title-line"></div>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4">

                    @foreach($popularCategories as $category)

                        <div class="col">

                            <div class="aqf-categories-item text-center">

                                <a href="{{ route('category.products', $category->slug) }}">

                                    <div class="aqf-categories-img">

                                        <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                            loading="lazy">

                                    </div>

                                    <span>
                                        {{ $category->name }}
                                    </span>

                                </a>

                            </div>

                        </div>

                    @endforeach

                </div>

            </div>

            <div class="readmore-btn">

                <div class="aq-header-top-bulk-orders d-none d-lg-inline-block">

                    <a href="{{ route('categories') }}" class="aq-loadmore-btn">

                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">

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

        </section>
        <!-- categories area end -->

        <!-- product area start -->
        <section>
            <div class="aq-product-area pt-20 pb-20">
                <div class="container">
                    <div class="aq-product-top mb-40">
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="aq-creative-title-box">
                                    <span class="aq-creative-subtitle">Top Rated</span>
                                    <h4 class="aq-creative-title">Best Selling</h4>
                                    <div class="aq-creative-title-line"></div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="aq-product-tab-btn text-center mb-15">
                                    <ul class="nav nav-tab d-inline-flex" id="myTab" role="tablist">
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-links active" id="home-tab" data-bs-toggle="tab"
                                                data-bs-target="#home-tab-pane" type="button" role="tab"
                                                aria-controls="home-tab-pane" aria-selected="true">
                                                New Arrivals
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-links" id="profile-tab" data-bs-toggle="tab"
                                                data-bs-target="#profile-tab-pane" type="button" role="tab"
                                                aria-controls="profile-tab-pane" aria-selected="false">
                                                Best Sellers
                                            </button>
                                        </li>
                                        <li class="nav-item" role="presentation">
                                            <button class="nav-links" id="contact-tab" data-bs-toggle="tab"
                                                data-bs-target="#contact-tab-pane" type="button" role="tab"
                                                aria-controls="contact-tab-pane" aria-selected="false">
                                                Featured
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                            tabindex="0">
                            <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">

                                @foreach($newArrivals as $product)

                                    <div class="col">
                                        <div class="aq-product-item aq-product-main mb-20" data-lazy="true">

                                            <div class="aq-product-thumb aq-img-hover-wrap p-relative mb-10">

                                                @if($product->discount > 0 || $product->new_arrival)
                                                    <div class="aq-product-badge">

                                                        @if($product->discount > 0)

                                                            @if($product->discount_type == 'percentage')
                                                                <span class="clr-sale">
                                                                    -{{ rtrim(rtrim(number_format($product->discount, 2), '0'), '.') }}%
                                                                </span>
                                                            @else
                                                                <span class="clr-sale">
                                                                    ₹{{ number_format($product->discount) }} OFF
                                                                </span>
                                                            @endif

                                                        @endif

                                                        @if($product->new_arrival)
                                                            <span class="clr-new">new</span>
                                                        @endif

                                                    </div>
                                                @endif

                                                <div class="aq-product-action">
                                                    <button type="button" class="aq-product-action-btn aq-tooltip"
                                                        data-bs-toggle="modal" data-bs-target="#producQuickViewModal">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16"
                                                            viewBox="0 0 19 16" fill="none">
                                                            <path
                                                                d="M12.0557 7.75429C12.0557 9.42922 10.7022 10.7827 9.0273 10.7827C7.35238 10.7827 5.99891 9.42922 5.99891 7.75429C5.99891 6.07937 7.35238 4.72589 9.0273 4.72589C10.7022 4.72589 12.0557 6.07937 12.0557 7.75429Z"
                                                                stroke="currentcolor" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M9.02734 14.75C12.0134 14.75 14.7965 12.9905 16.7337 9.94517C17.495 8.75242 17.495 6.74758 16.7337 5.55483C14.7965 2.50952 12.0134 0.75 9.02734 0.75C6.04124 0.75 3.25816 2.50952 1.321 5.55483C0.559668 6.74758 0.559668 8.75242 1.321 9.94517C3.25816 12.9905 6.04124 14.75 9.02734 14.75Z"
                                                                stroke="currentcolor" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                        <span class="aq-tooltip-item">Quick View</span>
                                                    </button>

                                                    <button type="button"
                                                        class="aq-product-action-btn aq-wishlist-btn aq-tooltip">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16"
                                                            viewBox="0 0 18 16" fill="none">
                                                            <path
                                                                d="M14.7197 1.52347C12.5744 0.244089 10.7019 0.759666 9.57712 1.58092C9.11591 1.91766 8.88531 2.08602 8.74963 2.08602C8.61396 2.08602 8.38336 1.91766 7.92215 1.58092C6.79733 0.759666 4.9249 0.244089 2.77958 1.52347C-0.0359114 3.20253 -0.67299 8.7418 5.82126 13.4151C7.05821 14.3052 7.67668 14.7502 8.74963 14.7502C9.82258 14.7502 10.4411 14.3052 11.678 13.4151C18.1723 8.7418 17.5352 3.20253 14.7197 1.52347Z"
                                                                stroke="currentcolor" stroke-width="1.5" stroke-linecap="round">
                                                            </path>
                                                        </svg>
                                                        <span class="aq-tooltip-item">Add To Wishlist</span>
                                                    </button>
                                                </div>

                                                <a href="{{ route('product.details', $product->slug) }}">

                                                    <img class="lazyload aq-product-img"
                                                        src="{{ asset('storage/' . $product->display_image) }}"
                                                        alt="{{ $product->name }}" loading="lazy" />

                                                    <img class="aq-img-hover lazyload"
                                                        src="{{ asset('storage/' . $product->display_image) }}"
                                                        alt="{{ $product->name }}" loading="lazy" />

                                                </a>

                                            </div>

                                            <div class="aq-product-content text-center text-md-start">

                                                <h4 class="aq-product-title mb-10">
                                                    <a href="{{ route('product.details', $product->slug) }}">
                                                        {{ $product->name }}
                                                    </a>
                                                </h4>

                                                <div class="aq-product-price">

                                                    <ins>
                                                        <span class="aq-product-new-price">
                                                            ₹{{ number_format($product->price) }}
                                                        </span>
                                                    </ins>

                                                    @if($product->mrp > $product->price)
                                                        <del>
                                                            <span class="aq-product-old-price">
                                                                ₹{{ number_format($product->mrp) }}
                                                            </span>
                                                        </del>
                                                    @endif

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                        <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                            tabindex="0">
                            <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">

                                @foreach($bestSellers as $product)

                                    <div class="col">
                                        <div class="aq-product-item aq-product-main mb-20" data-lazy="true">

                                            <div class="aq-product-thumb aq-img-hover-wrap p-relative mb-10">

                                                @if($product->discount > 0 || $product->best_seller)
                                                    <div class="aq-product-badge">

                                                        @if($product->discount > 0)

                                                            @if($product->discount_type == 'percentage')
                                                                <span class="clr-sale">
                                                                    -{{ rtrim(rtrim(number_format($product->discount, 2), '0'), '.') }}%
                                                                </span>
                                                            @else
                                                                <span class="clr-sale">
                                                                    ₹{{ number_format($product->discount) }} OFF
                                                                </span>
                                                            @endif

                                                        @endif
                                                        @if($product->best_seller)
                                                            <span class="clr-hot">Hot</span>
                                                        @endif

                                                    </div>
                                                @endif

                                                <div class="aq-product-action">

                                                    <button type="button" class="aq-product-action-btn aq-tooltip"
                                                        data-bs-toggle="modal" data-bs-target="#producQuickViewModal">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16"
                                                            viewBox="0 0 19 16" fill="none">
                                                            <path
                                                                d="M12.0557 7.75429C12.0557 9.42922 10.7022 10.7827 9.0273 10.7827C7.35238 10.7827 5.99891 9.42922 5.99891 7.75429C5.99891 6.07937 7.35238 4.72589 9.0273 4.72589C10.7022 4.72589 12.0557 6.07937 12.0557 7.75429Z"
                                                                stroke="currentcolor" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M9.02734 14.75C12.0134 14.75 14.7965 12.9905 16.7337 9.94517C17.495 8.75242 17.495 6.74758 16.7337 5.55483C14.7965 2.50952 12.0134 0.75 9.02734 0.75C6.04124 0.75 3.25816 2.50952 1.321 5.55483C0.559668 6.74758 0.559668 8.75242 1.321 9.94517C3.25816 12.9905 6.04124 14.75 9.02734 14.75Z"
                                                                stroke="currentcolor" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>
                                                        <span class="aq-tooltip-item">Quick View</span>

                                                    </button>

                                                    <button type="button"
                                                        class="aq-product-action-btn aq-wishlist-btn aq-tooltip">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16"
                                                            viewBox="0 0 18 16" fill="none">
                                                            <path
                                                                d="M14.7197 1.52347C12.5744 0.244089 10.7019 0.759666 9.57712 1.58092C9.11591 1.91766 8.88531 2.08602 8.74963 2.08602C8.61396 2.08602 8.38336 1.91766 7.92215 1.58092C6.79733 0.759666 4.9249 0.244089 2.77958 1.52347C-0.0359114 3.20253 -0.67299 8.7418 5.82126 13.4151C7.05821 14.3052 7.67668 14.7502 8.74963 14.7502C9.82258 14.7502 10.4411 14.3052 11.678 13.4151C18.1723 8.7418 17.5352 3.20253 14.7197 1.52347Z"
                                                                stroke="currentcolor" stroke-width="1.5" stroke-linecap="round">
                                                            </path>
                                                        </svg>
                                                        <span class="aq-tooltip-item">Add To Wishlist</span>

                                                    </button>

                                                </div>

                                                <a href="{{ route('product.details', $product->slug) }}">

                                                    <img class="lazyload aq-product-img"
                                                        src="{{ asset('storage/' . $product->display_image) }}"
                                                        alt="{{ $product->name }}" loading="lazy" />

                                                    <img class="aq-img-hover lazyload"
                                                        src="{{ asset('storage/' . $product->display_image) }}"
                                                        alt="{{ $product->name }}" loading="lazy" />

                                                </a>

                                            </div>

                                            <div class="aq-product-content text-center text-md-start">

                                                <h4 class="aq-product-title mb-10">
                                                    <a href="{{ route('product.details', $product->slug) }}">
                                                        {{ $product->name }}
                                                    </a>
                                                </h4>

                                                <div class="aq-product-price">

                                                    <ins>
                                                        <span class="aq-product-new-price">
                                                            ₹{{ number_format($product->price) }}
                                                        </span>
                                                    </ins>

                                                    @if($product->mrp > $product->price)
                                                        <del>
                                                            <span class="aq-product-old-price">
                                                                ₹{{ number_format($product->mrp) }}
                                                            </span>
                                                        </del>
                                                    @endif

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                        <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                            tabindex="0">
                            <div class="row row-cols-xl-4 row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1">

                                @foreach($featuredProducts as $product)

                                    <div class="col">
                                        <div class="aq-product-item aq-product-main mb-20" data-lazy="true">

                                            <div class="aq-product-thumb aq-img-hover-wrap p-relative mb-10">

                                                @if($product->discount > 0 || $product->featured)
                                                    <div class="aq-product-badge">

                                                        @if($product->discount > 0)

                                                            @if($product->discount_type == 'percentage')
                                                                <span class="clr-sale">
                                                                    -{{ rtrim(rtrim(number_format($product->discount, 2), '0'), '.') }}%
                                                                </span>
                                                            @else
                                                                <span class="clr-sale">
                                                                    ₹{{ number_format($product->discount) }} OFF
                                                                </span>
                                                            @endif

                                                        @endif
                                                        @if($product->featured)
                                                            <span class="clr-hot">Hot</span>
                                                        @endif

                                                    </div>
                                                @endif

                                                <div class="aq-product-action">

                                                    {{-- KEEP YOUR EXISTING QUICK VIEW BUTTON --}}
                                                    <button type="button" class="aq-product-action-btn aq-tooltip"
                                                        data-bs-toggle="modal" data-bs-target="#producQuickViewModal">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19" height="16"
                                                            viewBox="0 0 19 16" fill="none">
                                                            <path
                                                                d="M12.0557 7.75429C12.0557 9.42922 10.7022 10.7827 9.0273 10.7827C7.35238 10.7827 5.99891 9.42922 5.99891 7.75429C5.99891 6.07937 7.35238 4.72589 9.0273 4.72589C10.7022 4.72589 12.0557 6.07937 12.0557 7.75429Z"
                                                                stroke="currentcolor" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                            <path
                                                                d="M9.02734 14.75C12.0134 14.75 14.7965 12.9905 16.7337 9.94517C17.495 8.75242 17.495 6.74758 16.7337 5.55483C14.7965 2.50952 12.0134 0.75 9.02734 0.75C6.04124 0.75 3.25816 2.50952 1.321 5.55483C0.559668 6.74758 0.559668 8.75242 1.321 9.94517C3.25816 12.9905 6.04124 14.75 9.02734 14.75Z"
                                                                stroke="currentcolor" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round"></path>
                                                        </svg>

                                                        <span class="aq-tooltip-item">Quick View</span>
                                                    </button>

                                                    {{-- KEEP YOUR EXISTING WISHLIST BUTTON --}}
                                                    <button type="button"
                                                        class="aq-product-action-btn aq-wishlist-btn aq-tooltip">

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="16"
                                                            viewBox="0 0 18 16" fill="none">
                                                            <path
                                                                d="M14.7197 1.52347C12.5744 0.244089 10.7019 0.759666 9.57712 1.58092C9.11591 1.91766 8.88531 2.08602 8.74963 2.08602C8.61396 2.08602 8.38336 1.91766 7.92215 1.58092C6.79733 0.759666 4.9249 0.244089 2.77958 1.52347C-0.0359114 3.20253 -0.67299 8.7418 5.82126 13.4151C7.05821 14.3052 7.67668 14.7502 8.74963 14.7502C9.82258 14.7502 10.4411 14.3052 11.678 13.4151C18.1723 8.7418 17.5352 3.20253 14.7197 1.52347Z"
                                                                stroke="currentcolor" stroke-width="1.5" stroke-linecap="round">
                                                            </path>
                                                        </svg>

                                                        <span class="aq-tooltip-item">Add To Wishlist</span>
                                                    </button>

                                                </div>

                                                <a href="{{ route('product.details', $product->slug) }}">

                                                    <img class="lazyload aq-product-img"
                                                        src="{{ asset('storage/' . $product->display_image) }}"
                                                        alt="{{ $product->name }}" loading="lazy" />

                                                    <img class="aq-img-hover lazyload"
                                                        src="{{ asset('storage/' . $product->display_image) }}"
                                                        alt="{{ $product->name }}" loading="lazy" />

                                                </a>

                                            </div>

                                            <div class="aq-product-content text-center text-md-start">

                                                <h4 class="aq-product-title mb-10">
                                                    <a href="{{ route('product.details', $product->slug) }}">
                                                        {{ $product->name }}
                                                    </a>
                                                </h4>

                                                <div class="aq-product-price">

                                                    <ins>
                                                        <span class="aq-product-new-price">
                                                            ₹{{ number_format($product->price) }}
                                                        </span>
                                                    </ins>

                                                    @if($product->mrp > $product->price)
                                                        <del>
                                                            <span class="aq-product-old-price">
                                                                ₹{{ number_format($product->mrp) }}
                                                            </span>
                                                        </del>
                                                    @endif

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- product area end -->

        <!-- Section 1: Premium Pastel Trust Cards Start -->
        <section class="aqf-pastel-features-section pt-40 pb-40">
            <div class="container">
                <div class="row g-4">
                    <!-- Card 1: Bulk Orders -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="aqf-pastel-card aqf-pastel-peach">
                            <div class="aqf-pastel-icon-wrapper">
                                <div class="aqf-pastel-icon">
                                    <i class="fa-solid fa-boxes-stacked"></i>
                                </div>
                            </div>
                            <div class="aqf-pastel-content">
                                <h4 class="aqf-pastel-title">Bulk Orders</h4>
                                <p class="aqf-pastel-desc">
                                    Seamless custom branding & scale-ready solutions for your
                                    premium enterprise requirements.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2: PAN India Delivery -->
                    <div class="col-lg-4 col-md-6 col-12">
                        <div class="aqf-pastel-card aqf-pastel-sage">
                            <div class="aqf-pastel-icon-wrapper">
                                <div class="aqf-pastel-icon">
                                    <i class="fa-solid fa-truck-fast"></i>
                                </div>
                            </div>
                            <div class="aqf-pastel-content">
                                <h4 class="aqf-pastel-title">PAN India Delivery</h4>
                                <p class="aqf-pastel-desc">
                                    Safe multi-location doorstep shipment and door-to-door
                                    tracking coverage nationwide.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3: Trusted by 500+ Companies -->
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="aqf-pastel-card aqf-pastel-champagne">
                            <div class="aqf-pastel-icon-wrapper">
                                <div class="aqf-pastel-icon">
                                    <i class="fa-solid fa-handshake"></i>
                                </div>
                            </div>
                            <div class="aqf-pastel-content">
                                <h4 class="aqf-pastel-title">Trusted by 500+ Companies</h4>
                                <p class="aqf-pastel-desc">
                                    The trusted corporate gifting choice of leading corporate
                                    firms and major global brands.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Section 1: Premium Pastel Trust Cards End -->

        <!-- collection area start -->
        @php

            $featuredOccasion = $occasions->first();

            $otherOccasions = $occasions->skip(1);

        @endphp
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

                    <div class="gifting_occasions">
                        <div class="gifting_wrapper">

                            @if($featuredOccasion)

                                <div class="gifting_left_section">

                                    <div class="gifting_left_card">

                                        <img src="{{ asset('storage/' . $featuredOccasion->image) }}"
                                            alt="{{ $featuredOccasion->title }}">

                                        <div class="gifting_overlay">

                                            <h2>

                                                {{ $featuredOccasion->title }}

                                            </h2>

                                            <a href="#" class="gifting_btn">

                                                Explore Now

                                            </a>

                                        </div>

                                    </div>

                                    <div class="col-12">

                                        <div class="gifting_left_button">

                                            <div class="aqf-pastel-card aqf-pastel-peach">

                                                <div class="aqf-pastel-icon-wrapper">
                                                    <div class="aqf-pastel-icon">
                                                        <i class="fa-solid fa-boxes-stacked"></i>
                                                    </div>
                                                </div>

                                                <div class="aqf-pastel-content">

                                                    <h4 class="aqf-pastel-title">
                                                        Bulk Orders
                                                    </h4>

                                                    <p class="aqf-pastel-desc">

                                                        Seamless custom branding & scale-ready
                                                        solutions for your premium enterprise
                                                        requirements.

                                                    </p>

                                                </div>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                            @endif
                            <div class="gifting_right_cards">

                                @foreach($otherOccasions as $occasion)

                                    <div class="aqf-collection-item p-relative" style="cursor:pointer;">

                                        <div class="aqf-collection-thumb">

                                            <img src="{{ asset('storage/' . $occasion->image) }}" alt="{{ $occasion->title }}"
                                                loading="lazy">

                                        </div>

                                        <div
                                            class="aqf-collection-content-wrap d-flex align-items-center justify-content-between">

                                            <div class="aqf-collection-content">

                                                <h4 class="aqf-collection-title">

                                                    <a href="#">

                                                        {{ $occasion->title }}

                                                    </a>

                                                </h4>

                                                <span>

                                                    {{ $occasion->sub_title }}

                                                </span>

                                            </div>

                                            <div class="aqf-collection-link-wrap">

                                                <a class="aqf-collection-link" href="#">

                                                    <span>

                                                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12"
                                                            viewBox="0 0 12 12" fill="none">

                                                            <path
                                                                d="M0.75 5.75H10.75M10.75 5.75L5.75 0.75M10.75 5.75L5.75 10.75"
                                                                stroke="currentcolor" stroke-width="1.5" stroke-linecap="round"
                                                                stroke-linejoin="round">
                                                            </path>

                                                        </svg>

                                                    </span>

                                                </a>

                                            </div>

                                        </div>

                                    </div>

                                @endforeach

                            </div>

                        </div>


                        <div class="readmore-btn">
                            <div class="aq-header-top-bulk-orders d-none d-lg-inline-block">
                                <a href="{{ route('occasions') }}" class="aq-loadmore-btn">
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
                                    <span>LOAD MORE OCCASIONS</span>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Section Title -->
                    <!-- <div class="aqf-collection-top mb-40 mt-50">
                                                                                                                            <div class="row align-items-end">
                                                                                                                                <div class="col-md-12">
                                                                                                                                    <div class="aq-creative-title-box">
                                                                                                                                        <span class="aq-creative-subtitle">Premium Selections</span>
                                                                                                                                        <h4 class="aq-creative-title">Bespoke Curation Categories</h4>
                                                                                                                                        <div class="aq-creative-title-line"></div>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </div> -->


                </div>
            </div>
        </section>
        <!-- collection area end -->


        <!-- deals area start -->
        <section>
            <div class="aqf-deals-area">
                <div class="aqf-deals-wrap py-5" data-bg-color="rgba(0, 49, 8, 0.08)">
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-5 col-lg-6">
                                <div class="aqf-deals-banner-wrap p-relative mr-30">
                                    <div class="aqf-deals-banner-slides">
                                        <!-- Slide 1: Premium Corporate Gifts & Gadgets -->
                                        <div class="aqf-deals-banner-slide active">
                                            <div class="aqf-deals-banner-thumb">
                                                <img class="w-100"
                                                    src="{{ asset('assets/img/corporate/premium_gadgets_1778668027534.webp') }}"
                                                    alt="" loading="lazy" />
                                            </div>
                                            <div class="aqf-deals-banner-content">
                                                <h4 class="aq-section-title fs-44 aq-text-white mb-20">
                                                    Corporate <br />
                                                    Gifts
                                                    <span>That Leave <br />
                                                        A Lasting Impression</span>
                                                </h4>
                                                <span class="aqf-deals-discount-tag">Up to 25% Off</span>
                                            </div>
                                            <div class="aqf-deals-banner-btn">
                                                <a class="aq-btn-black blur-bg w-100 text-center"
                                                    href="product-full-width.html">Shop Collection</a>
                                            </div>
                                        </div>

                                        <!-- Slide 2: Welcome Kits & Backpacks -->
                                        <div class="aqf-deals-banner-slide">
                                            <div class="aqf-deals-banner-thumb">
                                                <img class="w-100"
                                                    src="{{ asset('assets/img/corporate/backpack_gifts_1778668040094.webp') }}"
                                                    alt="" loading="lazy" />
                                            </div>
                                            <div class="aqf-deals-banner-content">
                                                <h4 class="aq-section-title fs-44 aq-text-white mb-20">
                                                    Welcome <br />
                                                    Kits
                                                    <span>Premium Quality <br />
                                                        Gear & Backpacks</span>
                                                </h4>
                                                <span class="aqf-deals-discount-tag">New Onboarding Packs</span>
                                            </div>
                                            <div class="aqf-deals-banner-btn">
                                                <a class="aq-btn-black blur-bg w-100 text-center"
                                                    href="product-full-width.html">Explore Bags</a>
                                            </div>
                                        </div>

                                        <!-- Slide 3: Executive Custom Apparel -->
                                        <div class="aqf-deals-banner-slide">
                                            <div class="aqf-deals-banner-thumb">
                                                <img class="w-100"
                                                    src="{{ asset('assets/img/corporate/apparel_gifts_1778668621245.webp') }}"
                                                    alt="" loading="lazy" />
                                            </div>
                                            <div class="aqf-deals-banner-content">
                                                <h4 class="aq-section-title fs-44 aq-text-white mb-20">
                                                    Premium <br />
                                                    Apparel
                                                    <span>Custom Branded <br />
                                                        Corporate Outfits</span>
                                                </h4>
                                                <span class="aqf-deals-discount-tag">Exclusive Apparel</span>
                                            </div>
                                            <div class="aqf-deals-banner-btn">
                                                <a class="aq-btn-black blur-bg w-100 text-center"
                                                    href="product-full-width.html">Explore Apparel</a>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Slide Dots Navigation for Card Slider -->
                                    <div class="aqf-deals-banner-dots">
                                        <span class="aqf-deals-banner-dot active" data-deals-slide="0"></span>
                                        <span class="aqf-deals-banner-dot" data-deals-slide="1"></span>
                                        <span class="aqf-deals-banner-dot" data-deals-slide="2"></span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-6">
                                <div class="aqf-deals-slider-main pt-60 pb-40">
                                    <div class="aqf-deals-slider-top mb-15">
                                        <div class="row">
                                            <div class="col-xl-9 col-lg-9 col-md-6">
                                                <div class="aq-product-3-top-right mb-15">
                                                    <div class="aqf-deals-countbox d-flex align-items-center">
                                                        <div class="aqf-deals-tag-premium">
                                                            Special Corporate Deals
                                                        </div>
                                                        <div class="aqf-deals-subtitle-premium ml-25">
                                                            Curated Excellence for Your Brand
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-3 col-lg-3 col-md-6">
                                                <div
                                                    class="aqf-deals-slider-arrow d-flex justify-content-start justify-content-md-end align-items-center mb-15 mr-20">
                                                    <button class="aqf-deals-prev">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            viewBox="0 0 14 14" fill="none">
                                                            <path
                                                                d="M12.75 6.75H0.75M0.75 6.75L6.75 0.75M0.75 6.75L6.75 12.75"
                                                                stroke="currentcolor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </button>
                                                    <span class="aqf-arrow-border"></span>
                                                    <button class="aqf-deals-next">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                                            viewBox="0 0 14 14" fill="none">
                                                            <path
                                                                d="M0.75 6.75H12.75M12.75 6.75L6.75 0.75M12.75 6.75L6.75 12.75"
                                                                stroke="currentcolor" stroke-width="1.5"
                                                                stroke-linecap="round" stroke-linejoin="round"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="aqf-deals-slider-wrap fix">
                                        <div class="swiper aqf-deals-slider-active">
                                            <div class="swiper-wrapper">
                                                @foreach($saleProducts as $product)

                                                    <div class="swiper-slide">
                                                        <div class="aq-product-item aq-product-main text-center"
                                                            data-lazy="true">

                                                            <div class="aq-product-thumb aq-img-hover-wrap p-relative mb-10">

                                                                @if($product->discount > 0)
                                                                    <div class="aq-product-badge">

                                                                        @if($product->discount_type == 'percentage')
                                                                            <span class="clr-sale">
                                                                                -{{ $product->discount }}%
                                                                            </span>
                                                                        @else
                                                                            <span class="clr-sale">
                                                                                ₹{{ number_format($product->discount) }} OFF
                                                                            </span>
                                                                        @endif

                                                                    </div>
                                                                @endif

                                                                <div class="aq-product-action">
                                                                    <button type="button"
                                                                        class="aq-product-action-btn aq-tooltip">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                                            height="18" viewBox="0 0 18 18" fill="none">
                                                                            <path
                                                                                d="M6.19751 0.75L3.30151 3.654M11.3015 0.75L14.1975 3.654M6.95776 10.3501V13.1901M10.6375 10.3501V13.1901M1.94997 7.14993L3.07797 14.0619C3.33397 15.6139 3.94997 16.7499 6.23796 16.7499H11.062C13.55 16.7499 13.918 15.6619 14.206 14.1579L15.55 7.14993M0.75 5.42996C0.75 3.94996 1.542 3.82996 2.526 3.82996H14.974C15.958 3.82996 16.75 3.94996 16.75 5.42996C16.75 7.14996 15.958 7.02996 14.974 7.02996H2.526C1.542 7.02996 0.75 7.14996 0.75 5.42996Z"
                                                                                stroke="currentcolor" stroke-width="1.5"
                                                                                stroke-linecap="round"></path>
                                                                        </svg>
                                                                        <span class="aq-tooltip-item">Add to Cart</span>
                                                                    </button>
                                                                    <button type="button"
                                                                        class="aq-product-action-btn aq-tooltip"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#producQuickViewModal">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="19"
                                                                            height="16" viewBox="0 0 19 16" fill="none">
                                                                            <path
                                                                                d="M12.0557 7.75429C12.0557 9.42922 10.7022 10.7827 9.0273 10.7827C7.35238 10.7827 5.99891 9.42922 5.99891 7.75429C5.99891 6.07937 7.35238 4.72589 9.0273 4.72589C10.7022 4.72589 12.0557 6.07937 12.0557 7.75429Z"
                                                                                stroke="currentcolor" stroke-width="1.5"
                                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                            </path>
                                                                            <path
                                                                                d="M9.02734 14.75C12.0134 14.75 14.7965 12.9905 16.7337 9.94517C17.495 8.75242 17.495 6.74758 16.7337 5.55483C14.7965 2.50952 12.0134 0.75 9.02734 0.75C6.04124 0.75 3.25816 2.50952 1.321 5.55483C0.559668 6.74758 0.559668 8.75242 1.321 9.94517C3.25816 12.9905 6.04124 14.75 9.02734 14.75Z"
                                                                                stroke="currentcolor" stroke-width="1.5"
                                                                                stroke-linecap="round" stroke-linejoin="round">
                                                                            </path>
                                                                        </svg>
                                                                        <span class="aq-tooltip-item">Quick View</span>
                                                                    </button>
                                                                    <button type="button"
                                                                        class="aq-product-action-btn aq-wishlist-btn aq-tooltip">
                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18"
                                                                            height="16" viewBox="0 0 18 16" fill="none">
                                                                            <path
                                                                                d="M14.7197 1.52347C12.5744 0.244089 10.7019 0.759666 9.57712 1.58092C9.11591 1.91766 8.88531 2.08602 8.74963 2.08602C8.61396 2.08602 8.38336 1.91766 7.92215 1.58092C6.79733 0.759666 4.9249 0.244089 2.77958 1.52347C-0.0359114 3.20253 -0.67299 8.7418 5.82126 13.4151C7.05821 14.3052 7.67668 14.7502 8.74963 14.7502C9.82258 14.7502 10.4411 14.3052 11.678 13.4151C18.1723 8.7418 17.5352 3.20253 14.7197 1.52347Z"
                                                                                stroke="currentcolor" stroke-width="1.5"
                                                                                stroke-linecap="round"></path>
                                                                        </svg>
                                                                        <span class="aq-tooltip-item">Add To Wishlist</span>
                                                                    </button>
                                                                </div>

                                                                <a href="{{ route('product.details', $product->slug) }}">

                                                                    <img class="lazyload aq-product-img"
                                                                        src="{{ asset('storage/' . $product->display_image) }}"
                                                                        alt="{{ $product->name }}" loading="lazy" />

                                                                    <img class="aq-img-hover lazyload"
                                                                        src="{{ asset('storage/' . $product->display_image) }}"
                                                                        alt="{{ $product->name }}" loading="lazy" />

                                                                </a>

                                                            </div>

                                                            <div class="aq-product-content">

                                                                <h4 class="aq-product-title mb-10">
                                                                    <a href="{{ route('product.details', $product->slug) }}">
                                                                        {{ $product->name }}
                                                                    </a>
                                                                </h4>

                                                                <div class="aq-product-price">

                                                                    <ins>
                                                                        <span class="aq-product-new-price">
                                                                            ₹{{ number_format($product->price, 2) }}
                                                                        </span>
                                                                    </ins>

                                                                    @if($product->mrp > $product->price)
                                                                        <del>
                                                                            <span class="aq-product-old-price">
                                                                                ₹{{ number_format($product->mrp, 2) }}
                                                                            </span>
                                                                        </del>
                                                                    @endif

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div>

                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- deals area end -->

        <section>
            <div class="aq-luxury-tabs-section pt-20 pb-20 p-relative">
                <!-- Floating Shapes -->
                <div class="aq-luxury-shape luxury-shape-1 d-none d-xl-block">
                    <svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg">
                        <path fill="#C5A059" opacity="0.1"
                            d="M44.7,-76.4C58.3,-69.2,69.8,-57.4,77.3,-43.8C84.8,-30.2,88.3,-15.1,87.4,-0.5C86.5,14,81.1,28.1,72.9,40.3C64.6,52.5,53.5,62.8,40.8,70.5C28.1,78.2,14,83.3,-0.6,84.4C-15.3,85.4,-30.6,82.4,-44,75.1C-57.4,67.8,-68.9,56.3,-76.3,42.7C-83.6,29.1,-86.8,14.6,-87.3,-0.3C-87.8,-15.2,-85.7,-30.3,-78.6,-43.7C-71.5,-57.1,-59.4,-68.8,-45.5,-75.8C-31.5,-82.8,-15.8,-85.1,-0.1,-84.9C15.5,-84.7,31.1,-83.6,44.7,-76.4Z"
                            transform="translate(100 100)" />
                    </svg>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="aq-creative-title-box">
                                <span class="aq-creative-subtitle">Exquisite Selection</span>
                                <h4 class="aq-creative-title">Premium Collection</h4>
                                <div class="aq-creative-title-line"></div>
                            </div>
                        </div>
                    </div>

                    <div class="aq-luxury-tabs-wrapper">
                        <div class="row align-items-center">
                            <div class="col-xl-4 col-lg-5">
                                <div class="aq-luxury-tab-nav nav flex-column nav-pills" id="luxury-tabs" role="tablist"
                                    aria-orientation="vertical">
                                    @foreach($featuredCategories as $index => $category)

                                        <button class="aq-luxury-tab-card {{ $index == 0 ? 'active' : '' }}"
                                            id="tab-{{ $category->id }}-tab" data-bs-toggle="pill"
                                            data-bs-target="#tab-{{ $category->id }}" type="button">

                                            <span class="aq-luxury-tab-title">
                                                {{ $category->name }}
                                            </span>

                                            <span class="aq-luxury-tab-price">

                                                @if($category->min_price && $category->max_price)

                                                    ₹{{ number_format($category->min_price) }}

                                                    @if($category->min_price != $category->max_price)
                                                        - ₹{{ number_format($category->max_price) }}
                                                    @endif

                                                @else
                                                    Price on Request
                                                @endif

                                            </span>

                                            <div class="aq-luxury-tab-line"></div>

                                        </button>

                                    @endforeach
                                </div>
                            </div>

                            <div class="col-xl-8 col-lg-7">
                                <div class="tab-content aq-luxury-tab-content" id="luxury-tabsContent">
                                    @foreach($featuredCategories as $index => $category)

                                        <div class="tab-pane fade {{ $index == 0 ? 'show active' : '' }}"
                                            id="tab-{{ $category->id }}" role="tabpanel">

                                            <div class="aq-luxury-showcase">

                                                <div class="row g-4">

                                                    @foreach($category->products->take(6) as $product)

                                                        <div class="col-md-4">

                                                            <div class="aq-luxury-item-card">

                                                                <div class="aq-luxury-item-img">

                                                                    <img src="{{ asset('storage/' . $product->display_image) }}"
                                                                        alt="{{ $product->name }}" loading="lazy">

                                                                </div>

                                                                <div class="aq-luxury-item-info">

                                                                    <h4 class="aq-luxury-item-title">
                                                                        {{ $product->name }}
                                                                    </h4>

                                                                    <span class="aq-luxury-item-price">
                                                                        ₹{{ number_format($product->price) }}
                                                                    </span>

                                                                </div>

                                                            </div>

                                                        </div>

                                                    @endforeach

                                                </div>

                                                <div class="mt-40 text-center text-lg-start">

                                                    <a href="{{ route('category.products', $category->slug) }}"
                                                        class="aq-btn-luxury">

                                                        Explore {{ $category->name }}

                                                        <i class="fa-solid fa-arrow-right-long ml-10"></i>

                                                    </a>

                                                </div>

                                            </div>

                                        </div>

                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <div class="hero-section2 position-relative">
                <div class="aqf-floating-shape aqf-floating-shape-1">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="20 12 20 22 4 22 4 12"></polyline>
                        <rect x="2" y="7" width="20" height="5"></rect>
                        <line x1="12" y1="22" x2="12" y2="7"></line>
                        <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                        <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                    </svg>
                </div>
                <div class="aqf-floating-shape aqf-floating-shape-2">
                    <svg viewBox="0 0 100 100" fill="currentColor">
                        <path d="M50 0 L60 40 L100 50 L60 60 L50 100 L40 60 L0 50 L40 40 Z" />
                    </svg>
                </div>

                <div class="container">
                    <div class="row justify-content-center pt-20 pb-20">
                        <div class="col-xl-12">
                            <div class="aq-creative-title-box">
                                <span class="aq-creative-subtitle">Elegant Gifts for Every Celebration</span>
                                <h4 class="aq-creative-title">
                                    Elegant Gifts for Every Celebration
                                </h4>
                                <div class="aq-creative-title-line"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-3 pt-50">
                        <div class="col-lg-8">
                            <div class="hero-slider-wrap">
                                <div class="hero-slider swiper hero-slider-active">
                                    <div class="swiper-wrapper">
                                        <!-- Slide 1 -->
                                        <div class="hero-single swiper-slide">
                                            <div class="container">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12 col-lg-7">
                                                        <div class="hero-content">
                                                            <h6 class="hero-sub-title">
                                                                Bespoke Corporate Solutions
                                                            </h6>
                                                            <h1 class="hero-title">
                                                                Exquisite Gifts for <br /><span>Professional</span>
                                                                Excellence
                                                            </h1>
                                                            <p>
                                                                Strengthen your business bonds with our
                                                                meticulously curated gift collections,
                                                                designed to reflect your brand's commitment to
                                                                quality and prestige.
                                                            </p>
                                                            <div class="hero-btn">
                                                                <a href="#" class="aq-btn-black">Explore Collection
                                                                    <i class="fas fa-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-lg-5">
                                                        <div class="hero-right">
                                                            <div class="hero-img">
                                                                <img src="{{ asset('assets/img/corporate/banner1.webp') }}"
                                                                    alt="Banner 1" loading="lazy" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Slide 3 -->
                                        <div class="hero-single swiper-slide">
                                            <div class="container">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12 col-lg-7">
                                                        <div class="hero-content">
                                                            <h6 class="hero-sub-title">
                                                                Employee Appreciation
                                                            </h6>
                                                            <h1 class="hero-title">
                                                                Celebrate Your <br /><span>Success</span>
                                                                Together
                                                            </h1>
                                                            <p>
                                                                Recognize your team's hard work with premium
                                                                welcome kits and milestone gifts that inspire
                                                                loyalty and drive excellence within your
                                                                organization.
                                                            </p>
                                                            <div class="hero-btn">
                                                                <a href="#" class="aq-btn-black">View Kits <i
                                                                        class="fas fa-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-lg-5">
                                                        <div class="hero-right">
                                                            <div class="hero-img">
                                                                <img src="{{ asset('assets/img/corporate/banner3.webp') }}"
                                                                    alt="Banner 3" loading="lazy" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Slide 4 -->
                                        <div class="hero-single swiper-slide">
                                            <div class="container">
                                                <div class="row align-items-center">
                                                    <div class="col-md-12 col-lg-7">
                                                        <div class="hero-content">
                                                            <h6 class="hero-sub-title">
                                                                Global Shipping Available
                                                            </h6>
                                                            <h1 class="hero-title">
                                                                Premium Gifts <br /><span>Delivered</span>
                                                                Worldwide
                                                            </h1>
                                                            <p>
                                                                Our seamless international delivery ensures
                                                                your tokens of appreciation reach clients and
                                                                partners across the globe, maintaining your
                                                                global presence.
                                                            </p>
                                                            <div class="hero-btn">
                                                                <a href="#" class="aq-btn-black">Get Started
                                                                    <i class="fas fa-arrow-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 col-lg-5">
                                                        <div class="hero-right">
                                                            <div class="hero-img">
                                                                <img src="{{ asset('assets/img/corporate/banner4.webp') }}"
                                                                    alt="Banner 4" loading="lazy" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Swiper Pagination/Navigation -->
                                    <div class="swiper-pagination"></div>
                                    <div class="swiper-button-prev hero-slider-prev"></div>
                                    <div class="swiper-button-next hero-slider-next"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="small-banner">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-12 px-lg-0">
                                            <div class="banner-item">
                                                <img src="{{ asset('assets/img/corporate/mini-banner-1.webp') }}"
                                                    alt="Small Banner 1" loading="lazy" />
                                                <div class="banner-content">
                                                    <p>Luxury Curation</p>
                                                    <h3>
                                                        Curated Executive <br />
                                                        Hampers
                                                    </h3>
                                                    <a href="#">Discover Now</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-12 px-lg-0">
                                            <div class="banner-item">
                                                <img src="{{ asset('assets/img/corporate/mini-banner-2.webp') }}"
                                                    alt="Small Banner 2" loading="lazy" />
                                                <div class="banner-content">
                                                    <p>Tech Excellence</p>
                                                    <h3>
                                                        Premium Tech <br />
                                                        Gift Sets
                                                    </h3>
                                                    <a href="#">Shop Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>



        <!-- saller area start -->
        <section>
            <div class="aqf-seller-area fix pt-20 pb-20">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="aq-creative-title-box text-center">
                                <span class="aq-creative-subtitle">Premium B2B Solutions</span>
                                <h4 class="aq-creative-title">
                                    Personalized & Custom Gift Hampers
                                </h4>
                                <p class="aq-creative-desc mx-auto" style="max-width: 700px; color: #666; margin-top: 15px">
                                    Elevate your professional relationships with our bespoke
                                    gifting solutions. From executive hampers to custom-branded
                                    welcome kits, we curate premium experiences that leave a
                                    lasting impression on clients and employees alike.
                                </p>
                                <div class="aq-creative-title-line mx-auto"></div>
                            </div>
                        </div>
                    </div>
                    <div class="aq-product-slide-wrap p-relative">
                        <div class="aq-product-arrow">
                            <button class="aq-product-prev">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12"
                                        fill="none">
                                        <path d="M5.75 10.75L0.75 5.75L5.75 0.75" stroke="currentcolor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </button>
                            <button class="aq-product-next">
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="7" height="12" viewBox="0 0 7 12"
                                        fill="none">
                                        <path d="M0.75 10.75L5.75 5.75L0.75 0.75" stroke="currentcolor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </span>
                            </button>
                        </div>
                        <div class="swiper aq-product-active">
                            <div class="swiper-wrapper">
                                @foreach($engravingProducts as $product)

                                    <div class="swiper-slide">
                                        <div class="aq-product-item aq-product-main mb-20" data-lazy="true">

                                            <div class="aq-product-thumb aq-img-hover-wrap p-relative mb-10">

                                                @if($product->discount > 0)
                                                    <div class="aq-product-badge">

                                                        @if($product->discount_type == 'percentage')
                                                            <span class="clr-sale">
                                                                -{{ $product->discount }}%
                                                            </span>
                                                        @else
                                                            <span class="clr-sale">
                                                                ₹{{ number_format($product->discount) }} OFF
                                                            </span>
                                                        @endif

                                                    </div>
                                                @endif

                                                <div class="aq-product-action">
                                                    <button type="button" class="aq-product-action-btn aq-tooltip"
                                                        data-bs-toggle="modal" data-bs-target="#producQuickViewModal">
                                                        <i class="fa-regular fa-eye"></i>
                                                        <span class="aq-tooltip-item">Quick View</span>
                                                    </button>
                                                </div>

                                                <a href="{{ route('product.details', $product->slug) }}">

                                                    <img class="lazyload aq-product-img"
                                                        src="{{ asset('storage/' . $product->display_image) }}"
                                                        alt="{{ $product->name }}" loading="lazy" />

                                                    <img class="aq-img-hover lazyload"
                                                        src="{{ asset('storage/' . $product->display_image) }}"
                                                        alt="{{ $product->name }}" loading="lazy" />

                                                </a>

                                            </div>

                                            <div class="aq-product-content text-center">

                                                <h4 class="aq-product-title mb-10">
                                                    <a href="{{ route('product.details', $product->slug) }}">
                                                        {{ $product->name }}
                                                    </a>
                                                </h4>

                                                <div class="aq-product-price">

                                                    <ins>
                                                        <span class="aq-product-new-price">
                                                            ₹{{ number_format($product->price) }}
                                                        </span>
                                                    </ins>

                                                    @if($product->mrp > $product->price)
                                                        <del>
                                                            <span class="aq-product-old-price">
                                                                ₹{{ number_format($product->mrp) }}
                                                            </span>
                                                        </del>
                                                    @endif

                                                </div>

                                            </div>

                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- saller area end -->

        <!-- summer area end -->
        <section>
            <div class="aqf-summer-suit-area p-relative pt-20 pb-20">
                <div class="aqf-floating-shape aqf-floating-shape-1">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linecap="round"
                        stroke-linejoin="round">
                        <polyline points="20 12 20 22 4 22 4 12"></polyline>
                        <rect x="2" y="7" width="20" height="5"></rect>
                        <line x1="12" y1="22" x2="12" y2="7"></line>
                        <path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path>
                        <path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path>
                    </svg>
                </div>
                <div class="aqf-floating-shape aqf-floating-shape-2">
                    <svg viewBox="0 0 100 100" fill="currentColor">
                        <path d="M50 0 L60 40 L100 50 L60 60 L50 100 L40 60 L0 50 L40 40 Z" />
                    </svg>
                </div>
                <div class="container">
                    <div class="aqf-summer-wrap" data-bg-color="#FAFAFA">
                        <div class="row align-items-center">
                            <div class="col-xl-5 col-lg-7 d-none d-lg-block">
                                <div class="aqf-summer-suit-img">
                                    <img src="{{ asset('assets/img/corporate/stationery_gifts_1778668654881.webp') }}"
                                        alt="Premium Corporate Gift" loading="lazy" />
                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-5">
                                <div class="aqf-summer-slider-wrap pl-35">
                                    <div class="row align-items-center">
                                        <div class="col-xl-7">
                                            <div class="aqf-summer-title-wrap">
                                                <span class="aq-section-subtitle mb-15">Curated Excellence</span>
                                                <h3 class="aq-section-title ff-satoshi-med fs-60">
                                                    Gifts that <br />
                                                    Empower Brands
                                                </h3>
                                            </div>
                                        </div>
                                        <div class="col-xl-5">
                                            <div class="aqf-summer-slider text-center mb-50">
                                                <div class="swiper aqf-summer-active">
                                                    <div class="swiper-wrapper">
                                                        <div class="swiper-slide">
                                                            <div class="aqf-summer-slider-item">
                                                                <img class="w-100"
                                                                    src="{{ asset('assets/img/corporate/eco_friendly_gifts_1778668670253.webp') }}"
                                                                    alt="Executive Tech Kit" loading="lazy" />
                                                            </div>
                                                        </div>
                                                        <div class="swiper-slide">
                                                            <div class="aqf-summer-slider-item">
                                                                <img class="w-100"
                                                                    src="{{ asset('assets/img/corporate/welcome_kit_1778668006890.webp') }}"
                                                                    alt="Luxury Gourmet Hamper" loading="lazy" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="aqf-summer-slider-arrow d-flex justify-content-center align-items-center mt-20">
                                                        <button class="aqf-summer-prev" aria-label="Previous deal">
                                                            <i class="fa-solid fa-arrow-left"></i>
                                                        </button>
                                                        <span class="aqf-arrow-border"></span>
                                                        <button class="aqf-summer-next" aria-label="Next deal">
                                                            <i class="fa-solid fa-arrow-right"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="aqf-summer-slider-content mb-60">
                                                <p>
                                                    Elevate your brand presence with our curated luxury
                                                    hampers. <br />
                                                    Hand-crafted excellence delivered across India for
                                                    your most valued partners.
                                                </p>
                                                <div class="aqf-summer-btn">
                                                    <a href="#" class="aq-btn-black">Explore Collection
                                                        <i class="fa-solid fa-arrow-right-long ml-10"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- summer area end -->

        <!-- reels area start -->
        <section>
            <div class="aqf-reels-area fix pb-50">
                <div class="container">
                    <div class="aqf-collection-top mb-40">
                        <div class="row align-items-end">
                            <div class="col-md-12">
                                <div class="aq-creative-title-box">
                                    <span class="aq-creative-subtitle">Video Showcase</span>
                                    <h4 class="aq-creative-title">Gift Inspiration Reels</h4>
                                    <div class="aq-creative-title-line"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="aqf-reels-slider-wrap">
                        <div class="swiper aqf-reels-active">
                            <div class="swiper-wrapper">
                                @foreach($reels as $reel)

                                                        <div class="swiper-slide">
                                                            <div class="aqf-reel-item p-relative">

                                                                <div class="aqf-reel-video">

                                                                    @if($reel->reel_file)

                                                                        <video autoplay muted loop playsinline preload="none">
                                                                            <source src="{{ asset('storage/' . $reel->reel_file) }}" type="video/mp4">
                                                                        </video>


                                                                    @elseif($reel->reel_url)

                                                                        <video autoplay muted loop playsinline preload="none">
                                                                            <source src="{{ $reel->reel_url }}" type="video/mp4">
                                                                        </video>

                                                                    @endif

                                                                </div>

                                                                <div class="aqf-reel-content-wrap">

                                                                    <div class="aqf-reel-profile">

                                                                        <img src="{{ $reel->photo
                                    ? asset('storage/' . $reel->photo)
                                    : asset('assets/img/default-user.png') }}" alt="{{ $reel->name }}"
                                                                            loading="lazy" />

                                                                        <h4 class="aqf-reel-title">
                                                                            {{ $reel->name }}
                                                                        </h4>

                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </div>

                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- reels area end -->

        <section>
            <div class="masonry-main-section p-relative pt-20 pb-20">
                <!-- Floating Star Shapes -->
                <div class="aq-star-shape star-1 d-none d-xl-block">
                    <svg viewBox="0 0 100 100" fill="#C5A059">
                        <path d="M50 0 L60 40 L100 50 L60 60 L50 100 L40 60 L0 50 L40 40 Z"></path>
                    </svg>
                </div>
                <div class="aq-star-shape star-2 d-none d-xl-block">
                    <svg viewBox="0 0 100 100" fill="#800000">
                        <path d="M50 0 L60 40 L100 50 L60 60 L50 100 L40 60 L0 50 L40 40 Z"></path>
                    </svg>
                </div>
                <div class="aq-star-shape star-3 d-none d-xl-block">
                    <svg viewBox="0 0 100 100" fill="#C5A059">
                        <path d="M50 0 L60 40 L100 50 L60 60 L50 100 L40 60 L0 50 L40 40 Z"></path>
                    </svg>
                </div>
                <div class="aq-star-shape star-4 d-none d-xl-block">
                    <svg viewBox="0 0 100 100" fill="#800000">
                        <path d="M50 0 L60 40 L100 50 L60 60 L50 100 L40 60 L0 50 L40 40 Z"></path>
                    </svg>
                </div>
                <div class="aq-star-shape star-5 d-none d-xl-block">
                    <svg viewBox="0 0 100 100" fill="#C5A059">
                        <path d="M50 0 L60 40 L100 50 L60 60 L50 100 L40 60 L0 50 L40 40 Z"></path>
                    </svg>
                </div>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="aq-creative-title-box pt-30">
                                <span class="aq-creative-subtitle">Curated Portfolio</span>
                                <h4 class="aq-creative-title">Our Premium Gifting Gallery</h4>
                                <div class="aq-creative-title-line"></div>
                            </div>
                        </div>
                    </div>

                    <div class="row g-4 masonry-wrapper">
                        <!-- COLUMN 1 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="masonry-column">
                                <div class="masonry-track direction-down">
                                    <div class="masonry-card h-md">
                                        <img src="{{ asset('assets/img/corporate/apparel_gifts_1778668621245.webp') }}"
                                            alt="Corporate Apparel" loading="lazy" />
                                    </div>

                                    <div class="masonry-card h-xl">
                                        <img src="{{ asset('assets/img/corporate/backpack_gifts_1778668040094.webp') }}"
                                            alt="Business Backpacks" loading="lazy" />
                                    </div>

                                    <div class="masonry-card h-sm">
                                        <img src="{{ asset('assets/img/corporate/eco_friendly_gifts_1778668670253.webp') }}"
                                            alt="Eco Friendly Gifts" loading="lazy" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- COLUMN 2 -->
                        <div class="col-lg-4 col-md-6">
                            <div class="masonry-column">
                                <div class="masonry-track direction-up">
                                    <div class="masonry-card h-xl">
                                        <img src="{{ asset('assets/img/corporate/hero_gift_box_1778667986732.webp') }}"
                                            alt="Executive Gift Box" loading="lazy" />
                                    </div>

                                    <div class="masonry-card h-md">
                                        <img src="{{ asset('assets/img/corporate/kitchen_appliances_1778668633577.webp') }}"
                                            alt="Kitchen Appliances" loading="lazy" />
                                    </div>

                                    <div class="masonry-card h-lg">
                                        <img src="{{ asset('assets/img/corporate/premium_gadgets_1778668027534.webp') }}"
                                            alt="Premium Tech Gadgets" loading="lazy" />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- COLUMN 3 -->
                        <div class="col-lg-4 col-md-12">
                            <div class="masonry-column">
                                <div class="masonry-track direction-down">
                                    <div class="masonry-card h-lg">
                                        <img src="{{ asset('assets/img/corporate/stationery_gifts_1778668654881.webp') }}"
                                            alt="Office Stationery" loading="lazy" />
                                    </div>

                                    <div class="masonry-card h-sm">
                                        <img src="{{ asset('assets/img/corporate/vouchers_gifts_retry_1778668716547.webp') }}"
                                            alt="Gift Vouchers" loading="lazy" />
                                    </div>

                                    <div class="masonry-card h-xl">
                                        <img src="{{ asset('assets/img/corporate/welcome_kit_1778668006890.webp') }}"
                                            alt="Employee Welcome Kit" loading="lazy" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- Our Brands section start -->
        <section class="aq-brands-section-wrap">
            <div class="container">

                <!-- Section Title -->
                <div class="aqf-collection-top mb-40">
                    <div class="row align-items-end">
                        <div class="col-md-12">
                            <div class="aq-creative-title-box">
                                <span class="aq-creative-subtitle">
                                    Premium Partnerships
                                </span>

                                <h4 class="aq-creative-title">
                                    Our Brands
                                </h4>

                                <div class="aq-creative-title-line"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="aq-brands-main-card">

                    <div class="row">

                        <div class="aqf-why-us-header">

                            <h2 class="aqf-why-us-title">
                                Trusted Global
                            </h2>

                            <div class="aqf-why-us-subtitle-wrap">

                                <div class="aqf-why-us-divider d-none d-lg-block"></div>

                                <p class="aqf-why-us-subtitle">
                                    Discover premium products from world-renowned brands across technology,
                                    lifestyle, home essentials, and wellness.
                                </p>

                            </div>

                        </div>

                        <!-- LEFT CATEGORY TABS -->
                        <div class="col-lg-3 col-md-4 mb-4 mb-md-0">

                            <div class="aq-brands-tab-nav" role="tablist">

                                @foreach($brandCategories as $category)

                                    <button class="aq-brands-tab-btn {{ $loop->first ? 'active' : '' }}"
                                        data-tab="category-{{ $category->id }}" role="tab"
                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">

                                        <span class="aq-brands-tab-bar"></span>

                                        <span>
                                            {{ $category->name }}
                                        </span>

                                    </button>

                                @endforeach

                            </div>

                        </div>

                        <!-- RIGHT BRAND LOGOS -->
                        <div class="col-lg-9 col-md-8">

                            @foreach($brandCategories as $category)

                                <div class="aq-brands-tab-pane {{ $loop->first ? 'active' : '' }}"
                                    id="category-{{ $category->id }}" role="tabpanel">

                                    <div class="aq-brands-logos-grid">

                                        @foreach($category->brands as $brand)

                                            <div class="aq-brand-logo-card">

                                                <div class="aq-brand-logo-inner">

                                                    <img class="aq-brand-logo-img" src="{{ asset('storage/' . $brand->logo) }}"
                                                        alt="{{ $brand->name }}" loading="lazy">

                                                </div>

                                            </div>

                                        @endforeach

                                    </div>

                                </div>

                            @endforeach

                        </div>

                    </div>

                </div>

            </div>
        </section>

        <!-- testimonial area start -->
        <section>
            <div class="aqf-testimonial-area-creative fix pt-20 pb-20">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="aq-creative-title-box">
                            <span class="aq-creative-subtitle">Client Testimonials</span>
                            <h2 class="aq-creative-title">The Voice of Excellence</h2>
                            <div class="aq-creative-title-line"></div>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-xl-12">
                            <div class="aqf-testimonial-slider p-relative">
                                <div class="aqf-testimonial-arrow">
                                    <button class="aqf-testimonial-prev" aria-label="Previous testimonial">
                                        <i class="fa-regular fa-chevron-left"></i>
                                    </button>
                                    <button class="aqf-testimonial-next" aria-label="Next testimonial">
                                        <i class="fa-regular fa-chevron-right"></i>
                                    </button>
                                </div>
                                <div class="swiper aqf-testimonial-active">
                                    <div class="swiper-wrapper">
                                        @foreach($testimonials as $testimonial)

                                                                        <div class="swiper-slide">

                                                                            <div class="aqf-testimonial-card-creative">

                                                                                <div class="aqf-testimonial-image-creative">

                                                                                    <img src="{{ $testimonial->photo
                                            ? asset('storage/' . $testimonial->photo)
                                            : asset('assets/img/no-image.png') }}" alt="{{ $testimonial->name }}"
                                                                                        loading="lazy" />

                                                                                </div>

                                                                                <div class="aqf-testimonial-content-creative">

                                                                                    <div class="aqf-testimonial-quote-v2">
                                                                                        <i class="fa-solid fa-quote-left"></i>
                                                                                    </div>

                                                                                    <div class="aqf-testimonial-text-v2">
                                                                                        <p>
                                                                                            "{{ $testimonial->feedback }}"
                                                                                        </p>
                                                                                    </div>

                                                                                    <div class="aqf-testimonial-author-v2">

                                                                                        <h4>{{ $testimonial->name }}</h4>

                                                                                        @if($testimonial->rating)
                                                                                            <span>
                                                                                                ⭐ {{ $testimonial->rating }}/5
                                                                                            </span>
                                                                                        @endif

                                                                                    </div>

                                                                                </div>

                                                                            </div>

                                                                        </div>

                                        @endforeach
                                    </div>
                                    <!-- Pagination -->
                                    <div class="aqf-testimonial-dot text-center"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- trust area start -->
                </div>
            </div>
        </section>

        <section>
            <div class="aqf-brand-area pt-20 pb-20">
                <div class="container">
                    <div class="aq-creative-title-box mb-60 pt-30">
                        <span class="aq-creative-subtitle">Trusted Partners</span>
                        <h2 class="aq-creative-title">
                            Trusted by 500+ Leading Companies
                        </h2>
                        <div class="aq-creative-title-line"></div>
                    </div>

                    <div class="swiper aq-brand-active">
                        <div class="swiper-wrapper align-items-center">

                            @foreach($clients as $client)

                                <div class="swiper-slide">
                                    <div class="aq-brand-item">

                                        <img src="{{ asset('storage/' . $client->logo) }}" alt="{{ $client->name }}"
                                            loading="lazy" />

                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- customer experience area start -->
        <section class="aqf-why-us-section">
            <div class="aqf-why-us-accent-bar"></div>
            <div class="container">
                <!-- Header -->
                <div class="aqf-why-us-header">
                    <h2 class="aqf-why-us-title">
                        We provide best <em>customer</em><br />experiences
                    </h2>
                    <div class="aqf-why-us-subtitle-wrap">
                        <div class="aqf-why-us-divider d-none d-lg-block"></div>
                        <p class="aqf-why-us-subtitle">
                            We ensure our customers have the best shopping experience
                        </p>
                    </div>
                </div>

                <!-- Feature Cards -->
                <div class="row g-4 aqf-why-us-cards">
                    <!-- Card 1 -->
                    <div class="col-xl-3 col-md-6">
                        <div class="aqf-why-card">
                            <div class="aqf-why-card-number">01</div>
                            <div class="aqf-why-card-icon">
                                <i class="fa-solid fa-circle-dollar-to-slot"></i>
                            </div>
                            <h4 class="aqf-why-card-title">Premium Quality</h4>
                            <p class="aqf-why-card-desc">
                                We ensure top-tier standards with a rigorous quality assurance
                                process for all bulk orders.
                            </p>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-xl-3 col-md-6">
                        <div class="aqf-why-card">
                            <div class="aqf-why-card-number">02</div>
                            <div class="aqf-why-card-icon">
                                <i class="fa-regular fa-face-smile"></i>
                            </div>
                            <h4 class="aqf-why-card-title">Branding Perfection</h4>
                            <p class="aqf-why-card-desc">
                                We guarantee precise logo placement and customization that
                                perfectly aligns with your brand.
                            </p>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-xl-3 col-md-6">
                        <div class="aqf-why-card">
                            <div class="aqf-why-card-number">03</div>
                            <div class="aqf-why-card-icon">
                                <i class="fa-solid fa-box-open"></i>
                            </div>
                            <h4 class="aqf-why-card-title">Curated Selection</h4>
                            <p class="aqf-why-card-desc">
                                Our team continuously sources unique and trendy gift ideas for
                                your professional needs.
                            </p>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="col-xl-3 col-md-6">
                        <div class="aqf-why-card">
                            <div class="aqf-why-card-number">04</div>
                            <div class="aqf-why-card-icon">
                                <i class="fa-solid fa-truck-fast"></i>
                            </div>
                            <h4 class="aqf-why-card-title">Fast &amp; Free Shipping</h4>
                            <p class="aqf-why-card-desc">
                                We offer fast and free shipping for our loyal customers.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- customer experience area end -->

        <!-- limited offer cta start -->
        <section>
            <div class="aq-cta-offer-section">
                <div class="aq-cta-offer-img-box">
                    <img src="{{ asset('assets/img/corporate/hero_gift_box_1778667986732.webp') }}" alt="Limited Offer"
                        loading="lazy" />
                </div>
                <div class="aq-cta-offer-content">
                    <span class="aq-cta-offer-tag">Get a Quote</span>
                    <h2 class="aq-cta-offer-title">
                        Bulk Discounts Available <br />
                        for Early Festive Bookings
                    </h2>
                    <div class="d-flex align-items-center gap-3 flex-wrap justify-content-center justify-content-md-start">
                        <a href="#" class="aq-cta-offer-btn">Enquire Now <i class="fa-solid fa-arrow-right-long"></i></a>
                        <a href="https://wa.me/" target="_blank" class="aq-cta-offer-btn aq-cta-whatsapp-btn"><i
                                class="fa-brands fa-whatsapp" style="margin-right: 6px"></i>
                            Connect on WhatsApp <i class="fa-solid fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </section>
        <!-- limited offer cta end -->

        <!-- newsletter area start -->
        <section class="aq-newsletter-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10">
                        <h2 class="aq-newsletter-title">
                            Subscribe for exclusive B2B gifting trends and corporate offers
                        </h2>
                        <p class="aq-newsletter-subtitle">
                            Get early access to our premium collections and bulk order
                            pricing guides.
                        </p>

                        <div class="aq-newsletter-form-wrap">
                            <form action="#" class="aq-newsletter-form">
                                <div class="aq-newsletter-input-group">
                                    <i class="fa-regular fa-envelope"></i>
                                    <input type="email" class="aq-newsletter-input" placeholder="Enter your email" />
                                </div>
                                <button type="submit" class="aq-newsletter-btn">
                                    Subscribe
                                </button>
                            </form>
                            <p class="aq-newsletter-footer">
                                You will be able to unsubscribe at any time. <br />
                                Read our Privacy Policy <a href="#">here</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- footer categories area start -->
        <section class="aq-footer-categories-section">
            <div class="container">
                <div class="aq-footer-cat-container">
                    <!-- Group 1: Recipient -->
                    <div class="aq-footer-cat-group">
                        <span class="aq-footer-cat-label">Shop by Recipient</span>
                        <div class="aq-footer-cat-links">
                            <a href="#" class="aq-footer-cat-link">Gifts for Employees</a>
                            <a href="#" class="aq-footer-cat-link">Gifts for Clients</a>
                            <a href="#" class="aq-footer-cat-link">Gifts for Executives</a>
                            <a href="#" class="aq-footer-cat-link">Gifts for Managers</a>
                            <a href="#" class="aq-footer-cat-link">Gifts for Vendors</a>
                            <a href="#" class="aq-footer-cat-link">Gifts for New Joinees</a>
                            <a href="#" class="aq-footer-cat-link">Gifts for Leadership</a>
                            <a href="#" class="aq-footer-cat-link">Corporate Bundles</a>
                            <a href="#" class="aq-footer-cat-link">Team Kits</a>
                        </div>
                    </div>

                    <!-- Group 2: Occasion -->
                    <div class="aq-footer-cat-group">
                        <span class="aq-footer-cat-label">Shop by Occasion</span>
                        <div class="aq-footer-cat-links">
                            <a href="#" class="aq-footer-cat-link">Employee Appreciation</a>
                            <a href="#" class="aq-footer-cat-link">Company Milestones</a>
                            <a href="#" class="aq-footer-cat-link">Product Launches</a>
                            <a href="#" class="aq-footer-cat-link">Conferences & Events</a>
                            <a href="#" class="aq-footer-cat-link">Retirement Gifts</a>
                            <a href="#" class="aq-footer-cat-link">Festive Corporate Hampers</a>
                            <a href="#" class="aq-footer-cat-link">Joining Kits</a>
                            <a href="#" class="aq-footer-cat-link">Reward & Recognition</a>
                        </div>
                    </div>

                    <!-- Group 3: Interest -->
                    <div class="aq-footer-cat-group">
                        <span class="aq-footer-cat-label">Shop By Interest</span>
                        <div class="aq-footer-cat-links">
                            <a href="#" class="aq-footer-cat-link">Tech Gadgets</a>
                            <a href="#" class="aq-footer-cat-link">Executive Stationery</a>
                            <a href="#" class="aq-footer-cat-link">Premium Drinkware</a>
                            <a href="#" class="aq-footer-cat-link">Gourmet Food Hampers</a>
                            <a href="#" class="aq-footer-cat-link">Eco-friendly Collections</a>
                            <a href="#" class="aq-footer-cat-link">Luxury Home Decor</a>
                            <a href="#" class="aq-footer-cat-link">Travel Essentials</a>
                            <a href="#" class="aq-footer-cat-link">Wellness Kits</a>
                        </div>
                    </div>

                    <!-- Group 4: Price -->
                    <div class="aq-footer-cat-group">
                        <span class="aq-footer-cat-label">By Price (Bulk)</span>
                        <div class="aq-footer-cat-links">
                            <a href="#" class="aq-footer-cat-link">Under â‚¹500</a>
                            <a href="#" class="aq-footer-cat-link">â‚¹500 to â‚¹1500</a>
                            <a href="#" class="aq-footer-cat-link">â‚¹1500 to â‚¹3000</a>
                            <a href="#" class="aq-footer-cat-link">Premium (â‚¹3000+)</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- footer categories area end -->
    </main>

@endsection