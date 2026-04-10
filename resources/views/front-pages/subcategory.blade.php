
@extends('layouts.app')

@section('content')


<div class="bg-gray-50 py-4 border-b">
    <div class="max-w-7xl mx-auto px-6">
        <nav class="text-sm text-gray-500 flex items-center gap-2">
            <a href="#" class="hover:text-[#f4a261]">Home</a>
            <span>›</span>
            <a href="#" class="hover:text-[#f4a261]">Categories</a>
            <span>›</span>
            <span class="text-gray-800 font-medium">Desktop Gifts</span>
        </nav>
    </div>
</div>

<!-- Page Header -->
<section class="py-16 bg-white">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-5xl font-bold text-gray-900 mb-4">Desktop Gifts</h1>
        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
            Premium desktop accessories perfect for corporate offices, employee gifting, and client appreciation.
        </p>
        <p class="mt-4 text-gray-500">Showing 48 products in this category</p>
    </div>
</section>

<!-- Sub Categories Grid -->
<section class="py-16 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">

            <!-- Sub Category 1 -->
            <a href="#" class="subcat-card bg-white group">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1586966956234-1c1e4a0f9f9a" 
                         alt="Diaries & Notebooks" 
                         class="subcat-img w-full">
                    <div class="absolute top-4 right-4 bg-white text-[#f4a261] text-xs font-bold px-4 py-1.5 rounded-2xl shadow">
                        18 Products
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800">Diaries & Notebooks</h3>
                    <p class="text-gray-500 mt-2">Premium leather & PU diaries with custom engraving</p>
                </div>
            </a>

            <!-- Sub Category 2 -->
            <a href="#" class="subcat-card bg-white group">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1600585154526-990dced4cb0d" 
                         alt="Pen Sets" 
                         class="subcat-img w-full">
                    <div class="absolute top-4 right-4 bg-white text-[#f4a261] text-xs font-bold px-4 py-1.5 rounded-2xl shadow">
                        12 Products
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800">Pen Sets</h3>
                    <p class="text-gray-500 mt-2">Luxury metal & wooden pen sets with branding</p>
                </div>
            </a>

            <!-- Sub Category 3 -->
            <a href="#" class="subcat-card bg-white group">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1511707171634-5f897ff02aa9" 
                         alt="Desk Organizers" 
                         class="subcat-img w-full">
                    <div class="absolute top-4 right-4 bg-white text-[#f4a261] text-xs font-bold px-4 py-1.5 rounded-2xl shadow">
                        9 Products
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800">Desk Organizers</h3>
                    <p class="text-gray-500 mt-2">Modern desk accessories & organizers</p>
                </div>
            </a>

            <!-- Sub Category 4 -->
            <a href="#" class="subcat-card bg-white group">
                <div class="relative">
                    <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a9c" 
                         alt="Executive Sets" 
                         class="subcat-img w-full">
                    <div class="absolute top-4 right-4 bg-white text-[#f4a261] text-xs font-bold px-4 py-1.5 rounded-2xl shadow">
                        6 Products
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-semibold text-gray-800">Executive Gift Sets</h3>
                    <p class="text-gray-500 mt-2">Complete desk gift sets for senior management</p>
                </div>
            </a>

        </div>

    </div>
</section>

@endsection