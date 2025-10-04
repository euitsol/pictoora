<footer class="bg-gray-900 text-white py-12">
    <div class="container mx-auto px-6">
        <div class="grid md:grid-cols-4 gap-8">
            <div>
                <div class="text-2xl font-bold mb-4"><img src="{{ asset('frontend/img/logo-white.webp') }}" alt="{{ config('app.name') }}"></div>
                <p class="text-gray-400">Creating personalized adventures that inspire young minds and create lasting memories.</p>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ route('home.index') }}" class="hover:text-white transition-colors">Home</a></li>
                    <li><a href="{{ route('books.index') }}" class="hover:text-white transition-colors">Books</a></li>
                    <li><a href="{{ route('about.index') }}" class="hover:text-white transition-colors">About Us</a></li>
                    <li><a href="#reviews" class="hover:text-white transition-colors">Reviews</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Support</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ route('faq.index') }}" class="hover:text-white transition-colors">FAQ</a></li>
                    <li><a href="{{ route('contact.index') }}" class="hover:text-white transition-colors">Contact Us</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-lg font-semibold mb-4">Policy</h3>
                <ul class="space-y-2 text-gray-400">
                    <li><a href="{{ route('policy.index') }}#privacy_policy" class="hover:text-white transition-colors">Privacy Policy</a></li>
                    <li><a href="{{ route('policy.index') }}#refund_policy" class="hover:text-white transition-colors">Refund Policy</a></li>
                    <li><a href="{{ route('policy.index') }}#children_data_policy" class="hover:text-white transition-colors">Children’s Data & Safety Policy</a></li>
                    <li><a href="{{ route('policy.index') }}#data_deletion_policy" class="hover:text-white transition-colors">Data Deletion Policy</a></li>
                </ul>
            </div>
        </div>
        <div class="border-t border-gray-800 mt-8 pt-8 text-center text-gray-400">
            <p>© {{ date('Y') }} {{ config('app.name') }}. All rights reserved. Made with ❤️ for families everywhere.</p>
        </div>
    </div>
</footer>
