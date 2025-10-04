@extends('frontend.layouts.master')

@section('content')
    <section class="bg-purple-100 py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold mb-6 gradient-text">
                Contact Us
            </h2>
            <p class="text-lg text-gray-700 max-w-2xl mx-auto">
                Have questions or need assistance? We're here to help! Reach out to us and we'll get back to you as soon as
                possible.
            </p>
        </div>

        <div class="container mx-auto px-6 py-16">
            <div class="flex flex-col md:flex-row gap-8 justify-between items-start">
                <!-- Contact Form -->
                <div class="w-full md:w-3/5 bg-white rounded-xl shadow-lg p-8 md:p-12">
                    <form action="#" method="POST" class="space-y-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Your Name</label>
                                <input type="text" id="name" name="name"
                                    class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                    placeholder="Enter your name" required>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                                <input type="email" id="email" name="email"
                                    class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                    placeholder="Enter your email" required>
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                            <input type="text" id="subject" name="subject"
                                class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                placeholder="Enter the subject" required>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Your Message</label>
                            <textarea id="message" name="message" rows="6"
                                class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500"
                                placeholder="Write your message" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="relative overflow-hidden bg-gradient-to-r bg-purple-600 text-white hover:bg-purple-700 px-8 py-3 rounded-md shadow-md transition-all duration-300 transform hover:-translate-y-1 hover:shadow-lg">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="w-full md:w-2/5 bg-white rounded-xl shadow-lg p-8 md:p-12 flex flex-col justify-center">
                    <h2 class="text-2xl font-bold mb-4 gradient-text">Contact Information</h2>
                    <p class="text-gray-600 mb-6">
                        If you have any questions, feel free to reach out to us through the contact form or use the details
                        below:
                    </p>
                    <ul class="space-y-4 text-gray-700">
                        <li class="flex items-start">
                            <i data-lucide="map-pin-house" class="mr-3 text-indigo-600"></i>
                            <span>123 Pictoora Lane, Creativity City, Imagination State</span>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="mail-check" class="mr-3 text-indigo-600"></i>
                            <a href="mailto:info@pictoora.com" class="hover:text-indigo-500">
                                info@pictoora.com
                            </a>
                        </li>
                        <li class="flex items-center">
                            <i data-lucide="phone" class="mr-3 text-indigo-600"></i>
                            <a href="tel:+18001234567" class="hover:text-indigo-500">
                                +1 (800) 123-4567
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
<script src="https://www.google.com/recaptcha/api.js?render={{ config('services.google_recaptcha.site_key') }}"></script>
@endpush
