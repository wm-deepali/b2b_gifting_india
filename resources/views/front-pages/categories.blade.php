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
                <h1 class="aq-catpage-title">Corporate Gifting Categories</h1>
                <div class="aq-catpage-breadcrumbs">
                    <a href="{{ route('home') }}">Home</a>
                    <span>/</span>
                    <span>Categories</span>
                </div>
            </div>
        </section>
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
                            <span class="aq-creative-subtitle">Curated For You</span>
                            <h4 class="aq-creative-title">Shop by Category</h4>
                            <div class="aq-creative-title-line"></div>
                        </div>
                    </div>
                </div>
             
                <div class="row row-cols-2 row-cols-sm-3 row-cols-md-4 row-cols-lg-5 g-4 pb-30"
     id="category-container">

    @if($categories->count())
        @include('front-pages.partials.category-items', ['categories' => $categories])
    @else
        <div class="col-12 text-center">
            <p>No categories found.</p>
        </div>
    @endif

</div>

                @if($categories->hasMorePages())
    <div id="category-loader"
         data-page="2"
         class="text-center py-4">
        Loading more categories...
    </div>
@endif

            </div>
        </section>
        <!-- categories area end -->
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {

    let loading = false;

    const loader = document.getElementById('category-loader');

    if (!loader) return;

    const observer = new IntersectionObserver(function(entries) {

        if (!entries[0].isIntersecting || loading) {
            return;
        }

        loading = true;

        let page = parseInt(loader.dataset.page);

        $.ajax({
            url: "{{ route('categories') }}",
            type: "GET",
            data: {
                page: page
            },
            success: function(response) {

                if ($.trim(response) === '') {
                    observer.disconnect();
                    loader.remove();
                    return;
                }

                $('#category-container').append(response);

                loader.dataset.page = page + 1;
                loading = false;
            },
            error: function() {
                loading = false;
            }
        });

    }, {
        rootMargin: '300px'
    });

    observer.observe(loader);

});
</script>
@endsection