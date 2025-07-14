@extends('frontend.layouts.master')

@section('content')

    @include('frontend.home.sections.hero')
    @include('frontend.home.sections.how-to')
    @include('frontend.home.sections.story')
    @include('frontend.home.sections.slider')
    @include('frontend.home.sections.expressions')
    @include('frontend.home.sections.books')
    @include('frontend.home.sections.adventure')
    @include('frontend.home.sections.reviews')
    @include('frontend.home.sections.features')
    @include('frontend.home.sections.faq')
    @include('frontend.home.sections.footer-top')

@endsection

@push('scripts')
    <script src="{{ asset('frontend/js/home.js') }}"></script>
@endpush

