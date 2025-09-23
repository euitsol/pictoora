@extends('frontend.layouts.master')


@push('styles')
    <style>
        .skin-tone-button {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            border: 3px solid transparent;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .skin-tone-button:hover {
            transform: scale(1.1);
        }

        .skin-tone-button.selected {
            border-color: #8b5cf6;
            transform: scale(1.1);
        }

        .age-btn {
            transition: all 0.3s ease;
        }

        .age-btn:hover {
            transform: translateY(-2px);
        }

        .step-content {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .upload-area {
            transition: all 0.3s ease;
        }

        .upload-area:hover {
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .grid-cols-4 {
                grid-template-columns: repeat(4, 1fr);
            }

            .grid-cols-6 {
                grid-template-columns: repeat(4, 1fr);
            }

            .grid-cols-8 {
                grid-template-columns: repeat(4, 1fr);
            }
        }
    </style>
@endpush


@section('content')
    <section class="bg-white">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="bg-gradient-to-br from-slate-50 to-purple-50/30 rounded-lg shadow-lg mt-8 p-6 border border-gray-200">
                    <div class="flex items-center space-x-2 mb-4">
                        <i data-lucide="book-open" class="h-6 w-6 text-purple-600"></i>
                        <h2 class="text-2xl md:text-3xl font-bold text-purple-600">Selected Book</h2>
                    </div>
                    <div class="flex flex-col md:flex-row gap-12 items-center justify-center">
                        <div class="flex-shrink-0">
                            <img src="{{ asset('frontend/img/book/book-1.webp') }}" alt="The Magical Adventure"
                                class="w-48 h-32 object-cover rounded-lg shadow-md">
                        </div>
                        <div class="flex-1">
                            <h2 class="text-2xl md:text-3xl font-bold gradient-text mb-2">The Magical Adventure of Luna</h2>
                            <div class="flex items-baseline gap-2">
                                <p class="text-lg md:text-xl font-bold text-purple-600">$24.99</p>
                                <p class="text-sm md:text-lg text-gray-500 line-through">$34.99</p>
                            </div>
                            <p class="text-gray-700 leading-relaxed mb-4">A personalized adventure where your child becomes
                                the hero of their own magical story!</p>
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center space-x-1">
                                    <i data-lucide="star" class="h-4 w-4 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star" class="h-4 w-4 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star" class="h-4 w-4 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star" class="h-4 w-4 fill-yellow-400 text-yellow-400"></i>
                                    <i data-lucide="star" class="h-4 w-4 fill-yellow-400 text-yellow-400"></i>
                                    <span class="text-sm text-gray-600 ml-2">4.9 (2,847 reviews)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-white mb-6">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
                <div class="bg-gradient-to-br from-slate-50 to-purple-50/30 rounded-lg shadow-lg p-6 border border-gray-200">

                    <!-- Main Grid -->
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                        <!-- Left: Multi-Step Personalization Form -->
                        <div class="lg:col-span-2 bg-white rounded-lg shadow-lg p-6">
                            <div class="flex items-center space-x-2 mb-6">
                                <i data-lucide="heart" class="h-6 w-6 text-purple-600"></i>
                                <h2 class="text-2xl md:text-3xl font-bold text-purple-600">Personalize Your Story</h2>
                            </div>

                            <!-- Progress Bar -->
                            <div class="mb-8">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm font-medium text-gray-700">Step <span id="currentStep">1</span> of
                                        3</span>
                                    <span class="text-sm text-gray-500"><span id="progressPercent">33</span>%
                                        Complete</span>
                                </div>
                                <div class="w-full bg-gray-200 rounded-full h-2">
                                    <div id="progressBar"
                                        class="bg-gradient-to-r from-purple-100 to-purple-600 h-2 rounded-full transition-all duration-500"
                                        style="width: 33%"></div>
                                </div>
                                <div class="flex justify-between mt-2">
                                    <span class="text-xs text-gray-600">Child Details</span>
                                    <span class="text-xs text-gray-600">Dedication</span>
                                    <span class="text-xs text-gray-600">Photos</span>
                                </div>
                            </div>

                            <form id="personalizationForm" class="space-y-8">

                                <!-- Step 1: Child Details -->
                                <div id="step1" class="step-content">
                                    <div class="space-y-6">
                                        <h3 class="text-xl font-semibold text-gray-900 flex items-center space-x-2 mb-6">
                                            <i data-lucide="user" class="h-6 w-6 text-purple-600"></i>
                                            <span>Child Details</span>
                                        </h3>

                                        <!-- Name -->
                                        <div>
                                            <label for="childName"
                                                class="block text-sm font-medium text-gray-700 mb-2">Child's Name *</label>
                                            <input type="text" id="childName" name="childName"
                                                placeholder="e.g., Emma, Alex, Sam"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-600 focus:ring-purple-600 focus:ring-2 transition-all">
                                            <p class="text-xs text-gray-500 mt-2">This will be the main character's name</p>
                                        </div>

                                        <!-- Age -->
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700 mb-3">Age *</label>
                                            <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-8 gap-3" id="ageButtons">
                                                <button type="button" class="age-btn px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium transition-all duration-200 hover:border-purple-500 hover:bg-purple-50" data-age="2">2</button>
                                                <button type="button" class="age-btn px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium transition-all duration-200 hover:border-purple-500 hover:bg-purple-50" data-age="3">3</button>
                                                <button type="button" class="age-btn px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium transition-all duration-200 hover:border-purple-500 hover:bg-purple-50" data-age="4">4</button>
                                                <button type="button" class="age-btn px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium transition-all duration-200 hover:border-purple-500 hover:bg-purple-50" data-age="5">5</button>
                                                <button type="button" class="age-btn px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium transition-all duration-200 hover:border-purple-500 hover:bg-purple-50" data-age="6">6</button>
                                                <button type="button" class="age-btn px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium transition-all duration-200 hover:border-purple-500 hover:bg-purple-50" data-age="7">7</button>
                                                <button type="button" class="age-btn px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium transition-all duration-200 hover:border-purple-500 hover:bg-purple-50" data-age="8">8</button>
                                                <button type="button" class="age-btn px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium transition-all duration-200 hover:border-purple-500 hover:bg-purple-50" data-age="9">9</button>
                                                <button type="button" class="age-btn px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium transition-all duration-200 hover:border-purple-500 hover:bg-purple-50" data-age="10">10</button>
                                                <button type="button" class="age-btn px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium transition-all duration-200 hover:border-purple-500 hover:bg-purple-50" data-age="11">11</button>
                                                <button type="button" class="age-btn px-3 py-2 border border-gray-300 rounded-lg text-sm font-medium transition-all duration-200 hover:border-purple-500 hover:bg-purple-50" data-age="12">12</button>
                                            </div>
                                        </div>

                                        <!-- Gender & Skin Tone -->
                                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                            <div>
                                                <label for="gender"
                                                    class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                                                <select id="gender" name="gender"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-600 focus:ring-purple-600 focus:ring-2 transition-all">
                                                    <option value="">Select gender</option>
                                                    <option value="boy">Boy</option>
                                                    <option value="girl">Girl</option>
                                                    <option value="prefer-not-to-say">Prefer not to say</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-3">
                                                    Skin Tone</label>
                                                <div class="flex space-x-4 justify-center" id="skinToneButtons">
                                                    <div class="text-center">
                                                        <div class="skin-tone-button" style="background: linear-gradient(135deg, #ffdbac);" data-value="#ffdbac"></div>
                                                        <p class="text-xs text-gray-600 mt-2">Light</p>
                                                    </div>
                                                    <div class="text-center">
                                                        <div class="skin-tone-button" style="background: linear-gradient(135deg, #e0ac69);" data-value="#e0ac69"></div>
                                                        <p class="text-xs text-gray-600 mt-2">Medium</p>
                                                    </div>
                                                    <div class="text-center">
                                                        <div class="skin-tone-button" style="background: linear-gradient(135deg, #8d5524);" data-value="#8d5524"></div>
                                                        <p class="text-xs text-gray-600 mt-2">Dark</p>
                                                    </div>
                                                </div>
                                                <p class="text-xs text-gray-500 mt-2 text-center">Helps us create accurate
                                                    illustrations</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 2: Dedication -->
                                <div id="step2" class="step-content hidden">
                                    <div class="space-y-6">
                                        <h3 class="text-xl font-semibold text-gray-900 flex items-center space-x-2 mb-6">
                                            <i data-lucide="heart" class="h-6 w-6 text-red-500"></i>
                                            <span>Personal Dedication</span>
                                        </h3>
                                        <div>
                                            <label for="dedication"
                                                class="block text-sm font-medium text-gray-700 mb-2">Write a heartfelt
                                                message</label>
                                            <textarea id="dedication" name="dedication" rows="6" maxlength="200"
                                                placeholder="Dear Emma, may this magical adventure inspire you to dream big and believe in yourself. You are capable of amazing things! Love, Mom & Dad"
                                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all resize-none"></textarea>
                                            <p class="text-xs text-gray-500 mt-2">
                                                <span id="charCount">0</span>/200 characters • Appears on the first page
                                            </p>
                                        </div>
                                    </div>
                                </div>

                                <!-- Step 3: Upload Photos -->
                                <div id="step3" class="step-content hidden">
                                    <div class="space-y-6">
                                        <h3 class="text-xl font-semibold text-gray-900 flex items-center space-x-2 mb-6">
                                            <i data-lucide="camera" class="h-6 w-6 text-green-500"></i>
                                            <span>Upload Photos</span>
                                        </h3>
                                        <div id="uploadArea"
                                            class="upload-area rounded-lg p-8 text-center cursor-pointer border-2 border-dashed border-gray-300 hover:border-purple-400 transition-all duration-300 bg-gray-50 hover:bg-purple-50">
                                            <i data-lucide="upload" class="h-16 w-16 text-gray-400 mx-auto mb-4"></i>
                                            <p class="text-lg font-medium text-gray-700 mb-2">Upload 1-2 photos of your
                                                child</p>
                                            <p class="text-sm text-gray-500 mb-4">Drag and drop files here, or click to
                                                browse</p>
                                            <button type="button" id="browseBtn"
                                                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-all duration-200 font-medium">
                                                Choose Files
                                            </button>
                                            <input type="file" id="photoInput" multiple accept="image/*"
                                                class="hidden">
                                            <div class="mt-6 text-xs text-gray-500 space-y-1">
                                                <p>• Min. 500x500px recommended</p>
                                                <p>• Clear, front-facing photos</p>
                                                <p>• Avoid sunglasses or coverings</p>
                                                <p>• JPG, PNG (max 10MB each)</p>
                                            </div>
                                        </div>
                                        <div id="imagePreview" class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-4"></div>

                                        <!-- Copyright Agreement -->
                                        <div class="flex items-start space-x-3 p-4 bg-gray-50 rounded-lg">
                                            <input type="checkbox" id="copyright" name="copyright"
                                                class="mt-1 h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                            <div>
                                                <label for="copyright"
                                                    class="text-sm font-medium text-gray-700 cursor-pointer">
                                                    Image Rights & Ownership Agreement
                                                </label>
                                                <p class="text-xs text-gray-600 mt-1">
                                                    I confirm I own the rights to the uploaded images and grant permission
                                                    to
                                                    use them solely for creating my custom book.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Navigation Buttons -->
                                <div class="flex justify-between pt-6 border-t border-gray-200">
                                    <button type="button" id="prevBtn"
                                        class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-all duration-200 font-medium hidden">
                                        <i data-lucide="arrow-left" class="inline h-4 w-4 mr-2"></i>
                                        Previous
                                    </button>
                                    <div class="flex-1"></div>
                                    <button type="button" id="nextBtn"
                                        class="px-6 py-3 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-lg font-medium hover:opacity-90 transition-all duration-200">
                                        Next
                                        <i data-lucide="arrow-right" class="inline h-4 w-4 ml-2"></i>
                                    </button>
                                    <button type="button" id="previewBtn"
                                        class="px-6 py-3 bg-gradient-to-r from-green-500 to-blue-500 text-white rounded-lg font-medium hover:opacity-90 transition-all duration-200 hidden">
                                        <i data-lucide="eye" class="inline h-4 w-4 mr-2"></i>
                                        Preview Book
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Right: Swiper Slider -->
                        <div class="lg:col-span-1 bg-white rounded-lg shadow-lg p-6">
                            <div class="">
                                <h3 class="font-semibold text-lg mb-2 flex items-center gap-2">
                                    <i data-lucide="sparkles" class="h-5 w-5 text-purple-500"></i>
                                    See the Magic
                                </h3>
                                <p class="text-sm text-gray-600 mb-4">How we transform stories into personalized adventures</p>

                                <!-- Swiper Container -->
                                <div class="swiper mySwiper rounded-lg overflow-hidden">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <img src="https://placehold.co/200x300?text=Hello+World"
                                                class="w-full h-48 object-cover">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://placehold.co/200x300?text=Hello+World"
                                                class="w-full h-48 object-cover">
                                        </div>
                                        <div class="swiper-slide">
                                            <img src="https://placehold.co/200x300?text=Hello+World"
                                                class="w-full h-48 object-cover">
                                        </div>
                                    </div>
                                    <!-- Pagination + Navigation -->
                                    <div class="swiper-pagination mt-2"></div>
                                    <div class="swiper-button-prev"></div>
                                    <div class="swiper-button-next"></div>
                                </div>
                            </div>
                            <div class="flex flex-col gap-6 rounded-xl border py-6 bg-green-50 border-green-200 shadow-lg mt-6">
                                <div class="p-6 text-center">
                                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-3">
                                        <i data-lucide="shield-check" class="h-6 w-6 text-green-500"></i>
                                    </div>
                                    <h3 class="font-semibold text-green-800 mb-2">Your Privacy Matters</h3>
                                    <p class="text-sm text-green-700">All photos are processed securely and deleted after book creation. We never store or share your personal images.</p>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Initialize variables
            let currentStep = 1;
            const totalSteps = 3;
            let selectedAge = null;
            let selectedSkinTone = null;
            let uploadedFiles = [];


            // Initialize skin tone buttons
            function initializeSkinToneButtons() {
                $('.skin-tone-button').click(function() {
                    $('.skin-tone-button').removeClass('selected');
                    $(this).addClass('selected');
                    selectedSkinTone = $(this).data('value');
                });
            }

            // Age button click handler
            $(document).on('click', '.age-btn', function() {
                $('.age-btn').removeClass('bg-purple-500 text-white border-purple-500');
                $(this).addClass('bg-purple-500 text-white border-purple-500');
                selectedAge = $(this).data('age');
            });

            // Character count for dedication
            $('#dedication').on('input', function() {
                const count = $(this).val().length;
                $('#charCount').text(count);
                if (count > 180) {
                    $('#charCount').addClass('text-red-500');
                } else {
                    $('#charCount').removeClass('text-red-500');
                }
            });

            // File upload handling
            $('#browseBtn, #uploadArea').click(function() {
                $('#photoInput').click();
            });

            $('#photoInput').change(function(e) {
                const files = Array.from(e.target.files);
                handleFileUpload(files);
            });

            // Drag and drop functionality
            $('#uploadArea').on('dragover', function(e) {
                e.preventDefault();
                $(this).addClass('border-purple-500 bg-purple-50');
            });

            $('#uploadArea').on('dragleave', function(e) {
                e.preventDefault();
                $(this).removeClass('border-purple-500 bg-purple-50');
            });

            $('#uploadArea').on('drop', function(e) {
                e.preventDefault();
                $(this).removeClass('border-purple-500 bg-purple-50');
                const files = Array.from(e.originalEvent.dataTransfer.files);
                handleFileUpload(files);
            });

            function handleFileUpload(files) {
                const imageFiles = files.filter(file => file.type.startsWith('image/'));

                if (imageFiles.length > 2) {
                    alert('Please select maximum 2 photos');
                    return;
                }

                uploadedFiles = imageFiles;
                displayImagePreview(imageFiles);
            }

            function displayImagePreview(files) {
                const previewContainer = $('#imagePreview');
                previewContainer.empty();

                files.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = $(`
                    <div class="relative group">
                        <img src="${e.target.result}" class="w-full h-32 object-cover rounded-lg">
                        <button type="button" class="remove-image absolute top-2 right-2 bg-red-500 text-white rounded-full w-6 h-6 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity" data-index="${index}">
                            <i data-lucide="x" class="h-4 w-4"></i>
                        </button>
                    </div>
                `);
                        previewContainer.append(preview);
                    };
                    reader.readAsDataURL(file);
                });
            }

            // Remove image
            $(document).on('click', '.remove-image', function() {
                const index = $(this).data('index');
                uploadedFiles.splice(index, 1);
                $('#photoInput').val('');
                displayImagePreview(uploadedFiles);
            });

            // Navigation functions
            function showStep(step) {
                $('.step-content').addClass('hidden');
                $(`#step${step}`).removeClass('hidden');

                // Update progress
                const progress = (step / totalSteps) * 100;
                $('#progressBar').css('width', progress + '%');
                $('#currentStep').text(step);
                $('#progressPercent').text(Math.round(progress));

                // Update navigation buttons
                updateNavigationButtons(step);
            }

            function updateNavigationButtons(step) {
                const prevBtn = $('#prevBtn');
                const nextBtn = $('#nextBtn');
                const previewBtn = $('#previewBtn');

                if (step === 1) {
                    prevBtn.addClass('hidden');
                    nextBtn.removeClass('hidden');
                    previewBtn.addClass('hidden');
                } else if (step === totalSteps) {
                    prevBtn.removeClass('hidden');
                    nextBtn.addClass('hidden');
                    previewBtn.removeClass('hidden');
                } else {
                    prevBtn.removeClass('hidden');
                    nextBtn.removeClass('hidden');
                    previewBtn.addClass('hidden');
                }
            }

            function validateStep(step) {
                switch (step) {
                    case 1:
                        const childName = $('#childName').val().trim();
                        if (!childName) {
                            alert('Please enter your child\'s name');
                            return false;
                        }
                        if (!selectedAge) {
                            alert('Please select an age');
                            return false;
                        }
                        return true;
                    case 2:
                        const dedication = $('#dedication').val().trim();
                        if (!dedication) {
                            alert('Please write a dedication message');
                            return false;
                        }
                        return true;
                    case 3:
                        if (uploadedFiles.length === 0) {
                            alert('Please upload at least one photo');
                            return false;
                        }
                        if (!$('#copyright').is(':checked')) {
                            alert('Please agree to the image rights agreement');
                            return false;
                        }
                        return true;
                    default:
                        return true;
                }
            }

            // Navigation button handlers
            $('#nextBtn').click(function() {
                if (validateStep(currentStep)) {
                    currentStep++;
                    showStep(currentStep);
                }
            });

            $('#prevBtn').click(function() {
                currentStep--;
                showStep(currentStep);
            });

            $('#previewBtn').click(function() {
                if (validateStep(currentStep)) {
                    // Here you would typically submit the form or show preview
                    alert('Preview functionality would be implemented here!');
                }
            });

            initializeSkinToneButtons();
            showStep(1);
        });

        // Initialize Swiper
        document.addEventListener('DOMContentLoaded', function() {
            new Swiper(".mySwiper", {
                loop: true,
                spaceBetween: 20,
                pagination: {
                    el: ".swiper-pagination",
                    clickable: true
                },
                navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev"
                },
            });
        });
    </script>


@endpush

