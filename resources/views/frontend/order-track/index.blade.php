@extends('frontend.layouts.master')

@push('styles')
@endpush

@section('content')
  <!-- Order Search Section -->
  <section class="py-10 bg-purple-100 h[70vh] flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-xl p-10 max-w-md w-full text-center relative">
      <!-- Close button -->
      <button onclick="window.location.href='{{ route('home.index') }}'" 
        class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
         <i data-lucide="x" class="mr-3 text-indigo-600"></i>
      </button>

  

      <!-- Heading -->
      <h2 class="text-2xl font-bold gradient-text  mb-2">Track Your Order</h2>

      <!-- Message -->
      <p class="text-gray-600 mb-6">
        Enter your order ID below to check the status of your purchase.
      </p>

      <!-- Form -->
      <form action="" method="GET" class="space-y-4">
        <input type="text" name="order_id" placeholder="Enter Order ID"
          class="w-full px-4 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-400 text-gray-700" required>
        
        <button type="submit" 
          class="w-full bg-purple-600 hover:bg-purple-700 text-white font-semibold py-3 px-6 rounded-lg shadow-md transition">
          Search Order
        </button>
      </form>
    </div>
  </section>
@endsection
