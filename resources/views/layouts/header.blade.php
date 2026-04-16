<!-- TOP ANNOUNCEMENT BAR -->
<div id="announcement"
    class="bg-[#e07a5f] text-white py-3 text-center text-sm font-medium flex items-center justify-center gap-3 shadow-md">
    <i class="fa-solid fa-gift text-lg"></i>
    <span>Corporate Season Special: 20% OFF on bulk orders above ₹25,000 | Code: CORP20</span>
    <button onclick="document.getElementById('announcement').style.display='none'"
        class="ml-4 text-white hover:text-gray-200">✕</button>
</div>

<!-- STICKY HEADER (only logo + search + icons) -->
<header class="sticky-header">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex items-center justify-between py-5">
            <!-- LOGO -->
            <div class="flex items-center gap-3">
                <img src="{{ asset('images/B2B_logo.png') }}" alt="B2B Gifts India" class="h-20 w-auto">
                <div class="font-bold text-2xl tracking-tight">
                    <span class="text-[#f4a261]">B2B </span><span class="text-[#2ec4b6]">Gifts </span><span
                        class="text-[#e07a5f]">India</span>
                </div>
            </div>

            <!-- SEARCH -->
            <div class="flex-1 max-w-2xl mx-10">
                <div class="relative">

                    <!-- INPUT -->
                    <input type="text" id="searchInput"
                        placeholder="Search corporate gifts, executive diaries, branded bottles..."
                        class="w-full bg-gray-50 border border-gray-200 focus:border-[#2ec4b6] rounded-full py-3.5 px-6 focus:outline-none shadow-sm">

                    <!-- SEARCH ICON -->
                    <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-[#2ec4b6]">
                        <i class="fa-solid fa-magnifying-glass text-lg"></i>
                    </button>

                    <!-- 🔥 SUGGESTIONS DROPDOWN -->
                    <div id="searchSuggestions"
                        class="absolute left-0 w-full bg-white border border-gray-200 rounded-xl mt-2 shadow-lg hidden z-50 max-h-80 overflow-y-auto">
                    </div>

                </div>
            </div>

            <!-- ICONS -->
            <div class="flex items-center gap-8 text-xl">
                <i class="fa-regular fa-heart hover:text-[#e07a5f] cursor-pointer transition-colors"></i>
                <div class="relative cursor-pointer">
                    <a href="{{ route('shopping-cart') }}" class="relative cursor-pointer">
                        <i class="fa-solid fa-cart-shopping hover:text-[#2ec4b6] transition-colors"></i>

                        <span id="cart-count"
                            class="absolute -top-2 -right-2 bg-[#e07a5f] text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">
                            {{ $globalCartCount }}
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Professional Corporate Navigation – Single row + "More" dropdown -->
<nav class="bg-white border-b border-gray-200 shadow-sm">
    <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
        <div class="flex items-center h-14 md:h-16">

            @php
                $categories = \App\Models\Category::withCount('children')
                    ->whereNull('parent_id')
                    ->where('status', 1)
                    ->orderByDesc('is_popular')
                    ->orderBy('name')
                    ->get();

                $mainCategories = $categories->take(5);
                $moreCategories = $categories->slice(5);
            @endphp

            <!-- Main visible categories – starts from left -->
            <div class="hidden md:flex items-center justify-start flex-1 space-x-1 lg:space-x-2 xl:space-x-4">

                {{-- Main Categories --}}
                @foreach($mainCategories as $cat)
                    @php
                        $url = $cat->children_count > 0
                            ? url('category/' . $cat->slug)
                            : url('products?subcategory=' . $cat->slug);
                    @endphp

                    <a href="{{ $url }}"
                        class="nav-link px-3 lg:px-4 xl:px-5 py-5 text-sm lg:text-base font-medium text-gray-700 hover:text-[#f4a261] whitespace-nowrap">

                        {{ strtoupper($cat->name) }}

                        {{-- Optional popular badge --}}
                        @if($cat->is_popular)
                            <span class="ml-1 text-[10px] bg-orange-100 text-orange-600 px-1 rounded">HOT</span>
                        @endif
                    </a>
                @endforeach


                {{-- MORE Dropdown --}}
                @if($moreCategories->count())
                    <div class="relative group">
                        <button
                            class="nav-link px-4 lg:px-5 py-5 text-sm lg:text-base font-medium text-gray-700 hover:text-[#f4a261] flex items-center gap-1 whitespace-nowrap">
                            MORE
                            <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <div
                            class="absolute top-full left-0 mt-1 w-64 bg-white shadow-xl rounded-lg border border-gray-200 py-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">

                            @foreach($moreCategories as $cat)
                                @php
                                    $url = $cat->children_count > 0
                                        ? url('category/' . $cat->slug)
                                        : url('products?subcategory=' . $cat->slug);
                                @endphp

                                <a href="{{ $url }}"
                                    class="block px-6 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#f4a261]">

                                    {{ $cat->name }}

                                    @if($cat->is_popular)
                                        <span class="ml-2 text-[10px] bg-orange-100 text-orange-600 px-1 rounded">HOT</span>
                                    @endif
                                </a>
                            @endforeach

                        </div>
                    </div>
                @endif

            </div>

            <!-- Mobile -->
            <div class="md:hidden w-full">

                <!-- Toggle Button -->
                <button onclick="toggleMobileMenu()"
                    class="flex items-center justify-between w-full px-4 py-3 text-gray-800 font-semibold border-b">
                    <span>Browse Categories</span>
                    <svg class="w-5 h-5 transition-transform" id="mobileArrow" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Menu -->
                <div id="mobileMenu" class="hidden bg-gray-50">

                    @foreach($categories as $cat)
                        @php
                            $url = $cat->children_count > 0
                                ? url('category/' . $cat->slug)
                                : url('products?subcategory=' . $cat->slug);
                        @endphp

                        <div class="bg-white mb-2 rounded-xl shadow-sm overflow-hidden">

                            <!-- Parent -->
                            <div class="flex justify-between items-center px-4 py-4">

                                <a href="{{ $url }}" class="text-gray-800 font-medium text-sm">
                                    {{ $cat->name }}

                                    @if($cat->is_popular)
                                        <span
                                            class="ml-2 text-[10px] bg-orange-100 text-orange-600 px-2 py-0.5 rounded-full">HOT</span>
                                    @endif
                                </a>

                                @if($cat->children_count > 0)
                                    <button onclick="toggleSubmenu({{ $cat->id }})" class="p-1 rounded-full hover:bg-gray-100">
                                        <svg id="icon-{{ $cat->id }}" class="w-4 h-4 transition-transform" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M19 9l-7 7-7-7" />
                                        </svg>
                                    </button>
                                @endif

                            </div>

                            <!-- Subcategories -->
                            @if($cat->children_count > 0)
                                <div id="submenu-{{ $cat->id }}" class="hidden border-t bg-gray-50">

                                    @foreach($cat->children as $sub)
                                        <a href="{{ url('products?subcategory=' . $sub->slug) }}"
                                            class="block px-6 py-3 text-sm text-gray-600 hover:bg-white hover:text-[#f4a261] transition">
                                            {{ $sub->name }}
                                        </a>
                                    @endforeach

                                </div>
                            @endif

                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>
</nav>

<script>
function toggleMobileMenu() {
    const menu = document.getElementById('mobileMenu');
    const arrow = document.getElementById('mobileArrow');

    menu.classList.toggle('hidden');
    arrow.classList.toggle('rotate-180');
}

function toggleSubmenu(id) {
    const submenu = document.getElementById('submenu-' + id);
    const icon = document.getElementById('icon-' + id);

    submenu.classList.toggle('hidden');
    icon.classList.toggle('rotate-180');
}
</script>

<style>
    .nav-link {
        position: relative;
    }

    .nav-link:hover::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: #f4a261;
        transform: scaleX(0);
        transition: transform 0.2s ease;
    }

    .nav-link:hover::after {
        transform: scaleX(1);
    }
</style>

<script>
    const input = document.getElementById('searchInput');
    const box = document.getElementById('searchSuggestions');

    let timeout = null;

    input.addEventListener('keyup', function () {

        clearTimeout(timeout);

        timeout = setTimeout(() => {
            let query = input.value.trim();

            if (query.length < 2) {
                box.classList.add('hidden');
                return;
            }

            fetch(`/search-suggestions?q=${query}`)
                .then(res => res.json())
                .then(data => {

                    let html = '';

                    // Categories
                    if (data.categories.length) {
                        html += `<div class="px-4 py-2 text-xs text-gray-400">Categories</div>`;

                        data.categories.forEach(cat => {

                            let url = cat.children_count > 0
                                ? `/category/${cat.slug}`
                                : `/products?subcategory=${cat.slug}`;

                            html += `
            <div onclick="window.location.href='${url}'"
                class="px-4 py-2 hover:bg-gray-100 cursor-pointer">
                ${cat.name}
            </div>
        `;
                        });
                    }

                    // Products
                    if (data.products.length) {
                        html += `<div class="px-4 py-2 text-xs text-gray-400">Products</div>`;
                        data.products.forEach(prod => {
                            html += `
            <div onclick="window.location.href='/product/${prod.slug}'"
                class="flex items-center gap-3 px-4 py-2 hover:bg-gray-100 cursor-pointer">
                
                <img src="/storage/${prod.image}" class="w-10 h-10 rounded object-cover">
                <span>${prod.name}</span>
            </div>
        `;
                        });
                    }

                    if (!html) {
                        html = `<div class="px-4 py-3 text-gray-500">No results found</div>`;
                    }

                    box.innerHTML = html;
                    box.classList.remove('hidden');
                });

        }, 300); // debounce
    });

    // Hide on click outside
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.relative')) {
            box.classList.add('hidden');
        }
    });
</script>