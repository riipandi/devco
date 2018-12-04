<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>{{ config('app.name') }} - Platfom Kolaboratif Developer Indonesia</title>
        <link href="//fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
        <link rel="stylesheet" href="{{ mix('css/web.css') }}">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="top-right links">
                @auth
                    <a href="{{ route('dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}">Register</a>
                @endauth
            </div>
            <div class="content">
                <div class="title m-b-md">{{ config('app.name') }}</div>
                <div class="links">
                    <a href="//laracasts.com" target="_blank">Laracasts</a>
                    <a href="//laravel-news.com" target="_blank">News</a>
                    <a href="//github.com/riipandi/devco" target="_blank">GitHub</a>
                </div>
                {{-- {{ settings()->get('mail_host') }} --}}
            </div>
        </div>
    </body>
</html>
