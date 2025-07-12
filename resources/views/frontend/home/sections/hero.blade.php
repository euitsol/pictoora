<section id="home" class="hero gradient-bg min-h-screen flex items-center relative hero-section mt-20 sm:p-3">
    <div class="absolute inset-0 gradient-bg"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="text-white fade-in">
                <h1 class="text-4xl md:text-5xl lg:text-7xl font-bold mb-6 leading-tight">
                    Turning Little Faces into
                    <span class="text-yellow-300">Big Adventures</span>
                </h1>
                <p class="sm:text-lg text-xl mb-8 text-gray-100 leading-relaxed">
                    Bring your child's imagination to life with fully personalized storybooks —
                    where their face, name, and spirit become the heart of every adventure.
                </p>
                <button
                    class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-full text-lg font-semibold hover:bg-yellow-300 transition-all pulse-button">
                    Bring Their Story to Life
                </button>

                <!-- Trust Indicators -->
                {{-- <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-12 text-center">
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-2xl font-bold">2,200+</div>
                        <div class="text-sm text-gray-200">Happy Customers</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-2xl font-bold">100%</div>
                        <div class="text-sm text-gray-200">Refund Policy</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-2xl font-bold">750+</div>
                        <div class="text-sm text-gray-200">5 Star Reviews</div>
                    </div>
                    <div class="bg-white/10 backdrop-blur-sm rounded-lg p-4">
                        <div class="text-2xl font-bold">Fast</div>
                        <div class="text-sm text-gray-200">Delivery</div>
                    </div>
                </div> --}}


                <div class="flex flex-wrap justify-start gap-1 lg:gap-6 text-lg text-white md:mt-12 mt-4">
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
