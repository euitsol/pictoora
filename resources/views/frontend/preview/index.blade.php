@extends('frontend.layouts.master')

@push('styles')
    <style>
        /* Custom CSS for preview page */
        .page-spread {
            perspective: 1000px;
            transform-style: preserve-3d;
            scroll-margin-top: 2rem;
        }

        .book-page {
            transform-origin: center left;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .book-page.flipped {
            transform: rotateY(-180deg);
        }

        .thumbnail-active {
            border-color: #7c3aed !important;
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.2);
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.05) 0%, rgba(139, 92, 246, 0.05) 100%);
        }

        .thumbnail-container {
            scrollbar-width: thin;
            scrollbar-color: #c4b5fd #f3f4f6;
        }

        .thumbnail-container::-webkit-scrollbar {
            width: 6px;
        }

        .thumbnail-container::-webkit-scrollbar-track {
            background: #f3f4f6;
            border-radius: 3px;
        }

        .thumbnail-container::-webkit-scrollbar-thumb {
            background: #c4b5fd;
            border-radius: 3px;
        }

        .thumbnail-container::-webkit-scrollbar-thumb:hover {
            background: #a78bfa;
        }

        .page-fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .page-fade-in.animate {
            opacity: 1;
            transform: translateY(0);
        }

        .book-binding {
            background: linear-gradient(90deg, #d1d5db 0%, #9ca3af 50%, #d1d5db 100%);
            box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .page-shadow {
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.12), 0 4px 16px rgba(0, 0, 0, 0.08);
            border-radius: 12px;
        }

        .refresh-button {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .refresh-button:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.2);
        }

        .thumbnail-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: 2px solid transparent;
        }

        .thumbnail-hover:hover {
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(124, 58, 237, 0.15);
            border-color: #c4b5fd;
        }

        .thumbnail-btn {
            position: relative;
            overflow: hidden;
        }

        .thumbnail-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.1) 0%, rgba(139, 92, 246, 0.1) 100%);
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 1;
        }

        .thumbnail-btn:hover::before {
            opacity: 1;
        }

        .thumbnail-btn img {
            transition: transform 0.3s ease;
        }

        .thumbnail-btn:hover img {
            transform: scale(1.05);
        }

        .page-number {
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.9) 0%, rgba(139, 92, 246, 0.9) 100%);
            backdrop-filter: blur(4px);
            -webkit-backdrop-filter: blur(4px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .book-container {
            background: linear-gradient(135deg, #fafafa 0%, #f5f5f5 100%);
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        }

        .sticky-sidebar {
            position: sticky;
            top: 2rem;
            height: calc(100vh - 4rem);
            overflow-y: auto;
        }

        .scroll-indicator {
            position: fixed;
            top: 50%;
            right: 2rem;
            transform: translateY(-50%);
            z-index: 50;
            display: none;
        }

        .scroll-indicator.show {
            display: block;
        }

        @media (max-width: 768px) {
            .desktop-thumbnails {
                display: none;
            }

            .mobile-thumbnails {
                display: none;
            }

            .book-spread {
                transform: none;
            }

            .sticky-sidebar {
                position: relative;
                height: auto;
                top: 0;
            }

            /* Mobile page adjustments */
            .page-spread {
                margin: 1rem 0;
            }

            .page-spread .max-w-2xl,
            .page-spread .max-w-5xl {
                max-width: 100% !important;
            }

            .book-container {
                padding: 1rem !important;
            }

            #book-container {
                gap: 1rem !important;
            }

            /* Adjust header for mobile */
            .container {
                padding-left: 1rem !important;
                padding-right: 1rem !important;
            }
        }

        @media (min-width: 769px) {
            .mobile-thumbnails {
                display: none;
            }

            .desktop-thumbnails {
                display: block;
            }
        }

        /* Smooth scrolling for the entire page */
        html {
            scroll-behavior: smooth;
        }

        /* Loading animation for thumbnails */
        .thumbnail-loading {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: loading 1.5s infinite;
        }

        @keyframes loading {
            0% {
                background-position: 200% 0;
            }

            100% {
                background-position: -200% 0;
            }
        }
    </style>
@endpush

@section('content')
    <!-- Header -->
    <section
        class="bg-gradient-to-r from-purple-50 via-purple-100 to-purple-50 border-b border-purple-200 px-6 py-4 sticky top-0 z-20 backdrop-blur-sm">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 items-center">
                <div class="flex items-center gap-4">
                    <div class="w-8 h-8 bg-purple-600 rounded-lg flex items-center justify-center">
                        <i data-lucide="book-open" class="w-5 h-5 text-white"></i>
                    </div>
                    <h2 class="text-lg sm:text-xl font-bold text-purple-900">The Magical Adventure of Luna</h2>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gradient-to-br from-gray-50 to-purple-50 min-h-screen">
        <div class="container mx-auto">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 p-2 md:p-6">
                <!-- Desktop Thumbnails -->
                <div class="lg:col-span-3 desktop-thumbnails">
                    <div class="">
                        <div class="bg-white rounded-xl shadow-lg p-6">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-8 h-8 bg-purple-100 rounded-lg flex items-center justify-center">
                                    <i data-lucide="layers" class="w-5 h-5 text-purple-600"></i>
                                </div>
                                <h3 class="text-xl font-bold text-purple-900">Book Pages</h3>
                            </div>
                            <div id="thumbnail-container" class="space-y-4">
                                <!-- Cover Page -->
                                <div id="thumbnail-cover"
                                    class="thumbnail-hover rounded-xl overflow-hidden border-2 border-purple-200 hover:border-purple-300">
                                    <a href="#page-0" class="block">
                                        <button
                                            class="thumbnail-btn w-full aspect-[3/4] transition-all duration-200 hover:scale-105"
                                            data-page="0">
                                            <div class="relative w-full h-full rounded-lg overflow-hidden">
                                                <img src="https://placehold.co/400x600?text=Cover+Page&font=roboto"
                                                    alt="Cover Page" class="w-full h-full object-cover">
                                                <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent">
                                                </div>
                                                <div
                                                    class="absolute bottom-2 left-2 page-number text-white text-xs px-2 py-1 rounded-md font-semibold">
                                                    Cover
                                                </div>
                                            </div>
                                        </button>
                                    </a>
                                </div>

                                <!-- Pages 1-2 -->
                                <div id="thumbnail-pages-1-2"
                                    class="thumbnail-hover rounded-xl overflow-hidden border-2 border-purple-200 hover:border-purple-300">
                                    <div class="grid grid-cols-2 gap-1">
                                        <a href="#page-1" class="block">
                                            <button
                                                class="thumbnail-btn aspect-[3/4] transition-all duration-200 hover:scale-105"
                                                data-page="1">
                                                <div class="relative w-full h-full rounded-lg overflow-hidden">
                                                    <img src="https://placehold.co/400x600?text=Page+1&font=roboto"
                                                        alt="Page 1" class="w-full h-full object-cover">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent">
                                                    </div>
                                                    <div
                                                        class="absolute bottom-2 left-2 page-number text-white text-xs px-2 py-1 rounded-md font-semibold">
                                                        1
                                                    </div>
                                                </div>
                                            </button>
                                        </a>
                                        <a href="#page-2" class="block">
                                            <button
                                                class="thumbnail-btn aspect-[3/4] transition-all duration-200 hover:scale-105"
                                                data-page="2">
                                                <div class="relative w-full h-full rounded-lg overflow-hidden">
                                                    <img src="https://placehold.co/400x600?text=Page+2&font=roboto"
                                                        alt="Page 2" class="w-full h-full object-cover">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent">
                                                    </div>
                                                    <div
                                                        class="absolute bottom-2 left-2 page-number text-white text-xs px-2 py-1 rounded-md font-semibold">
                                                        2
                                                    </div>
                                                </div>
                                            </button>
                                        </a>
                                    </div>
                                </div>

                                <!-- Pages 3-4 -->
                                <div id="thumbnail-pages-3-4"
                                    class="thumbnail-hover rounded-xl overflow-hidden border-2 border-purple-200 hover:border-purple-300">
                                    <div class="grid grid-cols-2 gap-1">
                                        <a href="#page-3" class="block">
                                            <button
                                                class="thumbnail-btn aspect-[3/4] transition-all duration-200 hover:scale-105"
                                                data-page="3">
                                                <div class="relative w-full h-full rounded-lg overflow-hidden">
                                                    <img src="https://placehold.co/400x600?text=Page+3&font=roboto"
                                                        alt="Page 3" class="w-full h-full object-cover">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent">
                                                    </div>
                                                    <div
                                                        class="absolute bottom-2 left-2 page-number text-white text-xs px-2 py-1 rounded-md font-semibold">
                                                        3
                                                    </div>
                                                </div>
                                            </button>
                                        </a>
                                        <a href="#page-4" class="block">
                                            <button
                                                class="thumbnail-btn aspect-[3/4] transition-all duration-200 hover:scale-105"
                                                data-page="4">
                                                <div class="relative w-full h-full rounded-lg overflow-hidden">
                                                    <img src="https://placehold.co/400x600?text=Page+4&font=roboto"
                                                        alt="Page 4" class="w-full h-full object-cover">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent">
                                                    </div>
                                                    <div
                                                        class="absolute bottom-2 left-2 page-number text-white text-xs px-2 py-1 rounded-md font-semibold">
                                                        4
                                                    </div>
                                                </div>
                                            </button>
                                        </a>
                                    </div>
                                </div>

                                <!-- Pages 5-6 -->
                                <div id="thumbnail-pages-5-6"
                                    class="thumbnail-hover rounded-xl overflow-hidden border-2 border-purple-200 hover:border-purple-300">
                                    <div class="grid grid-cols-2 gap-1">
                                        <a href="#page-5" class="block">
                                            <button
                                                class="thumbnail-btn aspect-[3/4] transition-all duration-200 hover:scale-105"
                                                data-page="5">
                                                <div class="relative w-full h-full rounded-lg overflow-hidden">
                                                    <img src="https://placehold.co/400x600?text=Page+5&font=roboto"
                                                        alt="Page 5" class="w-full h-full object-cover">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent">
                                                    </div>
                                                    <div
                                                        class="absolute bottom-2 left-2 page-number text-white text-xs px-2 py-1 rounded-md font-semibold">
                                                        5
                                                    </div>
                                                </div>
                                            </button>
                                        </a>
                                        <a href="#page-6" class="block">
                                            <button
                                                class="thumbnail-btn aspect-[3/4] transition-all duration-200 hover:scale-105"
                                                data-page="6">
                                                <div class="relative w-full h-full rounded-lg overflow-hidden">
                                                    <img src="https://placehold.co/400x600?text=Page+6&font=roboto"
                                                        alt="Page 6" class="w-full h-full object-cover">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent">
                                                    </div>
                                                    <div
                                                        class="absolute bottom-2 left-2 page-number text-white text-xs px-2 py-1 rounded-md font-semibold">
                                                        6
                                                    </div>
                                                </div>
                                            </button>
                                        </a>
                                    </div>
                                </div>

                                <!-- Pages 7-8 -->
                                <div id="thumbnail-pages-7-8"
                                    class="thumbnail-hover rounded-xl overflow-hidden border-2 border-purple-200 hover:border-purple-300">
                                    <div class="grid grid-cols-2 gap-1">
                                        <a href="#page-7" class="block">
                                            <button
                                                class="thumbnail-btn aspect-[3/4] transition-all duration-200 hover:scale-105"
                                                data-page="7">
                                                <div class="relative w-full h-full rounded-lg overflow-hidden">
                                                    <img src="https://placehold.co/400x600?text=Page+7&font=roboto"
                                                        alt="Page 7" class="w-full h-full object-cover">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent">
                                                    </div>
                                                    <div
                                                        class="absolute bottom-2 left-2 page-number text-white text-xs px-2 py-1 rounded-md font-semibold">
                                                        7
                                                    </div>
                                                </div>
                                            </button>
                                        </a>
                                        <a href="#page-8" class="block">
                                            <button
                                                class="thumbnail-btn aspect-[3/4] transition-all duration-200 hover:scale-105"
                                                data-page="8">
                                                <div class="relative w-full h-full rounded-lg overflow-hidden">
                                                    <img src="https://placehold.co/400x600?text=Page+8&font=roboto"
                                                        alt="Page 8" class="w-full h-full object-cover">
                                                    <div
                                                        class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent">
                                                    </div>
                                                    <div
                                                        class="absolute bottom-2 left-2 page-number text-white text-xs px-2 py-1 rounded-md font-semibold">
                                                        8
                                                    </div>
                                                </div>
                                            </button>
                                        </a>
                                    </div>
                                </div>

                                <!-- End Page -->
                                <div id="thumbnail-end"
                                    class="thumbnail-hover rounded-xl overflow-hidden border-2 border-purple-200 hover:border-purple-300">
                                    <a href="#page-9" class="block">
                                        <button
                                            class="thumbnail-btn w-full aspect-[3/4] transition-all duration-200 hover:scale-105"
                                            data-page="9">
                                            <div class="relative w-full h-full rounded-lg overflow-hidden">
                                                <img src="https://placehold.co/400x600?text=End+Page&font=roboto"
                                                    alt="End Page" class="w-full h-full object-cover">
                                                <div
                                                    class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent">
                                                </div>
                                                <div
                                                    class="absolute bottom-2 left-2 page-number text-white text-xs px-2 py-1 rounded-md font-semibold">
                                                    End
                                                </div>
                                            </div>
                                        </button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



                <!-- Main Content Area -->
                <div class="lg:col-span-9 col-span-1">
                    <div class="relative">
                        <div class="book-container p-8">
                            <div id="book-container" class="space-y-12">
                                <!-- Cover Page -->
                                <div class="page-spread" data-page="0" id="page-0">
                                    <div class="relative rounded-xl overflow-hidden">
                                        <div class="flex h-[190px] md:h-[500px] items-center justify-center">
                                            <div class="w-full max-w-2xl h-full">
                                                <div class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                    <img src="https://placehold.co/400x600?text=Cover+Page&font=roboto"
                                                        alt="Cover Page" class="w-full h-full object-cover">
                                                    <button
                                                        class="refresh-button absolute top-6 right-6 bg-white/90 hover:bg-white rounded-full p-3 shadow-lg transition-all duration-200 z-50">
                                                        <i data-lucide="rotate-ccw" class="w-5 h-5 text-purple-700"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pages 1-2 -->
                                <div class="page-spread" data-page="1" id="page-1">
                                    <div class="rounded-xl overflow-hidden">
                                        <div class="flex h-[190px] md:h-[500px] items-center justify-center">
                                            <div class="w-full max-w-5xl h-full flex">
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+1&font=roboto"
                                                            alt="Page 1" class="w-full h-full object-cover">
                                                        <button
                                                            class="refresh-button absolute top-6 right-6 bg-white/90 hover:bg-white rounded-full p-3 shadow-lg transition-all duration-200 z-50">
                                                            <i data-lucide="rotate-ccw"
                                                                class="w-5 h-5 text-purple-700"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="w-2 book-binding rounded-lg"></div>
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+2&font=roboto"
                                                            alt="Page 2" class="w-full h-full object-cover">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Page 2 (separate for individual navigation) -->
                                <div class="page-spread" data-page="2" id="page-2">
                                    <div class="rounded-xl overflow-hidden">
                                        <div class="flex h-[190px] md:h-[500px] items-center justify-center">
                                            <div class="w-full max-w-5xl h-full flex">
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+1&font=roboto"
                                                            alt="Page 1" class="w-full h-full object-cover">
                                                    </div>
                                                </div>
                                                <div class="w-2 book-binding rounded-lg"></div>
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+2&font=roboto"
                                                            alt="Page 2" class="w-full h-full object-cover">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pages 3-4 -->
                                <div class="page-spread" data-page="3" id="page-3">
                                    <div class="rounded-xl overflow-hidden">
                                        <div class="h-[190px] md:h-[500px] items-center justify-center">
                                            <div class="w-full max-w-5xl h-full flex">
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+3&font=roboto"
                                                            alt="Page 3" class="w-full h-full object-cover">
                                                        <button
                                                            class="refresh-button absolute top-6 right-6 bg-white/90 hover:bg-white rounded-full p-3 shadow-lg transition-all duration-200 z-50">
                                                            <i data-lucide="rotate-ccw"
                                                                class="w-5 h-5 text-purple-700"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="w-2 book-binding rounded-lg"></div>
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+4&font=roboto"
                                                            alt="Page 4" class="w-full h-full object-cover">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Page 4 (separate for individual navigation) -->
                                <div class="page-spread" data-page="4" id="page-4">
                                    <div class="rounded-xl overflow-hidden">
                                        <div class="h-[190px] md:h-[500px] items-center justify-center">
                                            <div class="w-full max-w-5xl h-full flex">
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+3&font=roboto"
                                                            alt="Page 3" class="w-full h-full object-cover">
                                                    </div>
                                                </div>
                                                <div class="w-2 book-binding rounded-lg"></div>
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+4&font=roboto"
                                                            alt="Page 4" class="w-full h-full object-cover">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pages 5-6 -->
                                <div class="page-spread" data-page="5" id="page-5">
                                    <div class="rounded-xl overflow-hidden">
                                        <div class="flex h-[190px] md:h-[500px] items-center justify-center">
                                            <div class="w-full max-w-5xl h-full flex">
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+5&font=roboto"
                                                            alt="Page 5" class="w-full h-full object-cover">
                                                        <button
                                                            class="refresh-button absolute top-6 right-6 bg-white/90 hover:bg-white rounded-full p-3 shadow-lg transition-all duration-200 z-50">
                                                            <i data-lucide="rotate-ccw"
                                                                class="w-5 h-5 text-purple-700"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="w-2 book-binding rounded-lg"></div>
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+6&font=roboto"
                                                            alt="Page 6" class="w-full h-full object-cover">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Page 6 (separate for individual navigation) -->
                                <div class="page-spread" data-page="6" id="page-6">
                                    <div class="rounded-xl overflow-hidden">
                                        <div class="flex h-[190px] md:h-[500px] items-center justify-center">
                                            <div class="w-full max-w-5xl h-full flex">
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+5&font=roboto"
                                                            alt="Page 5" class="w-full h-full object-cover">
                                                    </div>
                                                </div>
                                                <div class="w-2 book-binding rounded-lg"></div>
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+6&font=roboto"
                                                            alt="Page 6" class="w-full h-full object-cover">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Pages 7-8 -->
                                <div class="page-spread" data-page="7" id="page-7">
                                    <div class="rounded-xl overflow-hidden">
                                        <div class="flex h-[190px] md:h-[500px] items-center justify-center">
                                            <div class="w-full max-w-5xl h-full flex">
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+7&font=roboto"
                                                            alt="Page 7" class="w-full h-full object-cover">
                                                        <button
                                                            class="refresh-button absolute top-6 right-6 bg-white/90 hover:bg-white rounded-full p-3 shadow-lg transition-all duration-200 z-50">
                                                            <i data-lucide="rotate-ccw"
                                                                class="w-5 h-5 text-purple-700"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="w-2 book-binding rounded-lg"></div>
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+8&font=roboto"
                                                            alt="Page 8" class="w-full h-full object-cover">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Page 8 (separate for individual navigation) -->
                                <div class="page-spread" data-page="8" id="page-8">
                                    <div class="rounded-xl overflow-hidden">
                                        <div class="flex h-[190px] md:h-[500px] items-center justify-center">
                                            <div class="w-full max-w-5xl h-full flex">
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+7&font=roboto"
                                                            alt="Page 7" class="w-full h-full object-cover">
                                                    </div>
                                                </div>
                                                <div class="w-2 book-binding rounded-lg"></div>
                                                <div class="w-1/2 h-full">
                                                    <div
                                                        class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                        <img src="https://placehold.co/400x600?text=Page+8&font=roboto"
                                                            alt="Page 8" class="w-full h-full object-cover">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- End Page -->
                                <div class="page-spread" data-page="9" id="page-9">
                                    <div class="relative rounded-xl overflow-hidden">
                                        <div class="flex h-[190px] md:h-[500px] items-center justify-center">
                                            <div class="w-full max-w-2xl h-full">
                                                <div class="relative w-full h-full page-shadow rounded-xl overflow-hidden">
                                                    <img src="https://placehold.co/400x600?text=End+Page&font=roboto"
                                                        alt="End Page" class="w-full h-full object-cover">
                                                    <button
                                                        class="refresh-button absolute top-6 right-6 bg-white/90 hover:bg-white rounded-full p-3 shadow-lg transition-all duration-200 z-50">
                                                        <i data-lucide="rotate-ccw" class="w-5 h-5 text-purple-700"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Checkout Section -->
                                <div class="page-spread" data-page="10" id="page-10">
                                    <div class="relative rounded-sm overflow-hidden">
                                        <div class="btn gradient-bg p-4 text-white text-center">Checkout</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Page mapping for thumbnail groups
            const pageGroups = {
                0: 'thumbnail-cover',
                1: 'thumbnail-pages-1-2',
                2: 'thumbnail-pages-1-2',
                3: 'thumbnail-pages-3-4',
                4: 'thumbnail-pages-3-4',
                5: 'thumbnail-pages-5-6',
                6: 'thumbnail-pages-5-6',
                7: 'thumbnail-pages-7-8',
                8: 'thumbnail-pages-7-8',
                9: 'thumbnail-end'
            };

            // Get all thumbnail buttons
            const thumbnailButtons = document.querySelectorAll('.thumbnail-btn');
            const thumbnailContainers = document.querySelectorAll('[id^="thumbnail-"]');

            // Function to remove active class from all thumbnails
            function clearActiveThumbnails() {
                thumbnailContainers.forEach(container => {
                    container.classList.remove('thumbnail-active');
                });
            }

            // Function to activate thumbnail group
            function activateThumbnailGroup(pageNumber) {
                clearActiveThumbnails();
                const groupId = pageGroups[pageNumber];
                if (groupId) {
                    const container = document.getElementById(groupId);
                    if (container) {
                        container.classList.add('thumbnail-active');
                    }
                }
            }

            // Add click event listeners to thumbnail buttons
            thumbnailButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const pageNumber = parseInt(this.getAttribute('data-page'));

                    // Activate the corresponding thumbnail group
                    activateThumbnailGroup(pageNumber);

                    // Scroll to the page
                    const targetPage = document.getElementById(`page-${pageNumber}`);
                    if (targetPage) {
                        targetPage.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Intersection Observer to highlight active thumbnail based on scroll position
            const pageSpreads = document.querySelectorAll('.page-spread');
            const observerOptions = {
                threshold: 0.5,
                rootMargin: '-20% 0px -20% 0px'
            };

            const pageObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        const pageNumber = parseInt(entry.target.getAttribute('data-page'));
                        activateThumbnailGroup(pageNumber);
                    }
                });
            }, observerOptions);

            // Observe all page spreads
            pageSpreads.forEach(spread => {
                pageObserver.observe(spread);
            });

            // Handle anchor links for smooth scrolling
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href').substring(1);
                    const targetElement = document.getElementById(targetId);

                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });

                        // Activate corresponding thumbnail
                        const pageNumber = parseInt(targetElement.getAttribute('data-page'));
                        activateThumbnailGroup(pageNumber);
                    }
                });
            });

            // Initialize with first page active
            activateThumbnailGroup(0);
        });
    </script>
@endpush
