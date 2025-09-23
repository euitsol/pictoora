            <!-- Delivery Step -->
            <div id="delivery-step" class="grid grid-cols-1 lg:grid-cols-3 gap-8" style="display: none;">
                <div class="lg:col-span-2 space-y-6">
                    <!-- Map Section -->
                    <div class="checkout-card bg-white shadow-lg rounded-lg p-3 md:p-6">
                        <div class="mb-4">
                            <h4 class="text-xl font-bold gradient-text flex items-center gap-3">
                                <i data-lucide="map-pin" class="w-6 h-6 text-purple-500"></i>
                                Delivery Location
                            </h4>
                        </div>
                        <div class="map-placeholder" id="map">
                        </div>
                    </div>

                    <!-- Shipping Methods -->
                    <div class="checkout-card bg-white shadow-lg rounded-lg p-3 md:p-6">
                        <div class="mb-6">
                            <h4 class="text-xl font-bold gradient-text flex items-center gap-3">
                                <i data-lucide="truck" class="w-6 h-6 text-purple-500"></i>
                                Shipping Method
                            </h4>
                        </div>

                        <div class="space-y-4">
                            <!-- Standard Shipping -->
                            <div class="shipping-option border-2 border-gray-200 rounded-xl p-4 bg-gradient-to-r from-purple-50 to-blue-50" data-method="standard" data-cost="17.00" data-name="Standard">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-6 h-6 border-2 border-purple-300 rounded-full flex items-center justify-center">
                                            <div class="w-3 h-3 bg-purple-600 rounded-full opacity-0 transition-opacity"></div>
                                        </div>
                                        <div>
                                            <h5 class="font-bold text-lg text-gray-900">Standard</h5>
                                            <p class="text-sm text-gray-600">10-17 Business Days</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-xl font-bold gradient-text-checkout">€17.00</span>
                                    </div>
                                </div>
                            </div>

                            <!-- Express Shipping -->
                            <div class="shipping-option border-2 border-gray-200 rounded-xl p-4 bg-gradient-to-r from-purple-50 to-blue-50" data-method="express" data-cost="31.00" data-name="Express">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-6 h-6 border-2 border-purple-300 rounded-full flex items-center justify-center">
                                            <div class="w-3 h-3 bg-purple-600 rounded-full opacity-0 transition-opacity"></div>
                                        </div>
                                        <div>
                                            <h5 class="font-bold text-lg text-gray-900">Express</h5>
                                            <p class="text-sm text-gray-600">8-10 Business Days</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <span class="text-xl font-bold gradient-text-checkout">€31.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div>
                    <div class="checkout-card bg-white shadow-lg rounded-lg p-3 md:p-6">
                        <div class="mb-6">
                            <h4 class="text-xl font-bold gradient-text flex items-center gap-3">
                                <i data-lucide="user" class="w-6 h-6 text-purple-500"></i>
                                Delivery Information
                            </h4>
                        </div>

                        <form id="delivery-form" class="space-y-6">
                            <!-- Email Address -->
                            <div>
                                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Email Address *
                                </label>
                                <p class="text-xs text-gray-500 mb-3">This email will be used to keep you informed about your order status and details.</p>
                                <input type="email" id="email" name="email" required
                                    class="w-full px-4 py-3 border border-purple-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                    placeholder="your.email@example.com">
                            </div>

                            <!-- Full Name -->
                            <div>
                                <label for="fullName" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Full Name *
                                </label>
                                <input type="text" id="fullName" name="fullName" required
                                    class="w-full px-4 py-3 border border-purple-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                    placeholder="John Doe">
                            </div>

                            <!-- Phone Number -->
                            <div>
                                <label for="phone" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Phone Number *
                                </label>
                                <input type="tel" id="phone" name="phone" required
                                    class="w-full px-4 py-3 border border-purple-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                    placeholder="+1 (555) 123-4567">
                            </div>

                            <!-- Street Address -->
                            <div>
                                <label for="street" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Street Address *
                                </label>
                                <input type="text" id="street" name="street" required
                                    class="w-full px-4 py-3 border border-purple-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                    placeholder="123 Main Street">
                            </div>

                            <!-- City and Postal Code -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label for="city" class="block text-sm font-semibold text-gray-700 mb-2">
                                        City *
                                    </label>
                                    <input type="text" id="city" name="city" required
                                        class="w-full px-4 py-3 border border-purple-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                        placeholder="New York">
                                </div>
                                <div>
                                    <label for="postalCode" class="block text-sm font-semibold text-gray-700 mb-2">
                                        Postal/Zip Code *
                                    </label>
                                    <input type="text" id="postalCode" name="postalCode" required
                                        class="w-full px-4 py-3 border border-purple-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                        placeholder="10001">
                                </div>
                            </div>

                            <!-- State/Province -->
                            <div>
                                <label for="state" class="block text-sm font-semibold text-gray-700 mb-2">
                                    Select State/Province *
                                </label>
                                <select id="state" name="state" required
                                    class="w-full px-4 py-3 border border-purple-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all">
                                    <option value="">Choose your state/province</option>
                                    <option value="AL">Alabama</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
