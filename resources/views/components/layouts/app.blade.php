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
        {{ $slot }}
    </div>

    @livewireScripts
    @vite('resources/js/app.js')

    <div class="flex justify-end p-4 bg-white border-b">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="text-red-600 hover:underline font-semibold">
                🔓 Logout
            </button>
        </form>
    </div>

</body>
</html>
