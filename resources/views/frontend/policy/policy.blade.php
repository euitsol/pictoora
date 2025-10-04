@extends('frontend.layouts.master')

@section('content')
    <!-- Hero Section -->
    <section class="bg-purple-100 py-20">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-4xl font-bold gradient-text mb-6">
                Our Policies
            </h2>
            <p class="text-lg text-gray-700 max-w-3xl mx-auto">
                At Pictoora, your trust means everything to us. These policies explain how we protect your privacy, handle
                your orders,
                and ensure that every family has a safe and enjoyable experience with our personalized storybooks.
            </p>
        </div>
    </section>

    <!-- Privacy & Data Policy -->
    <section class="container mx-auto px-6 py-16" id="privacy_policy">
        <div class="max-w-4xl mx-auto space-y-12">
            <div class="space-y-6">
                <h2 class="text-2xl font-bold gradient-text">Privacy & Data Policy</h2>
                <p class="text-gray-700">
                    We take your privacy seriously. Here’s how we handle your information:
                </p>
                <ul class="list-disc pl-6 text-gray-700 space-y-2">
                    <li><strong>Information we collect:</strong> Name, contact details, order history, shipping information,
                        and uploaded personalization details.</li>
                    <li><strong>How we use it:</strong> To process orders, customize your storybooks, improve our platform,
                        and (with your consent) share updates or offers.</li>
                    <li><strong>How we protect it:</strong> Your data is encrypted and secured against unauthorized access.
                        We never sell your information.</li>
                </ul>
                <p class="text-gray-700">
                    You have the right to access, update, or request deletion of your personal information at any time.
                </p>
            </div>
        </div>
    </section>

    <!-- Refund & Return Policy -->
    <section class="container mx-auto px-6 py-16 rounded-xl" id="refund_policy">
        <div class="max-w-4xl mx-auto space-y-12">
            <div class="space-y-6">
                <h2 class="text-2xl font-bold gradient-text">Refund & Return Policy</h2>
                <p class="text-gray-700">
                    Since Pictoora storybooks are personalized and made uniquely for each child, we do not accept returns
                    once an order is printed.
                    However, we always want you to be delighted with your purchase:
                </p>
                <ul class="list-disc pl-6 text-gray-700 space-y-2">
                    <li>If your book arrives damaged or with a printing error, we will replace it free of charge.</li>
                    <li>If there was a mistake in your order caused by our team, we will correct it immediately.</li>
                    <li>Refunds may be issued on a case-by-case basis if we are unable to provide a corrected product.</li>
                </ul>
                <p class="text-gray-700">
                    Please reach out within <strong>7 days of delivery</strong> if you experience an issue with your order.
                </p>
            </div>
        </div>
    </section>

    <!-- Children’s Data & Safety Policy -->
    <section class="container mx-auto px-6 py-16" id="children_data_policy">
        <div class="max-w-4xl mx-auto space-y-12">
            <div class="space-y-6">
                <h2 class="text-2xl font-bold gradient-text">Children’s Data & Safety Policy</h2>
                <p class="text-gray-700">
                    Our mission is to create safe, magical experiences for children. Protecting their information is at the
                    heart of our work:
                </p>
                <ul class="list-disc pl-6 text-gray-700 space-y-2">
                    <li>We only collect child-related details (such as name and appearance options) that are necessary to
                        create personalized books.</li>
                    <li>We never share or sell children’s data to third parties.</li>
                    <li>Parents or guardians have full control over what information is shared with us.</li>
                    <li>Any uploaded content is used solely to create your product and securely deleted after processing.
                    </li>
                </ul>
            </div>
        </div>
    </section>

    <!-- Data Deletion Policy -->
    <section class="container mx-auto px-6 py-16 bg-white" id="data_deletion_policy">
        <div class="max-w-4xl mx-auto space-y-12">
            <div class="space-y-6">
                <h2 class="text-2xl font-bold gradient-text">Data Deletion Policy</h2>
                <p class="text-gray-700">
                    At Pictoora, we believe in giving families full control over their personal information. If you no
                    longer wish
                    for us to store your data, you can request its deletion at any time.
                </p>
                <ul class="list-disc pl-6 text-gray-700 space-y-2">
                    <li><strong>Requesting deletion:</strong> Send us a written request via email at <a
                            href="mailto:info@pictoora.com"
                            class="text-indigo-600 hover:underline">info@pictoora.com</a>.</li>
                    <li><strong>Processing time:</strong> We aim to review and process all deletion requests within
                        <strong>7 business days</strong>.</li>
                    <li><strong>What we delete:</strong> Personal details (name, contact info), personalization data
                        (child’s name, appearance settings, uploaded content), and order history if required.</li>
                    <li><strong>What we retain:</strong> Limited transactional records may be kept for tax, legal, or
                        fraud-prevention purposes, as required by law.</li>
                    <li><strong>Confirmation:</strong> Once deletion is complete, we will confirm by email.</li>
                </ul>
                <p class="text-gray-700">
                    By ensuring easy access to deletion, we protect your privacy while respecting the magical memories you
                    create with us.
                </p>
            </div>
        </div>
    </section>


    <!-- Contact Section -->
    <section class="py-16 bg-purple-50">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-2xl font-bold gradient-text mb-4">Questions About Our Policies?</h2>
            <p class="text-gray-700 mb-6">
                If you have any questions, concerns, or special requests, please <a href="{{ route('contact.index') }}"
                    class="text-purple-600 hover:text-purple-700 transition-colors">contact us</a>
            </p>
        </div>
    </section>
@endsection
