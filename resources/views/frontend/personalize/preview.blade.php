@extends('frontend.layouts.master')

@push('styles')
    <style>
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

        .main-image {
            transition: opacity 0.3s ease;
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

        .lock-icon {
            font-size: 3rem;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .lock-icon:hover {
            transform: scale(1.1);
            color: #3b82f6;
        }

        .unlock-icon {
            font-size: 3rem;
            color: #10b981;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .image-item {
            position: relative;
            margin-bottom: 2rem;
            border-radius: 1rem;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .image-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .control-panel {
            display: none;
            /* Hide the control panel as requested */
        }

        .control-btn {
            margin: 0.25rem;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .control-btn:hover {
            transform: translateY(-2px);
        }

        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }

        .dual-thumbnail {
            display: flex;
            gap: 2px;
            overflow: hidden;
        }

        .dual-thumbnail img {
            width: 50%;
            height: 100%;
            object-fit: cover;
        }

        /* Mobile Styles */
        @media screen and (max-width: 768px) {
            .control-panel {
                display: none;
            }

            .desktop-thumbnails {
                display: none;
            }

            .mobile-slider {
                display: block;
            }

            .desktop-images {
                display: none;
            }

            .thumbnail-container {
                flex-direction: row;
                overflow-x: auto;
                gap: 0.5rem;
                padding: 1rem 0;
            }

            .thumbnail-item {
                min-width: 80px;
                height: 80px;
            }
        }

        /* Desktop Styles */
        @media screen and (min-width: 769px) {
            .mobile-slider {
                display: none;
            }

            .desktop-container {
                display: flex;
            }

            .desktop-thumbnails {
                width: 128px;
                background: #f9fafb;
                border-radius: 1rem 0 0 1rem;
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
            }

            .thumbnail-container {
                flex-direction: column;
                gap: 1rem;
                padding: 1rem;
            }

            .thumbnail-item {
                width: 100px;
                height: 100px;
            }

            .desktop-images {
                flex: 1;
                background: white;
                border-radius: 0 1rem 1rem 0;
                box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
                max-height: 90vh;
                overflow-y: auto;
            }

            .images-grid {
                display: grid;
                gap: 2rem;
                padding: 2rem;
            }

            .single-image {
                justify-self: center;
                width: 60%;
            }

            .dual-images {
                display: grid;
                grid-template-columns: 1fr 1fr;
                gap: 1.5rem;
            }
        }
    </style>
@endpush
@section('content')
    <div class="container mx-auto py-12">
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Professional Image Slider</h1>

        <div class="mobile-slider bg-white rounded-2xl shadow-2xl overflow-hidden max-w-6xl mx-auto">
            <div class="flex flex-col">

                <div class="flex-1 relative">
                    <div class="swiper mainSwiper h-96">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img id="mainImage"
                                    src="https://placehold.co/1000x600/4f46e5/ffffff?text=Mountain+Landscape"
                                    alt="Main Image" class="w-full h-full object-cover main-image">
                            </div>
                        </div>

                        <div class="swiper-button-next"></div>
                        <div class="swiper-button-prev"></div>

                        <div class="swiper-pagination"></div>

                        <div
                            class="absolute top-4 right-4 bg-black bg-opacity-50 text-white px-3 py-1 rounded-full text-sm">
                            <span id="currentImage">1</span> / <span id="totalImages">6</span>
                        </div>

                        <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black to-transparent p-6">
                            <h3 id="imageTitle" class="text-white text-xl font-semibold mb-2">Stunning Mountain
                                Landscape</h3>
                            <p id="imageDescription" class="text-gray-300 text-sm">Experience the breathtaking beauty of
                                nature</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-4">
                    <div class="thumbnail-container flex overflow-x-auto scrollbar-hide">
                        <div class="thumbnail-item border-2 border-blue-500 rounded-lg overflow-hidden thumbnail-active"
                            onclick="changeImage(0, this)">
                            <img src="https://placehold.co/200x200/4f46e5/ffffff?text=1" alt="Thumbnail 1"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="thumbnail-item border-2 border-gray-200 rounded-lg overflow-hidden"
                            onclick="changeImage(1, this)">
                            <img src="https://placehold.co/200x200/059669/ffffff?text=2" alt="Thumbnail 2"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="thumbnail-item border-2 border-gray-200 rounded-lg overflow-hidden"
                            onclick="changeImage(2, this)">
                            <img src="https://placehold.co/200x200/dc2626/ffffff?text=3" alt="Thumbnail 3"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="thumbnail-item border-2 border-gray-200 rounded-lg overflow-hidden"
                            onclick="changeImage(3, this)">
                            <img src="https://placehold.co/200x200/7c3aed/ffffff?text=4" alt="Thumbnail 4"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="thumbnail-item border-2 border-gray-200 rounded-lg overflow-hidden"
                            onclick="changeImage(4, this)">
                            <img src="https://placehold.co/200x200/ea580c/ffffff?text=5" alt="Thumbnail 5"
                                class="w-full h-full object-cover">
                        </div>
                        <div class="thumbnail-item border-2 border-gray-200 rounded-lg overflow-hidden"
                            onclick="changeImage(5, this)">
                            <img src="https://placehold.co/200x200/0891b2/ffffff?text=6" alt="Thumbnail 6"
                                class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="desktop-container max-w-7xl mx-auto">

            <div class="desktop-thumbnails">
                <div class="thumbnail-container flex">
                    <div class="thumbnail-item border-2 border-blue-500 rounded-lg overflow-hidden thumbnail-active"
                        onclick="scrollToImage(0, this)">
                        <img src="https://placehold.co/200x200/4f46e5/ffffff?text=1" alt="Thumbnail 1"
                            class="w-full h-full object-cover">
                    </div>

                    <div class="thumbnail-item border-2 border-gray-200 rounded-lg overflow-hidden"
                        onclick="scrollToImageGroup(1, this)">
                        <div class="dual-thumbnail">
                            <img src="https://placehold.co/200x200/059669/ffffff?text=2" alt="Thumbnail 2">
                            <img src="https://placehold.co/200x200/dc2626/ffffff?text=3" alt="Thumbnail 3">
                        </div>
                    </div>

                    <div class="thumbnail-item border-2 border-gray-200 rounded-lg overflow-hidden"
                        onclick="scrollToImageGroup(2, this)">
                        <div class="dual-thumbnail">
                            <img src="https://placehold.co/200x200/7c3aed/ffffff?text=4" alt="Thumbnail 4">
                            <img src="https://placehold.co/200x200/ea580c/ffffff?text=5" alt="Thumbnail 5">
                        </div>
                    </div>

                    <div class="thumbnail-item border-2 border-gray-200 rounded-lg overflow-hidden"
                        onclick="scrollToImage(5, this)">
                        <img src="https://placehold.co/200x200/0891b2/ffffff?text=6" alt="Thumbnail 6"
                            class="w-full h-full object-cover">
                    </div>
                </div>
            </div>

            <div class="desktop-images">
                <div class="images-grid">

                    <div class="single-image">
                        <div class="image-item" id="image-0">
                            <div class="relative">
                                <img src="https://placehold.co/1000x600/4f46e5/ffffff?text=Mountain+Landscape"
                                    alt="Mountain Landscape" class="w-full h-80 object-cover main-image" id="img-0">
                                <div class="image-overlay" id="overlay-0" style="display: none;">
                                     <div class="loader" id="loader-0"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="dual-images" id="image-group-1">
                        <div class="image-item" id="image-1">
                            <div class="relative">
                                <img src="https://placehold.co/1000x600/059669/ffffff?text=Forest+Path"
                                    alt="Forest Pathway" class="w-full h-80 object-cover image-blur" id="img-1">
                                <div class="image-overlay" id="overlay-1">
                                     <i data-lucide="star" class="w-10 h-10 lock-icon" id="lock-1" onclick="toggleLock(1)"></i>
                                </div>
                            </div>

                        </div>

                        <div class="image-item" id="image-2">
                            <div class="relative">
                                <img src="https://placehold.co/1000x600/dc2626/ffffff?text=Sunset+Mountains"
                                    alt="Sunset Over Mountains" class="w-full h-80 object-cover image-blur" id="img-2">
                                <div class="image-overlay" id="overlay-2">
                                     <i data-lucide="star" class="w-10 h-10 lock-icon" id="lock-2" onclick="toggleLock(2)"></i>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="dual-images" id="image-group-2">
                        <div class="image-item" id="image-3">
                            <div class="relative">
                                <img src="https://placehold.co/1000x600/7c3aed/ffffff?text=Misty+Forest"
                                    alt="Misty Forest" class="w-full h-80 object-cover image-blur" id="img-3">
                                <div class="image-overlay" id="overlay-3">
                                     <i data-lucide="star" class="w-10 h-10 lock-icon" id="lock-3" onclick="toggleLock(3)"></i>
                                </div>
                            </div>

                        </div>

                        <div class="image-item" id="image-4">
                            <div class="relative">
                                <img src="https://placehold.co/1000x600/ea580c/ffffff?text=Ocean+Waves"
                                    alt="Ocean Waves" class="w-full h-80 object-cover image-blur" id="img-4">
                                <div class="image-overlay" id="overlay-4">
                                    <i data-lucide="star" class="w-10 h-10 lock-icon" id="lock-4" onclick="toggleLock(4)"></i>
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="single-image">
                        <div class="image-item" id="image-5">
                            <div class="relative">
                                <img src="https://placehold.co/1000x600/0891b2/ffffff?text=Mountain+Lake"
                                    alt="Mountain Lake" class="w-full h-80 object-cover image-blur" id="img-5">
                                <div class="image-overlay" id="overlay-5">
                                     <i data-lucide="star" class="w-10 h-10 lock-icon" id="lock-5" onclick="toggleLock(5)"></i>
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Image data array for mobile
        const imageData = [
            {
                large: "https://placehold.co/1000x600/4f46e5/ffffff?text=Mountain+Landscape",
                title: "Stunning Mountain Landscape",
                description: "Experience the breathtaking beauty of nature"
            },
            {
                large: "https://placehold.co/1000x600/059669/ffffff?text=Forest+Path",
                title: "Forest Pathway",
                description: "A peaceful walk through ancient woods"
            },
            {
                large: "https://placehold.co/1000x600/dc2626/ffffff?text=Sunset+Mountains",
                title: "Sunset Over Mountains",
                description: "Golden hour magic in the wilderness"
            },
            {
                large: "https://placehold.co/1000x600/7c3aed/ffffff?text=Misty+Forest",
                title: "Misty Forest",
                description: "Mysterious morning fog through the trees"
            },
            {
                large: "https://placehold.co/1000x600/ea580c/ffffff?text=Ocean+Waves",
                title: "Ocean Waves",
                description: "The power and beauty of the sea"
            },
            {
                large: "https://placehold.co/1000x600/0891b2/ffffff?text=Mountain+Lake",
                title: "Mountain Lake",
                description: "Crystal clear reflections in pristine water"
            }
        ];

        let currentIndex = 0;
        let imageStates = {};

        // Initialize image states
        function initializeImageStates() {
            for (let i = 0; i <= 5; i++) {
                imageStates[i] = {
                    isLocked: i === 0 ? false : true,
                    loaderActive: i === 0 ? false : true // Loader is active when locked
                };
            }
        }

        // This function is still needed for desktop view
        initializeImageStates();

        // Mobile view functions
        function changeImage(index, thumbnailElement) {
            if (index === currentIndex) return;

            currentIndex = index;
            const data = imageData[index];

            const mainImg = document.getElementById('mainImage');
            mainImg.style.opacity = '0';

            // Use a slight delay for a smooth fade effect
            setTimeout(() => {
                mainImg.src = data.large;
                mainImg.style.opacity = '1';
            }, 150);

            document.getElementById('imageTitle').textContent = data.title;
            document.getElementById('imageDescription').textContent = data.description;
            document.getElementById('currentImage').textContent = index + 1;

            // Update mobile thumbnails
            document.querySelectorAll('.mobile-slider .thumbnail-item').forEach(thumb => {
                thumb.classList.remove('thumbnail-active', 'border-blue-500');
                thumb.classList.add('border-gray-200');
            });
            thumbnailElement.classList.add('thumbnail-active', 'border-blue-500');
            thumbnailElement.classList.remove('border-gray-200');
        }

        // Desktop view functions
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

        function scrollToImageGroup(groupIndex, thumbnailElement) {
            const targetElement = document.getElementById(`image-group-${groupIndex}`);
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

        // Toggle lock/unlock for individual images
        function toggleLock(imageIndex) {
            const overlay = document.getElementById(`overlay-${imageIndex}`);
            const img = document.getElementById(`img-${imageIndex}`);

            // Toggle the state
            imageStates[imageIndex].isLocked = !imageStates[imageIndex].isLocked;
            const isLocked = imageStates[imageIndex].isLocked;

            // Apply blur and show/hide overlay based on the new state
            if (isLocked) {
                img.classList.add('image-blur');
                overlay.style.display = 'flex';
                // Display the lock icon by default when locking
                // overlay.innerHTML = `<i class="fas fa-lock lock-icon" id="lock-${imageIndex}" onclick="toggleLock(${imageIndex})"></i>`;
                overlay.innerHTML = `i data-lucide="star" class="w-10 h-10 lock-icon" id="lock-${imageIndex}" onclick="toggleLock(${imageIndex})"></i>`;
            } else {
                img.classList.remove('image-blur');
                // Hide the overlay
                overlay.style.display = 'none';
            }
        }

        // Initialize Swiper for mobile
        function initializeSwiper() {
            if (window.innerWidth <= 768) {
                const mainSwiper = new Swiper('.mainSwiper', {
                    slidesPerView: 1,
                    spaceBetween: 0,
                    loop: false,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    keyboard: {
                        enabled: true,
                    },
                    on: {
                        slideChange: function () {
                            const activeIndex = this.activeIndex;
                            const data = imageData[activeIndex];

                            // Update the main image and its description
                            document.getElementById('mainImage').src = data.large;
                            document.getElementById('imageTitle').textContent = data.title;
                            document.getElementById('imageDescription').textContent = data.description;
                            document.getElementById('currentImage').textContent = activeIndex + 1;

                            // Update active thumbnail
                            document.querySelectorAll('.mobile-slider .thumbnail-item').forEach((thumb, index) => {
                                thumb.classList.remove('thumbnail-active', 'border-blue-500');
                                thumb.classList.add('border-gray-200');
                                if (index === activeIndex) {
                                    thumb.classList.add('thumbnail-active', 'border-blue-500');
                                    thumb.classList.remove('border-gray-200');
                                }
                            });
                        }
                    }
                });

                // Attach click event to thumbnails to control swiper
                document.querySelectorAll('.mobile-slider .thumbnail-item').forEach((thumb, index) => {
                    thumb.onclick = () => {
                        mainSwiper.slideTo(index);
                    };
                });
            }
        }

        // Run the initialization function
        initializeSwiper();
    </script>
@endpush
