<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <title>{{ $title ?? 'Genesis' }}</title>
    </head>
    <body class="min-h-screen antialiased bg-white">
        {{ $slot }}
        <livewire:toast />
    </body>
</html>
