@extends('frontend.layouts.master')

@push('styles')
    <!-- Fancybox CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css" />
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
    <style>
        .book-image-container {
            transition: transform 0.3s ease;
        }

        .book-image-container:hover {
            transform: scale(1.02);
        }

        .book-card {
            position: relative;
            overflow: hidden;
        }

        .book-card::before {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(to right bottom, rgba(139, 92, 246, 0.1), rgba(59, 130, 246, 0.1));
            border-radius: 1rem;
            z-index: -1;
            filter: blur(20px);
            transform: translateY(10px) scale(0.95);
            transition: transform 0.3s ease;
        }

        .book-card:hover::before {
            transform: translateY(5px) scale(1);
        }

        .cta-button {
            background: linear-gradient(to right, #8b5cf6, #3b82f6);
            transition: all 0.3s ease;
        }

        .cta-button:hover {
            background: linear-gradient(to right, #7c3aed, #2563eb);
            box-shadow: 0 10px 25px -5px rgba(139, 92, 246, 0.4);
        }

        .cta-button:hover .arrow-icon {
            transform: translateX(4px);
        }

        .arrow-icon {
            transition: transform 0.3s ease;
        }

        .gallery-thumb {
            cursor: pointer;
            transition: all 0.3s ease;
            border: 2px solid transparent;
        }

        .gallery-thumb:hover {
            border-color: #8b5cf6;
            transform: scale(1.05);
        }

        .gallery-thumb.active {
            border-color: #8b5cf6;
            box-shadow: 0 0 0 2px rgba(139, 92, 246, 0.3);
        }

        .feature-card {
            background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .feature-card:hover {
            background: linear-gradient(135deg, #faf5ff 0%, #f3e8ff 100%);
            border-color: #c084fc;
            transform: translateY(-2px);
            box-shadow: 0 8px 25px -5px rgba(139, 92, 246, 0.2);
        }

        .feature-icon {
            background: linear-gradient(135deg, #8b5cf6 0%, #3b82f6 100%);
            color: white;
            transition: all 0.3s ease;
        }

        .feature-card:hover .feature-icon {
            background: linear-gradient(135deg, #7c3aed 0%, #2563eb 100%);
            transform: scale(1.1);
        }

        .trust-badge {
            transition: transform 0.3s ease;
        }

        .trust-badge:hover {
            transform: translateY(-3px);
        }

        .language-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%236b7280' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
            background-position: right 0.5rem center;
            background-repeat: no-repeat;
            background-size: 1.5em 1.5em;
            padding-right: 2.5rem;
        }

        /* Responsive text sizing - more moderate approach */
        @media (min-width: 1024px) {
            .hero-title {
                font-size: 3rem;
                /* Reduced from 4rem */
                line-height: 1.1;
            }
        }

        @media (min-width: 768px) and (max-width: 1023px) {
            .hero-title {
                font-size: 2.5rem;
                /* Reduced from 3rem */
                line-height: 1.2;
            }
        }

        @media (max-width: 767px) {
            .hero-title {
                font-size: 2rem;
                /* Reduced from 2.25rem */
                line-height: 1.2;
            }
        }
    </style>
@endpush

@section('content')
    <section class="bg-gradient-to-br from-slate-50 to-purple-50/30 py-12 lg:py-16">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-start">
                <!-- Book Image Section -->
                <div class="relative">
                    <div
                        class="absolute inset-0 bg-gradient-to-r from-purple-400/20 to-blue-400/20 rounded-3xl blur-xl transform group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div
                        class="book-card relative border-0 shadow-xl bg-gradient-to-br from-white to-purple-50/50 rounded-2xl">
                        <div class="p-6">
                            <div class="relative book-image-container">
                                <!-- Main Book Image -->
                                <a href="{{ asset('frontend/img/book/book-1.webp') }}" data-fancybox="book-gallery"
                                    data-caption="The Magical Adventure of Luna - Cover" id="main-book-image">
                                    <img alt="The Magical Adventure of Luna - Personalized Children's Book"
                                        class="w-full h-[350px] md:h-[400px] object-cover rounded-xl shadow-lg"
                                        src="{{ asset('frontend/img/book/book-1.webp') }}" id="main-image" />
                                </a>

                                <!-- Hidden Fancybox Gallery Images -->
                                <a href="{{ asset('frontend/img/book/book-1.webp') }}" data-fancybox="book-gallery"
                                    data-caption="The Magical Adventure of Luna - Page 1" class="hidden"></a>
                                <a href="{{ asset('frontend/img/book/book-2.webp') }}" data-fancybox="book-gallery"
                                    data-caption="The Magical Adventure of Luna - Page 2" class="hidden"></a>
                                <a href="{{ asset('frontend/img/book/book-3.webp') }}" data-fancybox="book-gallery"
                                    data-caption="The Magical Adventure of Luna - Page 3" class="hidden"></a>

                                <div
                                    class="absolute -top-2 -right-2 bg-gradient-to-r from-amber-400 to-orange-400 text-amber-900 px-3 py-1.5 text-xs font-bold shadow-lg rounded-full">
                                    Bestseller
                                </div>
                            </div>

                            <!-- Gallery Thumbnails -->
                            <div class="mt-4 flex gap-2 justify-center">
                                <img src="{{ asset('frontend/img/book/book-1.webp') }}" alt="Cover"
                                    class="gallery-thumb w-16 h-20 object-cover rounded-lg active"
                                    data-main-src="{{ asset('frontend/img/book/book-1.webp') }}"
                                    data-full-src="{{ asset('frontend/img/book/book-1.webp') }}">
                                <img src="{{ asset('frontend/img/book/book-2.webp') }}" alt="Page 1"
                                    class="gallery-thumb w-16 h-20 object-cover rounded-lg"
                                    data-main-src="{{ asset('frontend/img/book/book-2.webp') }}"
                                    data-full-src="{{ asset('frontend/img/book/book-2.webp') }}">
                                <img src="{{ asset('frontend/img/book/book-3.webp') }}" alt="Page 2"
                                    class="gallery-thumb w-16 h-20 object-cover rounded-lg"
                                    data-main-src="{{ asset('frontend/img/book/book-3.webp') }}"
                                    data-full-src="{{ asset('frontend/img/book/book-3.webp') }}">
                                <img src="{{ asset('frontend/img/book/book-4.webp') }}" alt="Page 3"
                                    class="gallery-thumb w-16 h-20 object-cover rounded-lg"
                                    data-main-src="{{ asset('frontend/img/book/book-4.webp') }}"
                                    data-full-src="{{ asset('frontend/img/book/book-4.webp') }}">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Product Details Section -->
                <div class="space-y-6">
                    <!-- Header -->
                    <div class="space-y-4">
                        <div
                            class="inline-flex items-center rounded-full border px-3 py-1.5 text-sm font-semibold bg-purple-100 text-purple-700 hover:bg-purple-200 border-purple-200">
                            Personalized Children's Book
                        </div>

                        <div>
                            <h2 class="hero-title font-bold gradient-text leading-tight mb-4">
                                The Magical Adventure of Luna
                            </h2>

                            <div class="flex items-center gap-2 mb-3">
                                <div class="flex items-center">
                                    <i data-lucide="star" class="w-4 h-4 text-amber-400 fill-amber-400"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-amber-400 fill-amber-400"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-amber-400 fill-amber-400"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-amber-400 fill-amber-400"></i>
                                    <i data-lucide="star" class="w-4 h-4 text-gray-300"></i>
                                </div>
                                <span class="text-gray-600 font-medium text-sm">(127 reviews)</span>
                            </div>

                            <p class="text-base text-gray-700 leading-relaxed">
                                Create a magical personalized story where your child becomes the hero of their own
                                adventure. Each
                                book is uniquely crafted with your child's name, appearance, and preferences.
                            </p>
                        </div>
                    </div>

                    <!-- Pricing Card -->
                    <div class="border border-purple-200 shadow-xl bg-gradient-to-br from-white to-purple-50/30 rounded-xl">
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-baseline gap-2">
                                    <span class="text-3xl font-bold text-purple-600">$24.99</span>
                                    <span class="text-lg text-gray-500 line-through">$34.99</span>
                                </div>
                                <div
                                    class="inline-flex items-center rounded-full bg-gradient-to-r from-amber-500 to-orange-500 text-white px-3 py-1 text-sm font-bold">
                                    30% OFF
                                </div>
                            </div>

                            <!-- Product Details Grid -->
                            <div class="grid grid-cols-2 gap-4 mb-4 text-sm">
                                <div>
                                    <span class="text-gray-600 font-medium">Format:</span>
                                    <p class="font-semibold text-gray-900">Digital + Print</p>
                                </div>
                                <div>
                                    <span class="text-gray-600 font-medium">Pages:</span>
                                    <p class="font-semibold text-gray-900">24 pages</p>
                                </div>
                                <div>
                                    <span class="text-gray-600 font-medium">Age Range:</span>
                                    <p class="font-semibold text-gray-900">3-8 years</p>
                                </div>
                                <div>
                                    <span class="text-gray-600 font-medium">Delivery:</span>
                                    <p class="font-semibold text-gray-900">Instant</p>
                                </div>
                            </div>

                            <!-- Language Selector -->
                            <div class="mb-4">
                                <label for="language-select"
                                    class="block text-gray-600 font-medium text-sm mb-2">Language:</label>
                                <select id="language-select"
                                    class="language-select w-full px-3 py-2 border border-gray-300 rounded-lg bg-white text-gray-900 font-semibold text-sm focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                                    <option value="english">English</option>
                                    <option value="french">French</option>
                                    <option value="german">German</option>
                                    <option value="spanish">Spanish</option>
                                    <option value="italian">Italian</option>
                                    <option value="portuguese">Portuguese</option>
                                </select>
                            </div>

                            <div class="h-px w-full bg-gray-200 mb-4"></div>

                            <!-- CTA Button -->
                            <a href="{{ route('personalize.index') }}"
                                class="cta-button w-full py-4 md:py-3 text-base md:text-lg font-semibold text-white rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 flex items-center justify-center">
                                <span class="px-2">Create Your Child's Story Now</span>
                                <i data-lucide="arrow-right" class="w-5 h-5 ml-2 arrow-icon flex-shrink-0"></i>
                            </a>

                            <!-- Enhanced Feature Cards -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 mt-4">
                                <div class="feature-card rounded-xl p-4 flex items-center gap-3">
                                    <div class="feature-icon w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="bookmark" class="w-5 h-5"></i>
                                    </div>
                                    <div class="min-w-0">
                                        <div class="font-bold text-purple-700 text-sm">Keepsake Forever</div>
                                        <div class="text-xs text-gray-600">Treasure for years</div>
                                    </div>
                                </div>

                                <div class="feature-card rounded-xl p-4 flex items-center gap-3">
                                    <div
                                        class="feature-icon w-10 h-10 rounded-full flex items-center justify-center flex-shrink-0">
                                        <i data-lucide="users" class="w-5 h-5"></i>
                                    </div>
                                    <div class="min-w-0">
                                        <div class="font-bold text-purple-700 text-sm">20,000+ Happy Kids</div>
                                        <div class="text-xs text-gray-600">Trusted by families</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Trust Badges -->
                    <div class="border border-purple-200 shadow-lg bg-gradient-to-r from-purple-50 to-blue-50 rounded-xl">
                        <div class="p-5">
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                                <div class="trust-badge flex flex-col items-center text-center">
                                    <div class="bg-amber-100 rounded-full p-3 mb-2 hover:bg-amber-200 transition-colors">
                                        <i data-lucide="badge-check" class="w-6 h-6 text-amber-600"></i>
                                    </div>
                                    <span class="font-semibold text-gray-800 text-xs">30-day money-back guarantee</span>
                                </div>

                                <div class="trust-badge flex flex-col items-center text-center">
                                    <div class="bg-blue-100 rounded-full p-3 mb-2 hover:bg-blue-200 transition-colors">
                                        <i data-lucide="truck" class="w-6 h-6 text-blue-600"></i>
                                    </div>
                                    <span class="font-semibold text-gray-800 text-xs">Instant digital delivery</span>
                                </div>

                                <div class="trust-badge flex flex-col items-center text-center">
                                    <div class="bg-green-100 rounded-full p-3 mb-2 hover:bg-green-200 transition-colors">
                                        <i data-lucide="shield-check" class="w-6 h-6 text-green-600"></i>
                                    </div>
                                    <span class="font-semibold text-gray-800 text-xs">Safe and secure payment</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" bg-white shadow-2xl">
        <div class="container mx-auto px-4 py-12">
            <div class="text-center">
                <h2 class="text-4xl font-bold mb-4 gradient-text text-gray-700">Preview & Demo</h2>
                <p class="text-xl text-gray-600">Get a glimpse of how your child's story will look and feel</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8 mt-6">
                <div class="rounded-lg border bg-card text-card-foreground shadow-2xl p-6 border-purple-200">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="text-2xl font-semibold leading-none tracking-tight flex items-center">
                            <i data-lucide="book-open" class="w-7 h-7 text-purple-600 mr-2"></i>
                            Sample Pages
                        </h3>
                    </div>
                    <div class="p-6 pt-0">
                        <div class="bg-gray-100 rounded-lg p-8 text-center mb-4">
                            <video id='video' preload='none' width="100%"
                                poster="https://assets.codepen.io/32795/poster.png" autoplay loop muted
                                class="mx-auto rounded">
                                <source id='mp4' src="http://media.w3.org/2010/05/sintel/trailer.mp4" type='video/mp4' />
                                <source id='webm' src="http://media.w3.org/2010/05/sintel/trailer.webm" type='video/webm' />
                                <source id='ogv' src="http://media.w3.org/2010/05/sintel/trailer.ogv" type='video/ogg' />
                                <track kind="subtitles" label="English subtitles" src="subtitles_en.vtt" srclang="en"
                                    default>
                                <track kind="subtitles" label="Deutsche Untertitel" src="subtitles_de.vtt" srclang="de">
                                <p>Your user agent does not support the HTML5 Video element.</p>
                            </video>
                        </div>
                        <p class="text-gray-600 text-center">Browse through sample pages to see the quality and style</p>
                    </div>
                </div>
                <div class="rounded-lg border bg-card text-card-foreground shadow-2xl border-purple-200 p-6">
                    <div class="flex flex-col space-y-1.5 p-6">
                        <h3 class="text-2xl font-semibold leading-none tracking-tight flex items-center text-gray-700">
                            <i data-lucide="eye" class="w-7 h-7 text-purple-600 mr-2"></i>
                            Get Your Free Sample
                        </h3>
                    </div>
                    <div class="p-6 pt-0">
                        <p class="text-gray-600 mb-4">Enter your email to get a free sample of your personalized book</p>
                        <div class="space-y-3">
                            <input placeholder="Enter your email"
                                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                type="text">
                            <button
                                class="ring-offset-background focus-visible:outline-hidden focus-visible:ring-ring inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-colors focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 text-primary-foreground h-10 px-4 py-2 w-full bg-purple-600 hover:bg-purple-700 text-white">
                                Get Free Sample
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('frontend.home.sections.expressions')

    @include('frontend.home.sections.faq')

    <section class="related-books py-16 bg-white">
        <div class="container mx-auto px-4">
            <h2 class="text-4xl font-bold mb-8 gradient-text text-center">More exciting stories from us</h2>
            <div class="swiper related-books-swiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="book-card bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-200 rounded-lg overflow-hidden shadow-md border-0"
                            data-book="" data-story="adventure" data-age="4-6" data-title="the great princess">
                            <div class="relative">
                                <a href="">
                                    <img src="{{ asset('frontend/img/book/book-2.webp') }}" alt="The great princess"
                                        class="book-image h-96 w-full object-cover">
                                </a>
                                <span
                                    class="absolute top-3 left-3 bg-teal-500/70 text-white text-xs font-semibold px-2 py-1 rounded">NEW</span>
                                <span
                                    class="discount-badge absolute top-3 right-3 bg-amber-500/70 text-white text-xs font-bold px-2 py-1 rounded">25%
                                    OFF</span>
                            </div>
                            <div class="p-4">
                                <a href="">
                                    <h3 class="font-semibold text-lg mb-2 line-clamp-2">The great princess</h3>
                                </a>
                                <p class="text-gray-600 text-sm mb-3 line-clamp-2">A magical journey into the world of
                                    princesses</p>
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
                                    <button
                                        class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition-colors">Customize</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="book-card bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-200 rounded-lg overflow-hidden shadow-md border-0"
                            data-book="" data-story="adventure" data-age="6-8" data-title="the policeman BOB">
                            <div class="relative">
                                <a href="">
                                    <img src="{{ asset('frontend/img/book/book-3.webp') }}" alt="The policeman BOB"
                                        class="book-image h-96 w-full object-cover">
                                </a>
                                <span
                                    class="absolute top-3 left-3 bg-teal-500/70 text-white text-xs font-semibold px-2 py-1 rounded">NEW</span>
                            </div>
                            <div class="p-4">
                                <a href="">
                                    <h3 class="font-semibold text-lg mb-2 line-clamp-2">The policeman BOB</h3>
                                </a>
                                <p class="text-gray-600 text-sm mb-3 line-clamp-2">A journey into the world of policemen
                                </p>
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
                                    <button
                                        class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition-colors">Customize</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="book-card bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-200 rounded-lg overflow-hidden shadow-md border-0"
                            data-book="" data-story="adventure" data-age="6-8" data-title="the dragon slayer">
                            <div class="relative">
                                <a href="">
                                    <img src="{{ asset('frontend/img/book/book-4.webp') }}" alt="The dragon slayer"
                                        class="book-image h-96 w-full object-cover">
                                </a>
                                <span
                                    class="absolute top-3 left-3 bg-indigo-500/70 text-white text-xs font-semibold px-2 py-1 rounded">Bestseller</span>
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
                                    <button
                                        class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition-colors">Customize</button>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="book-card bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-200 rounded-lg overflow-hidden shadow-md border-0"
                            data-book="" data-story="adventure" data-age="6-8" data-title="the tiger king">
                            <div class="relative">
                                <a href="">
                                    <img src="{{ asset('frontend/img/book/book-5.webp') }}" alt="The tiger king"
                                        class="book-image h-96 w-full object-cover">
                                </a>
                                <span
                                    class="absolute top-3 left-3 bg-teal-500/70 text-white text-xs font-semibold px-2 py-1 rounded">New</span>
                                <span
                                    class="discount-badge absolute top-3 right-3 bg-amber-500/70 text-white text-xs font-bold px-2 py-1 rounded">25%
                                    OFF</span>
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
                                    <button
                                        class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded transition-colors">Customize</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>

    @include('frontend.home.sections.reviews')

    @push('scripts')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
        <script src="{{ asset('frontend/js/home.js') }}"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                if (document.querySelector('.related-books-swiper')) {
                    new Swiper('.related-books-swiper', {
                        loop: true,
                        speed: 800,
                        slidesPerView: 'auto',
                        autoplay: {
                            delay: 2000,
                            disableOnInteraction: false,
                            pauseOnMouseEnter: true
                        },
                        breakpoints: {
                            768: {
                                slidesPerView: 2,
                            },
                            1024: {
                                slidesPerView: 4,
                            }
                        }
                    });
                }
            });
        </script>
        <script>
            // Initialize Fancybox
            Fancybox.bind("[data-fancybox]", {
                Carousel: {
                    infinite: false,
                },
                Thumbs: {
                    autoStart: true,
                },
                Toolbar: {
                    display: {
                        left: ["infobar"],
                        middle: [
                            "zoomIn",
                            "zoomOut",
                            "toggle1to1",
                            "rotateCCW",
                            "rotateCW",
                            "flipX",
                            "flipY",
                        ],
                        right: ["slideshow", "fullscreen", "download", "thumbs", "close"],
                    },
                },
            });

            // Gallery thumbnail functionality
            document.querySelectorAll('.gallery-thumb').forEach(thumb => {
                thumb.addEventListener('click', function () {
                    // Remove active class from all thumbnails
                    document.querySelectorAll('.gallery-thumb').forEach(t => t.classList.remove('active'));

                    // Add active class to clicked thumbnail
                    this.classList.add('active');

                    // Update main image
                    const mainImage = document.getElementById('main-image');
                    const mainLink = document.getElementById('main-book-image');

                    mainImage.src = this.dataset.mainSrc;
                    mainLink.href = this.dataset.fullSrc;
                });
            });
        </script>
    @endpush
@endsection
