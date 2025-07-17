@extends('frontend.layouts.master')

@push('styles')
@endpush

@section('content')

    <section class="bg-white">
        <div class="container mx-auto px-4 py-12">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <div class="rounded-2xl p-8 shadow-2xl bg-gradient-to-r from-purple-50 to-blue-50">
                        <div class="rounded-2xl p-6 shadow-lg flex items-center justify-center">
                            <img alt="The Magical Adventure of Luna - Personalized Children's Book"
                                class="aspect-[1/1] object-contain rounded-lg shadow-md"
                                src="{{ asset('frontend/img/book/book-7.webp') }}">
                        </div>
                        <div class="absolute -top-4 -right-0 md:-right-4 bg-amber-400/70 text-yellow-900 px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                            Bestseller</div>
                    </div>
                </div>
                <div class="space-y-6 bg-gradient-to-r from-purple-50 to-blue-50 rounded-2xl p-6 shadow-lg border">
                    <div>
                        <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-hidden focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent hover:bg-secondary/80 mb-3 bg-purple-100 text-purple-700">
                            Personalized Children's Book</div>
                        <h1 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-4">The Magical Adventure of Luna</h1>
                        <div class="flex items-center space-x-4 mb-4">
                            <div class="flex items-center">
                                <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-yellow-400"></i>
                                <i data-lucide="star" class="w-5 h-5 text-yellow-400 fill-yellow-400"></i>
                                <span class="text-gray-600">(127 reviews)</span>
                            </div>
                        </div>
                        <p class="text-xl text-gray-600 leading-relaxed">Create a magical personalized story where your
                            child
                            becomes the hero of their own adventure. Each book is uniquely crafted with your child's name,
                            appearance, and preferences.</p>
                    </div>
                    <div class="bg-white rounded-2xl p-6 shadow-lg border">
                        <div class="flex items-center justify-between mb-4">
                            <div>
                                <span class="text-3xl font-bold text-gray-900">$24.99</span>
                                <span class="text-lg text-gray-500 line-through ml-2">$34.99</span>
                            </div>
                            <div class="inline-flex items-center rounded-full border px-2.5 py-0.5 text-xs font-semibold transition-colors focus:outline-hidden focus:ring-2 focus:ring-ring focus:ring-offset-2 border-transparent bg-destructive text-destructive-foreground hover:bg-destructive/80">
                                30% OFF</div>
                        </div>
                        <div class="space-y-4">
                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <span class="text-gray-600">Format:</span>
                                    <p class="font-semibold">Digital + Print</p>
                                </div>
                                <div>
                                    <span class="text-gray-600">Pages:</span>
                                    <p class="font-semibold">24 pages</p>
                                </div>
                                <div>
                                    <span class="text-gray-600">Age Range:</span>
                                    <p class="font-semibold">3-8 years</p>
                                </div>
                                <div>
                                    <span class="text-gray-600">Delivery:</span>
                                    <p class="font-semibold">Instant</p>
                                </div>
                            </div>
                            <div data-orientation="horizontal" role="none" class="shrink-0 bg-border h-px w-full"></div>
                            <div class="space-y-3">
                                <button
                                    class="ring-offset-background focus-visible:outline-hidden focus-visible:ring-ring inline-flex items-center justify-center gap-2 whitespace-nowrap font-medium transition-colors focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 text-primary-foreground h-11 rounded-md px-8 w-full bg-purple-600 hover:bg-purple-700 text-lg py-6">
                                    Create Your Child's Story Now
                                    <i data-lucide="arrow-right" class="w-5 h-5 text-white"></i>
                                </button>
                                <div class="flex space-x-2">
                                    <button
                                        class="ring-offset-background focus-visible:outline-hidden focus-visible:ring-ring inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-colors focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border-input hover:bg-accent hover:text-accent-foreground border h-11 rounded-md px-8 flex-1 bg-transparent">
                                        <i data-lucide="heart" class="w-5 h-5 text-white"></i>
                                        Save
                                    </button>
                                    <button
                                        class="ring-offset-background focus-visible:outline-hidden focus-visible:ring-ring inline-flex items-center justify-center gap-2 whitespace-nowrap text-sm font-medium transition-colors focus-visible:ring-2 focus-visible:ring-offset-2 disabled:pointer-events-none disabled:opacity-50 [&amp;_svg]:pointer-events-none [&amp;_svg]:size-4 [&amp;_svg]:shrink-0 border-input hover:bg-accent hover:text-accent-foreground border h-11 rounded-md px-8 flex-1 bg-transparent">
                                        <i data-lucide="share2" class="w-5 h-5 text-white"></i>
                                        Share
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4 text-sm text-gray-600">
                        <div class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 text-green-500 mr-1"></i>
                            30-day money-back guarantee
                        </div>
                        <div class="flex items-center">
                            <i data-lucide="check" class="w-5 h-5 text-green-500 mr-1"></i>
                            Instant digital delivery
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
@endpush
