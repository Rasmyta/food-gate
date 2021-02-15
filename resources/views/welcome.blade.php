<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Food gate</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('css/sb-admin-2.css') }}">

    <style>
        body {
            font-family: 'Nunito';
        }

    </style>
</head>

<body class="bg-light">
    <div class="container-fluid fixed-top p-4">
        <div class="col-12">
            <div class="d-flex justify-content-end">
                @if (Route::has('login'))
                    <div class="">
                        @auth
                            <a href="{{ url('main') }}" class="text-muted">Main</a>
                        @else
                            <a href="{{ route('login') }}" class="text-muted">Login</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="ml-4 text-muted">Register</a>
                            @endif
                    @endif
                </div>
                @endif
            </div>
        </div>
        </div>

        <div class="container-fluid my-5 pt-4">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <h1>Welcome to Food Gate!</h1>
                </div>
            </div>
        </div>
    </body>

    </html>
