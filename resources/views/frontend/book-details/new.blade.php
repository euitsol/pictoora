@extends('frontend.layouts.master')

@push('styles')
@endpush

@section('content')
    <section class="bg-white">
        <div class="container mx-auto px-4 py-12">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div class="rounded-2xl p-4 md:p-6 lg:p-8 shadow-2xl bg-gradient-to-r from-purple-50 to-blue-50">
                        <div class="rounded-2xl p-2 md:p-4 lg:p-6 shadow-2xl flex items-center justify-center">
                            <img alt="The Magical Adventure of Luna - Personalized Children's Book"
                                class="h-[30rem] md:h-[45rem] lg:h-[40rem] w-full object-cover rounded-lg shadow-md"
                                src="{{ asset('frontend/img/book/book-7.webp') }}">
                        </div>
                        <div
                            class="absolute -top-4 -right-0 md:-right-4 bg-amber-400/70 text-yellow-900 px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                            Bestseller</div>
                    </div>
                </div>
                <div
                    class="space-y-6 bg-gradient-to-r from-purple-50 to-blue-50 rounded-2xl p-6 border border-purple-200 shadow-2xl">
                    <div>
                        <div
                            class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-hidden focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-secondary/80 mb-3 bg-purple-100 text-purple-700">
                            Personalized Children's Book</div>
                        <h1 class="text-4xl md:text-5xl lg:text-5xl font-bold gradient-text mb-4">The Magical Adventure of
                            Luna</h1>
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="flex items-center">
                                <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-yellow-400"></i>
                                <span class="text-gray-600">(127 reviews)</span>
                            </div>
                        </div>
                        <p class="text-xl text-gray-600 leading-relaxed">Create a magical personalized story where your
                            child
                            becomes the hero of their own adventure. Each book is uniquely crafted with your child's name,
                            appearance, and preferences.</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-2xl border border-purple-200">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <span class="text-3xl font-bold text-purple-600">$24.99</span>
                                <span class="text-lg text-gray-500 line-through ml-2">$34.99</span>
                            </div>
                            <div
                                class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold bg-amber-600/70 text-white">
                                30% OFF</div>
                        </div>
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <span class="text-gray-600">Format:</span>
                                    <p class="font-semibold">Digital + Print</p>
                                </div>
                                <div>
                                    <span class="text-gray-600">Pages:</span>
                                    <p class="font-semibold">24 pages</p>
                                </div>
                                <div>
                                    <span class="text-gray-600">Age Range:</span>
                                    <p class="font-semibold">3-8 years</p>
                                </div>
                                <div>
                                    <span class="text-gray-600">Delivery:</span>
                                    <p class="font-semibold">Instant</p>
                                </div>
                                <div>
                                    <span class="text-gray-600">Language:</span>
                                    <p class="font-semibold">English, French, German, Spanish, Italian, Portuguese</p>
                                </div>
                            </div>
                            <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-px w-full"></div>
                            <div class="space-y-3">
                                <button
                                    class="ring-offset-background focus-visible:outline-hidden focus-visible:ring-ring inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium transition-colors focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 text-primary-foreground h-11 rounded-md px-8 w-full bg-purple-600 hover:bg-purple-700 text-white py-6">
                                    Create Your Child's Story Now
                                    <i data-lucide="arrow-right" class="w-5 h-5 text-white"></i>
                                </button>
                                <div class="flex space-x-2">
                                    <button
                                        class="ring-offset-background focus-visible:outline-hidden focus-visible:ring-ring inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-colors focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border-input hover:bg-accent hover:from-purple-50 hover:to-blue-50 border h-11 rounded-md px-8 flex-1 bg-transparent border-purple-200">
                                        <i data-lucide="heart" class="w-5 h-5 text-purple-600"></i>
                                        Save
                                    </button>
                                    <button
                                        class="ring-offset-background focus-visible:outline-hidden focus-visible:ring-ring inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-colors focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 border-input hover:bg-accent hover:from-purple-50 hover:to-blue-50 border h-11 rounded-md px-8 flex-1 bg-transparent border-purple-200">
                                        <i data-lucide="share2" class="w-5 h-5 text-purple-600"></i>
                                        Share
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-3 items-center space-x-4 text-sm text-gray-600">
                        <div class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 text-green-500 mr-1"></i>
                            30-day money-back guarantee
                        </div>
                        <div class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 text-green-500 mr-1"></i>
                            Instant digital delivery
                        </div>
                        <div class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 text-green-500 mr-1"></i>
                            Safe and secure payment
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class=" bg-white shadow-2xl hidden">
        <div class="container mx-auto px-4 py-12">
            <div class="text-center">
                <h2 class="text-4xl font-bold mb-4 gradient-text text-gray-700">Preview & Demo</h2>
                <p class="text-xl text-gray-600">Get a glimpse of how your child's story will look and feel</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8">
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
                                <source id='mp4' src="http://media.w3.org/2010/05/sintel/trailer.mp4"
                                    type='video/mp4' />
                                <source id='webm' src="http://media.w3.org/2010/05/sintel/trailer.webm"
                                    type='video/webm' />
                                <source id='ogv' src="http://media.w3.org/2010/05/sintel/trailer.ogv"
                                    type='video/ogg' />
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

    @push('scripts')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
        <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
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
    @endpush
@endsection
