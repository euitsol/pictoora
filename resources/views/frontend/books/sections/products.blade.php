<div id="books-grid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 mb-12">
    <div class="book-card bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-200 rounded-lg overflow-hidden shadow-md border-0" data-book="" data-story="adventure" data-age="4-6" data-title="the great princess">
        <div class="relative">
            <a href="">
                <img src="{{ asset('frontend/img/book/book-2.webp') }}" alt="The great princess" class="book-image h-96 w-full object-cover">
            </a>
            <span class="absolute top-3 left-3 bg-teal-500/70 text-white text-xs font-semibold px-2 py-1 rounded">NEW</span>
            <span class="discount-badge absolute top-3 right-3 bg-amber-500/70 text-white text-xs font-bold px-2 py-1 rounded">25% OFF</span>
        </div>
        <div class="p-4">
            <a href="">
                <h3 class="font-semibold text-lg mb-2 line-clamp-2">The great princess</h3>
            </a>
            <p class="text-gray-600 text-sm mb-3 line-clamp-2">A magical journey into the world of princesses</p>

            <div class="flex items-center mb-3">
                <div class="flex items-center">
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <span class="ml-2 text-sm text-gray-600">(4.8)</span>
                </div>
            </div>

            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Age 4-6</span>
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Girl</span>
                </div>
                <div class="text-right">
                    <span class="text-gray-500 line-through text-sm">$24.99</span>
                    <span class="font-bold text-lg text-purple-600 ml-2">$18.74</span>
                </div>
            </div>

            <a href="{{ route('book-details.index') }}">
                <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition-colors">Customize</button>
            </a>
        </div>
    </div>

    <div class="book-card bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-200 rounded-lg overflow-hidden shadow-md border-0" data-book="" data-story="adventure" data-age="6-8" data-title="the policeman BOB">
        <div class="relative">
            <a href="">
                <img src="{{ asset('frontend/img/book/book-3.webp') }}" alt="The policeman BOB" class="book-image h-96 w-full object-cover">
            </a>
            <span class="absolute top-3 left-3 bg-teal-500/70 text-white text-xs font-semibold px-2 py-1 rounded">NEW</span>
        </div>
        <div class="p-4">
            <a href="">
                <h3 class="font-semibold text-lg mb-2 line-clamp-2">The policeman BOB</h3>
            </a>
            <p class="text-gray-600 text-sm mb-3 line-clamp-2">A journey into the world of policemen</p>

            <div class="flex items-center mb-3">
                <div class="flex items-center">
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <span class="ml-2 text-sm text-gray-600">(4.8)</span>
                </div>
            </div>

            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Age 6-8</span>
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Boy</span>
                </div>
                <div class="text-right">
                    <span class="font-bold text-lg text-purple-600 ml-2">$18.74</span>
                </div>
            </div>

            <a href="{{ route('book-details.index') }}">
                <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition-colors">Customize</button>
            </a>
        </div>
    </div>

    <div class="book-card bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-200 rounded-lg overflow-hidden shadow-md border-0" data-book="" data-story="adventure" data-age="6-8" data-title="the dragon slayer">
        <div class="relative">
            <a href="">
                <img src="{{ asset('frontend/img/book/book-4.webp') }}" alt="The dragon slayer" class="book-image h-96 w-full object-cover">
            </a>
            <span class="absolute top-3 left-3 bg-indigo-500/70 text-white text-xs font-semibold px-2 py-1 rounded">Bestseller</span>
        </div>
        <div class="p-4">
            <a href="">
                <h3 class="font-semibold text-lg mb-2 line-clamp-2">The dragon slayer</h3>
            </a>
            <p class="text-gray-600 text-sm mb-3 line-clamp-2">A journey into the world of dragons</p>

            <div class="flex items-center mb-3">
                <div class="flex items-center">
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <span class="ml-2 text-sm text-gray-600">(4.8)</span>
                </div>
            </div>

            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Age 6-8</span>
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Boy</span>
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Girl</span>
                </div>
                <div class="text-right">
                    <span class="font-bold text-lg text-purple-600 ml-2">$18.74</span>
                </div>
            </div>

            <a href="{{ route('book-details.index') }}">
                <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition-colors">Customize</button>
            </a>
        </div>
    </div>

    <div class="book-card bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-200 rounded-lg overflow-hidden shadow-md border-0" data-book="" data-story="adventure" data-age="6-8" data-title="the tiger king">
        <div class="relative">
            <a href="">
                <img src="{{ asset('frontend/img/book/book-5.webp') }}" alt="The tiger king" class="book-image h-96 w-full object-cover">
            </a>
            <span class="absolute top-3 left-3 bg-teal-500/70 text-white text-xs font-semibold px-2 py-1 rounded">New</span>
            <span class="discount-badge absolute top-3 right-3 bg-amber-500/70 text-white text-xs font-bold px-2 py-1 rounded">25% OFF</span>
        </div>
        <div class="p-4">
            <a href="">
                <h3 class="font-semibold text-lg mb-2 line-clamp-2">The tiger king</h3>
            </a>
            <p class="text-gray-600 text-sm mb-3 line-clamp-2">A journey into the world of tigers</p>

            <div class="flex items-center mb-3">
                <div class="flex items-center">
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <span class="ml-2 text-sm text-gray-600">(4.8)</span>
                </div>
            </div>

            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Age 6-8</span>
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Boy</span>
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Girl</span>
                </div>
                <div class="text-right">
                    <span class="line-through text-gray-500 text-sm mr-2">$24.99</span>
                    <span class="font-bold text-lg text-purple-600 ml-2">$18.74</span>
                </div>
            </div>

            <a href="{{ route('book-details.index') }}">
                <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition-colors">Customize</button>
            </a>
        </div>
    </div>

    <div class="book-card bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-200 rounded-lg overflow-hidden shadow-md border-0" data-book="" data-story="adventure" data-age="6-8" data-title="the tiger king">
        <div class="relative">
            <a href="">
                <img src="{{ asset('frontend/img/book/book-5.webp') }}" alt="The tiger king" class="book-image h-96 w-full object-cover">
            </a>
            <span class="absolute top-3 left-3 bg-teal-500/70 text-white text-xs font-semibold px-2 py-1 rounded">New</span>
            <span class="discount-badge absolute top-3 right-3 bg-amber-500/70 text-white text-xs font-bold px-2 py-1 rounded">25% OFF</span>
        </div>
        <div class="p-4">
            <a href="">
                <h3 class="font-semibold text-lg mb-2 line-clamp-2">The tiger king</h3>
            </a>
            <p class="text-gray-600 text-sm mb-3 line-clamp-2">A journey into the world of tigers</p>

            <div class="flex items-center mb-3">
                <div class="flex items-center">
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <span class="ml-2 text-sm text-gray-600">(4.8)</span>
                </div>
            </div>

            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Age 6-8</span>
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Boy</span>
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Girl</span>
                </div>
                <div class="text-right">
                    <span class="line-through text-gray-500 text-sm mr-2">$24.99</span>
                    <span class="font-bold text-lg text-purple-600 ml-2">$18.74</span>
                </div>
            </div>

            <a href="{{ route('book-details.index') }}">
                <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition-colors">Customize</button>
            </a>
        </div>
    </div>

    <div class="book-card bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-200 rounded-lg overflow-hidden shadow-md border-0" data-book="" data-story="adventure" data-age="6-8" data-title="the policeman BOB">
        <div class="relative">
            <a href="">
                <img src="{{ asset('frontend/img/book/book-3.webp') }}" alt="The policeman BOB" class="book-image h-96 w-full object-cover">
            </a>
            <span class="absolute top-3 left-3 bg-teal-500/70 text-white text-xs font-semibold px-2 py-1 rounded">NEW</span>
        </div>
        <div class="p-4">
            <a href="">
                <h3 class="font-semibold text-lg mb-2 line-clamp-2">The policeman BOB</h3>
            </a>
            <p class="text-gray-600 text-sm mb-3 line-clamp-2">A journey into the world of policemen</p>

            <div class="flex items-center mb-3">
                <div class="flex items-center">
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <span class="ml-2 text-sm text-gray-600">(4.8)</span>
                </div>
            </div>

            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Age 6-8</span>
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Boy</span>
                </div>
                <div class="text-right">
                    <span class="font-bold text-lg text-purple-600 ml-2">$18.74</span>
                </div>
            </div>

            <a href="{{ route('book-details.index') }}">
                <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition-colors">Customize</button>
            </a>
        </div>
    </div>

    <div class="book-card bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-200 rounded-lg overflow-hidden shadow-md border-0" data-book="" data-story="adventure" data-age="4-6" data-title="the great princess">
        <div class="relative">
            <a href="">
                <img src="{{ asset('frontend/img/book/book-2.webp') }}" alt="The great princess" class="book-image h-96 w-full object-cover">
            </a>
            <span class="absolute top-3 left-3 bg-teal-500/70 text-white text-xs font-semibold px-2 py-1 rounded">NEW</span>
            <span class="discount-badge absolute top-3 right-3 bg-amber-500/70 text-white text-xs font-bold px-2 py-1 rounded">25% OFF</span>
        </div>
        <div class="p-4">
            <a href="">
                <h3 class="font-semibold text-lg mb-2 line-clamp-2">The great princess</h3>
            </a>
            <p class="text-gray-600 text-sm mb-3 line-clamp-2">A magical journey into the world of princesses</p>

            <div class="flex items-center mb-3">
                <div class="flex items-center">
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <span class="ml-2 text-sm text-gray-600">(4.8)</span>
                </div>
            </div>

            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Age 4-6</span>
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Girl</span>
                </div>
                <div class="text-right">
                    <span class="text-gray-500 line-through text-sm">$24.99</span>
                    <span class="font-bold text-lg text-purple-600 ml-2">$18.74</span>
                </div>
            </div>

            <a href="{{ route('book-details.index') }}">
                <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition-colors">Customize</button>
            </a>
        </div>
    </div>

    <div class="book-card bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-200 rounded-lg overflow-hidden shadow-md border-0" data-book="" data-story="adventure" data-age="6-8" data-title="the dragon slayer">
        <div class="relative">
            <a href="{{ route('book-details.index') }}">
                <img src="{{ asset('frontend/img/book/book-4.webp') }}" alt="The dragon slayer" class="book-image h-96 w-full object-cover">
            </a>
            <span class="absolute top-3 left-3 bg-indigo-500/70 text-white text-xs font-semibold px-2 py-1 rounded">Bestseller</span>
        </div>
        <div class="p-4">
            <a href="">
                <h3 class="font-semibold text-lg mb-2 line-clamp-2">The dragon slayer</h3>
            </a>
            <p class="text-gray-600 text-sm mb-3 line-clamp-2">A journey into the world of dragons</p>

            <div class="flex items-center mb-3">
                <div class="flex items-center">
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <i data-lucide="star" class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                    <span class="ml-2 text-sm text-gray-600">(4.8)</span>
                </div>
            </div>

            <div class="flex items-center justify-between mb-4">
                <div class="flex items-center gap-2">
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Age 6-8</span>
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Boy</span>
                    <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Girl</span>
                </div>
                <div class="text-right">
                    <span class="font-bold text-lg text-purple-600 ml-2">$18.74</span>
                </div>
            </div>

            <a href="{{ route('book-details.index') }}">
                <button class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition-colors">Customize</button>
            </a>
        </div>
    </div>
</div>
