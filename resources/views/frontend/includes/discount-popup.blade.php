<!-- Modal Overlay (parent) -->
<div id="modalOverlay" class="fixed inset-0 bg-blue-500/30 z-40 flex items-center justify-center" style="display: none;">
    <!-- Modal (child) -->
    <div id="customModal" class="fixed flex items-center justify-center z-50 p-4 ">
        <div class="bg-gradient-to-r from-pink-400 via-pink-500 to-pink-600 rounded-2xl shadow-2xl max-w-md w-full mx-4 relative overflow-hidden popup-enter">

            <!-- Close Button -->
            <button id="closeBtn"
                class="absolute top-4 right-4 text-white hover:text-pink-200 transition-colors duration-200 z-10">
                <i data-lucide="x" class="w-6 h-6"></i>
            </button>

            <!-- Content -->
            <div class="p-8 text-center text-white">
                <div id="formContent">

                    <!-- Heading -->
                    <h2 class="text-3xl font-bold mb-2 tracking-wide">
                        10% OFF YOUR FIRST ORDER
                    </h2>

                    <!-- Subheading -->
                    <p class="text-pink-100 mb-6 text-lg">
                        Be first to know about new stories and offers
                    </p>

                    <!-- Email Form -->
                    <form id="emailForm" class="space-y-4">
                        <div class="relative">
                            <input type="email" id="emailInput" placeholder="Enter your email address"
                                class="w-full pl-10 pr-4 py-3 text-gray-800 bg-white border-0 rounded-lg focus:ring-2 focus:ring-white focus:ring-opacity-50 focus:outline-none"
                                required />
                        </div>

                        <button type="submit" class="w-full gradient-bg text-white font-semibold py-3 rounded-lg transition-colors duration-200 shadow-lg">
                            GET MY 10% DISCOUNT
                        </button>
                    </form>

                    <!-- Fine Print -->
                    <p class="text-xs text-pink-100 mt-4 opacity-80">
                        *Valid for first-time customers only. Cannot be combined with other offers.
                    </p>
                </div>
            </div>
        </div>
