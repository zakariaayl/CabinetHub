<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord RH</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-white min-h-screen ">
    <div class="max-w-7xl border border-gray-200 shadow shadow-gray-300 mx-auto px-4 py-8">
        <!-- HEADER + NAVIGATION -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Tableau de Bord RH</h1>
            <nav class="flex space-x-4 text-blue-600 font-medium">
                <a href="{{ route('postes.index') }}" class="hover:underline"> Fiches de poste</a>
                <a href="#" class="hover:underline"> Absences / Congés</a>
                <a href="#" class="hover:underline"> Documents RH</a>
                <a href="#" class="hover:underline"> Formations et Évaluations</a>
            </nav>
        </div>

        <form method="GET" action="{{ route('collaborateurs.index') }}" class="mb-6 flex flex-wrap gap-8 items-center">
            <input
                type="text"
                name="nom"
                value="{{ request('nom') }}"
                placeholder="Rechercher par nom complet"
                class="border border-gray-300 px-4 py-2 rounded-md w-64"
            >

            <select name="poste" class="border border-gray-300 px-4 py-2 rounded-md">
                <option value="">Tous les postes</option>
                @foreach ($postes as $poste)
                    <option value="{{ $poste }}" {{ request('poste') == $poste ? 'selected' : '' }}>
                        {{ $poste }}
                    </option>
                @endforeach
            </select>

            <select name="departement" class="border border-gray-300 px-4 py-2 rounded-md">
                <option value="">Tous les départements</option>
                @foreach ($departements as $departement)
                    <option value="{{ $departement }}" {{ request('departement') == $departement ? 'selected' : '' }}>
                        {{ $departement }}
                    </option>
                @endforeach
            </select>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition-colors duration-300">
                 Filtrer
            </button>

            <a href="{{ route('collaborateurs.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded-md hover:bg-gray-300 transition-colors duration-300 ml-2 text-sm">
                Réinitialiser
            </a>
        </form>

        <!-- TABLEAU DES COLLABORATEURS -->
        <div class="bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Prénom</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Poste</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Département</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Présence aujourd’hui</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($collaborateurs as $collab)
                        <tr class="text-center hover:bg-gray-300">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $collab->nom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $collab->prenom }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $collab->poste }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $collab->departement }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    ✅ Présent
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('collaborateurs.show', $collab->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Voir</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="mt-4 flex justify-center">
        {{ $collaborateurs->links() }}
        </div>

        <div class="mt-6 flex justify-center">
            <a href="{{ route('collaborateurs.create') }}"
               class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition duration-300">
                + Ajouter un collaborateur
            </a>
        </div>
    </div>

</body>
@if (session('success') || session('danger'))
    <div
        id="flash-message"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 px-6 py-4 rounded-md shadow-lg text-white text-center
            {{ session('success') ? 'bg-green-500' : 'bg-red-500' }}"
        role="alert"
    >
        @if (session('success')) ✅ {{ session('success') }} @endif
        @if (session('danger')) ❌ {{ session('danger') }} @endif
    </div>

    <script>
        setTimeout(() => {
            const toast = document.getElementById('flash-message');
            if (toast) {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity 0.5s';
                setTimeout(() => toast.remove(), 500);
            }
        }, 3000);
    </script>
@endif
</html>
