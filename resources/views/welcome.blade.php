<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name') }}</title>
        <link rel="icon" type="image/svg+xml" href="/image/favicon.svg">
        <link rel="alternate icon" href="/favicon.ico">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Sintony:wght@400;700&display=swap" rel="stylesheet">
        <link href="{{ url(mix('css/app.css')) }}" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.css" rel="stylesheet" >
        <livewire:styles />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.4/trix.min.js"></script>
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    </head>
    <body
        x-data
        @application-form-opened="toggleScrolling(false)"
        @application-form-closed="toggleScrolling(true)"
    >
        <livewire:webteractive.apply />
        <livewire:scripts />
        <script src="{{ url(mix('js/app.js')) }}"></script>
    </body>
</html>
