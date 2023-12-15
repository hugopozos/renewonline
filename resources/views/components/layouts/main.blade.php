<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        @vite(['resources/css/app.css', 'resources/js/app.js'])
        
        <title>{{ $title ?? 'RenewOnline' }}</title>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" />

    </head>
    <body class="min-h-screen antialiased bg-gray-300">
        @if(Session::has('message'))
            <p class="justify-center p-4 px-12 py-3 font-semibold text-center text-white bg-green-500 top-40">{{ Session::get('message') }}</p>
        @endif

        @if(Session::has('error'))
            <p class="justify-center p-4 px-12 py-3 font-semibold text-center text-white bg-red-500 top-40">{{ Session::get('error') }}</p>
        @endif

        {{ $slot }}
        <livewire:toast />

        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.js"></script>

    </body>
</html>
