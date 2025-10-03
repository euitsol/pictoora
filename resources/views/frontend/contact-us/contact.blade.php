@extends('frontend.layouts.master')
@push('styles')
    <style>
        .form-container {
            width: 60%;
            padding-right: 2rem;
        }

        .info-container {
            width: 40%;
            padding-left: 2rem;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
        }

        .submit-btn {
            background: linear-gradient(to right, #4F46E5, #3730A3);
            position: relative;
            overflow: hidden;
        }

        .submit-btn::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, #3730A3, #4F46E5);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .submit-btn:hover::after {
            opacity: 1;
        }

        @media (max-width: 768px) {

            .form-container,
            .info-container {
                width: 100%;
                padding-right: 0;
                padding-left: 0;
            }

            .info-container {
                margin-top: 2rem;
            }
        }
    </style>
@endpush
@section('content')
    <section class="bg-purple-100 py-16 ">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl md:text-4xl font-bold text-indigo-700 mb-6 gradient-text">
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
                                    class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    placeholder="Enter your name" required>
                            </div>
                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-700">Your Email</label>
                                <input type="email" id="email" name="email"
                                    class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                    placeholder="Enter your email" required>
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="block text-sm font-medium text-gray-700">Subject</label>
                            <input type="text" id="subject" name="subject"
                                class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                placeholder="Enter the subject" required>
                        </div>
                        <div>
                            <label for="message" class="block text-sm font-medium text-gray-700">Your Message</label>
                            <textarea id="message" name="message" rows="6"
                                class="w-full mt-2 px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500"
                                placeholder="Write your message" required></textarea>
                        </div>
                        <div class="text-center">
                            <button type="submit"
                                class="bg-indigo-400 text-white px-8 py-3 rounded-md shadow-md hover:shadow-lg transition-all duration-300 transform hover:-translate-y-1">
                                Send Message
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Contact Info -->
                <div class="w-full md:w-2/5 bg-white rounded-xl shadow-lg p-8 md:p-12">
                    <h2 class="text-2xl font-bold text-indigo-700 mb-4 gradient-text">Contact Information</h2>
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
                            <a href="mailto:support@pictoora.com" class="hover:text-indigo-500">
                                support@pictoora.com
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
