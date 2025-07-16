<section id="reviews" class="py-20 bg-gradient-to-r from-purple-50 to-blue-50">
    <div class="container mx-auto px-6">
        <div class="flex flex-col items-center mb-10 fade-in visible">
            <h2 class="text-4xl md:text-4xl font-bold mb-4 gradient-text text-center">"I Actually Cried When I Saw It" Reviews That
                Inspire</h2>
        </div>
        <div class="swiper reviews-swiper">
            <div class="swiper-wrapper">
                @for ($i = 0; $i < 6; $i++)
                    <div class="swiper-slide">
                        <div class="bg-white p-8 rounded-xl shadow-lg card-hover fade-in visible h-full flex flex-col justify-between">
                            <div class="flex flex-col items-center">
                                <img src="/frontend/img/book/book-1.webp" alt="Reviewed Book"
                                    class="w-24 h-24 rounded-xl object-cover mb-4">
                                <div class="flex mb-4 gap-1">
                                    @for ($j = 0; $j < 5; $j++)
                                        <i data-lucide="star" class="text-yellow-400 fill-yellow-400"></i>
                                    @endfor
                                </div>
                                <p class="text-gray-700 mb-4 text-center">"I actually cried when I saw it! My daughter's
                                    face lit up when she saw herself as the main character. This is pure magic!"</p>
                            </div>
                            <div class="flex items-center justify-center mt-4">
                                <div>
                                    <div class="font-semibold text-center">Sarah M.</div>
                                    <div class="text-gray-600 text-sm text-center">Mother of Emma, 5</div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</section>
