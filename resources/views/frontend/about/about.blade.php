@extends('frontend.layouts.master')
@push('styles')
@endpush
@section('content')
   <!-- Hero / Banner -->
  <section class="bg-blue-50 py-20 mt-6">
    <div class="container mx-auto px-6 text-center">
      <h1 class="text-4xl sm:text-4xl font-extrabold gradient-text">
        About Pictoora
      </h1>
      <p class="mt-4 text-xl text-gray-700 max-w-2xl mx-auto">
        At Pictoora, we believe in weaving wonder and personalization into every story. We bring your child’s imagination into the heart of every book — where their name, their style, and their adventures shine.
      </p>
    </div>
  </section>

  <!-- Our Story Section -->
  <section class="container mx-auto px-6 py-16 flex flex-col md:flex-row items-center gap-12">
    <div class="md:w-1/2">
      <img src="https://staging.pictoora.com/frontend/img/adventure/adventure-1.webp" alt="Our story" class="rounded-lg shadow-lg  mx-auto" />
    </div>
    <div class="md:w-1/2 space-y-6 text-gray-700">
      <h2 class="text-3xl font-bold gradient-text">Our Journey</h2>
      <p>
        Founded by story-lovers and creatives, Pictoora started with a simple mission: to make children feel *seen* in the stories they explore. We saw that many storybooks treat characters as distant or generic — so we set out to change that.
      </p>
      <p>
        From custom illustrations to dynamic styles, every feature in our platform is designed to reflect *your child’s personality*. Over time, we’ve grown into a community of parents, artists, and dreamers who believe in magic, kindness, and creativity.
      </p>
    </div>
  </section>

@endsection