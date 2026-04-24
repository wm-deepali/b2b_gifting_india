@extends('layouts.app')

@section('meta_title', $category->meta_title ?? $category->name)
@section('meta_description', $category->meta_description ?? $category->sub_title)

@section('content')


    <div class="bg-gray-50 py-4 border-b">
        <div class="max-w-7xl mx-auto px-6">
            <nav class="text-sm text-gray-500 flex items-center gap-2">
                <a href="{{ url('/') }}" class="hover:text-[#f4a261]">Home</a>
                <span>›</span>
                <a href="{{ url('/category') }}" class="hover:text-[#f4a261]">Categories</a>
                <span>›</span>
                <span class="text-gray-800 font-medium">{{ $category->name }}</span>
            </nav>
        </div>
    </div>

    <!-- Page Header -->
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-gray-900 mb-4"> {{ $category->name }}</h1>
            <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                {{ $category->sub_title }}
            </p>
            <p class="mt-4 text-gray-500"> Showing {{ $totalProducts }} products in this category</p>
        </div>
    </section>

    <!-- Sub Categories Grid -->
    <section class="py-8 md:py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-6">

            <div class="grid grid-cols-2 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 md:gap-8">

                @if($subcategories->count() > 0)
                    @foreach($subcategories as $sub)
                        <a href="{{ route('products', ['subcategory' => $sub->slug]) }}" class="subcat-card bg-white group">

                            <div class="relative h-40 md:h-auto overflow-hidden">
                                <img src="{{ asset('storage/' . $sub->image) }}" alt="{{ $sub->name }}" class="subcat-img w-full">

                                <div
                                    class="absolute top-4 right-4 bg-white text-[#f4a261] text-xs font-bold px-4 py-1.5 rounded-2xl shadow">
                                    {{ $sub->subcategory_products_count }} Products
                                </div>
                            </div>

                            <div class="p-3 md:p-6">
                                <h3 class="text-sm md:text-2xl font-semibold text-gray-800">
                                    {{ $sub->name }}
                                </h3>

                                <p class="text-gray-500 mt-2">
                                    {{ Str::limit($sub->sub_title, 60) }}
                                </p>
                            </div>

                        </a>
                    @endforeach
                @else

                    {{-- 🔥 EMPTY STATE (ONLY SUBCATEGORY CASE) --}}
                    <div class="col-span-4">
                        <div class="text-center p-10 border-2 border-dashed rounded-xl bg-gray-50">

                            <h3 class="text-lg font-semibold text-gray-700">
                                No subcategories found for this category yet.
                            </h3>

                            <p class="text-gray-500 mt-2">
                                Please try "All Categories"
                            </p>

                            <a href="{{ route('category') }}"
                                class="inline-block mt-4 px-5 py-2 bg-[#f4a261] text-white rounded-lg hover:bg-[#e76f51]">
                                View All Categories
                            </a>

                        </div>
                    </div>

                @endif

            </div>

            <div class="mt-10 flex justify-center">
                {{ $subcategories->links() }}
            </div>
        </div>
    </section>

@endsection