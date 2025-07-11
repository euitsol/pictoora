<nav class="fixed top-0 w-full bg-blue-50 backdrop-blur-md z-50 shadow-sm" id="main-header">
    <div class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
            <div class=" -mt-2">
                <img class="h-16 object-cover" src="{{ asset('frontend/img/logo.png') }}" alt="Logo">
            </div>
            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8">
                <a href="#home" class="text-gray-700 hover:text-blue-600 transition-colors font-semibold antialiased">Home</a>
                <a href="#products" class="text-gray-700 hover:text-blue-600 transition-colors font-semibold antialiased">Books</a>
                <a href="#features" class="text-gray-700 hover:text-blue-600 transition-colors font-semibold antialiased">Features</a>
                <a href="#faq" class="text-gray-700 hover:text-blue-600 transition-colors font-semibold antialiased">FAQ</a>
                <a href="#contact" class="text-gray-700 hover:text-blue-600 transition-colors font-semibold antialiased">Track Order</a>
            </div>
            <!-- Mobile Hamburger Menu -->
            <button class="md:hidden text-gray-700 mobile-menu-btn" id="mobile-menu-btn">
                <i data-lucide="menu" ></i>
            </button>
        </div>

        <!-- Mobile Menu -->
        <div class="md:hidden mobile-menu hidden bg-blue-50 mt-4 mobile-menu" id="mobile-menu">
            <a href="#home" class="block text-gray-700 hover:text-blue-600 transition-colors py-4 px-1 my-2 font-semibold antialiased">Home</a>
            <a href="#products" class="block text-gray-700 hover:text-blue-600 transition-colors py-4 px-1 my-2 font-semibold antialiased">Books</a>
            <a href="#features" class="block text-gray-700 hover:text-blue-600 transition-colors py-4 px-1 my-2 font-semibold antialiased">Features</a>
            <a href="#faq" class="block text-gray-700 hover:text-blue-600 transition-colors py-4 px-1 my-2 font-semibold antialiased">FAQ</a>
            <a href="#contact" class="block text-gray-700 hover:text-blue-600 transition-colors py-4 px-1 my-2 font-semibold antialiased">Track Order</a>
        </div>
    </div>
</nav>
