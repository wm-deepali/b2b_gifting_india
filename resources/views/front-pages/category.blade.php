@extends('layouts.app')

@section('content')


    <!-- Categories Section -->
    <section class="py-8 bg-white md:py-24">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-2xl md:text-4xl font-bold text-gray-900 mb-3">Shop by Category</h2>
                <p class="text-gray-600 text-lg">Premium corporate gifting solutions for every occasion</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-2 md:gap-8">

@if($categories->count() > 0)
                @foreach($categories as $category)
                        <a href="{{ $category->children->count() > 0
    ? url('category/' . $category->slug)
    : url('products?subcategory=' . $category->slug) }}" class="group">

    <div class="relative overflow-hidden rounded-xl shadow-sm hover:shadow-2xl transition-all duration-300">

        <!-- Image -->
        <img src="{{ asset('storage/' . $category->image) }}" 
             alt="{{ $category->name }}"
             class="w-full h-48 md:h-72 object-cover group-hover:scale-105 transition-transform duration-500">

        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/30 to-transparent"></div>

        <!-- Product Count -->
        <div
            class="absolute top-3 right-3 md:top-5 md:right-5 
                   bg-white text-[#f4a261] text-[10px] md:text-xs 
                   font-bold px-3 py-1.5 md:px-4 md:py-2 rounded-2xl shadow">
            {{ $category->unique_products_count }} Products
        </div>

        <!-- Text -->
        <div class="absolute bottom-4 left-4 md:bottom-6 md:left-6 text-white">
            
            <h3 class="text-sm md:text-2xl font-semibold">
                {{ $category->name }}
            </h3>

            <p class="text-xs md:text-sm opacity-90 mt-1">
                {{ Str::limit($category->sub_title, 40) }}
            </p>

        </div>

    </div>
</a>

                @endforeach
                 @else

                    {{-- 🔥 EMPTY STATE --}}
                    <div class="col-span-4">
                        <div class="text-center p-10 border-2 border-dashed rounded-xl bg-gray-50">

                            <h3 class="text-lg font-semibold text-gray-700">
                                No Categories Found
                            </h3>

                            <p class="text-gray-500 mt-2">
                                Please check back later or explore other sections.
                            </p>

                            <a href="{{ url('/') }}"
                                class="inline-block mt-4 px-5 py-2 bg-[#f4a261] text-white rounded-lg hover:bg-[#e76f51]">
                                Go Home
                            </a>

                        </div>
                    </div>

                @endif


            </div>
            <div class="mt-10 flex justify-center">
                {{ $categories->links() }}
            </div>

        </div>
    </section>


@endsection