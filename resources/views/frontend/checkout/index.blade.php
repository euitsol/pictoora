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

    .map-controls-top {
        display: flex;
        gap: 10px;
        padding: 10px;
        align-items: center;
    }

    .search-container {
        position: relative;
        width: 300px;
    }

    .search-input {
        width: 100%;
        border: none;
        border-radius: 25px;
        font-size: 14px;
        outline: none;
        transition: box-shadow 0.3s ease;

        background: rgba(197, 201, 245, 0.23);
        border-radius: 16px;
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        backdrop-filter: blur(9.7px);
        -webkit-backdrop-filter: blur(9.7px);
        border: 1px solid rgba(197, 201, 245, 1);
    }

    .search-input:focus {
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.3);
    }

    .location-button {
        width: 44px;
        height: 44px;
        border: none;
        border-radius: 50%;
        background: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        color: #333;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .location-button:hover {
        background: #f8f9fa;
        transform: scale(1.05);
        color: #6A6FD5;
    }

    .location-button:active {
        transform: scale(0.95);
    }

    .location-button:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
        color: #999;
    }

    /* Zoom Controls */
    .zoom-controls {
        display: flex;
        flex-direction: column;
        gap: 1px;
        margin-right: 10px;
    }

    .zoom-button {
        width: 44px;
        height: 44px;
        border: none;
        background: white;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        color: #333;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .zoom-in {
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .zoom-out {
        border-bottom-left-radius: 8px;
        border-bottom-right-radius: 8px;
    }

    .zoom-button:hover {
        background: #f8f9fa;
        color: #6A6FD5;
    }

    .zoom-button:active {
        background: #e9ecef;
    }

    /* Style for the autocomplete dropdown */
    .pac-container {
        border-radius: 10px;
        box-shadow: 0 2px 15px rgba(0, 0, 0, 0.2);
        border: none;
        margin-top: 5px;
    }

    .pac-item {
        padding: 10px 15px;
        border-bottom: 1px solid #eee;
        cursor: pointer;
    }

    .pac-item:hover {
        background-color: #f8f9fa;
    }

    .pac-item-query {
        font-size: 14px;
        color: #333;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .search-container {
            width: 250px;
        }

        .map-controls-top {
            flex-direction: column;
            align-items: stretch;
        }

        .zoom-controls {
            margin-right: 5px;
        }

        .zoom-button {
            width: 40px;
            height: 40px;
        }
    }

    @media (max-width: 480px) {
        .search-container {
            width: 200px;
        }

        .search-input {
            font-size: 13px;
        }

        .location-button {
            width: 40px;
            height: 40px;
        }

        .zoom-button {
            width: 36px;
            height: 36px;
        }

        .location-button svg,
        .zoom-button svg {
            width: 18px;
            height: 18px;
        }
    }
   </style>
@endpush

@section('content')
    <section id="checkout" class="bg-gradient-to-r from-purple-50 to-blue-50 min-h-screen">
        <div class="max-w-6xl mx-auto p-6 pb-2 pt-2 hidden md:block">
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
                                class="payment-step-btn step flex items-center justify-center w-12 h-12 rounded-full border-2 step-inactive cursor-pointer"
                                data-step="3">
                                <i data-lucide="credit-card" class="w-6 h-6"></i>
                            </div>
                            <span id="step-3-text"
                                class="payment-step-btn step-text mt-3 font-semibold text-center text-inactive cursor-pointer text-sm md:text-lg"
                                data-step="3">Checkout</span>
                            <span class="hidden md:block text-sm text-gray-500 mt-1">Secure payment</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="max-w-6xl mx-auto p-6 pt-2 pb-6 md:pb-6">
            @include('frontend.checkout.sections.cart')
            @include('frontend.checkout.sections.delivery')
            @include('frontend.checkout.sections.checkout')
        </div>

        <div class="max-w-6xl m-auto rounded-lg sticky md:hidden bottom-0">
            <div class="p-4 bg-white border-t border-gray-200">
                <div class="flex items-center justify-between text-xs">
                    <div class="flex flex-col items-center text-purple-600 cart-step-btn">
                        <div class="w-8 h-8 bg-purple-600 text-white rounded-full flex items-center justify-center mb-1 mobile-step mobile-step-1">
                            <i data-lucide="shopping-cart" class="w-4 h-4"></i>
                        </div>
                        <span class="font-semibold">Cart</span>
                    </div>
                    <div class="flex flex-col items-center text-gray-400 delivery-step-btn">
                        <div class="w-8 h-8 border-2 border-gray-300 rounded-full flex items-center justify-center mb-1 mobile-step mobile-step-2">
                            <i data-lucide="truck" class="w-4 h-4"></i>
                        </div>
                        <span>Delivery</span>
                    </div>
                    <div class="flex flex-col items-center text-gray-400 payment-step-btn">
                        <div class="w-8 h-8 border-2 border-gray-300 rounded-full flex items-center justify-center mb-1 mobile-step mobile-step-3">
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
    <script async src="https://maps.googleapis.com/maps/api/js?key={{ config('app.gmap_api_key') }}&loading=async"></script>
    <script src="{{ asset('frontend/js/map.js') }}"></script>
    <script src="{{ asset('frontend/js/payment.js') }}"></script>
@endpush
