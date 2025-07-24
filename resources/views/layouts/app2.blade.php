<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'My App')</title>
    @livewireStyles
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.3.2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">


<x-navbar_resource/>

    <div class="p-4">
        @yield('content')
    </div>

    <footer class="mt-8 text-center text-sm text-gray-500">
        &copy; {{ date('Y') }} CabinetHub. Tous droits réservés.
    </footer>

    @livewireScripts
</body>
</html>
