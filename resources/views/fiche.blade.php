<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche Collaborateur</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Fiche de {{ $collab->prenom }} {{ $collab->nom }}</h1>

        <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
            <div><strong class="text-gray-700">Poste :</strong> {{ $collab->poste }}</div>
            <div><strong class="text-gray-700">Département :</strong> {{ $collab->departement }}</div>
            <div><strong class="text-gray-700">Email :</strong> {{ $collab->email }}</div>
            <div><strong class="text-gray-700">Téléphone :</strong> {{ $collab->telephone }}</div>
            <div><strong class="text-gray-700">Adresse :</strong> {{ $collab->adresse }}</div>
            <div><strong class="text-gray-700">Date d'embauche :</strong> {{ $collab->date_embauche }}</div>
            <div><strong class="text-gray-700">Description du poste :</strong><br>
                <p class="mt-1 text-gray-600 whitespace-pre-line">{{ $collab->description_poste }}</p>
            </div>

            <!-- Section Évolutions -->
            <h2 class="text-xl font-semibold mt-8 mb-4 text-gray-800">Évolutions</h2>

            <table class="w-full table-auto border border-gray-300 mb-6">
                <thead>
                    <tr class="bg-gray-100 text-gray-700">
                        <th class="border p-2 text-left">Date</th>
                        <th class="border p-2 text-left">Poste évolué</th>
                        <th class="border p-2 text-left">Département</th>
                        <th class="border p-2 text-left">Description</th>
                        <th class="border p-2 text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($collab->evolutions as $evolution)
                        <tr class="hover:bg-gray-50">
                            <td class="border p-2">{{ \Carbon\Carbon::parse($evolution->date)->format('Y-m-d') }}</td>
                            <td class="border p-2">{{ $evolution->poste }}</td>
                            <td class="border p-2">{{ $evolution->departement }}</td>
                            <td class="border p-2">{{ $evolution->description }}</td>
                            <td class="border p-2 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('evolutions.edit', $evolution->id) }}"
                                       class="px-3 py-1 bg-blue-500 hover:bg-blue-400 text-white rounded text-sm">
                                        Modifier
                                    </a>

                                    <form action="{{ route('evolutions.destroy', $evolution->id) }}" method="POST" class="inline"
                                          onsubmit="return confirm('Supprimer cette évolution ?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="px-3 py-1 bg-red-600 hover:bg-red-500 text-white rounded text-sm">
                                            Supprimer
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center p-4 text-gray-500">Aucune évolution enregistrée.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Bouton Ajouter une évolution -->
            <a href="{{ route('evolutions.create', ['collaborateur' => $collab->id]) }}"
            class="inline-block bg-green-600 hover:bg-green-700 text-white font-semibold px-4 py-2 rounded">
             Ajouter une évolution
            </a>

        </div>

        <!-- BOUTONS -->
        <div class="mt-6 flex space-x-4">
            <a href="{{ route('collaborateurs.edit', $collab->id) }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-400">Modifier</a>

            <form action="{{ route('collaborateurs.destroy', $collab->id) }}" method="POST" onsubmit="return confirm('⚠️ Êtes-vous sûr de vouloir supprimer ce collaborateur ?')" class="inline">
            @csrf
            @method('DELETE')
            <a href="#"><button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-400">Supprimer</button></a>
            </form>
            <a href="{{ url('/RH/collaborateurs') }}" class="ml-auto text-blue-600 hover:underline">← Retour</a>
        </div>
    </>
</body>
@if (session('success') || session('danger'))
    <div
        id="flash-message"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 px-6 py-4 rounded-md shadow-lg text-white text-center
            {{ session('success') ? 'bg-green-500' : 'bg-red-500' }}"
        role="alert"
    >
        @if (session('success'))  {{ session('success') }} @endif
        @if (session('danger'))  {{ session('danger') }} @endif
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
