<section id="home" class="hero gradient-bg min-h-screen flex items-center relative hero-section sm:p-3">
    <div class="absolute inset-0 gradient-bg"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <div class="relative fade-in lg:hidden block mt-12">
                <div class="">
                    <img src="{{ asset('frontend/img/hero.webp') }}" alt="Personalized Storybook"
                        class="rounded-2xl shadow-2xl">
                </div>
                <div
                    class="absolute -top-4 -right-4 bg-yellow-400 text-gray-900 px-4 py-2 rounded-full font-semibold">
                    Only 2 Minutes to Customize!
                </div>
            </div>
            <div class="text-white fade-in">
                <h1 class="text-4xl md:text-5xl lg:text-5xl font-bold mb-6 leading-tight text-center md:text-left">
                    Turning Little Faces into
                    <span class="text-yellow-300">Big Adventures</span>
                </h1>
                <p class="text-sm md:text-xl lg:text-xl mb-8 text-gray-100 leading-relaxed text-justify">
                    Bring your child's imagination to life with fully personalized storybooks —
                    where their face, name, and spirit become the heart of every adventure.
                </p>
                <a href="{{ route('books.index') }}"
                    class="w-full md:w-fit lg:w-fit bg-yellow-400 text-gray-900 px-8 py-4 rounded-full text-lg font-semibold hover:bg-yellow-300 transition-all pulse-button">
                    Bring Their Story to Life
                </a>

                <!-- Trust Indicators -->
                {{-- <div class="flex flex-wrap justify-start gap-1 lg:gap-6 text-lg text-white md:mt-12 mt-4">
                    <div class="flex items-center gap-2">
                       <i data-lucide="users" class="text-orange-500"></i>
                        <span class="font-semibold">2,200 Happy Customers</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="shield" class="text-green-500"></i>
                        <span class="font-semibold">100% Refund Policy</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="star" class="text-yellow-500"></i>
                        <span class="font-semibold">750+ 5 Star Reviews</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <i data-lucide="truck" class="text-teal-500"></i>
                        <span class="font-semibold">Fast Delivery</span>
                    </div>
                </div> --}}


                <div class="grid grid-cols-4 lg:grid-cols-4 gap-2 text-center mt-8 mb-8 md:mb-0">
                    <div class="flex flex-col items-center gap-2 p-3">
                        <div class="bg-orange-500/20 p-3 rounded-full">
                           <i data-lucide="users" class="text-orange-500 h-6 w-6 md:h-10 md:w-10"></i>
                        </div>
                        <div>
                            <div class="font-bold text-sm md:text-lg">
                                2,200+</div>
                            <div class="text-xs md:text-sm text-gray-300">
                                Happy Customers</div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center gap-2 p-3">
                        <div class="bg-green-500/20 p-3 rounded-full">
                            <i data-lucide="shield" class="text-green-500 h-6 w-6 md:h-10 md:w-10"></i>
                        </div>
                        <div>
                            <div class="font-bold text-sm md:text-lg">
                                100%</div>
                            <div class="text-xs md:text-sm text-gray-300">
                                Refund Policy</div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center gap-2 p-3">
                        <div class="bg-yellow-500/20 p-3 rounded-full">
                            <i data-lucide="star" class="text-yellow-500 h-6 w-6 md:h-10 md:w-10"></i>
                        </div>
                        <div>
                            <div class="font-bold text-sm md:text-lg">
                                750+</div>
                            <div class="text-xs md:text-sm text-gray-300">
                                5 Star Reviews</div>
                        </div>
                    </div>
                    <div class="flex flex-col items-center gap-2 p-3">
                        <div class="bg-teal-500/20 p-3 rounded-full">
                            <i data-lucide="truck" class="text-teal-500 h-6 w-6 md:h-10 md:w-10"></i>
                        </div>
                        <div>
                            <div class="font-bold text-sm md:text-lg">
                                Fast</div>
                            <div class="text-xs md:text-sm text-gray-300">
                                Delivery</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="relative fade-in lg:block hidden">
                <div class="floating">
                    <img src="{{ asset('frontend/img/hero.webp') }}" alt="Personalized Storybook"
                        class="rounded-2xl shadow-2xl">
                </div>
                <div
                    class="absolute -top-4 -right-4 bg-yellow-400 text-gray-900 px-4 py-2 rounded-full font-semibold">
                    Only 2 Minutes to Customize!
                </div>
            </div>
        </div>
    </div>
</section>
