@extends('frontend.layouts.master')
@push('styles')
<meta name="viewport" content="width=device-width, initial-scale=1">
 <script src="https://cdn.tailwindcss.com"></script>
@endpush
@section('content')
   <!-- Hero / Banner -->
  <section class=" py-20 ">
    <div class="container mx-auto px-6 text-center">
      <h1 class="text-4xl md:text-4xl lg:text-4xl font-bold gradient-text mb-6">
        Privacy Policy
      </h1>
      <p class="text-lg text-gray-700 max-w-2xl mx-auto">
        At Pictoora, we take your privacy seriously. This policy outlines how we collect, use, and protect your personal information.
      </p>
    </div>
  </section>

  <!-- Policy Content -->
  <section class="container mx-auto px-6 py-16">
    <div class="max-w-4xl mx-auto space-y-12">
      <div class="space-y-6">
        <h2 class="text-2xl font-bold gradient-text">Information We Collect</h2>
        <p class="text-gray-700">
          We collect information that you provide directly to us, including:
        </p>
        <ul class="list-disc pl-6 text-gray-700 space-y-2">
          <li>Name and contact information</li>
          <li>Billing and shipping information</li>
          <li>Order history and preferences</li>
          <li>Communications with our customer service</li>
        </ul>
      </div>

      <div class="space-y-6">
        <h2 class="text-2xl font-bold gradient-text">How We Use Your Information</h2>
        <p class="text-gray-700">
          We use the information we collect to:
        </p>
        <ul class="list-disc pl-6 text-gray-700 space-y-2">
          <li>Process and fulfill your orders</li>
          <li>Communicate with you about your orders</li>
          <li>Improve our products and services</li>
          <li>Send you marketing communications (with your consent)</li>
        </ul>
      </div>

      <div class="space-y-6">
        <h2 class="text-2xl font-bold gradient-text">Data Security</h2>
        <p class="text-gray-700">
          We implement appropriate security measures to protect your personal information from unauthorized access, alteration, disclosure, or destruction.
        </p>
      </div>

      <div class="space-y-6">
        <h2 class="text-2xl font-bold gradient-text">Your Rights</h2>
        <p class="text-gray-700">
          You have the right to:
        </p>
        <ul class="list-disc pl-6 text-gray-700 space-y-2">
          <li>Access your personal information</li>
          <li>Correct inaccurate information</li>
          <li>Request deletion of your information</li>
          <li>Opt-out of marketing communications</li>
        </ul>
      </div>
    </div>
  </section>

  <!-- Contact Section -->
  <section class="bg-[#EEF2FF] py-16">
    <div class="container mx-auto px-6 text-center">
      <h2 class="text-2xl font-bold gradient-text mb-4">Questions About Our Policy?</h2>
      <p class="text-gray-700 mb-6">
        If you have any questions about our privacy policy, please contact us at:
      </p>
      <p class="text-gray-700">
        Email: privacy@pictoora.com<br>
        Phone: +1 (800) 123-4567
      </p>
    </div>
  </section>
@endsection