<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-800">

    <div class="container mx-auto px-4 py-6">
        @yield('content')
    </div>

    @livewireScripts
    @vite('resources/js/app.js')
</body>
</html>
