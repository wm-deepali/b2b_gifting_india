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
                        <div class="aq-occasion-grid" id="occasion-container">

    @if($occasions->count())
        @include('front-pages.partials.occasion-items', ['occasions' => $occasions])
    @else
        <div class="col-12 text-center">
            <p>No occasions found.</p>
        </div>
    @endif

</div>
                       
@if($occasions->hasMorePages())
    <div id="occasion-loader"
         data-page="2"
         class="text-center py-4">
        Loading more occasions...
    </div>
@endif


                    </div>
                </div>
        </section>
        <!-- collection area end -->
    </main>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

   <script>
$(document).ready(function () {

    let loading = false;

    const loader = document.getElementById('occasion-loader');

    if (!loader) {
        return;
    }

    const observer = new IntersectionObserver(function (entries) {

        if (!entries[0].isIntersecting || loading) {
            return;
        }

        loading = true;

        let page = parseInt(loader.dataset.page);

        $.ajax({
            url: "{{ route('occasions') }}",
            type: "GET",
            data: {
                page: page
            },
         success: function (response) {

    $('#occasion-container').append(response.html);

    if (response.hasMorePages) {

        loader.dataset.page = page + 1;
        loading = false;

    } else {

        observer.disconnect();
        loader.remove();
    }
},
            error: function () {
                loading = false;
            }
        });

    }, {
        rootMargin: '200px'
    });

    observer.observe(loader);

});
</script>

@endsection