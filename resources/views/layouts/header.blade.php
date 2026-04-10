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
                        <input type="text" placeholder="Search corporate gifts, executive diaries, branded bottles..."
                            class="w-full bg-gray-50 border border-gray-200 focus:border-[#2ec4b6] rounded-full py-3.5 px-6 focus:outline-none shadow-sm">
                        <button class="absolute right-4 top-1/2 -translate-y-1/2 text-[#2ec4b6]">
                            <i class="fa-solid fa-magnifying-glass text-lg"></i>
                        </button>
                    </div>
                </div>

                <!-- ICONS -->
                <div class="flex items-center gap-8 text-xl">
                    <i class="fa-regular fa-heart hover:text-[#e07a5f] cursor-pointer transition-colors"></i>
                    <div class="relative cursor-pointer">
                        <i class="fa-solid fa-cart-shopping hover:text-[#2ec4b6] transition-colors"></i>
                        <span
                            class="absolute -top-2 -right-2 bg-[#e07a5f] text-white text-xs w-5 h-5 rounded-full flex items-center justify-center">4</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Professional Corporate Navigation – Single row + "More" dropdown -->
    <nav class="bg-white border-b border-gray-200 shadow-sm">
        <div class="max-w-7xl mx-auto px-5 sm:px-6 lg:px-8">
            <div class="flex items-center h-14 md:h-16">

                <!-- Main visible categories – starts from left -->
                <div class="hidden md:flex items-center justify-start flex-1 space-x-1 lg:space-x-2 xl:space-x-4">
                    <a href="#"
                        class="nav-link px-3 lg:px-4 xl:px-5 py-5 text-sm lg:text-base font-medium text-gray-700 hover:text-[#f4a261] transition-colors duration-200 whitespace-nowrap">
                        DESKTOP GIFTS
                    </a>
                    <a href="#"
                        class="nav-link px-3 lg:px-4 xl:px-5 py-5 text-sm lg:text-base font-medium text-gray-700 hover:text-[#f4a261] transition-colors duration-200 whitespace-nowrap">
                        OFFICE ESSENTIAL
                    </a>
                    <a href="#"
                        class="nav-link px-3 lg:px-4 xl:px-5 py-5 text-sm lg:text-base font-medium text-gray-700 hover:text-[#f4a261] transition-colors duration-200 whitespace-nowrap">
                        BAGS & TROLLEYS
                    </a>
                    <a href="#"
                        class="nav-link px-3 lg:px-4 xl:px-5 py-5 text-sm lg:text-base font-medium text-gray-700 hover:text-[#f4a261] transition-colors duration-200 whitespace-nowrap">
                        WELCOME & JOINING KIT
                    </a>
                    <a href="#"
                        class="nav-link px-3 lg:px-4 xl:px-5 py-5 text-sm lg:text-base font-medium text-gray-700 hover:text-[#f4a261] transition-colors duration-200 whitespace-nowrap">
                        LIFESTYLE TECH GADGETS
                    </a>


                    <!-- "More" dropdown trigger -->
                    <div class="relative group">
                        <button
                            class="nav-link px-4 lg:px-5 py-5 text-sm lg:text-base font-medium text-gray-700 hover:text-[#f4a261] transition-colors duration-200 flex items-center gap-1 whitespace-nowrap">
                            MORE
                            <svg class="w-4 h-4 transition-transform group-hover:rotate-180" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>

                        <!-- Dropdown -->
                        <div
                            class="absolute top-full left-0 mt-1 w-64 bg-white shadow-xl rounded-lg border border-gray-200 py-3 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="flex flex-col">
                                <a href="#"
                                    class="nav-link px-3 lg:px-4 xl:px-5 py-5 text-sm lg:text-base font-medium text-gray-700 hover:text-[#f4a261] transition-colors duration-200 whitespace-nowrap">
                                    ECO FRIENDLY
                                </a>
                                <a href="#"
                                    class="px-6 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#f4a261] transition-colors">TSHIRT,
                                    HOODIES CAPS</a>
                                <a href="#"
                                    class="px-6 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#f4a261] transition-colors">BOTTLES
                                    & DRINKWARE</a>
                                <a href="#"
                                    class="px-6 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#f4a261] transition-colors">KITCHEN
                                    APPLIANCE</a>
                                <a href="#"
                                    class="px-6 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#f4a261] transition-colors">LOCAL
                                    ARTISAN</a>
                                <a href="#"
                                    class="px-6 py-3 text-sm text-gray-700 hover:bg-gray-50 hover:text-[#f4a261] transition-colors">LUXURY
                                    HOME DECOR & IDOLS</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Mobile -->
                <div class="md:hidden">
                    <button class="flex items-center gap-2 text-gray-700 font-medium px-4 py-2">
                        <span>Categories</span>
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                </div>

            </div>
        </div>
    </nav>

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