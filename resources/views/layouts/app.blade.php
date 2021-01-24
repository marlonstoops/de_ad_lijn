<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
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

    @livewireStyles

    <!-- Scripts -->
    <script
        src="{{ mix('js/app.js') }}"
        defer
    ></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @livewire('navigation-dropdown')

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    @include('components.footer');

    @stack('modals')

    @livewireScripts
    <script async defer data-website-id="167aff8c-59c5-45a1-adc5-1a8d563a341c" src="https://umami.cloud.interhostsolutions.be/umami.js"></script>
</body>
<!-- component -->

</html>
