<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        {!! SEO::generate() !!}

        <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])


        @include('frontend.includes.style-bundle')
    </head>

    <body class="">
        <div id="wrapper">
            <div id="content">
                @include('frontend.includes.header')
                <div class="min-h-screen">
                    @yield('content')
                </div>
                @include('frontend.includes.footer')
            </div>
        </div>
        @include('frontend.includes.discount-popup')
        @include('frontend.includes.script-bundle')
    </body>
</html>
