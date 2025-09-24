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
        padding-right: 40px;
        text-align: center;
    }
.faq-question::after {
        content: '+';
        position: absolute;
        right: 0;
        top: 50%;
        transform: translateY(-50%);
        font-size: 24px;
        color: #4F46E5;
        transition: all 0.3s ease;
    }

    .faq-item.active .faq-question::after {
        content: '-';
        transform: translateY(-50%);
    }

    .faq-answer {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease;
    }

    .faq-item.active .faq-answer {
        max-height: 500px;
    }

</style>
@endpush

@section('content')
<!-- Hero Section -->
<section class="bg-[#EEF2FF] py-16 mt-[30px]">
    <div class="container mx-auto px-6 text-center">
        <h1 class="text-3xl sm:text-3xl lg:text-5xl font-bold gradient-text mb-6">
            Frequently Asked Questions
        </h1>
        <p class="text-lg text-[#374151] max-w-1xl mx-auto">
            Find answers to common questions about Pictoora's personalized children's books and services.
        </p>
    </div>
</section>

<!-- FAQ Section -->
<!-- FAQ Section -->
<section class="py-16">
    <div class="container mx-auto px-6">
        <div class="space-y-16">
            <!-- General Questions -->
            <div id="general" class="faq-container">
               
                <div class="space-y-4">
                    <div class="faq-item bg-white rounded-lg shadow-md p-6">
                        <div class="faq-question text-lg font-semibold text-[#374151]">
                            What is Pictoora?
                        </div>
                        <div class="faq-answer pt-4 ">
                            Pictoora is a platform that creates personalized children's books, where your child becomes the star of their own story. We combine storytelling with customization to make reading more engaging and personal.
                        </div>
                    </div>

                    <div class="faq-item bg-white rounded-lg shadow-md p-6">
                        <div class="faq-question text-lg font-semibold text-[#374151]">
                            How long does the creation process take?
                        </div>
                        <div class="faq-answer pt-4 text-[#374151]">
                            The creation process typically takes 2-3 business days from order to completion. This includes personalization, quality checks, and preparation for shipping.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Ordering & Shipping -->
            <div id="ordering" class="faq-container mt-[20px]">
               
                <div class="space-y-4">
                    <div class="faq-item bg-white rounded-lg shadow-md p-6">
                        <div class="faq-question text-lg font-semibold text-[#374151]">
                            How can I track my order?
                        </div>
                        <div class="faq-answer pt-4 text-[#374151]">
                            Once your order ships, you'll receive a tracking number via email. You can use this to track your package's journey to your doorstep.
                        </div>
                    </div>

                    <div class="faq-item bg-white rounded-lg shadow-md p-6">
                        <div class="faq-question text-lg font-semibold text-[#374151]">
                            What are your shipping options?
                        </div>
                        <div class="faq-answer pt-4 text-[#374151]">
                            We offer standard shipping (5-7 business days) and express shipping (2-3 business days) options. International shipping is available for select countries.
                        </div>
                    </div>
                </div>
            </div>

            <!-- Book Customization -->
            <div id="customization" class="faq-container mt-[20px]">
             
                <div class="space-y-4">
                    <div class="faq-item bg-white rounded-lg shadow-md p-6">
                        <div class="faq-question text-lg font-semibold text-[#374151]">
                            What can I customize in the book?
                        </div>
                        <div class="faq-answer pt-4 text-[#374151]">
                            You can customize your child's name, appearance, and certain story elements. Some books also allow for personalized dedications and photo inclusions.
                        </div>
                    </div>

                    <div class="faq-item bg-white rounded-lg shadow-md p-6">
                        <div class="faq-question text-lg font-semibold text-[#374151]">
                            Can I preview my customized book?
                        </div>
                        <div class="faq-answer pt-4 text-[#374151]">
                            Yes! Our interactive preview system allows you to see exactly how your personalized book will look before placing your order.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-item');
    
    faqItems.forEach(item => {
        const question = item.querySelector('.faq-question');
        
        question.addEventListener('click', () => {
            const isActive = item.classList.contains('active');
            
            // Close all other items
            faqItems.forEach(otherItem => {
                otherItem.classList.remove('active');
            });
            
            // Toggle current item
            if (!isActive) {
                item.classList.add('active');
            }
        });
    });
});
</script>
@endpush
@endsection