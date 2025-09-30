@extends('frontend.layouts.master')

@push('styles')
@endpush

@section('content')
  <!-- Success Section -->
  <section class="py-20 bg-purple-100 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl p-10 max-w-md text-center relative">
      <!-- Close button -->
      <button onclick="window.location.href='{{ url('/') }}'" 
        class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
        ✕
      </button>

      <!-- Success Icon -->
      <div class="flex justify-center mb-6">
        <div class="bg-green-500 rounded-full p-6 shadow-lg">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white" 
            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
          </svg>
        </div>
      </div>

      <!-- Heading -->
      <h2 class="text-2xl font-bold text-gray-800 mb-2">Payment Successful 🎉</h2>

      <!-- Message -->
      <p class="text-gray-600 mb-6">
        Your payment has been successfully processed. <br>
        You can now go to the homepage & discover new products.
      </p>

      <!-- Button -->
      <a href="{{ url('/') }}" 
         class="bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition">
        Continue Shopping
      </a>
    </div>
  </section>
@endsection
