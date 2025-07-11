<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'CabinetHub')</title>

    {{-- Tailwind + JS compilés --}}
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen">
    {{-- Navbar partout --}}
    <x-navbar />

    {{-- Zone où chaque vue injecte son contenu --}}
    <main class="max-w-7xl mx-auto px-4 py-6">
        @yield('content')
    </main>
</body>
</html>
