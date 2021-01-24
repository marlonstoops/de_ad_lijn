<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="title" content="{{ config('app.name', 'Laravel') }}">
    <meta name="description" content="{{ config('app.meta.description') }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ config('app.url') }}">
    <meta property="og:title" content="{{ config('app.name', 'Laravel') }}">
    <meta property="og:description" content="{{ config('app.meta.description') }}">
    <meta property="og:image" content="{{ asset('img/icon-vertical.png') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ config('app.url') }}">
    <meta property="twitter:title" content="{{ config('app.name', 'Laravel') }}">
    <meta property="twitter:description" content="{{ config('app.meta.description') }}">
    <meta property="twitter:image" content="{{ asset('img/icon-vertical.png') }}">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1"
    >
    <meta
        name="csrf-token"
        content="{{ csrf_token() }}"
    >

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
    >

    <!-- Icons -->
    <link
        rel="apple-touch-icon"
        sizes="57x57"
        href="{{ asset('img/apple-icon-57x57.png') }}"
    >
    <link
        rel="apple-touch-icon"
        sizes="60x60"
        href="{{ asset('img/apple-icon-60x60.png') }}"
    >
    <link
        rel="apple-touch-icon"
        sizes="72x72"
        href="{{ asset('img/apple-icon-72x72.png') }}"
    >
    <link
        rel="apple-touch-icon"
        sizes="76x76"
        href="{{ asset('img/apple-icon-76x76.png') }}"
    >
    <link
        rel="apple-touch-icon"
        sizes="114x114"
        href="{{ asset('img/apple-icon-114x114.png') }}"
    >
    <link
        rel="apple-touch-icon"
        sizes="120x120"
        href="{{ asset('img/apple-icon-120x120.png') }}"
    >
    <link
        rel="apple-touch-icon"
        sizes="144x144"
        href="{{ asset('img/apple-icon-144x144.png') }}"
    >
    <link
        rel="apple-touch-icon"
        sizes="152x152"
        href="{{ asset('img/apple-icon-152x152.png') }}"
    >
    <link
        rel="apple-touch-icon"
        sizes="180x180"
        href="{{ asset('img/apple-icon-180x180.png') }}"
    >
    <link
        rel="icon"
        type="image/png"
        sizes="192x192"
        href="{{ asset('img/android-icon-192x192.png') }}"
    >
    <link
        rel="icon"
        type="image/png"
        sizes="32x32"
        href="{{ asset('img/favicon-32x32.png') }}"
    >
    <link
        rel="icon"
        type="image/png"
        sizes="96x96"
        href="{{ asset('img/favicon-96x96.png') }}"
    >
    <link
        rel="icon"
        type="image/png"
        sizes="16x16"
        href="{{ asset('img/favicon-16x16.png') }}"
    >
    <link
        rel="manifest"
        href="{{ asset('img/manifest.json') }}"
    >
    <meta
        name="msapplication-TileColor"
        content="#ffffff"
    >
    <meta
        name="msapplication-TileImage"
        content="{{ asset('img/ms-icon-144x144.png') }}"
    >
    <meta
        name="theme-color"
        content="#ffffff"
    >

    <!-- Styles -->
    <link
        rel="stylesheet"
        href="{{ mix('css/app.css') }}"
    >

    <!-- Scripts -->
    <script
        src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.js"
        defer
    ></script>
</head>

<body>

    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>

    <div id="liquid">
        <div class="bubble bubble1"></div>
        <div class="bubble bubble2"></div>
        <div class="bubble bubble3"></div>
        <div class="bubble bubble4"></div>
        <div class="bubble bubble5"></div>
    </div>

    @include('components.footer')
    <script async defer data-website-id="167aff8c-59c5-45a1-adc5-1a8d563a341c" src="http://node18717-umami.cloud.interhostsolutions.be:11021/umami.js"></script>
</body>

</html>
