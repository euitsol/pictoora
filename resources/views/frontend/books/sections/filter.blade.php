<!-- Header with toggle button -->
<div class="container mx-auto px-4 py-8">
    <div class="flex items-center justify-between md:py-4 lg:py-4">
        <div class="items-center gap-3 hidden md:flex">
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
                    class="hidden ml-2 bg-gradient-to-r from-purple-500 to-blue-500 text-white text-xs h-4 w-4 rounded-full"></span>
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
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 lg:items-start md:mt-6">
            <!-- Story Filter -->
            <div class="flex flex-col gap-3">
                <div class="flex items-center gap-2 text-lg font-medium text-purple-700">
                    <i data-lucide="book-open" class="w-4 h-4 mr-1 text-purple-600"></i>
                    Story
                </div>
                <div class="grid grid-cols-1 gap-2 items-center space-x-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="dinosaur-story"
                            class="peer h-4 w-4 shrink-0 rounded-sm border border-purple-300 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 story-desktop"
                            checked>
                        <label for="dinosaur-story" class="text-lg font-normal cursor-pointer text-gray-700">
                            Dinosaur Stories
                        </label>
                    </div>

                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="prince-story"
                            class="peer h-4 w-4 shrink-0 rounded-sm border border-purple-300 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 story-desktop"
                            checked>
                        <label for="prince-story" class="text-lg font-normal cursor-pointer text-gray-700">
                            Prince Stories
                        </label>
                    </div>

                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="policeman-story"
                            class="peer h-4 w-4 shrink-0 rounded-sm border border-purple-300 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 story-desktop"
                            checked>
                        <label for="policeman-story" class="text-lg font-normal cursor-pointer text-gray-700">
                            Policeman Stories
                        </label>
                    </div>
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
        <div class="items-center gap-3 flex justify-between">
            <h2 class="flex items-center gap-2 text-xl font-semibold gradient-text sheet-title">
                <i data-lucide="funnel" class="w-4 h-4 mr-1 text-purple-600"></i>
                Filters
            </h2>
            <button type="button" class="flex items-center gap-2" id="mobile-sheet-close">
                <i data-lucide="x" class="w-4 h-4 mr-1 text-purple-600"></i>
            </button>
        </div>
    </div>
    <div class="sheet-body">
        <!-- Filter Content for Mobile -->
        <div class="space-y-6">
            <!-- Story Filter -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 text-sm font-medium text-purple-700">
                    <i data-lucide="book-open" class="w-4 h-4 mr-1 text-purple-600"></i>
                    Story
                </div>
                <div class="grid grid-cols-1 gap-2 items-center space-x-2">
                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="dinosaurs-story-mobile"
                            class="peer h-4 w-4 shrink-0 rounded-sm border border-purple-300 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 story-mobile"
                            checked>
                        <label for="dinosaurs-story-mobile" class="text-sm font-normal capitalize cursor-pointer text-gray-700">
                            Dinosaur Stories
                        </label>
                    </div>

                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="princes-story-mobile"
                            class="peer h-4 w-4 shrink-0 rounded-sm border border-purple-300 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 story-mobile">
                        <label for="princes-story-mobile" class="text-sm font-normal capitalize cursor-pointer text-gray-700">
                            Princes Stories
                        </label>
                    </div>

                    <div class="flex items-center space-x-2">
                        <input type="checkbox" id="policeman-story-mobile"
                            class="peer h-4 w-4 shrink-0 rounded-sm border border-purple-300 ring-offset-background focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 story-mobile">
                        <label for="policeman-story-mobile" class="text-sm font-normal capitalize cursor-pointer text-gray-700">
                            Policeman Stories
                        </label>
                    </div>
                </div>
            </div>

            <!-- Name Filter -->
            {{-- <div class="space-y-3">
                <div class="flex items-center gap-2 text-sm font-medium text-purple-700">
                    <i data-lucide="search" class="w-4 h-4 mr-1 text-purple-600"></i>
                    Name
                </div>
                <input type="text" id="name-mobile" placeholder="Search by name..."
                    class="flex h-10 w-full rounded-md border border-purple-300 bg-white px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 focus:border-purple-500 focus:ring-purple-200">
            </div> --}}

            <!-- Age Filter -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 text-sm font-medium text-purple-700">
                    <i data-lucide="calendar" class="w-4 h-4 mr-1 text-purple-600"></i>
                    Age
                </div>
                <div id="age-mobile-buttons" class="grid grid-cols-3 sm:grid-cols-5 gap-2">
                    <!-- Age buttons will be rendered here by JS -->
                </div>
            </div>

            <!-- Gender Filter -->
            <div class="space-y-3">
                <div class="flex items-center gap-2 text-sm font-medium text-purple-700">
                    <i data-lucide="users" class="w-4 h-4 mr-1 text-purple-600"></i>
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
                    <i data-lucide="languages" class="w-4 h-4 mr-1 text-purple-600"></i>
                    Language
                </div>
                <div class="relative">
                    <button id="language-dropdown-trigger-mobile"
                        class="flex h-10 w-full items-center justify-between whitespace-nowrap rounded-md border border-purple-300 bg-white px-3 py-2 text-left text-sm font-normal ring-offset-background focus:outline-none focus:ring-2 focus:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 text-gray-700 hover:bg-purple-50 hover:text-purple-700">
                        <span id="selected-languages-mobile" class="truncate">Languages</span>
                        <i data-lucide="chevron-down" class="w-4 h-4 mr-1 text-purple-600"></i>
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
