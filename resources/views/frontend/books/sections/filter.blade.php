<!-- Header with toggle button -->
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between md:py-4 lg:py-4">
        <div class="flex items-center gap-3">
            <h2 class="flex items-center gap-2 text-xl font-semibold gradient-text">
                <i data-lucide="funnel" class="w-4 h-4 mr-1 text-purple-600"></i>
                Filters
            </h2>
            <span id="active-filter-badge"
                class="hidden bg-gradient-to-r from-purple-100 to-blue-100 text-purple-700 border border-purple-200 text-xs px-2.5 py-0.5 rounded-full"></span>
        </div>

        <!-- Mobile Filter Trigger (hidden on desktop) -->
        <div class="md:hidden">
            <button id="mobile-filter-trigger"
                class="inline-flex items-center justify-center whitespace-nowrap rounded-md text-lg font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-purple-300 text-purple-600 hover:bg-purple-50 hover:text-purple-700 bg-transparent h-9 px-4 py-2">
                <i data-lucide="funnel" class="w-4 h-4 mr-1 text-purple-600"></i>
                Filters
                <span id="mobile-active-filter-badge"
                    class="hidden ml-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white text-xs px-1.5 py-0.5 rounded-full"></span>
            </button>
        </div>

        <!-- Desktop Clear All & Collapse Toggle (hidden on mobile) -->
        <div class="hidden md:flex items-center gap-2">
            <button id="clear-all-desktop"
                class="hidden inline-flex text-lg items-center justify-center whitespace-nowrap rounded-md font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 text-purple-600 hover:text-purple-700 hover:bg-purple-100 h-9 px-4 py-2">
                <i data-lucide="funnel-x" class="w-4 h-4 mr-1"></i>
                <span>Clear all</span>
            </button>
            <button id="toggle-collapse-desktop"
                class="inline-flex text-lg items-center justify-center whitespace-nowrap rounded-md font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 text-purple-600 hover:text-purple-700 hover:bg-purple-100 h-9 px-4 py-2">
                <i data-lucide="chevron-up" class="w-4 h-4 mr-1"></i>
                <span>Hide Filters</span>
            </button>
        </div>
    </div>
    <!-- Desktop Collapsible Filter Content -->
    <div id="desktop-filter-content" class="hidden md:block collapsible-content open md:border-t border-purple-200">
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-6 lg:items-start md:mt-6">
            <!-- Story Filter -->
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 text-lg font-medium text-purple-700">
                    <i data-lucide="book-open" class="w-4 h-4 mr-1 text-purple-600"></i>
                    Story
                </div>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" id="story-desktop"
                        class="peer h-4 w-4 shrink-0 rounded-sm border border-purple-300 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        checked>
                    <label for="story-desktop" class="text-lg font-normal cursor-pointer text-gray-700">
                        Include stories
                    </label>
                </div>
            </div>

            <!-- Age Filter -->
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 text-lg font-medium text-purple-700">
                    <i data-lucide="calendar" class="w-4 h-4 mr-1 text-purple-600"></i>
                    Age
                </div>
                <div id="age-desktop-buttons" class="flex gap-1 flex-wrap">
                    <!-- Age buttons will be rendered here by JS -->
                </div>
            </div>

            <!-- Gender Filter -->
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 text-lg font-medium text-purple-700">
                    <i data-lucide="users" class="w-4 h-4 mr-1 text-purple-600"></i>
                    Gender
                </div>
                <div class="flex flex-col gap-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="boy-desktop"
                            class="peer h-4 w-4 shrink-0 rounded-sm border border-purple-300 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <label for="boy-desktop" class="text-lg font-normal capitalize cursor-pointer text-gray-700">
                            Boy
                        </label>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="girl-desktop"
                            class="peer h-4 w-4 shrink-0 rounded-sm border border-purple-300 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <label for="girl-desktop" class="text-lg font-normal capitalize cursor-pointer text-gray-700">
                            Girl
                        </label>
                    </div>
                </div>
            </div>

            <!-- Language Filter -->
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 text-lg font-medium text-purple-700">
                    <i data-lucide="languages" class="w-4 h-4 mr-1 text-purple-600"></i>
                    Language
                </div>
                <div class="relative">
                    <button id="language-dropdown-trigger-desktop"
                        class="flex h-10 w-full items-center justify-between whitespace-nowrap rounded-md border border-purple-300 bg-white px-3 py-2 text-left text-lg font-normal ring-offset-background focus:outline-none focus:ring-2 focus:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 text-gray-700 hover:bg-purple-50 hover:text-purple-700">
                        <span id="selected-languages-desktop" class="truncate">Languages</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 mr-1 text-purple-600"></i>
                    </button>
                    <div id="language-dropdown-content-desktop"
                        class="absolute z-10 w-[280px] mt-1 bg-white border border-purple-200 rounded-md shadow-lg hidden">
                        <div class="p-1.5 border-b border-purple-200">
                            <input type="text" id="language-search-desktop"
                                class="flex h-9 w-full rounded-md border border-purple-200 bg-white px-3 py-2 text-lg ring-offset-background file:border-0 file:bg-transparent file:text-lg file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 focus:border-purple-500 focus:ring-purple-200"
                                placeholder="Search...">
                        </div>
                        <ul id="language-list-desktop" class="max-h-60 overflow-auto py-1">
                            <!-- Language items will be rendered here by JS -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Active Filter Summary for Desktop -->
        <div id="active-filter-summary-desktop" class="hidden mt-4 pt-4 border-t border-purple-200">
            <div class="flex items-center gap-2 flex-wrap">
                <span class="text-lg font-medium text-purple-700">Active filters:</span>
                <!-- Badges will be rendered here by JS -->
            </div>
        </div>
    </div>
</div>


<!-- Mobile Sheet Overlay -->
<div id="mobile-sheet-overlay" class="sheet-overlay"></div>

<!-- Mobile Sheet Content -->
<div id="mobile-sheet-content" class="sheet-content bg-gradient-to-r from-purple-50 to-blue-50">
    <div class="sheet-header">
        <h2 class="sheet-title gradient-text">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                class="lucide lucide-filter h-5 w-5 text-purple-600">
                <polygon points="22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3" />
            </svg>
            Filters
        </h2>
    </div>
    <div class="sheet-body">
        <!-- Filter Content for Mobile -->
        <div class="space-y-6">
            <!-- Story Filter -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 text-sm font-medium text-purple-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-book-open h-4 w-4">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 4 0 0 0-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 4 0 0 1 3-3h7z" />
                    </svg>
                    Story
                </div>
                <div class="flex items-center space-x-2">
                    <input type="checkbox" id="story-mobile"
                        class="peer h-4 w-4 shrink-0 rounded-sm border border-purple-300 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        checked>
                    <label for="story-mobile" class="text-sm font-normal capitalize cursor-pointer text-gray-700">
                        Include stories
                    </label>
                </div>
            </div>

            <!-- Name Filter -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 text-sm font-medium text-purple-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-search h-4 w-4">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    Name
                </div>
                <input type="text" id="name-mobile" placeholder="Search by name..."
                    class="flex h-10 w-full rounded-md border border-purple-300 bg-white px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 focus:border-purple-500 focus:ring-purple-200">
            </div>

            <!-- Age Filter -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 text-sm font-medium text-purple-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-calendar h-4 w-4">
                        <rect width="18" height="18" x="3" y="4" rx="2" ry="2" />
                        <line x1="16" x2="16" y1="2" y2="6" />
                        <line x1="8" x2="8" y1="2" y2="6" />
                        <line x1="3" x2="21" y1="10" y2="10" />
                    </svg>
                    Age
                </div>
                <div id="age-mobile-buttons" class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                    <!-- Age buttons will be rendered here by JS -->
                </div>
            </div>

            <!-- Gender Filter -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 text-sm font-medium text-purple-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-users h-4 w-4">
                        <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                        <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                    </svg>
                    Gender
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="boy-mobile"
                            class="peer h-4 w-4 shrink-0 rounded-sm border border-purple-300 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <label for="boy-mobile" class="text-sm font-normal capitalize cursor-pointer text-gray-700">
                            Boy
                        </label>
                    </div>
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="girl-mobile"
                            class="peer h-4 w-4 shrink-0 rounded-sm border border-purple-300 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50">
                        <label for="girl-mobile" class="text-sm font-normal capitalize cursor-pointer text-gray-700">
                            Girl
                        </label>
                    </div>
                </div>
            </div>

            <!-- Language Filter -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 text-sm font-medium text-purple-700">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="lucide lucide-languages h-4 w-4">
                        <path d="m5 8 6 6" />
                        <path d="m4 14 6-6 2-3" />
                        <path d="M2 5h12" />
                        <path d="M7 2h1" />
                        <path d="m22 22-5-10-5 10" />
                        <path d="M14 18h6" />
                    </svg>
                    Language
                </div>
                <div class="relative">
                    <button id="language-dropdown-trigger-mobile"
                        class="flex h-10 w-full items-center justify-between whitespace-nowrap rounded-md border border-purple-300 bg-white px-3 py-2 text-left text-sm font-normal ring-offset-background focus:outline-none focus:ring-2 focus:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 text-gray-700 hover:bg-purple-50 hover:text-purple-700">
                        <span id="selected-languages-mobile" class="truncate">Languages</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-chevron-down ml-2 h-4 w-4 shrink-0 opacity-50">
                            <path d="m6 9 6 6 6-6" />
                        </svg>
                    </button>
                    <div id="language-dropdown-content-mobile"
                        class="absolute z-10 w-full mt-1 bg-white border border-purple-200 rounded-md shadow-lg hidden">
                        <div class="p-1.5 border-b border-purple-200">
                            <input type="text" id="language-search-mobile"
                                class="flex h-9 w-full rounded-md border border-purple-200 bg-white px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 focus:border-purple-500 focus:ring-purple-200"
                                placeholder="Search...">
                        </div>
                        <ul id="language-list-mobile" class="max-h-60 overflow-auto py-1">
                            <!-- Language items will be rendered here by JS -->
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Clear All Button for Mobile -->
            <button id="clear-all-mobile"
                class="w-full inline-flex items-center justify-center whitespace-nowrap rounded-md text-sm font-medium ring-offset-background transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border border-purple-300 text-purple-600 hover:bg-purple-50 hover:text-purple-700 bg-transparent h-10 px-4 py-2">
                Clear All Filters
            </button>
        </div>
    </div>
</div>
