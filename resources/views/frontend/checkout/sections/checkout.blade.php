<div id="payment-step" class="grid grid-cols-1 lg:grid-cols-3 gap-8" style="display: none;">
    <div class="lg:col-span-2">
        <div class="payment-card bg-white shadow-lg rounded-lg p-3 md:p-6">
            <div class="mb-4">
                <h4 class="text-xl font-bold gradient-text flex items-center gap-3">
                    <i data-lucide="credit-card" class="w-6 h-6 text-purple-500"></i>
                    Complete Your Payment
                </h4>
            </div>

            <div class="space-y-6">
                <!-- Order Items -->
                <div class="p-6 bg-gradient-to-r from-purple-50 to-blue-50 border border-purple-200 rounded-xl checkout-card">
                    <!-- Mobile Layout: Image full width, content below -->
                    <div class="block md:hidden">
                        <div class="relative mb-4">
                            <img src="{{ asset('frontend/img/book/book-1.webp') }}" alt="Kerry's Fun in the Sun"
                                class="w-full h-48 object-cover rounded-lg shadow-md">
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-start justify-between">
                                <h3 class="font-bold text-lg text-gray-900">Kerry's Fun in the Sun</h3>
                            </div>
                            <div class="flex items-center gap-2">
                                <div class="flex items-center">
                                    <i data-lucide="star"
                                        class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star"
                                        class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star"
                                        class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star"
                                        class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star"
                                        class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                                    <span class="ml-2 text-sm text-gray-600">(4.8)</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-gray-500 line-through text-sm">€50.00</span>
                                <span class="text-xl font-bold gradient-text-checkout">€39.99</span>
                            </div>
                        </div>
                    </div>

                    <!-- Desktop Layout: Side by side -->
                    <div class="hidden md:flex items-start gap-4">
                        <div class="relative flex-shrink-0">
                            <img src="{{ asset('frontend/img/book/book-1.webp') }}" alt="Kerry's Fun in the Sun"
                                class="w-24 h-28 object-cover rounded-lg shadow-md">
                        </div>
                        <div class="flex-1 min-w-0">
                            <h3 class="font-bold text-xl text-gray-900 mb-1">Kerry's Fun in the Sun</h3>
                            <div class="flex items-center gap-2 mb-2">
                                <div class="flex items-center">
                                    <i data-lucide="star"
                                        class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star"
                                        class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star"
                                        class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star"
                                        class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                                    <i data-lucide="star"
                                        class="w-4 h-4 mr-1 text-yellow-400 fill-yellow-400"></i>
                                    <span class="ml-2 text-sm text-gray-600">(4.8)</span>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <span class="text-gray-500 line-through text-sm">€50.00</span>
                                <span class="text-xl font-bold gradient-text-checkout">€39.99</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Shipping Information -->
                <div class="checkout-card bg-white shadow-lg rounded-lg p-3 md:p-6">
                    <div class="mb-4">
                        <h4 class="text-xl font-bold gradient-text flex items-center gap-3">
                            <i data-lucide="truck" class="w-6 h-6 text-purple-500"></i>
                            Shipping Information
                        </h4>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <i data-lucide="user" class="w-5 h-5 text-purple-500 mt-0.5"></i>
                            <div class="text-gray-700">
                                <p class="font-medium">John Doe</p>
                                <p class="text-sm">+1 (555) 123-4567</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <i data-lucide="map-pin" class="w-5 h-5 text-purple-500 mt-0.5"></i>
                            <div class="text-gray-700">
                                <p>123 Main Street</p>
                                <p>New York, NY 10001</p>
                                <p>United States</p>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <i data-lucide="package" class="w-5 h-5 text-purple-500 mt-0.5"></i>
                            <div class="flex-1">
                                <p class="font-medium">Standard Shipping</p>
                                <p class="text-sm text-gray-600">10-17 Business Days</p>
                            </div>
                            <div class="text-right">
                                <p class="font-bold text-purple-600">€17.00</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Order Summary -->
    <div>
        <div class="payment-card bg-white shadow-lg rounded-lg">
            <div class="p-3 md:p-6">
                <h4 class="text-xl font-bold gradient-text-checkout flex items-center gap-3">
                    <i data-lucide="receipt" class="w-6 h-6 text-purple-500"></i>
                    Order Summary
                </h4>
            </div>
            <div class="p-3 md:p-6 space-y-6">
                <!-- Order Items -->
                <div class="space-y-4">
                    <div class="flex justify-between items-center p-4 bg-gradient-to-r from-purple-50 to-blue-50 rounded-lg">
                        <div>
                            <span class="text-gray-700 font-medium">Books (1)</span>
                        </div>
                        <div class="text-right">
                            <span class="text-gray-500 line-through text-sm">€50.00</span>
                            <span class="ml-2 font-bold text-lg gradient-text-checkout">€39.99</span>
                        </div>
                    </div>

                    <div class="flex justify-between items-center p-4 bg-green-50 rounded-lg border border-green-200">
                        <div class="flex items-center gap-2">
                            <i data-lucide="tag" class="w-4 h-4 text-green-600"></i>
                            <span class="text-green-700 font-medium">Discount (20%)</span>
                        </div>
                        <span class="font-bold text-green-600">-€10.01</span>
                    </div>

                    <div class="flex justify-between items-center p-4 bg-blue-50 rounded-lg border border-blue-200">
                        <div class="flex items-center gap-2">
                            <i data-lucide="truck" class="w-4 h-4 text-blue-600"></i>
                            <span class="text-blue-700 font-medium">Shipping</span>
                        </div>
                        <span class="font-bold text-blue-600">€17.00</span>
                    </div>
                </div>

                <hr class="border-purple-200">

                <!-- Coupon Section -->
                <div class="space-y-4">
                    <div class="flex items-center gap-2">
                        <i data-lucide="gift" class="w-5 h-5 text-purple-500"></i>
                        <label class="text-sm font-semibold text-gray-700">Got a Coupon Code?</label>
                    </div>
                    <div id="coupon-input" class="flex gap-2">
                        <input type="text" id="coupon-code" placeholder="Enter code"
                            class="flex-1 w-[80%] px-3 py-3 border border-purple-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                        <button id="apply-coupon"
                            class="px-3 py-3 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-lg hover:from-purple-700 hover:to-blue-700 font-semibold transition-all duration-300">
                            Apply
                        </button>
                    </div>
                </div>

                <hr class="border-purple-200">

                <!-- Total -->
                <div class="bg-gradient-to-r from-purple-50 to-blue-50 px-4 py-2 rounded-xl border border-purple-200">
                    <div class="flex justify-between items-center">
                        <span class="text-lg font-bold text-gray-900">Total</span>
                        <div class="text-right">
                            <span class="text-lg font-bold gradient-text-checkout" id="cart-total">€56.99</span>
                            <p class="text-xs text-gray-500 mt-1">Including VAT</p>
                        </div>
                    </div>
                </div>

                <!-- Pay Button -->

                <form id='checkout-form' method='post' action="{{ route('payment.stripe') }}">
                    @csrf

                    <button type="submit" class="w-full py-4 px-6 text-white font-bold rounded-xl bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <div class="flex items-center justify-center gap-3">
                            <span>Pay €56.99</span>
                            <i data-lucide="lock" class="w-5 h-5"></i>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
