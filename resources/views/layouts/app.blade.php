<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Font awesome icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sb-admin-2.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="font-sans antialiased bg-light">
    <x-jet-banner />

    <x-navigation-menu>
        <x-slot name="logo"></x-slot>
        <x-slot name="leftSideNavbar">
            @include('components.left-side-navbar')
        </x-slot>
        <x-slot name="rightSideNavbar">
            @include('components.right-side-navbar')
        </x-slot>
    </x-navigation-menu>

    <!-- Page Heading -->
    @if (isset($header))
        <header class="d-flex py-3 bg-white shadow-sm border-bottom">
            <div class="container">
                {{ $header }}
            </div>
        </header>
    @endif

    <!-- Page Content -->
    <main class="container my-5">
        {{ $slot }}
    </main>

    <!-- Site footer -->
    @include('components.footer')

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('jquery/jquery.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('js/sb-admin-2.js') }}"></script>
    <script src="{{ asset('js/custom.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>

    @stack('modals')
    @livewireScripts
    @stack('scripts')
</body>

</html>
