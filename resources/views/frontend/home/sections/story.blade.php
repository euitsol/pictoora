<section class="py-12 md:py-12 lg:py-20 bg-gradient-to-r from-purple-50 to-blue-50">
    <div class="container mx-auto px-6">
        <div class="grid lg:grid-cols-2 gap-12 items-center">
            <div class="fade-in visible">
                <img src="{{ asset('frontend/img/story.webp') }}" alt="Child in story" class="rounded-2xl shadow-xl">
            </div>
            <div class="fade-in visible">
                <h2 class="text-4xl md:text-4xl font-bold mb-6 gradient-text">
                    They Are Not Just in the Story —
                    <span class="text-gray-800">They Are the Story</span>
                </h2>
                <p class="text-lg md:text-xl text-gray-700 mb-8 leading-relaxed">
                    We combine expert storytelling and next-gen technology
                    to transform your child's photos into a keepsake you and
                    they will treasure forever.
                </p>
                <a href="{{ route('books.index') }}" class="bg-purple-600 text-white px-8 py-4 rounded-full text-lg font-semibold hover:bg-purple-700 transition-all">
                    Bring Their Story to Life
                </a>
            </div>
        </div>
    </div>
</section>
