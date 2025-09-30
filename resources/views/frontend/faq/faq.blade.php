@extends('frontend.layouts.master')

@push('styles')
<style>
    .faq-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .faq-item {
        border-bottom: 1px solid #E5E7EB;
        transition: all 0.3s ease;
    }

    .faq-question {
        cursor: pointer;
        position: relative;
        text-align: center;
    }

    .faq-question::after {
        content: '+';
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        font-size: 24px;
        color: #667eea;
        transition: all 0.3s ease;
    }

    .faq-item.active .faq-question::after {
        content: '-';
        transform: translateY(-50%);
    }

    /* Removed max-height and added display: none for JS control */
    .faq-answer {
        display: none;
    }
</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class=" bg-purple-100 py-16">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl sm:text-4xl lg:text-4xl font-bold gradient-text mb-6">
            Frequently Asked Questions
        </h2>
        <p class="text-lg text-gray-700 max-w-1xl mx-auto">
            Find answers to common questions about Pictoora's personalized children's books and services.
        </p>
    </div>
</section>

<!-- FAQ Section -->
<section class="py-16">
    <div class="container mx-auto px-6">
       
                    <div class="faq-item bg-white rounded-lg shadow-md p-6 ">
                        <div class="faq-question text-lg font-semibold text-gray-700">
                            What is Pictoora?
                        </div>
                        <div class="faq-answer pt-4 text-gray-700">
                            Pictoora is a platform that creates personalized children's books, where your child becomes the star of their own story. We combine storytelling with customization to make reading more engaging and personal.
                        </div>
                    </div>

                    <div class="faq-item bg-white rounded-lg shadow-md p-6 ">
                        <div class="faq-question text-lg font-semibold text-gray-700">
                            How long does the creation process take?
                        </div>
                        <div class="faq-answer pt-4 text-gray-700">
                            The creation process typically takes 2-3 business days from order to completion. This includes personalization, quality checks, and preparation for shipping.
                        </div>
                    </div>
           
                    <div class="faq-item bg-white rounded-lg shadow-md p-6 ">
                        <div class="faq-question text-lg font-semibold text-gray-700">
                            How can I track my order?
                        </div>
                        <div class="faq-answer pt-4 text-gray-700">
                            Once your order ships, you'll receive a tracking number via email. You can use this to track your package's journey to your doorstep.
                        </div>
                    </div>

                    <div class="faq-item bg-white rounded-lg shadow-md p-6 ">
                        <div class="faq-question text-lg font-semibold text-gray-700">
                            What are your shipping options?
                        </div>
                        <div class="faq-answer pt-4 text-gray-700">
                            We offer standard shipping (5-7 business days) and express shipping (2-3 business days) options. International shipping is available for select countries.
                        </div>
                    </div>
         
                    <div class="faq-item bg-white rounded-lg shadow-md p-6  ">
                        <div class="faq-question text-lg font-semibold text-gray-700">
                            What can I customize in the book?
                        </div>
                        <div class="faq-answer pt-4 text-gray-700">
                            You can customize your child's name, appearance, and certain story elements. Some books also allow for personalized dedications and photo inclusions.
                        </div>
                    </div>

                    <div class="faq-item bg-white rounded-lg shadow-md p-6 ">
                        <div class="faq-question text-lg font-semibold text-gray-700">
                            Can I preview my customized book?
                        </div>
                        <div class="faq-answer pt-4 text-gray-700">
                            Yes! Our interactive preview system allows you to see exactly how your personalized book will look before placing your order.
                        </div>
                    </div>
       
    </div>
</section>
@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    $('.faq-question').on('click', function() {
        const $item = $(this).closest('.faq-item');
        const $answer = $item.find('.faq-answer');
        const isActive = $item.hasClass('active');

        // Close all other items
        $('.faq-item').not($item).removeClass('active').find('.faq-answer').slideUp(200);

        // Toggle current item
        if (!isActive) {
            $item.addClass('active');
            $answer.slideDown(200);
        } else {
            $item.removeClass('active');
            $answer.slideUp(200);
        }
    });
});
</script>
@endpush
