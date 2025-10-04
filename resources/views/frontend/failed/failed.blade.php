@extends('frontend.layouts.master')

@push('styles')
@endpush

@section('content')
    <!-- Success Section -->
    <section class="py-20 bg-purple-100 min-h-screen flex items-center justify-center">
        <div class="bg-white rounded-2xl shadow-xl p-10 max-w-md text-center relative">
            <!-- Close button -->
            <button onclick="window.location.href='{{ route('home.index') }}'"
                class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
            </button>

            <!-- Success Icon -->
            <div class="flex justify-center mb-6">
                <div class="bg-red-500 rounded-full p-6 shadow-lg">
                    <i data-lucide="x" class="h-16 w-16 text-white"></i>
                </div>
            </div>

            <!-- Heading -->
            <h2 class="text-2xl font-bold gradient-text  mb-2">Payment Failed </h2>

            <!-- Message -->
            <p class="text-gray-600 mb-6">
                Your payment has been unsuccessful. <br>
                Please try again or contact support for assistance.
            </p>

            <!-- Button -->
            <a href="{{ route('home.index') }}"
                class="bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition">
                Back to Home
            </a>
        </div>
    </section>
@endsection
