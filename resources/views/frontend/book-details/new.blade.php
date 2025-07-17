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
                                class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-hidden focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-destructive text-destructive-foreground hover:bg-destructive/80">
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
                    <div class="flex items-center space-x-4 text-sm text-gray-600">
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

    <section class="py-16 bg-gradient-to-r from-purple-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="max-w-4xl mx-auto rounded-2xl shadow-2xl bg-white/80 p-8 border border-purple-100">
                <div class="flex flex-col items-center mb-6">
                    <div class="bg-purple-100 p-3 rounded-full shadow-md mb-3">
                        <i data-lucide="book-open" class="w-8 h-8 text-purple-600"></i>
                    </div>
                    <h2 class="text-4xl md:text-4xl font-bold text-center gradient-text mb-2">Story Description</h2>
                    <div class="h-1 w-16 bg-gradient-to-r from-purple-400 to-blue-400 rounded-full mb-4"></div>
                </div>
                <div class="prose prose-lg mx-auto text-gray-700 text-justify">
                    <p>
                        <span class="font-bold text-purple-600">Luna</span> is a brave and curious young girl who loves
                        exploring the magical world around her.
                        This personalized story adapts to your child's <span class="font-semibold text-blue-600">name,
                            appearance, and interests</span>,
                        creating a truly unique adventure that will captivate their imagination and boost their confidence.
                    </p>
                    <p>
                        In this tale, your child will become the <span class="font-bold text-purple-600">hero</span> of
                        their own story, discovering magical creatures,
                        solving puzzles, and learning valuable lessons about <span
                            class="font-semibold text-blue-600">friendship, courage, and believing in themselves</span>.
                        Each page is beautifully illustrated and personalized to make your child the star's adventure in
                        life.
                    </p>
                    <p>
                        The story is carefully crafted to be age-appropriate while maintaining engagement through
                        interactive elements and choices that affect the outcome.
                        Your child will love seeing their <span class="font-bold text-purple-600">name and likeness</span>
                        throughout the magical adventure.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-16 bg-white shadow-2xl">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold mb-4 gradient-text text-gray-700">Preview & Demo</h2>
                <p class="text-xl text-gray-600">Get a glimpse of how your child's story will look and feel</p>
            </div>
            <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
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
                                <track kind="subtitles" label="Deutsche Untertitel" src="subtitles_de.vtt"
                                    srclang="de">
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


    <section class="py-16 bg-gradient-to-r from-purple-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto rounded-2xl shadow-2xl bg-white/80 p-8 border border-purple-100">
                <div class="flex flex-col items-center mb-8">
                    <div class="bg-purple-100 p-3 rounded-full shadow-md mb-3">
                        <i data-lucide="ruler" class="w-8 h-8 text-purple-600"></i>
                    </div>
                    <h2 class="text-4xl md:text-4xl font-bold text-center gradient-text mb-2">Appearance of the Book</h2>
                    <div class="h-1 w-16 bg-gradient-to-r from-purple-400 to-blue-400 rounded-full mb-4"></div>
                    <p class="text-lg text-gray-700 text-center max-w-2xl">Do you want to hold your own story in your hands?
                        Then consider printing your book and bringing your creation to life!</p>
                </div>
                <div class="grid md:grid-cols-2 gap-8 items-center">
                    <div class="flex justify-center">
                        <div
                            class="relative bg-gradient-to-br from-purple-100 to-blue-100 rounded-xl shadow-lg p-6 w-64 h-80 flex flex-col items-center justify-center">
                            <div
                                class="relative w-40 h-56 bg-white rounded-lg shadow-md flex flex-col items-center justify-center">
                                <img src="{{ asset('frontend/img/book/book-7.webp') }}" alt="Book Cover"
                                    class="w-full h-full object-cover rounded-lg" />
                                <span
                                    class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-purple-600 text-white text-xs px-2 py-1 rounded shadow">Customize
                                    Your Own Children's Book</span>
                            </div>
                            <span
                                class="absolute right-2 top-1/2 -translate-y-1/2 bg-purple-200 text-purple-700 text-xs px-2 py-1 rounded shadow rotate-90">11.69
                                inches</span>
                            <span
                                class="absolute bottom-2 left-1/2 -translate-x-1/2 bg-blue-200 text-blue-700 text-xs px-2 py-1 rounded shadow">8.27
                                inches</span>
                        </div>
                    </div>
                    <div class="mt-8 md:mt-0 md:pl-8">
                        <h3 class="text-2xl font-semibold mb-4 text-purple-700">Quality and Details</h3>
                        <ul class="space-y-3 text-gray-700">
                            <li class="flex items-start">
                                <span class="material-symbols-outlined mr-2 text-purple-600">format_size</span>
                                <span>
                                    <strong>Large A4 Format (8.27 x 11.69 inches):</strong>
                                    Perfect for colorful
                                    illustrations and an optimal reading experience.
                                </span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-symbols-outlined mr-2 text-purple-600">book</span>
                                <span>
                                    <strong>Durable
                                        Hardcover Finish:</strong> Remains beautiful, even after countless page
                                    turns.
                                </span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-symbols-outlined mr-2 text-purple-600">palette</span>
                                <span>
                                    <strong>Premium Color Quality:</strong> Brilliant and vibrant colors bring the story
                                    to life.</span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-symbols-outlined mr-2 text-purple-600">description</span>
                                <span>
                                    <strong>High-Quality Coated Paper:</strong> For a luxurious appearance and extra
                                    protection against stains.
                                </span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-symbols-outlined mr-2 text-purple-600">auto_awesome</span>
                                <span>
                                    <strong>24 Pages Full of Magic:</strong>
                                    Enough space for a beautiful story and enchanting images.
                                </span>
                            </li>
                            <li class="flex items-start">
                                <span class="material-symbols-outlined mr-2 text-purple-600">brush</span>
                                <span>
                                    <strong>Matte
                                        or Glossy Cover:</strong> Choose the desired finish for the hardcover cover
                                    yourself.
                                </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
@endpush
