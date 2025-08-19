<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title','CabinetHub')</title>
    {{-- @vite(['resources/css/app.css','resources/js/app.js']) --}}

    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-emerald-200/10 ">
    <x-navbar />

    <main class=" grid grid-cols-12 px-4 py-6">
        @yield('content')
    </main>

    @livewireScripts
</body>
</html>
