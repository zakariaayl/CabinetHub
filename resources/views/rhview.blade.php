<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200 flex items-top justify-center min-h-screen relative">

    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Liste des Ressources</h2>
<a href="{{ route('ResourceController.create') }}"
   class="inline-block w-20 h-13 bg-green-600 hover:bg-green-700 text-white font-bold rounded-lg shadow-xl text-center leading-[3rem]">
    + Ajouter
</a>

        <table class="table-auto w-full border-collapse border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    <th class="border p-2">ID</th>
                    <th class="border p-2">Type</th>
                    <th class="border p-2">Désignation</th>
                    <th class="border p-2">Marque</th>
                    <th class="border p-2">Modèle</th>
                    <th class="border p-2">État</th>
                    <th class="border p-2">Localisation</th>
                    <th class="border p-2">Utilisateur Affecté</th>
                    <th class="border p-2">Remarque</th>
                    <th class="border p-2">Changement</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rec as $resource)
                    <tr class="text-center">
                        <td class="border p-2">{{ $resource['id'] }}</td>
                        <td class="border p-2">{{ $resource['type'] }}</td>
                        <td class="border p-2">{{ $resource['designation'] }}</td>
                        <td class="border p-2">{{ $resource['marque'] ?? '---' }}</td>
                        <td class="border p-2">{{ $resource['modele'] ?? '---' }}</td>
                        <td class="border p-2">{{ $resource['etat'] }}</td>
                        <td class="border p-2">{{ $resource['localisation'] }}</td>
                        <td class="border p-2">{{ $resource['utilisateur_affecte'] }}</td>
                        <td class="border p-2">{{ $resource['remarque'] }}</td>
                        <td class="border p-2">
                            <div class="flex justify-center items-center gap-2">
                                <!-- Bouton Modifier -->
                                <form action="{{ route('ResourceController.create') }}" method="GET">
                                    @csrf
                                    <button type="submit" class="w-20 h-8 bg-blue-600 hover:bg-blue-700 text-white rounded">
                                        Modifier
                                    </button>
                                </form>

                                <!-- Bouton Supprimer -->
                                <form action="" method="POST" onsubmit="return confirm('Confirmer la suppression ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-20 h-8 bg-red-600 hover:bg-red-700 text-white rounded">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
{{-- // {{ route('ressources.create') }} --}}
    <!-- Bouton Ajouter fixé en bas de la page -->


</body>
</html>
