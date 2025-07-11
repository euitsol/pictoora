<section id="home" class="gradient-bg min-h-screen flex items-center relative hero-section mt-20" style="height: calc(100vh - 5rem);">
    <div class="absolute inset-0 gradient-bg"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="text-white fade-in">
                <h1 class="text-5xl lg:text-7xl font-bold mb-6 leading-tight">
                    Turning Little Faces into
                    <span class="text-yellow-300">Big Adventures</span>
                </h1>
                <p class="text-xl mb-8 text-gray-100 leading-relaxed">
                    Bring your child's imagination to life with fully personalized storybooks —
                    where their face, name, and spirit become the heart of every adventure.
                </p>
                <button
                    class="bg-yellow-400 text-gray-900 px-8 py-4 rounded-full text-lg font-semibold hover:bg-yellow-300 transition-all pulse-button">
                    Bring Their Story to Life
                </button>

                <!-- Trust Indicators -->
                <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mt-12 text-center">
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
                </div>
            </div>

            <div class="relative fade-in md:block hidden">
                <div class="floating">
                    <img src="{{ asset('frontend/img/hero.webp') }}" alt="Personalized Storybook"
                        class="rounded-2xl shadow-2xl">
                </div>
                <div
                    class="absolute -top-4 -right-4 bg-yellow-400 text-gray-900 px-4 py-2 rounded-full font-semibold">
                    Only 2 Minutes!
                </div>
            </div>
        </div>
    </div>
</section>
