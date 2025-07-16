<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        {!! SEO::generate() !!}

        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @include('frontend.includes.style-bundle')
    </head>

    <body>
        @include('frontend.includes.header')
        @yield('content')
        @include('frontend.includes.footer')
        @include('frontend.includes.discount-popup')
        @include('frontend.includes.script-bundle')
    </body>
</html>
