@extends('layouts.app')

@section('content')


    <!-- Categories Section -->
    <section class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Section Header -->
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-900 mb-3">Shop by Category</h2>
                <p class="text-gray-600 text-lg">Premium corporate gifting solutions for every occasion</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

                @foreach($categories as $category)
                        <a href="{{ $category->children->count() > 0
                    ? url('category/' . $category->slug)
                    : url('products?subcategory=' . $category->slug) }}" class="group">
                            <div
                                class="relative overflow-hidden rounded-3xl shadow-sm hover:shadow-2xl transition-all duration-300">

                                <img src="{{ asset('storage/' . $category->image) }}" alt="{{ $category->name }}"
                                    class="w-full h-72 object-cover group-hover:scale-105 transition-transform duration-500">

                                <div class="absolute inset-0 bg-gradient-to-t from-black/75 via-black/30 to-transparent"></div>

                                <!-- Product Count -->
                                <div
                                    class="absolute top-5 right-5 bg-white text-[#f4a261] text-xs font-bold px-4 py-2 rounded-2xl shadow">
                                    {{ $category->products_count }} Products
                                </div>

                                <div class="absolute bottom-6 left-6 text-white">
                                    <h3 class="text-2xl font-semibold">{{ $category->name }}</h3>
                                    <p class="text-sm opacity-90 mt-1">
                                        {{ Str::limit($category->sub_title, 40) }}
                                    </p>
                                </div>
                            </div>
                        </a>
                @endforeach

            </div>

        </div>
    </section>


@endsection