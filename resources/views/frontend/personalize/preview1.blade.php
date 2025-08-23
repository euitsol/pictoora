
@extends('frontend.layouts.master')

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <style>
        /* Swiper custom styles */
        .swiper-button-next,
        .swiper-button-prev {
            color: #fff;
            background: rgba(0, 0, 0, 0.5);
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-top: -20px;
        }

        .swiper-button-next:after,
        .swiper-button-prev:after {
            font-size: 16px;
        }

        .swiper-pagination-bullet {
            background: #fff;
            opacity: 0.7;
        }

        .swiper-pagination-bullet-active {
            background: #3b82f6;
            opacity: 1;
        }

        /* Minor custom styles */
        .thumbnail-active {
            border-color: #3b82f6 !important;
            transform: scale(1.05);
        }

        .thumbnail-item {
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .thumbnail-item:hover {
            transform: scale(1.02);
            opacity: 0.8;
        }

        .image-blur {
            filter: blur(8px);
            transition: filter 0.3s ease;
        }

        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.3);
            z-index: 10;
        }

        .loader {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3b82f6;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
@endpush

@section('content')
    <div class="container mx-auto py-12">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Professional Image Slider</h1>

        {{-- Mobile View --}}
        <div class="lg:hidden bg-white rounded-2xl shadow-2xl overflow-hidden max-w-6xl mx-auto">
            <div class="flex flex-col">
                <div class="flex-1 relative">
                    <div class="swiper mainSwiper h-96">
                        <div class="swiper-wrapper">
                            {{-- Slides are populated by JS --}}
                        </div>
                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>
                        <div class="swiper-pagination"></div>
                        <div class="absolute top-4 right-4 bg-black bg-opacity-50 text-white px-3 py-1 rounded-full text-sm">
                            <span id="currentImage">1</span> / <span id="totalImages">6</span>
                        </div>
                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6">
                            <h3 id="imageTitle" class="text-white text-xl font-semibold mb-2">Stunning Mountain Landscape</h3>
                            <p id="imageDescription" class="text-gray-300 text-sm">Experience the breathtaking beauty of nature</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-4">
                    <div class="thumbnail-container flex overflow-x-auto scrollbar-hide gap-2 p-2">
                        <div class="thumbnail-item w-20 h-20 md:w-24 md:h-24 border-2 rounded-lg overflow-hidden thumbnail-active" data-index="0">
                            <img src="https://placehold.co/200x200/4f46e5/ffffff?text=1" alt="Thumbnail 1" class="w-full h-full object-cover">
                        </div>
                        <div class="thumbnail-item w-20 h-20 md:w-24 md:h-24 border-2 border-gray-200 rounded-lg overflow-hidden" data-index="1">
                            <img src="https://placehold.co/200x200/059669/ffffff?text=2" alt="Thumbnail 2" class="w-full h-full object-cover">
                        </div>
                        <div class="thumbnail-item w-20 h-20 md:w-24 md:h-24 border-2 border-gray-200 rounded-lg overflow-hidden" data-index="2">
                            <img src="https://placehold.co/200x200/dc2626/ffffff?text=3" alt="Thumbnail 3" class="w-full h-full object-cover">
                        </div>
                        <div class="thumbnail-item w-20 h-20 md:w-24 md:h-24 border-2 border-gray-200 rounded-lg overflow-hidden" data-index="3">
                            <img src="https://placehold.co/200x200/7c3aed/ffffff?text=4" alt="Thumbnail 4" class="w-full h-full object-cover">
                        </div>
                        <div class="thumbnail-item w-20 h-20 md:w-24 md:h-24 border-2 border-gray-200 rounded-lg overflow-hidden" data-index="4">
                            <img src="https://placehold.co/200x200/ea580c/ffffff?text=5" alt="Thumbnail 5" class="w-full h-full object-cover">
                        </div>
                        <div class="thumbnail-item w-20 h-20 md:w-24 md:h-24 border-2 border-gray-200 rounded-lg overflow-hidden" data-index="5">
                            <img src="https://placehold.co/200x200/0891b2/ffffff?text=6" alt="Thumbnail 6" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Desktop View --}}
        <div class="hidden lg:flex max-w-7xl mx-auto rounded-2xl shadow-2xl overflow-hidden">
            <div class="w-40 bg-gray-50 p-4">
                <div class="flex flex-col gap-4 overflow-y-auto max-h-[90vh] scrollbar-hide thumbnail-container">
                    <div class="thumbnail-item border-2 rounded-lg overflow-hidden thumbnail-active" data-index="0" onclick="scrollToImage(0, this)">
                        <img src="https://placehold.co/200x200/4f46e5/ffffff?text=1" alt="Thumbnail 1" class="w-full h-full object-cover">
                    </div>
                    <div class="thumbnail-item border-2 border-gray-200 rounded-lg overflow-hidden" data-index="1" onclick="scrollToImage(1, this)">
                        <div class="dual-thumbnail flex gap-0.5">
                            <img src="https://placehold.co/200x200/059669/ffffff?text=2" alt="Thumbnail 2" class="w-1/2 h-full object-cover">
                            <img src="https://placehold.co/200x200/dc2626/ffffff?text=3" alt="Thumbnail 3" class="w-1/2 h-full object-cover">
                        </div>
                    </div>
                    <div class="thumbnail-item border-2 border-gray-200 rounded-lg overflow-hidden" data-index="3" onclick="scrollToImage(3, this)">
                        <div class="dual-thumbnail flex gap-0.5">
                            <img src="https://placehold.co/200x200/7c3aed/ffffff?text=4" alt="Thumbnail 4" class="w-1/2 h-full object-cover">
                            <img src="https://placehold.co/200x200/ea580c/ffffff?text=5" alt="Thumbnail 5" class="w-1/2 h-full object-cover">
                        </div>
                    </div>
                    <div class="thumbnail-item border-2 border-gray-200 rounded-lg overflow-hidden" data-index="5" onclick="scrollToImage(5, this)">
                        <img src="https://placehold.co/200x200/0891b2/ffffff?text=6" alt="Thumbnail 6" class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <div class="flex-1 bg-white max-h-[90vh] overflow-y-auto p-8 scrollbar-hide desktop-images">
                <div class="grid gap-8 ">
                    <div class="image-item relative rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl single-image w-2/4 mx-auto" id="image-0">
                        <img src="https://placehold.co/1000x600/4f46e5/ffffff?text=Mountain+Landscape" alt="Mountain Landscape" class="w-full h-96 object-cover main-image" id="img-0">
                        <div class="image-overlay hidden" id="overlay-0">
                            <div class="loader" id="loader-0"></div>
                        </div>
                    </div>

                    <div class="dual-images grid grid-cols-1 md:grid-cols-2 gap-6" id="image-group-1">
                        <div class="image-item relative rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl" id="image-1">
                            <img src="https://placehold.co/1000x600/059669/ffffff?text=Forest+Path" alt="Forest Pathway" class="w-full h-80 object-cover image-blur" id="img-1">
                            <div class="image-overlay" id="overlay-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="toggleLock(1)">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </div>
                        </div>
                        <div class="image-item relative rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl" id="image-2">
                            <img src="https://placehold.co/1000x600/dc2626/ffffff?text=Sunset+Mountains" alt="Sunset Over Mountains" class="w-full h-80 object-cover image-blur" id="img-2">
                            <div class="image-overlay" id="overlay-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="toggleLock(2)">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="dual-images grid grid-cols-1 md:grid-cols-2 gap-6" id="image-group-2">
                        <div class="image-item relative rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl" id="image-3">
                            <img src="https://placehold.co/1000x600/7c3aed/ffffff?text=Misty+Forest" alt="Misty Forest" class="w-full h-80 object-cover image-blur" id="img-3">
                            <div class="image-overlay" id="overlay-3">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="toggleLock(3)">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </div>
                        </div>
                        <div class="image-item relative rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl" id="image-4">
                            <img src="https://placehold.co/1000x600/ea580c/ffffff?text=Ocean+Waves" alt="Ocean Waves" class="w-full h-80 object-cover image-blur" id="img-4">
                            <div class="image-overlay" id="overlay-4">
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="toggleLock(4)">
                                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                    <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="image-item relative rounded-xl overflow-hidden shadow-lg transition-all duration-300 hover:-translate-y-1 hover:shadow-xl single-image" id="image-5">
                        <img src="https://placehold.co/1000x600/0891b2/ffffff?text=Mountain+Lake" alt="Mountain Lake" class="w-full h-80 object-cover image-blur" id="img-5">
                        <div class="image-overlay" id="overlay-5">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-white cursor-pointer" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="toggleLock(5)">
                                <rect x="3" y="11" width="18" height="11" rx="2" ry="2" />
                                <path d="M7 11V7a5 5 0 0 1 10 0v4" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="https://unpkg.com/swiper@8/swiper-bundle.min.js"></script>
    <script>
        const imageData = [{
            large: "https://placehold.co/1000x600/4f46e5/ffffff?text=Mountain+Landscape",
            title: "Stunning Mountain Landscape",
            description: "Experience the breathtaking beauty of nature",
            thumbnail: "https://placehold.co/200x200/4f46e5/ffffff?text=1"
        }, {
            large: "https://placehold.co/1000x600/059669/ffffff?text=Forest+Path",
            title: "Forest Pathway",
            description: "A peaceful walk through ancient woods",
            thumbnail: "https://placehold.co/200x200/059669/ffffff?text=2"
        }, {
            large: "https://placehold.co/1000x600/dc2626/ffffff?text=Sunset+Mountains",
            title: "Sunset Over Mountains",
            description: "Golden hour magic in the wilderness",
            thumbnail: "https://placehold.co/200x200/dc2626/ffffff?text=3"
        }, {
            large: "https://placehold.co/1000x600/7c3aed/ffffff?text=Misty+Forest",
            title: "Misty Forest",
            description: "Mysterious morning fog through the trees",
            thumbnail: "https://placehold.co/200x200/7c3aed/ffffff?text=4"
        }, {
            large: "https://placehold.co/1000x600/ea580c/ffffff?text=Ocean+Waves",
            title: "Ocean Waves",
            description: "The power and beauty of the sea",
            thumbnail: "https://placehold.co/200x200/ea580c/ffffff?text=5"
        }, {
            large: "https://placehold.co/1000x600/0891b2/ffffff?text=Mountain+Lake",
            title: "Mountain Lake",
            description: "Crystal clear reflections in pristine water",
            thumbnail: "https://placehold.co/200x200/0891b2/ffffff?text=6"
        }];

        const imageStates = {};
        for (let i = 0; i < imageData.length; i++) {
            imageStates[i] = {
                isLocked: i !== 0,
            };
        }

        function populateSwiperSlides() {
            const swiperWrapper = document.querySelector('.mainSwiper .swiper-wrapper');
            let html = '';
            imageData.forEach((data, index) => {
                html += `<div class="swiper-slide">
                            <img src="${data.large}" alt="${data.title}" class="w-full h-full object-cover main-image" data-index="${index}">
                        </div>`;
            });
            swiperWrapper.innerHTML = html;
        }

        function updateMobileUI(index) {
            const data = imageData[index];
            document.getElementById('imageTitle').textContent = data.title;
            document.getElementById('imageDescription').textContent = data.description;
            document.getElementById('currentImage').textContent = index + 1;

            document.querySelectorAll('.mobile-slider .thumbnail-item').forEach((thumb, i) => {
                thumb.classList.remove('thumbnail-active', 'border-blue-500');
                thumb.classList.add('border-gray-200');
                if (i === index) {
                    thumb.classList.add('thumbnail-active', 'border-blue-500');
                    thumb.classList.remove('border-gray-200');
                }
            });
        }

        // Initialize Swiper
        const mainSwiper = new Swiper('.mainSwiper', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            on: {
                init: function() {
                    updateMobileUI(this.realIndex);
                },
                slideChange: function() {
                    updateMobileUI(this.realIndex);
                },
            },
        });

        // Add click handlers for mobile thumbnails
        document.querySelectorAll('.mobile-slider .thumbnail-item').forEach(thumb => {
            thumb.addEventListener('click', function() {
                const index = parseInt(this.getAttribute('data-index'));
                mainSwiper.slideToLoop(index);
            });
        });

        // Desktop Functions
        function scrollToImage(index, thumbnailElement) {
            const targetElement = document.getElementById(`image-${index}`);
            if (targetElement) {
                targetElement.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
                updateDesktopThumbnails(thumbnailElement);
            }
        }

        function updateDesktopThumbnails(activeThumbnail) {
            document.querySelectorAll('.desktop-thumbnails .thumbnail-item').forEach(thumb => {
                thumb.classList.remove('thumbnail-active', 'border-blue-500');
                thumb.classList.add('border-gray-200');
            });
            activeThumbnail.classList.add('thumbnail-active', 'border-blue-500');
            activeThumbnail.classList.remove('border-gray-200');
        }

        function toggleLock(imageIndex) {
            const overlay = document.getElementById(`overlay-${imageIndex}`);
            const img = document.getElementById(`img-${imageIndex}`);
            const svgIcon = overlay.querySelector('svg');

            imageStates[imageIndex].isLocked = !imageStates[imageIndex].isLocked;
            const isLocked = imageStates[imageIndex].isLocked;

            if (isLocked) {
                img.classList.add('image-blur');
                overlay.style.display = 'flex';
                svgIcon.classList.remove('text-green-400');
                svgIcon.classList.add('text-white');
                svgIcon.innerHTML = `<rect x="3" y="11" width="18" height="11" rx="2" ry="2" /><path d="M7 11V7a5 5 0 0 1 10 0v4" />`;
            } else {
                img.classList.remove('image-blur');
                overlay.style.display = 'none';
                svgIcon.classList.remove('text-white');
                svgIcon.classList.add('text-green-400');
                svgIcon.innerHTML = `<path d="M12 21.5V17" /><path d="M12 11V2.5" /><path d="M10 5.5L12 3l2 2.5" /><path d="M10 16.5L12 19l2-2.5" /><rect x="4" y="14" width="16" height="4" rx="2" />`;
            }
        }

        // Initial setup
        document.addEventListener('DOMContentLoaded', () => {
            populateSwiperSlides();

            // Set initial lock states for desktop images
            for (let i = 1; i <= 5; i++) {
                const img = document.getElementById(`img-${i}`);
                const overlay = document.getElementById(`overlay-${i}`);
                if (imageStates[i].isLocked) {
                    img.classList.add('image-blur');
                    overlay.style.display = 'flex';
                } else {
                    img.classList.remove('image-blur');
                    overlay.style.display = 'none';
                }
            }
        });
    </script>
@endpush
