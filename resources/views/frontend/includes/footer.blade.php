<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8">
            <div>
                <div class="text-2xl font-bold mb-4"><img src="{{ asset('frontend/img/logo-white.png') }}" alt="{{ config('app.name') }}"></div>
                <p class="text-gray-400">Creating personalized adventures that inspire young minds and create lasting memories.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#home" class="hover:text-white transition-colors">Home</a></li>
                    <li><a href="#products" class="hover:text-white transition-colors">Stories</a></li>
                    <li><a href="#features" class="hover:text-white transition-colors">Features</a></li>
                    <li><a href="#reviews" class="hover:text-white transition-colors">Reviews</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Support</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="#faq" class="hover:text-white transition-colors">FAQ</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Contact Us</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Shipping Info</a></li>
                    <li><a href="#" class="hover:text-white transition-colors">Returns</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Connect</h3>
                <div class="flex space-x-4">
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-facebook-f text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-instagram text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-twitter text-xl"></i>
                    </a>
                    <a href="#" class="text-gray-400 hover:text-white transition-colors">
                        <i class="fab fa-pinterest text-xl"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved. Made with ❤️ for families everywhere.</p>
        </div>
    </div>
</footer>
