<section id="products" class="py-20 bg-gradient-to-r from-purple-50 to-blue-50">
    <div class="container mx-auto px-6">
        <div class="text-center mb-16 fade-in visible">
            <h2 class="text-4xl md:text-4xl font-bold mb-4 gradient-text p-1 md:p-2">Inspiring Tales Begin Here</h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
            @for ($i = 0; $i < 8; $i++)
            <div class="card-hover bg-white rounded-xl shadow-lg overflow-hidden fade-in visible">
                <img src="{{ asset('frontend/img/book/book-1.webp') }}" alt="Dino Time-Machine" class="w-full h-48 object-cover p-2">
                <div class="p-6">
                    <h3 class="text-lg md:text-xl font-semibold mb-2">Dino Time-Machine</h3>
                    <div class="text-lg md:text-2xl font-bold text-purple-600 mb-4">$50.00</div>
                    <a href="{{ route('book-details.index') }}" class="w-full flex items-center justify-center bg-purple-600 text-white py-3 rounded-lg hover:bg-purple-700 transition-colors">
                        Customize
                    </a>
                </div>
            </div>
            @endfor
        </div>
    </div>
</section>
