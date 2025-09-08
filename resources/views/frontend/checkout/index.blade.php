@extends('frontend.layouts.master')

@push('styles')
    <style>
        .step-active {
            background: linear-gradient(135deg, #8b5cf6 0%, #3b82f6 100%);
            border-color: #8b5cf6;
            color: white;
            box-shadow: 0 4px 15px rgba(139, 92, 246, 0.3);
        }

        .text-active {
            color: #8b5cf6;
            font-weight: 600;
        }

        .text-inactive {
            color: #6b7280;
        }

        .step-inactive {
            border-color: #e5e7eb;
            color: #6b7280;
            background: white;
        }

        .progress-line-active {
            background: linear-gradient(135deg, #8b5cf6 0%, #3b82f6 100%);
        }

        .progress-line-inactive {
            background-color: #e5e7eb;
        }

        .radio-checked {
            background-color: #8b5cf6;
            border-color: #8b5cf6;
        }

        .coupon-applied {
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.1) 0%, rgba(59, 130, 246, 0.1) 100%);
            border: 1px solid rgba(139, 92, 246, 0.2);
        }

        .checkout-card {
            transition: all 0.3s ease;
        }

        .gradient-text-checkout {
            background: linear-gradient(135deg, #8b5cf6 0%, #3b82f6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .floating-steps {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            z-index: 50;
            background: white;
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.1);
        }

        @media (min-width: 768px) {
            .floating-steps {
                position: static;
                box-shadow: none;
            }
        }

        .trust-indicator {
            background: linear-gradient(135deg, #f0f9ff 0%, #e0e7ff 100%);
            border: 2px solid #8b5cf6;
            padding: 1rem;
            border-radius: 12px;
            text-align: center;
            font-weight: 600;
            color: #4c1d95;
        }

        .trust-indicator i {
            color: #8b5cf6;
            font-size: 1.5rem;
        }
    </style>
@endpush

@section('content')
    <section id="checkout" class="bg-gradient-to-r from-purple-50 to-blue-50 min-h-screen">
        <div class="max-w-6xl mx-auto p-6 hidden md:block">
            <!-- Progress Steps -->
            <div class="checkout-card mb-2 mt-8 overflow-hidden rounded-lg shadow-lg bg-white">
                <div class="p-3 md:p-6">
                    <div class="text-center mb-6">
                        <h2 class="text-xl md:text-3xl font-bold gradient-text-checkout mb-2">Complete Your Order</h2>
                    </div>

                    <div class="flex items-center justify-between relative">

                        <!-- Step 1 -->
                        <div class="flex flex-col items-center relative z-10">
                            <div id="step-1"
                                class="step flex items-center justify-center w-12 h-12 rounded-full border-2 step-active cursor-pointer"
                                data-step="1">
                                <i data-lucide="shopping-cart" class="w-6 h-6"></i>
                            </div>
                            <span id="step-1-text"
                                class="step-text mt-3 font-semibold text-center text-active cursor-pointer text-sm md:text-lg"
                                data-step="1">Cart</span>
                            <span class="hidden md:block text-sm text-gray-500 mt-1">Review items</span>
                        </div>

                        <!-- Step 2 -->
                        <div class="flex flex-col items-center relative z-10">
                            <div id="step-2"
                                class="step flex items-center justify-center w-12 h-12 rounded-full border-2 step-inactive cursor-pointer"
                                data-step="2">
                                <i data-lucide="truck" class="w-6 h-6"></i>
                            </div>
                            <span id="step-2-text"
                                class="step-text mt-3 font-semibold text-center text-inactive cursor-pointer text-sm md:text-lg"
                                data-step="2">Delivery</span>
                            <span class="hidden md:block text-sm text-gray-500 mt-1">Shipping info</span>
                        </div>

                        <!-- Step 3 -->
                        <div class="flex flex-col items-center relative z-10">
                            <div id="step-3"
                                class="step flex items-center justify-center w-12 h-12 rounded-full border-2 step-inactive cursor-pointer"
                                data-step="3">
                                <i data-lucide="credit-card" class="w-6 h-6"></i>
                            </div>
                            <span id="step-3-text"
                                class="step-text mt-3 font-semibold text-center text-inactive cursor-pointer text-sm md:text-lg"
                                data-step="3">Payment</span>
                            <span class="hidden md:block text-sm text-gray-500 mt-1">Secure checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto p-6 pb-6 md:pb-6">
            <div id="cart-step" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <div class="lg:col-span-2">
                    <div class="checkout-card bg-white shadow-lg rounded-lg p-3 md:p-6">
                        <div class="mb-4">
                            <h4 class="text-xl font-bold gradient-text flex items-center gap-3">
                                <i data-lucide="shopping-cart" class="w-6 h-6 text-purple-500"></i>
                                Your Cart
                            </h4>
                        </div>
                        <div class="space-y-6">
                            <div
                                class="p-6 bg-gradient-to-r from-purple-50 to-blue-50 border border-purple-200 rounded-xl checkout-card">
                                <!-- Mobile Layout: Image full width, content below -->
                                <div class="block md:hidden">
                                    <div class="relative mb-4">
                                        <img src="{{ asset('frontend/img/book/book-1.webp') }}" alt="Kerry's Fun in the Sun"
                                            class="w-full h-48 object-cover rounded-lg shadow-md">
                                    </div>
                                    <div class="space-y-3">
                                        <div class="flex items-start justify-between">
                                            <h3 class="font-bold text-lg text-gray-900">Kerry's Fun in the Sun</h3>
                                            <button class="p-2 hover:bg-red-100 rounded-full transition-colors group">
                                                <i data-lucide="x"
                                                    class="w-5 h-5 text-gray-500 group-hover:text-red-500"></i>
                                            </button>
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
                                        <button
                                            class="px-3 py-1 text-sm bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200 transition-colors flex items-center gap-2">
                                            <i data-lucide="pencil-line" class="w-4 h-4"></i>
                                            Edit Book
                                        </button>
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
                                        <button
                                            class="mb-3 px-3 py-1 text-sm bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-200 transition-colors flex items-center gap-2">
                                            <i data-lucide="pencil-line" class="w-4 h-4"></i>
                                            Edit Book
                                        </button>
                                        <div class="flex items-center gap-3">
                                            <span class="text-gray-500 line-through text-sm">€50.00</span>
                                            <span class="text-xl font-bold gradient-text-checkout">€39.99</span>
                                        </div>
                                    </div>
                                    <button
                                        class="p-2 hover:bg-red-100 rounded-full transition-colors group flex-shrink-0">
                                        <i data-lucide="x" class="w-5 h-5 text-gray-500 group-hover:text-red-500"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- What Happens After Checkout -->
                            <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 md:p-6">
                                <h5 class="font-bold text-lg text-blue-900 mb-4 flex items-center gap-2">
                                    <i data-lucide="info" class="w-5 h-5"></i>
                                    What happens after checkout?
                                </h5>

                                <!-- 3 concise benefits -->
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                                    <!-- Full Preview Access -->
                                    <div class="flex items-start gap-3 bg-white/60 border border-blue-200 rounded-lg p-3">
                                        <div
                                            class="w-9 h-9 flex items-center justify-center rounded-lg bg-gradient-to-br bg-blue-500/80 text-white flex-shrink-0 shadow-md">
                                            <i data-lucide="search" class="w-5 h-5"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-blue-900">Full Preview Access</p>
                                            <p class="text-sm text-blue-700">See all pages & customize</p>
                                        </div>
                                    </div>

                                    <!-- Personalize -->
                                    <div class="flex items-start gap-3 bg-white/60 border border-blue-200 rounded-lg p-3">
                                        <div
                                            class="w-9 h-9 flex items-center justify-center rounded-lg bg-gradient-to-br bg-purple-500/80 text-white flex-shrink-0 shadow-md">
                                            <i data-lucide="palette" class="w-5 h-5"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-blue-900">Personalize</p>
                                            <p class="text-sm text-blue-700">Choose your favorite images</p>
                                        </div>
                                    </div>

                                    <!-- Printed & Delivered -->
                                    <div class="flex items-start gap-3 bg-white/60 border border-blue-200 rounded-lg p-3">
                                        <div
                                            class="w-9 h-9 flex items-center justify-center rounded-lg bg-gradient-to-br bg-amber-500/80 text-white flex-shrink-0 shadow-md">
                                            <i data-lucide="truck" class="w-5 h-5"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-blue-900">Printed & Delivered</p>
                                            <p class="text-sm text-blue-700">5–7 days to your door</p>
                                        </div>
                                    </div>

                                    <div class="flex items-start gap-3 bg-white/60 border border-blue-200 rounded-lg p-3">
                                        <div
                                            class="w-9 h-9 flex items-center justify-center rounded-lg bg-gradient-to-br bg-indigo-500/80 text-white flex-shrink-0 shadow-md">
                                            <i data-lucide="download" class="w-5 h-5"></i>
                                        </div>
                                        <div>
                                            <p class="font-semibold text-blue-900">Download Full Book</p>
                                            <p class="text-sm text-blue-700">Full access to your digital copy</p>
                                        </div>
                                    </div>
                                </div>


                                <!-- Risk-free note -->
                                <div class="mt-4 border border-green-200 bg-green-50 rounded-lg p-3 md:p-4">
                                    <div class="flex items-start gap-3">
                                        <div
                                            class="w-9 h-9 flex items-center justify-center rounded-lg bg-gradient-to-br bg-green-500/80 text-white flex-shrink-0 shadow-md">
                                            <i data-lucide="shield-check" class="w-5 h-5"></i>
                                        </div>
                                        <p class="text-sm md:text-base text-green-800"><span class="font-semibold">100%
                                                Risk‑Free:</span> Not happy after seeing the pages? Full refund, no
                                            questions asked.</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Add More Books -->
                            <div
                                class="text-center py-4 md:py-6 px-2 md:px-6 border-2 border-dashed border-purple-300 rounded-xl bg-gradient-to-r from-purple-50 to-blue-50 hover:from-purple-100 hover:to-blue-100 transition-all duration-300">
                                <div class="mb-4">
                                    <i data-lucide="plus-circle"
                                        class="w-8 md:w-12 h-8 md:h-12 text-purple-500 mx-auto mb-3"></i>
                                </div>
                                <p class="text-gray-700 font-semibold mb-4">Add Another Personalised Book?</p>
                                <button
                                    class="px-6 py-3 bg-gradient-to-r from-purple-600 to-blue-600 text-white rounded-lg hover:from-purple-700 hover:to-blue-700 font-semibold transition-all duration-300 shadow-lg hover:shadow-xl">
                                    Browse More Books
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary -->
                <div>
                    <div class="checkout-card bg-white shadow-lg rounded-lg">
                        <div class="p-3 md:p-6">
                            <h4 class="text-xl font-bold gradient-text-checkout flex items-center gap-3">
                                <i data-lucide="receipt" class="w-6 h-6 text-purple-500"></i>
                                Order Summary
                            </h4>
                        </div>
                        <div class="p-3 md:p-6 space-y-6">
                            <!-- Order Items -->
                            <div class="space-y-4">
                                <div
                                    class="flex justify-between items-center p-4 bg-gradient-to-r from-purple-50 to-blue-50 rounded-lg">
                                    <div>
                                        <span class="text-gray-700 font-medium">Books (1)</span>
                                    </div>
                                    <div class="text-right">
                                        <span class="ml-2 font-bold text-lg gradient-text-checkout">€39.99</span>
                                    </div>
                                </div>

                                <div
                                    class="flex justify-between items-center p-4 bg-green-50 rounded-lg border border-green-200">
                                    <div class="flex items-center gap-2">
                                        <i data-lucide="tag" class="w-4 h-4 text-green-600"></i>
                                        <span class="text-green-700 font-medium">Discount (20%)</span>
                                    </div>
                                    <span class="font-bold text-green-600">-€10.01</span>
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
                            <div
                                class="bg-gradient-to-r from-purple-50 to-blue-50 px-4 py-2 rounded-xl border border-purple-200">
                                <div class="flex justify-between items-center">
                                    <span class="text-lg font-bold text-gray-900">Total</span>
                                    <div class="text-right">
                                        <span class="text-lg font-bold gradient-text-checkout"
                                            id="cart-total">€39.99</span>
                                        <p class="text-xs text-gray-500 mt-1">Including VAT</p>
                                    </div>
                                </div>
                            </div>

                            <!-- Continue Button -->
                            <button id="continue-to-delivery"
                                class="w-full py-4 px-6 text-white font-bold rounded-xl bg-gradient-to-r from-purple-600 to-blue-600 hover:from-purple-700 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                <div class="flex items-center justify-center gap-3">
                                    <span>Continue to Delivery</span>
                                    <i data-lucide="arrow-right" class="w-5 h-5"></i>
                                </div>
                            </button>

                            <!-- Enhanced Trust Indicators -->
                            <div class="grid grid-cols-1 gap-4 pt-4">
                                <div class="trust-indicator">
                                    <i data-lucide="shield-check" class="w-8 h-8 mx-auto mb-2"></i>
                                    <div class="text-sm font-bold">100% Secure Payment</div>
                                    <div class="text-xs mt-1">SSL encrypted & protected</div>
                                </div>
                                <div class="trust-indicator">
                                    <i data-lucide="truck" class="w-8 h-8 mx-auto mb-2"></i>
                                    <div class="text-sm font-bold">Fast & Free Delivery</div>
                                    <div class="text-xs mt-1">5-7 business days</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-6xl m-auto rounded-lg sticky md:hidden bottom-0">
            <div class="p-4 bg-white border-t border-gray-200">
                <div class="flex items-center justify-between text-xs">
                    <div class="flex flex-col items-center text-purple-600">
                        <div class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center mb-1">
                            <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                        </div>
                        <span class="font-semibold">Cart</span>
                    </div>
                    <div class="flex flex-col items-center text-gray-400">
                        <div class="w-8 h-8 border-2 border-gray-300 rounded-full flex items-center justify-center mb-1">
                            <i data-lucide="truck" class="w-4 h-4"></i>
                        </div>
                        <span>Delivery</span>
                    </div>
                    <div class="flex flex-col items-center text-gray-400">
                        <div class="w-8 h-8 border-2 border-gray-300 rounded-full flex items-center justify-center mb-1">
                            <i data-lucide="credit-card" class="w-4 h-4"></i>
                        </div>
                        <span>Payment</span>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection

@push('scripts')
    <script src="{{ asset('frontend/js/checkout.js') }}"></script>
@endpush
