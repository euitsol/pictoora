@extends('frontend.layouts.master')

@push('styles')
<style>
    /* Added CSS global variables for book dimensions and real book feeling */
    :root {
        --book-page-width: 12cm;
        --book-page-height: 12cm;
        --book-aspect-ratio: 4/4;
        --book-binding-width: 12px;
        --book-shadow: 0 0px 0px 0px rgb(0 0 0 / 0.25);
        --book-border-radius: 12px;
        --thumbnail-width: 80px;
        --thumbnail-height: 80px;
    }

    .backdrop-blur-md {
        backdrop-filter: blur(12px);
    }
    .backdrop-blur-sm {
        backdrop-filter: blur(4px);
    }
    .scroll-mt-24 {
        scroll-margin-top: 6rem;
    }
    .shadow-inner {
        box-shadow: inset 0 2px 4px 0 rgb(0 0 0 / 0.05);
    }

    /* Added book-specific styling using CSS variables */
    .book-page {
        width: var(--book-page-width);
        height: var(--book-page-height);
        aspect-ratio: var(--book-aspect-ratio);
        border-radius: var(--book-border-radius);
        box-shadow: var(--book-shadow);
    }

    .book-binding {
        width: var(--book-binding-width);
    }

    .thumbnail-page {
        width: var(--thumbnail-width);
        height: var(--thumbnail-height);
        aspect-ratio: var(--book-aspect-ratio);
    }

    @media (max-width: 768px) {
        :root {
            --book-page-width: 8cm;
            --book-page-height: 8cm;
            --thumbnail-width: 60px;
            --thumbnail-height: 60px;
        }
    }
</style>
@endpush

@section('content')
    <!-- Header -->
    {{-- <section
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
    </section> --}}

    <section class="bg-gradient-to-r from-purple-50 via-purple-100 to-purple-50 border-b border-purple-200 shadow-sm sticky top-0 z-20 backdrop-blur-sm">
        <div class="container mx-auto px-4 py-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-2 items-center justify-between lg:justify-start">
                <div class="flex items-center gap-3 justify-center">
                    <div class="w-10 h-10 bg-purple-600 rounded-xl flex items-center justify-center shadow-lg">
                        <i data-lucide="book-open" class="w-5 h-5 text-white"></i>
                    </div>
                    <div>
                        <h2 class="text-lg sm:text-xl font-bold text-purple-900">The Magical Adventure of Luna</h2>
                    </div>
                </div>

                <div id="view-toggle" class="flex p-1 justify-center lg:justify-end">
                    <div class="flex items-center justify-end bg-white rounded-lg">
                        <button id="single-view-btn" class="flex items-center gap-2 px-3 py-2 rounded-md text-sm font-medium transition-colors bg-white text-purple-600">
                            <i data-lucide="rectangle-horizontal" class="w-4 h-4"></i>
                            Single
                        </button>
                        <button id="spread-view-btn" class="flex items-center gap-2 px-3 py-2 rounded-md text-sm font-medium transition-colors bg-purple-600 text-white">
                            <i data-lucide="book-open-check" class="w-4 h-4"></i>
                            Spread
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="bg-gradient-to-r from-blue-50 to-blue-50">
        <div class="container mx-auto px-4 py-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-6">
                <div class="lg:col-span-2 order-2 lg:order-1 hidden lg:block">
                    <div class="shadow-lg border-0 bg-white/70 backdrop-blur-sm rounded-lg">
                        <div class="p-6">
                            <div class="flex items-center gap-3 mb-6">
                                <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                                    <i data-lucide="layers" class="w-4 h-4 text-blue-600"></i>
                                </div>
                                <h3 class="font-semibold text-slate-900">Pages</h3>
                                <span class="ml-auto px-2 py-1 text-xs font-medium bg-slate-100 text-slate-800 rounded-full">10</span>
                            </div>

                            <div id="thumbnails" class="space-y-3">

                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-blue-500 bg-blue-50 shadow-md" data-page-id="1">
                                    <div class="thumbnail-page rounded-lg overflow-hidden relative p-1">
                                        <img src="{{ asset('frontend/img/book/the-explorer/a1.png') }}" alt="Cover" class="w-full h-full object-cover">
                                        <div class="absolute bottom-1 left-1">
                                            <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">Cover</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="2">
                                    <div class="thumbnail-page rounded-lg overflow-hidden relative p-1">
                                        <img src="{{ asset('frontend/img/book/the-explorer/b1.png') }}" alt="Page 1" class="w-full h-full object-cover">
                                        <div class="absolute bottom-1 left-1">
                                            <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">1</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="3">
                                    <div class="grid grid-cols-2 gap-1 p-1">
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/c1.png') }}" alt="Page 2" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">2</span>
                                            </div>
                                        </div>
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/c2.png') }}" alt="Page 3" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">3</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="4">
                                    <div class="grid grid-cols-2 gap-1 p-1">
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/d1.png') }}" alt="Page 4" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">4</span>
                                            </div>
                                        </div>
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/d2.png') }}" alt="Page 5" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">5</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="5">
                                    <div class="grid grid-cols-2 gap-1 p-1">
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/e1.png') }}" alt="Page 6" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">6</span>
                                            </div>
                                        </div>
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/e2.png') }}" alt="Page 7" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">7</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="6">
                                    <div class="grid grid-cols-2 gap-1 p-1">
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/f1.png') }}" alt="Page 8" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">8</span>
                                            </div>
                                        </div>
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/f2.png') }}" alt="Page 9" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">9</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="7">
                                    <div class="grid grid-cols-2 gap-1 p-1">
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/g1.png') }}" alt="Page 10" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">10</span>
                                            </div>
                                        </div>
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/g2.png') }}" alt="Page 11" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">11</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="8">
                                    <div class="grid grid-cols-2 gap-1 p-1">
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/h1.png') }}" alt="Page 12" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">12</span>
                                            </div>
                                        </div>
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/h2.png') }}" alt="Page 13" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">13</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="9">
                                    <div class="grid grid-cols-2 gap-1 p-1">
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/i1.png') }}" alt="Page 14" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">14</span>
                                            </div>
                                        </div>
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/i2.png') }}" alt="Page 15" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">15</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="10">
                                    <div class="grid grid-cols-2 gap-1 p-1">
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/j1.png') }}" alt="Page 16" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">16</span>
                                            </div>
                                        </div>
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/j2.png') }}" alt="Page 17" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">17</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="11">
                                    <div class="grid grid-cols-2 gap-1 p-1">
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/k1.png') }}" alt="Page 18" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">18</span>
                                            </div>
                                        </div>
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/k2.png') }}" alt="Page 19" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">19</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="12">
                                    <div class="grid grid-cols-2 gap-1 p-1">
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/l1.png') }}" alt="Page 20" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">20</span>
                                            </div>
                                        </div>
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/l2.png') }}" alt="Page 21" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">21</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="13">
                                    <div class="grid grid-cols-2 gap-1 p-1">
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/m1.png') }}" alt="Page 22" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">22</span>
                                            </div>
                                        </div>
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/m2.png') }}" alt="Page 23" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">23</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="14">
                                    <div class="grid grid-cols-2 gap-1 p-1">
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/n1.png') }}" alt="Page 24" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">24</span>
                                            </div>
                                        </div>
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/n2.png') }}" alt="Page 25" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">25</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="15">
                                    <div class="grid grid-cols-2 gap-1 p-1">
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/o1.png') }}" alt="Page 26" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">26</span>
                                            </div>
                                        </div>
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/o2.png') }}" alt="Page 27" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">27</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="16">
                                    <div class="grid grid-cols-2 gap-1 p-1">
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/book/the-explorer/p1.png') }}" alt="Page 28" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">28</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="thumbnail-item rounded-lg border-2 transition-all duration-200 cursor-pointer hover:shadow-md border-slate-200 hover:border-slate-300" data-page-id="17">
                                    <div class="grid grid-cols-2 gap-1 p-1">
                                        <div class="thumbnail-page rounded overflow-hidden relative">
                                            <img src="{{ asset('frontend/img/placeholder.svg') }}" alt="End" class="w-full h-full object-cover">
                                            <div class="absolute bottom-1 left-1">
                                                <span class="px-1 py-0.5 text-xs font-medium bg-slate-900 text-white rounded">End</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
                <div class="lg:col-span-10 order-1 lg:order-2">
                    <div id="main-content" class="space-y-8">
                        <div id="page-1" class="scroll-mt-24">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="relative max-w-md w-full">
                                            <div class="book-page overflow-hidden">
                                                <img src="{{ asset('frontend/img/book/the-explorer/a1.png') }}" alt="Cover" class="w-full h-full object-cover">
                                            </div>
                                            <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                            </button>
                                            <div class="absolute bottom-4 left-4">
                                                <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Cover</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-2" class="scroll-mt-24 ">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="relative max-w-md w-full">
                                            <div class="book-page overflow-hidden">
                                                <img src="{{ asset('frontend/img/book/the-explorer/b1.png') }}" alt="Cover" class="w-full h-full object-cover">
                                            </div>
                                            <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                            </button>
                                            <div class="absolute bottom-4 left-4">
                                                <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 1</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-3" class="scroll-mt-24 spread-view">
                            <div class="overflow-auto shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-4xl w-full gap-2">
                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/c1.png') }}" alt="Page 1" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 2</span>
                                                </div>
                                            </div>

                                            <div class="book-binding bg-gradient-to-r from-slate-300 via-slate-400 to-slate-300 rounded-full shadow-inner"></div>

                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/c2.png') }}" alt="Page 2" class="w-full h-full object-cover">
                                                </div>
                                                <div class="absolute bottom-4 right-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 3</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="page-3" class="scroll-mt-24 single-view" style="display: none">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/c1.png') }}" alt="Page 1" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 2</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/c2.png') }}" alt="Page 1" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 3</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-4" class="scroll-mt-24 spread-view">
                            <div class="overflow-auto shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-4xl w-full gap-2">
                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/d1.png') }}" alt="Page 1" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 4</span>
                                                </div>
                                            </div>

                                            <div class="book-binding bg-gradient-to-r from-slate-300 via-slate-400 to-slate-300 rounded-full shadow-inner"></div>

                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/d2.png') }}" alt="Page 2" class="w-full h-full object-cover">
                                                </div>
                                                <div class="absolute bottom-4 right-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 5</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="page-4" class="scroll-mt-24 single-view" style="display: none">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/d1.png') }}" alt="Page 1" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 4</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/d2.png') }}" alt="Page 1" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 5</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-5" class="scroll-mt-24 spread-view">
                            <div class="overflow-auto shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-4xl w-full gap-2">
                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/e1.png') }}" alt="Page 6" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 6</span>
                                                </div>
                                            </div>

                                            <div class="book-binding bg-gradient-to-r from-slate-300 via-slate-400 to-slate-300 rounded-full shadow-inner"></div>

                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/e2.png') }}" alt="Page 7" class="w-full h-full object-cover">
                                                </div>
                                                <div class="absolute bottom-4 right-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 7</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="page-5" class="scroll-mt-24 single-view" style="display: none">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/e1.png') }}" alt="Page 6" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 6</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/e2.png') }}" alt="Page 7" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 7</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-6" class="scroll-mt-24 spread-view">
                            <div class="overflow-auto shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-4xl w-full gap-2">
                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/f1.png') }}" alt="Page 8" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 8</span>
                                                </div>
                                            </div>

                                            <div class="book-binding bg-gradient-to-r from-slate-300 via-slate-400 to-slate-300 rounded-full shadow-inner"></div>

                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/f2.png') }}" alt="Page 9" class="w-full h-full object-cover">
                                                </div>
                                                <div class="absolute bottom-4 right-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 9</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="page-6" class="scroll-mt-24 single-view" style="display: none">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/f1.png') }}" alt="Page 8" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 8</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/f2.png') }}" alt="Page 9" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 9</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-7" class="scroll-mt-24 spread-view">
                            <div class="overflow-auto shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-4xl w-full gap-2">
                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/g1.png') }}" alt="Page 10" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 10</span>
                                                </div>
                                            </div>

                                            <div class="book-binding bg-gradient-to-r from-slate-300 via-slate-400 to-slate-300 rounded-full shadow-inner"></div>

                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/g2.png') }}" alt="Page 11" class="w-full h-full object-cover">
                                                </div>
                                                <div class="absolute bottom-4 right-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 11</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="page-7" class="scroll-mt-24 single-view" style="display: none">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/g1.png') }}" alt="Page 10" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 10</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/g2.png') }}" alt="Page 11" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 11</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-8" class="scroll-mt-24 spread-view">
                            <div class="overflow-auto shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-4xl w-full gap-2">
                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/h1.png') }}" alt="Page 12" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 12</span>
                                                </div>
                                            </div>

                                            <div class="book-binding bg-gradient-to-r from-slate-300 via-slate-400 to-slate-300 rounded-full shadow-inner"></div>

                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/h2.png') }}" alt="Page 13" class="w-full h-full object-cover">
                                                </div>
                                                <div class="absolute bottom-4 right-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 13</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="page-8" class="scroll-mt-24 single-view" style="display: none">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/h1.png') }}" alt="Page 12" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 12</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/h2.png') }}" alt="Page 13" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 13</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-9" class="scroll-mt-24 spread-view">
                            <div class="overflow-auto shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-4xl w-full gap-2">
                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/i1.png') }}" alt="Page 14" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 14</span>
                                                </div>
                                            </div>

                                            <div class="book-binding bg-gradient-to-r from-slate-300 via-slate-400 to-slate-300 rounded-full shadow-inner"></div>

                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/i2.png') }}" alt="Page 15" class="w-full h-full object-cover">
                                                </div>
                                                <div class="absolute bottom-4 right-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 15</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="page-9" class="scroll-mt-24 single-view" style="display: none">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/i1.png') }}" alt="Page 14" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 14</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/i2.png') }}" alt="Page 15" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 15</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-10" class="scroll-mt-24 spread-view">
                            <div class="overflow-auto shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-4xl w-full gap-2">
                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/j1.png') }}" alt="Page 16" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 16</span>
                                                </div>
                                            </div>

                                            <div class="book-binding bg-gradient-to-r from-slate-300 via-slate-400 to-slate-300 rounded-full shadow-inner"></div>

                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/j2.png') }}" alt="Page 17" class="w-full h-full object-cover">
                                                </div>
                                                <div class="absolute bottom-4 right-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 17</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="page-10" class="scroll-mt-24 single-view" style="display: none">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/j1.png') }}" alt="Page 16" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 16</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/j2.png') }}" alt="Page 17" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 17</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-11" class="scroll-mt-24 spread-view">
                            <div class="overflow-auto shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-4xl w-full gap-2">
                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/k1.png') }}" alt="Page 18" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 18</span>
                                                </div>
                                            </div>

                                            <div class="book-binding bg-gradient-to-r from-slate-300 via-slate-400 to-slate-300 rounded-full shadow-inner"></div>

                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/k2.png') }}" alt="Page 19" class="w-full h-full object-cover">
                                                </div>
                                                <div class="absolute bottom-4 right-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 19</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="page-11" class="scroll-mt-24 single-view" style="display: none">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/k1.png') }}" alt="Page 18" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 18</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/k2.png') }}" alt="Page 19" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 19</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-12" class="scroll-mt-24 spread-view">
                            <div class="overflow-auto shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-4xl w-full gap-2">
                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/l1.png') }}" alt="Page 20" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 20</span>
                                                </div>
                                            </div>

                                            <div class="book-binding bg-gradient-to-r from-slate-300 via-slate-400 to-slate-300 rounded-full shadow-inner"></div>

                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/l2.png') }}" alt="Page 21" class="w-full h-full object-cover">
                                                </div>
                                                <div class="absolute bottom-4 right-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 21</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="page-12" class="scroll-mt-24 single-view" style="display: none">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/l1.png') }}" alt="Page 20" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 20</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/l2.png') }}" alt="Page 21" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 21</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-13" class="scroll-mt-24 spread-view">
                            <div class="overflow-auto shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-4xl w-full gap-2">
                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/m1.png') }}" alt="Page 22" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 22</span>
                                                </div>
                                            </div>

                                            <div class="book-binding bg-gradient-to-r from-slate-300 via-slate-400 to-slate-300 rounded-full shadow-inner"></div>

                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/m2.png') }}" alt="Page 23" class="w-full h-full object-cover">
                                                </div>
                                                <div class="absolute bottom-4 right-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 23</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="page-13" class="scroll-mt-24 single-view" style="display: none">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/m1.png') }}" alt="Page 22" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 22</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/m2.png') }}" alt="Page 23" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 23</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-14" class="scroll-mt-24 spread-view">
                            <div class="overflow-auto shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-4xl w-full gap-2">
                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/n1.png') }}" alt="Page 24" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 24</span>
                                                </div>
                                            </div>

                                            <div class="book-binding bg-gradient-to-r from-slate-300 via-slate-400 to-slate-300 rounded-full shadow-inner"></div>

                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/n2.png') }}" alt="Page 25" class="w-full h-full object-cover">
                                                </div>
                                                <div class="absolute bottom-4 right-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 25</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="page-14" class="scroll-mt-24 single-view" style="display: none">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/n1.png') }}" alt="Page 24" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 24</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/n2.png') }}" alt="Page 25" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 25</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-15" class="scroll-mt-24 spread-view">
                            <div class="overflow-auto shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-4xl w-full gap-2">
                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/o1.png') }}" alt="Page 26" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 26</span>
                                                </div>
                                            </div>

                                            <div class="book-binding bg-gradient-to-r from-slate-300 via-slate-400 to-slate-300 rounded-full shadow-inner"></div>

                                            <div class="flex-1 relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/o2.png') }}" alt="Page 27" class="w-full h-full object-cover">
                                                </div>
                                                <div class="absolute bottom-4 right-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 27</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="page-15" class="scroll-mt-24 single-view" style="display: none">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/o1.png') }}" alt="Page 26" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 26</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg mt-8 mb-8">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="flex max-w-2xl gap-2">
                                            <div class="relative">
                                                <div class="book-page overflow-hidden">
                                                    <img src="{{ asset('frontend/img/book/the-explorer/o2.png') }}" alt="Page 27" class="w-full h-full object-cover">
                                                </div>
                                                <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                    <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                                </button>
                                                <div class="absolute bottom-4 left-4">
                                                    <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 27</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-17" class="scroll-mt-24">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="relative max-w-md w-full">
                                            <div class="book-page overflow-hidden">
                                                <img src="{{ asset('frontend/img/book/the-explorer/p1.png') }}" alt="Page 28" class="w-full h-full object-cover">
                                            </div>
                                            <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                            </button>
                                            <div class="absolute bottom-4 left-4">
                                                <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">Page 28</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="page-18" class="scroll-mt-24">
                            <div class="overflow-hidden shadow-xl border-0 bg-white rounded-lg">
                                <div class="p-0">
                                    <div class="flex justify-center p-8">
                                        <div class="relative max-w-md w-full">
                                            <div class="book-page overflow-hidden">
                                                <img src="{{ asset('frontend/img/placeholder.svg') }}" alt="End" class="w-full h-full object-cover">
                                            </div>
                                            <button class="absolute top-4 right-4 shadow-lg bg-white/90 hover:bg-white px-3 py-2 rounded-md text-sm font-medium transition-colors">
                                                <i data-lucide="rotate-ccw" class="w-4 h-4"></i>
                                            </button>
                                            <div class="absolute bottom-4 left-4">
                                                <span class="px-2 py-1 text-xs font-medium bg-slate-900 text-white rounded-md shadow-lg">End</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('scripts')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>

    var currentPage = 0;
    var viewMode = 'spread';
    const isMobile = $(window).width() < 768 ? true : false;

    function scrollToPage(pageId) {
        currentPage = pageId;
        const targetElement = $(`#page-${pageId}`);
        $('html, body').animate({
            scrollTop: targetElement.offset().top - 100
        }, 500);
    }

    function updateViewModeButtons() {
        if (viewMode === 'single') {
            $('#single-view-btn').addClass('bg-purple-600 text-white hover:bg-purple-400').removeClass('bg-white text-purple-600 hover:bg-white');
            $('#spread-view-btn').removeClass('bg-purple-600 text-white').addClass('bg-white text-purple-600 hover:bg-blue-50');
        } else {
            $('#spread-view-btn').addClass('bg-purple-600 text-white hover:bg-purple-400').removeClass('bg-white text-purple-600 hover:bg-white');
            $('#single-view-btn').removeClass('bg-purple-600 text-white').addClass('bg-white text-purple-600 hover:bg-blue-50');
        }
    }

    function updatePageVisibility() {
        if (viewMode === 'single') {
            $('.single-view').show();
            $('.spread-view').hide();
        } else {
            $('.single-view').hide();
            $('.spread-view').show();
        }
    }

    $(document).ready(function() {
        if (isMobile) {
            viewMode = 'single';
        }

        updateViewModeButtons();
        updatePageVisibility();


        $('#single-view-btn').click(function() {
            viewMode = 'single';
            updateViewModeButtons();
            updatePageVisibility();
        });
        $('#spread-view-btn').click(function() {
            viewMode = 'spread';
            updateViewModeButtons();
            updatePageVisibility();
        });
        $(document).on('click', '.thumbnail-item', function() {
            const pageId = parseInt($(this).data('page-id'));
            $('.thumbnail-item').removeClass('border-blue-500 bg-blue-50 shadow-md').addClass('border-slate-200');
            $(this).removeClass('border-slate-200').addClass('border-blue-500 bg-blue-50 shadow-md');
            scrollToPage(pageId);
        });
    });
</script>


@endpush
