@extends('frontend.layouts.master')

@push('styles')
    <style>
        .gallery-thumb {
            border: 2px solid transparent;
            cursor: pointer;
            transition: border 0.2s;
        }

        .gallery-thumb.active {
            border: 2px solid #8b5cf6;
            /* purple-500 */
        }

        .gallery-main {
            transition: box-shadow 0.3s;
        }

        .step-icon {
            font-size: 2rem;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 3rem;
            height: 3rem;
            border-radius: 9999px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: #fff;
            margin-bottom: 0.5rem;
        }
    </style>
@endpush

@section('content')
    <div class="bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-200 shadow-sm">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">
                <!-- Image Gallery -->
                <div>
                    <div class="mb-4">
                        <img src="{{ asset('frontend/img/book/book-1.webp') }}" alt="Book Main"
                            class="gallery-main w-full h-96 object-cover rounded-xl shadow-xl bg-white" id="main-book-image">
                    </div>
                    <div class="flex gap-3">
                        <img src="{{ asset('frontend/img/book/book-1.webp') }}" alt="Book Thumb 1"
                            class="gallery-thumb w-20 h-20 object-cover rounded-lg active"
                            onclick="document.getElementById('main-book-image').src=this.src">
                        <img src="{{ asset('frontend/img/book/book-2.webp') }}" alt="Book Thumb 2"
                            class="gallery-thumb w-20 h-20 object-cover rounded-lg"
                            onclick="document.getElementById('main-book-image').src=this.src">
                        <img src="{{ asset('frontend/img/book/book-3.webp') }}" alt="Book Thumb 3"
                            class="gallery-thumb w-20 h-20 object-cover rounded-lg"
                            onclick="document.getElementById('main-book-image').src=this.src">
                    </div>
                </div>
                <!-- Book Details -->
                <div>
                    <h1 class="text-3xl md:text-4xl font-bold mb-2 gradient-text">The Magical Adventure</h1>
                    <div class="flex items-center gap-4 mb-4">
                        <span class="text-2xl font-bold text-purple-600">$24.99</span>
                        <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Age 4-8</span>
                        <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">English</span>
                        <span class="bg-white text-gray-800 text-xs px-2 py-1 rounded">Fantasy</span>
                    </div>
                    <div class="mb-4">
                        <span class="text-gray-600 text-sm">Pages: <b>32</b></span> |
                        <span class="text-gray-600 text-sm">Publisher: <b>Pictoora AI Books</b></span>
                    </div>
                    <div class="mb-6">
                        <p class="text-lg text-gray-700 leading-relaxed">A magical journey where your child becomes the
                            hero! This AI-generated storybook is filled with adventure, wonder, and personalized
                            illustrations.</p>
                    </div>
                    <button
                        class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors mb-2 pulse-button">Order
                        Now</button>
                    <div class="flex items-center gap-2 mt-2">
                        <div class="flex items-center">
                            <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-yellow-400"></i>
                            <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-yellow-400"></i>
                            <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-yellow-400"></i>
                            <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-yellow-400"></i>
                            <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-yellow-400"></i>
                        </div>
                        <span class="ml-2 text-sm text-gray-600">4.9 (1,234 reviews)</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Book Story/Description -->
    <section class="py-16 bg-white border-b border-purple-100">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-4 gradient-text">Book Story</h2>
                    <p class="text-lg text-gray-700 mb-6 leading-relaxed">Dive into a world of imagination! This story
                        follows a brave child on a quest through enchanted forests, meeting magical creatures and overcoming
                        challenges. Every page is crafted with love and powered by AI to create a unique adventure for every
                        reader.</p>
                </div>
                <div class="bg-gradient-to-r from-purple-50 to-blue-50 rounded-2xl shadow-xl p-8">
                    <h3 class="text-xl font-semibold mb-2 text-purple-700">Book Dimensions</h3>
                    <ul class="text-gray-700 text-lg mb-2">
                        <li>Format: Digital PDF</li>
                        <li>Pages: 32</li>
                        <li>File Size: 8MB</li>
                        <li>Dimensions: 8.5" x 11"</li>
                    </ul>
                    <h3 class="text-xl font-semibold mb-2 text-purple-700 mt-6">Metadata</h3>
                    <ul class="text-gray-700 text-lg">
                        <li>Language: English</li>
                        <li>Genre: Fantasy</li>
                        <li>Recommended Age: 4-8</li>
                        <li>Publisher: Pictoora AI Books</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Preview Demo Section -->
    <section class="py-16 bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-100">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <h2 class="text-3xl font-bold mb-4 gradient-text">Preview the Magic</h2>
                    <p class="text-lg text-gray-700 mb-6">See a sample of the story below. Want the full book? Enter your
                        email and we'll send it to you instantly!</p>
                    <form class="flex flex-col sm:flex-row gap-4 max-w-lg">
                        <input type="email"
                            class="flex-1 px-4 py-3 rounded-lg border border-purple-200 focus:border-purple-500 focus:ring-2 focus:ring-purple-100 text-lg"
                            placeholder="Your email address">
                        <button type="submit"
                            class="bg-purple-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors">Send
                            Me the Book</button>
                    </form>
                </div>
                <div class="bg-white rounded-2xl shadow-xl p-8 flex flex-col items-center">
                    <img src="{{ asset('frontend/img/book/book-2.webp') }}" alt="Book Preview"
                        class="w-64 h-80 object-cover rounded-lg mb-4">
                    <span class="text-gray-600 text-sm">Sample page from "The Magical Adventure"</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Book Generation Process Section -->
    <section class="py-16 bg-white border-b border-purple-100">
        <div class="container mx-auto px-4">
            <h2 class="text-3xl font-bold mb-10 gradient-text text-center">How Your Book is Created</h2>
            <div class="grid md:grid-cols-4 gap-8">
                <div class="text-center">
                    <div class="step-icon mb-3"><i data-lucide="upload"></i></div>
                    <h3 class="text-lg font-semibold mb-2">Upload Image(s)</h3>
                    <p class="text-gray-600 text-sm">Start by uploading your favorite photo(s) to personalize the story.</p>
                </div>
                <div class="text-center">
                    <div class="step-icon mb-3"><i data-lucide="type"></i></div>
                    <h3 class="text-lg font-semibold mb-2">Enter Book Name</h3>
                    <p class="text-gray-600 text-sm">Give your book a special name for your child or loved one.</p>
                </div>
                <div class="text-center">
                    <div class="step-icon mb-3"><i data-lucide="book-open"></i></div>
                    <h3 class="text-lg font-semibold mb-2">Choose Content</h3>
                    <p class="text-gray-600 text-sm">Review and confirm the AI-generated story and illustrations.</p>
                </div>
                <div class="text-center">
                    <div class="step-icon mb-3"><i data-lucide="check-circle"></i></div>
                    <h3 class="text-lg font-semibold mb-2">Order & Enjoy</h3>
                    <p class="text-gray-600 text-sm">Place your order and receive your magical book in minutes!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Customer Reviews Section -->
    <section class="py-16 bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-100">
        <div class="container mx-auto px-4">
            <div class="flex flex-col items-center mb-10 fade-in visible">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 gradient-text text-center">What Our Readers Say</h2>
            </div>
            <div class="swiper reviews-swiper">
                <div class="swiper-wrapper">
                    @for ($i = 0; $i < 4; $i++)
                        <div class="swiper-slide">
                            <div
                                class="bg-white p-8 rounded-xl shadow-lg card-hover fade-in visible h-full flex flex-col justify-between">
                                <div class="flex flex-col items-center">
                                    <img src="/frontend/img/book/book-1.webp" alt="Reviewed Book"
                                        class="w-20 h-20 rounded-xl object-cover mb-4">
                                    <div class="flex mb-4 gap-1">
                                        @for ($j = 0; $j < 5; $j++)
                                            <i data-lucide="star" class="text-yellow-400 fill-yellow-400"></i>
                                        @endfor
                                    </div>
                                    <p class="text-gray-700 mb-4 text-center">"Absolutely magical! My child couldn't
                                        believe they were the hero of the story. Highly recommend!"</p>
                                </div>
                                <div class="flex items-center justify-center mt-4">
                                    <div>
                                        <div class="font-semibold text-center">Alex P.</div>
                                        <div class="text-gray-600 text-sm text-center">Parent of Jamie, 6</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="faq" class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12 fade-in visible">
                <h2 class="text-3xl md:text-4xl font-bold mb-4 gradient-text">Frequently Asked Questions</h2>
            </div>
            <div class="max-w-3xl mx-auto">
                <div class="faq-item bg-gray-50 rounded-lg mb-4 fade-in visible">
                    <div class="faq-question p-6 cursor-pointer flex justify-between items-center">
                        <h3 class="text-lg font-semibold">How do I personalize my book?</h3>
                        <i data-lucide="chevron-down" class="transition-transform"></i>
                    </div>
                    <div class="faq-answer p-6 pt-0 hidden" style="display: none;">
                        <p class="text-gray-700">Simply upload your photo(s), enter a name, and confirm the generated
                            story. It's quick and easy!</p>
                    </div>
                </div>
                <div class="faq-item bg-gray-50 rounded-lg mb-4 fade-in visible">
                    <div class="faq-question p-6 cursor-pointer flex justify-between items-center">
                        <h3 class="text-lg font-semibold">Can I see a preview before ordering?</h3>
                        <i data-lucide="chevron-down" class="transition-transform"></i>
                    </div>
                    <div class="faq-answer p-6 pt-0 hidden">
                        <p class="text-gray-700">Yes! You can preview a sample of your personalized book before you buy.
                        </p>
                    </div>
                </div>
                <div class="faq-item bg-gray-50 rounded-lg mb-4 fade-in visible">
                    <div class="faq-question p-6 cursor-pointer flex justify-between items-center">
                        <h3 class="text-lg font-semibold">What ages are these books for?</h3>
                        <i data-lucide="chevron-down" class="transition-transform"></i>
                    </div>
                    <div class="faq-answer p-6 pt-0 hidden">
                        <p class="text-gray-700">Our books are best for children ages 2-10, but anyone can enjoy the magic!
                        </p>
                    </div>
                </div>
                <div class="faq-item bg-gray-50 rounded-lg mb-4 fade-in visible">
                    <div class="faq-question p-6 cursor-pointer flex justify-between items-center">
                        <h3 class="text-lg font-semibold">How is the book delivered?</h3>
                        <i data-lucide="chevron-down" class="transition-transform"></i>
                    </div>
                    <div class="faq-answer p-6 pt-0 hidden">
                        <p class="text-gray-700">You'll receive a digital PDF instantly by email. Print or read on any
                            device!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (document.querySelector('.reviews-swiper')) {
                new Swiper('.reviews-swiper', {
                    loop: true,
                    speed: 800,
                    autoplay: {
                        delay: 2000,
                        disableOnInteraction: false,
                        pauseOnMouseEnter: true
                    },
                    breakpoints: {
                        640: {
                            slidesPerView: 2,
                            spaceBetween: 24
                        },
                        1024: {
                            slidesPerView: 3,
                            spaceBetween: 32
                        }
                    }
                });
            }
            // FAQ accordion
            document.querySelectorAll('.faq-question').forEach(function(el) {
                el.addEventListener('click', function() {
                    var answer = el.nextElementSibling;
                    var icon = el.querySelector('i');
                    document.querySelectorAll('.faq-answer').forEach(function(a) {
                        if (a !== answer) a.style.display = 'none';
                    });
                    document.querySelectorAll('.faq-question i').forEach(function(i) {
                        if (i !== icon) i.classList.remove('rotate-180');
                    });
                    answer.style.display = answer.style.display === 'block' ? 'none' : 'block';
                    icon.classList.toggle('rotate-180');
                });
            });
        });
    </script>
@endpush
