<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiches de Poste</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 py-8">
        <!-- HEADER + NAVIGATION -->
        <div class="mb-6">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Fiches de Poste</h1>
            <nav class="flex space-x-4 text-blue-600 font-medium">
                <a href="{{ route('collaborateurs.index') }}" class="hover:underline">Dashbord</a>
                <a href="#" class="hover:underline">Absences / Congés</a>
                <a href="#" class="hover:underline">Documents RH</a>
                <a href="#" class="hover:underline">Formations et Évaluations</a>
            </nav>
        </div>

        <!-- TABLEAU DES POSTES -->
        <div class="bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Intitulé</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Salaire</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Évolution</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse ($postes as $poste)
                        <tr class="hover:bg-gray-100">
                            <td class="px-6 py-4">{{ $poste->intitule }}</td>
                            <td class="px-6 py-4">{{ $poste->salaire_min }} - {{ $poste->salaire_max }} MAD</td>
                            <td class="px-6 py-4">{{ $poste->evolution_possible }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('postes.show', $poste->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Voir</a>
                            </td>


                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-4 text-center">Aucune fiche de poste trouvée.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- BOUTON AJOUT -->
        <div class="mt-6 flex justify-center">
            <a href="{{ route('postes.create') }}"
               class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition duration-300">
                + Ajouter une fiche de poste
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
