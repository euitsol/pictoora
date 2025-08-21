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

        .image-preview-item {
            position: relative;
            overflow: hidden;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .image-preview-item:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -3px rgba(0, 0, 0, 0.1);
        }

        .image-preview-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.3), rgba(0,0,0,0.1));
            opacity: 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .image-preview-item:hover .image-preview-overlay {
            opacity: 1;
        }

        .remove-btn {
            position: absolute;
            top: 8px;
            right: 8px;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            color: white;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .remove-btn:hover {
            transform: scale(1.1);
            background: linear-gradient(135deg, #dc2626, #b91c1c);
        }

        .gradient-text {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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
    <!-- Selected Book Section -->
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

    <!-- Main Form Section -->
    <section class="bg-white mb-6">
        <div class="container mx-auto px-4">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
                <div class="bg-gradient-to-br from-slate-50 to-purple-50/30 rounded-lg shadow-lg p-6 border border-gray-200">
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
                                    <span class="text-sm font-medium text-gray-700">Step <span id="currentStep">1</span> of 3</span>
                                    <span class="text-sm text-gray-500"><span id="progressPercent">33</span>% Complete</span>
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
                                            <label for="childName" class="block text-sm font-medium text-gray-700 mb-2">Child's Name *</label>
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
                                                <label for="gender" class="block text-sm font-medium text-gray-700 mb-2">Gender</label>
                                                <select id="gender" name="gender"
                                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-purple-600 focus:ring-purple-600 focus:ring-2 transition-all">
                                                    <option value="">Select gender</option>
                                                    <option value="boy">Boy</option>
                                                    <option value="girl">Girl</option>
                                                    <option value="prefer-not-to-say">Prefer not to say</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label class="block text-sm font-medium text-gray-700 mb-3">Skin Tone</label>
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
                                                <p class="text-xs text-gray-500 mt-2 text-center">Helps us create accurate illustrations</p>
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
                                            <label for="dedication" class="block text-sm font-medium text-gray-700 mb-2">Write a heartfelt message</label>
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

                                        <!-- Upload Area -->
                                        <div id="uploadArea"
                                            class="upload-area rounded-lg p-8 text-center cursor-pointer border-2 border-dashed border-gray-300 hover:border-purple-400 transition-all duration-300 bg-gray-50 hover:bg-purple-50">
                                            <i data-lucide="upload" class="h-16 w-16 text-gray-400 mx-auto mb-4"></i>
                                            <p class="text-lg font-medium text-gray-700 mb-2">Upload 1-2 photos of your child</p>
                                            <p class="text-sm text-gray-500 mb-4">Drag and drop files here, or click to browse</p>
                                            <button type="button" id="browseBtn"
                                                class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-all duration-200 font-medium">
                                                Choose Files
                                            </button>
                                            <input type="file" id="photoInput" multiple accept="image/*" class="hidden">
                                            <div class="mt-6 text-xs text-gray-500 space-y-1">
                                                <p>• Min. 500x500px recommended</p>
                                                <p>• Clear, front-facing photos</p>
                                                <p>• Avoid sunglasses or coverings</p>
                                                <p>• JPG, PNG (max 10MB each)</p>
                                            </div>
                                        </div>

                                        <!-- Image Preview Container -->
                                        <div id="imagePreview" class="grid grid-cols-2 sm:grid-cols-2 gap-6"></div>

                                        <!-- Copyright Agreement -->
                                        <div class="flex items-start space-x-3 p-4 bg-gray-50 rounded-lg">
                                            <input type="checkbox" id="copyright" name="copyright"
                                                class="mt-1 h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded">
                                            <div>
                                                <label for="copyright" class="text-sm font-medium text-gray-700 cursor-pointer">
                                                    Image Rights & Ownership Agreement
                                                </label>
                                                <p class="text-xs text-gray-600 mt-1">
                                                    I confirm I own the rights to the uploaded images and grant permission to
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
                            <div>
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
    <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // OOP Structure for Personalization Form
        class PersonalizationForm {
            constructor() {
                this.currentStep = 1;
                this.totalSteps = 3;
                this.selectedAge = null;
                this.selectedSkinTone = null;
                this.uploadedFiles = [];
                this.maxFiles = 2;
                this.maxFileSize = 10 * 1024 * 1024; // 10MB

                this.init();
            }

            init() {
                // Initialize Lucide icons first
                setTimeout(() => {
                    lucide.createIcons();
                }, 100);

                this.bindEvents();
                this.initializeSkinToneButtons();
                this.showStep(1);
                this.initializeSwiper();
            }

            bindEvents() {
                const self = this;

                // Age button events
                $(document).on('click', '.age-btn', function(e) {
                    e.preventDefault();
                    self.handleAgeSelection($(this));
                });

                // Character count for dedication
                $('#dedication').on('input', function() {
                    self.updateCharacterCount();
                });

                // File upload events - Separate handlers to avoid conflicts
                $('#browseBtn').off('click').on('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    console.log('Browse button clicked');
                    self.triggerFileInput();
                });

                // Only bind to the upload area itself, not its children
                $('#uploadArea').off('click').on('click', function(e) {
                    // Only trigger if the click is directly on the upload area or its direct children
                    // but not on the browse button
                    if (e.target.id !== 'browseBtn' && !$(e.target).closest('#browseBtn').length) {
                        e.preventDefault();
                        e.stopPropagation();
                        console.log('Upload area clicked');
                        self.triggerFileInput();
                    }
                });

                $('#photoInput').off('change').on('change', function(e) {
                    console.log('File input changed');
                    self.handleFileSelect(e);
                });

                // Drag and drop events
                $('#uploadArea')
                    .off('dragover').on('dragover', function(e) {
                        self.handleDragOver(e);
                    })
                    .off('dragleave').on('dragleave', function(e) {
                        self.handleDragLeave(e);
                    })
                    .off('drop').on('drop', function(e) {
                        self.handleDrop(e);
                    });

                // Remove image events
                $(document).on('click', '.remove-image-btn', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    self.removeImage($(this));
                });

                // Navigation events
                $('#nextBtn').off('click').on('click', function(e) {
                    e.preventDefault();
                    self.nextStep();
                });

                $('#prevBtn').off('click').on('click', function(e) {
                    e.preventDefault();
                    self.prevStep();
                });

                $('#previewBtn').off('click').on('click', function(e) {
                    e.preventDefault();
                    self.previewBook();
                });
            }

            initializeSkinToneButtons() {
                const self = this;
                $('.skin-tone-button').on('click', function() {
                    $('.skin-tone-button').removeClass('selected');
                    $(this).addClass('selected');
                    self.selectedSkinTone = $(this).data('value');
                });
            }

            handleAgeSelection($element) {
                $('.age-btn').removeClass('bg-purple-500 text-white border-purple-500');
                $element.addClass('bg-purple-500 text-white border-purple-500');
                this.selectedAge = $element.data('age');
                console.log('Selected age:', this.selectedAge);
            }

            updateCharacterCount() {
                const count = $('#dedication').val().length;
                $('#charCount').text(count);

                if (count > 180) {
                    $('#charCount').addClass('text-red-500');
                } else {
                    $('#charCount').removeClass('text-red-500');
                }
            }

            triggerFileInput() {
                console.log('Triggering file input...');
                const fileInput = document.getElementById('photoInput');
                if (fileInput) {
                    // Create a new click event to ensure it works
                    const event = new MouseEvent('click', {
                        view: window,
                        bubbles: false,
                        cancelable: true
                    });
                    fileInput.dispatchEvent(event);
                } else {
                    console.error('File input not found!');
                }
            }

            handleFileSelect(e) {
                console.log('File selected:', e.target.files);
                const files = Array.from(e.target.files);
                if (files.length > 0) {
                    this.processFiles(files);
                }
            }

            handleDragOver(e) {
                e.preventDefault();
                e.stopPropagation();
                $('#uploadArea').addClass('border-purple-500 bg-purple-50');
            }

            handleDragLeave(e) {
                e.preventDefault();
                e.stopPropagation();
                $('#uploadArea').removeClass('border-purple-500 bg-purple-50');
            }

            handleDrop(e) {
                e.preventDefault();
                e.stopPropagation();
                $('#uploadArea').removeClass('border-purple-500 bg-purple-50');
                const files = Array.from(e.originalEvent.dataTransfer.files);
                console.log('Files dropped:', files);
                this.processFiles(files);
            }

            processFiles(files) {
                console.log('Processing files:', files);
                const imageFiles = files.filter(file => file.type.startsWith('image/'));

                if (imageFiles.length === 0) {
                    this.showAlert('Please select image files only (JPG, PNG)', 'error');
                    return;
                }

                // Validate file count
                if (this.uploadedFiles.length + imageFiles.length > this.maxFiles) {
                    this.showAlert(`Please select maximum ${this.maxFiles} photos`, 'error');
                    return;
                }

                // Validate file size
                const oversizedFiles = imageFiles.filter(file => file.size > this.maxFileSize);
                if (oversizedFiles.length > 0) {
                    this.showAlert('Please select images smaller than 10MB', 'error');
                    return;
                }

                // Add files
                this.uploadedFiles = [...this.uploadedFiles, ...imageFiles];
                console.log('Uploaded files:', this.uploadedFiles);
                this.displayImagePreview();
                this.clearFileInput();
            }

            displayImagePreview() {
                const previewContainer = $('#imagePreview');
                previewContainer.empty();

                this.uploadedFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const previewItem = this.createPreviewItem(e.target.result, index, file.name);
                        previewContainer.append(previewItem);
                        // Re-initialize icons for the new content
                        lucide.createIcons();
                    };
                    reader.readAsDataURL(file);
                });
            }

            createPreviewItem(src, index, filename) {
                return $(`
                    <div class="image-preview-item" data-index="${index}">
                        <div class="relative group">
                            <img src="${src}" alt="Preview ${index + 1}" class="w-full h-40 object-cover rounded-lg">
                            <div class="image-preview-overlay">
                                <div class="text-white text-center">
                                    <i data-lucide="image" class="h-8 w-8 mx-auto mb-2"></i>
                                    <p class="text-sm font-medium">${filename}</p>
                                </div>
                            </div>
                            <button type="button" class="remove-image-btn remove-btn" data-index="${index}">
                                <i data-lucide="x" class="h-4 w-4"></i>
                            </button>
                        </div>
                        <div class="mt-3 text-center">
                            <p class="text-sm font-medium text-gray-700">Photo ${index + 1}</p>
                            <p class="text-xs text-gray-500">${this.formatFileSize(this.uploadedFiles[index].size)}</p>
                        </div>
                    </div>
                `);
            }

            formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';
                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));
                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }

            removeImage($element) {
                const index = parseInt($element.data('index'));
                console.log('Removing image at index:', index);
                this.uploadedFiles.splice(index, 1);
                this.displayImagePreview();
                this.clearFileInput();
            }

            clearFileInput() {
                $('#photoInput').val('');
            }

            showAlert(message, type = 'info') {
                // Create a modern alert notification
                const alertClass = type === 'error' ? 'bg-red-100 border-red-500 text-red-700' : 'bg-blue-100 border-blue-500 text-blue-700';
                const iconName = type === 'error' ? 'alert-circle' : 'info';

                const alert = $(`
                    <div class="fixed top-4 right-4 z-50 ${alertClass} border-l-4 p-4 rounded-lg shadow-lg max-w-sm transform transition-all duration-300 translate-x-full opacity-0">
                        <div class="flex items-center">
                            <i data-lucide="${iconName}" class="h-5 w-5 mr-3"></i>
                            <p class="font-medium">${message}</p>
                        </div>
                    </div>
                `);

                $('body').append(alert);
                lucide.createIcons();

                // Animate in
                setTimeout(() => {
                    alert.removeClass('translate-x-full opacity-0');
                }, 100);

                // Remove after 4 seconds
                setTimeout(() => {
                    alert.addClass('translate-x-full opacity-0');
                    setTimeout(() => alert.remove(), 300);
                }, 4000);
            }

            showStep(step) {
                $('.step-content').addClass('hidden');
                $(`#step${step}`).removeClass('hidden');

                // Update progress
                const progress = (step / this.totalSteps) * 100;
                $('#progressBar').css('width', progress + '%');
                $('#currentStep').text(step);
                $('#progressPercent').text(Math.round(progress));

                this.updateNavigationButtons(step);

                // Re-initialize Lucide icons for the new step content
                setTimeout(() => {
                    lucide.createIcons();
                }, 200);
            }

            updateNavigationButtons(step) {
                const prevBtn = $('#prevBtn');
                const nextBtn = $('#nextBtn');
                const previewBtn = $('#previewBtn');

                if (step === 1) {
                    prevBtn.addClass('hidden');
                    nextBtn.removeClass('hidden');
                    previewBtn.addClass('hidden');
                } else if (step === this.totalSteps) {
                    prevBtn.removeClass('hidden');
                    nextBtn.addClass('hidden');
                    previewBtn.removeClass('hidden');
                } else {
                    prevBtn.removeClass('hidden');
                    nextBtn.removeClass('hidden');
                    previewBtn.addClass('hidden');
                }
            }

            validateStep(step) {
                switch (step) {
                    case 1:
                        return this.validateStep1();
                    case 2:
                        return this.validateStep2();
                    case 3:
                        return this.validateStep3();
                    default:
                        return true;
                }
            }

            validateStep1() {
                const childName = $('#childName').val().trim();
                if (!childName) {
                    this.showAlert('Please enter your child\'s name', 'error');
                    $('#childName').focus();
                    return false;
                }
                if (!this.selectedAge) {
                    this.showAlert('Please select an age', 'error');
                    return false;
                }
                return true;
            }

            validateStep2() {
                const dedication = $('#dedication').val().trim();
                if (!dedication) {
                    this.showAlert('Please write a dedication message', 'error');
                    $('#dedication').focus();
                    return false;
                }
                if (dedication.length > 200) {
                    this.showAlert('Dedication message must be 200 characters or less', 'error');
                    $('#dedication').focus();
                    return false;
                }
                return true;
            }

            validateStep3() {
                if (this.uploadedFiles.length === 0) {
                    this.showAlert('Please upload at least one photo', 'error');
                    return false;
                }
                if (!$('#copyright').is(':checked')) {
                    this.showAlert('Please agree to the image rights agreement', 'error');
                    $('#copyright').focus();
                    return false;
                }
                return true;
            }

            nextStep() {
                if (this.validateStep(this.currentStep)) {
                    this.currentStep++;
                    this.showStep(this.currentStep);
                }
            }

            prevStep() {
                this.currentStep--;
                this.showStep(this.currentStep);
            }

            previewBook() {
                if (this.validateStep(this.currentStep)) {
                    const formData = this.collectFormData();
                    console.log('Form Data:', formData);
                    this.showAlert('Preview functionality would redirect to preview page!', 'info');
                }
            }

            collectFormData() {
                return {
                    childName: $('#childName').val().trim(),
                    age: this.selectedAge,
                    gender: $('#gender').val(),
                    skinTone: this.selectedSkinTone,
                    dedication: $('#dedication').val().trim(),
                    photos: this.uploadedFiles,
                    copyright: $('#copyright').is(':checked')
                };
            }

            initializeSwiper() {
                setTimeout(() => {
                    new Swiper(".mySwiper", {
                        loop: true,
                        spaceBetween: 20,
                        autoplay: {
                            delay: 3000,
                            disableOnInteraction: false,
                        },
                        pagination: {
                            el: ".swiper-pagination",
                            clickable: true
                        },
                        navigation: {
                            nextEl: ".swiper-button-next",
                            prevEl: ".swiper-button-prev"
                        },
                    });
                }, 100);
            }
        }

        // Initialize the form when document is ready
        $(document).ready(function() {
            new PersonalizationForm();
        });
    </script>
@endpush
