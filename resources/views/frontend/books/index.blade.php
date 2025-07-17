@extends('frontend.layouts.master')

@push('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>

        /* Custom styles for sheet/drawer */
        .sheet-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 49; /* Below sheet content */
            opacity: 0;
            transition: opacity 0.3s ease-in-out;
            pointer-events: none; /* Allows clicks to pass through when hidden */
        }
        .sheet-overlay.open {
            opacity: 1;
            pointer-events: auto;
        }
        .sheet-content {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            height: 0; /* Start collapsed */
            max-height: 85vh;
            overflow: hidden;
            z-index: 50;
            transform: translateY(100%); /* Start off-screen */
            transition: transform 0.3s ease-in-out, height 0.3s ease-in-out;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }
        .sheet-content.open {
            height: 85vh; /* Expand to 85% height */
            transform: translateY(0);
        }
        .sheet-header {
            padding: 1rem;
            border-bottom: 1px solid #e9d5ff; /* border-purple-200 */
        }
        .sheet-title {
            font-size: 1.125rem; /* text-lg */
            font-weight: 600; /* font-semibold */
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        .sheet-body {
            padding: 1rem;
            overflow-y: auto;
            height: calc(100% - 60px); /* Adjust based on header height */
            padding-bottom: 5rem; /* Space for clear all button */
        }

        /* Collapsible desktop content */
        .collapsible-content {
            max-height: 0;
            opacity: 0;
            transition: max-height 0.3s ease-in-out, opacity 0.3s ease-in-out;
        }
        .collapsible-content.open {
            max-height: 24rem; /* max-h-96 */
            opacity: 1;
        }

        /* Custom checkbox styling to mimic shadcn's data-[state=checked] */
        input[type="checkbox"].peer:checked {
            background-image: linear-gradient(to right, var(--tw-gradient-from), var(--tw-gradient-to));
            --tw-gradient-from: #8b5cf6; /* purple-500 */
            --tw-gradient-to: #3b82f6; /* blue-500 */
            border-color: transparent; /* Hide border when checked */
        }
        input[type="checkbox"].peer:checked + svg { /* For the checkmark icon */
            display: block;
        }
        input[type="checkbox"].peer:not(:checked) + svg {
            display: none;
        }
    </style>
@endpush

@section('content')
    @include('frontend.books.sections.top-banner')
    <div class="bg-gradient-to-r from-purple-50 to-blue-50 border-b border-purple-200 shadow-sm">
        @include('frontend.books.sections.filter')
    </div>
    <div class="bg-white container mx-auto px-4 py-8">
        @include('frontend.books.sections.products')
    </div>


@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="{{ asset('frontend/js/filter.js') }}"></script>
    <script src="{{ asset('frontend/js/book.js') }}"></script>
@endpush

