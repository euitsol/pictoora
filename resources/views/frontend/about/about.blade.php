@extends('frontend.layouts.master')
@push('styles')
@endpush
@section('content')

    <section class="py-20 bg-purple-100">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl sm:text-4xl font-extrabold gradient-text">
                About Pictoora
            </h2>
            <p class="mt-4 text-xl text-gray-700 max-w-2xl mx-auto">
                Pictoora began with a simple idea: stories should feel personal, magical, and unforgettable.
                What started as a passion project between two parents quickly grew into a mission to help
                families everywhere feel seen, celebrated, and connected. One story at a time.
            </p>
        </div>
    </section>

    <section class="container mx-auto px-6 py-16 flex flex-col md:flex-row items-center gap-12">
        <div class="md:w-1/2">
            <img src="https://staging.pictoora.com/frontend/img/adventure/adventure-1.webp" alt="Our story"
                class="rounded-lg shadow-lg  mx-auto" />
        </div>
        <div class="md:w-1/2 space-y-6 text-gray-700">
            <h2 class="text-3xl font-bold gradient-text">Our Story</h2>
            <p class="text-justify sm:text-justify">
                We’re a husband-and-wife team who first met while building world-class technology at Google.
                Back then, we were designing solutions for millions of people until life gifted us a new role:
                parents to a little girl who inspired us to dream bigger.
            </p>
            <p class="text-justify sm:text-justify">
                Becoming parents changed everything. We wanted to create something meaningful not just for our child,
                but for families everywhere. So, with a small team of passionate creators, we built a personalization
                engine that transforms ordinary moments into extraordinary storybooks. Each book becomes more than just
                a story it’s a keepsake, a smile, and a legacy.
            </p>
            <p class="text-justify sm:text-justify">
                Today, Pictoora is a growing community of dreamers, parents, and artists united by a single mission:
                to bring magic and belonging into every child’s story.
            </p>
        </div>
    </section>

@endsection
