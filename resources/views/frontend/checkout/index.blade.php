@extends('frontend.layouts.master')

@push('styles')
   <link rel="stylesheet" href="{{ asset('frontend/css/checkout.css') }}">
   <style>
    .gm-style-iw-chr {
        position: absolute !important;
        right: 0 !important;
    }
    .custom-info-window {
        padding: 0;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        min-height: 5rem !important;
    }

    .info-window-header {
        background: linear-gradient(135deg, #6A6FD5, #8E94F2);
        color: white;
        padding: 12px 16px;
        display: flex;
        align-items: center;
        gap: 4px;
    }

    .info-window-header h3 {
        margin: 0;
        font-size: 16px;
        font-weight: 600;
    }
    .info-window-header small {
        font-size: 8px;
    }

    .info-window-body {
        padding: 16px;
        background: white;
    }

    .gm-style .gm-style-iw-c {
        padding: 0 !important;
        border-radius: 12px !important;
    }

    .gm-style .gm-style-iw-d {
        overflow: hidden !important;
    }
    .gm-style .gm-style-iw-t::after {
        background: linear-gradient(135deg, #6A6FD5, #8E94F2) !important;
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
                                class="cart-step-btn step flex items-center justify-center w-12 h-12 rounded-full border-2 step-active cursor-pointer"
                                data-step="1">
                                <i data-lucide="shopping-cart" class="w-6 h-6"></i>
                            </div>
                            <span id="step-1-text"
                                class="cart-step-btn step-text mt-3 font-semibold text-center text-active cursor-pointer text-sm md:text-lg"
                                data-step="1">Cart</span>
                            <span class="hidden md:block text-sm text-gray-500 mt-1">Review items</span>
                        </div>

                        <!-- Step 2 -->
                        <div class="flex flex-col items-center relative z-10">
                            <div id="step-2"
                                class="delivery-step-btn step flex items-center justify-center w-12 h-12 rounded-full border-2 step-inactive cursor-pointer"
                                data-step="2">
                                <i data-lucide="truck" class="w-6 h-6"></i>
                            </div>
                            <span id="step-2-text"
                                class="delivery-step-btn step-text mt-3 font-semibold text-center text-inactive cursor-pointer text-sm md:text-lg"
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
            @include('frontend.checkout.sections.cart')
            @include('frontend.checkout.sections.delivery')
            @include('frontend.checkout.sections.payment')
        </div>

        <div class="max-w-6xl m-auto rounded-lg sticky md:hidden bottom-0">
            <div class="p-4 bg-white border-t border-gray-200">
                <div class="flex items-center justify-between text-xs">
                    <div class="flex flex-col items-center text-purple-600 cart-step-btn">
                        <div class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center mb-1">
                            <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                        </div>
                        <span class="font-semibold">Cart</span>
                    </div>
                    <div class="flex flex-col items-center text-gray-400 delivery-step-btn">
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
    {{-- <script src="https://maps.googleapis.com/maps/api/js?key={{ config('app.gmap_api_key') }}&libraries=places" async></script> --}}
    <script async
    src="https://maps.googleapis.com/maps/api/js?key={{ config('app.gmap_api_key') }}&loading=async&callback=initMap">
    </script>


    <script src="{{ asset('frontend/js/map.js') }}"></script>
@endpush
