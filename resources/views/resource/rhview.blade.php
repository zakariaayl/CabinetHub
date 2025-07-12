<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class=" min-h-screen bg-gradient-to-br from-gray-100 via-white to-gray-100">
    @include('shared.navbar_resource')
    <div class="flex items-start justify-center w-full px-4">
        <div class="container p-4  border-gray-200  mt-5">
            @if(session('success'))
            <div id="success-message" class="fixed top-8 left-1/2 transform -translate-x-1/2 bg-green-300 border border-green-500 text-white text-2xl font-bold p-4 rounded text-center transition-opacity duration-1000 ease-in-out z-50 w-fit max-w-md">
                {{ session('success') }}
            </div>
            <script>
                setTimeout(function() {
                    const msg = document.getElementById('success-message');
                    if (msg) {
                        msg.style.opacity = '0';
                        setTimeout(() => msg.style.display = 'none', 1000);
                    }
                }, 4000);
            </script>
            @endif

            <h1 class="text-3xl font-bold mb-4 mt-10 text-center mx-auto block">Liste des Ressources</h1>

            <form action="{{ route('ResourceController.index') }}" class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 mb-6">
                <h2 class="font-medium text-black text-lg mb-6">Filtres du Ressources</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="filtertype" class="block text-sm font-medium text-gray-600 mb-1">Type</label>
                        <select name="filtertype" id="filtertype" class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Sélectionner</option>
                            <option value="Materiel" {{ request('filtertype') == 'Materiel' ? 'selected' : '' }}>Materiel</option>
                            <option value="Logiciel" {{ request('filtertype') == 'Logiciel' ? 'selected' : '' }}>Logiciel</option>
                        </select>
                    </div>
                    <div>
                        <label for="etat" class="block text-sm font-medium text-gray-600 mb-1">État</label>
                        <select name="etat" id="etat" class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Sélectionner</option>
                            <option value="Neuf" {{ request('etat') == 'Neuf' ? 'selected' : '' }}>Neuf</option>
                            <option value="Bon" {{ request('etat') == 'Bon' ? 'selected' : '' }}>Bon</option>
                            <option value="Usagé" {{ request('etat') == 'Usagé' ? 'selected' : '' }}>Usagé</option>
                            <option value="Hors Service" {{ request('etat') == 'Hors Service' ? 'selected' : '' }}>Hors Service</option>
                        </select>
                    </div>
                    <div>
                        <label for="utilisateur_affecte" class="block text-sm font-medium text-gray-600 mb-1">Utilisateur affecté</label>
                        <input type="text" name="utilisateur_affecte" class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ request('utilisateur_affecte') }}">
                    </div>
                    <div>
                        <label for="designation" class="block text-sm font-medium text-gray-600 mb-1">Désignation</label>
                        <input type="text" name="designation" class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" value="{{ request('designation') }}">
                    </div>
                </div>
                <div class="flex justify-end gap-4">
                    <button type="submit" class="bg-green-400 text-white border border-white font-semibold px-5 py-2 rounded-md transition hover:scale-105 hover:bg-white hover:border-green-400 hover:text-green-400">
                        Appliquer
                    </button>
                    <a href="{{ route('ResourceController.index') }}" class="bg-blue-400 text-white border border-white font-semibold px-5 py-2 rounded-md transition hover:scale-105 hover:bg-white hover:border-blue-400 hover:text-blue-400">
                        Réinitialiser
                    </a>
                </div>
            </form>

            <div class="overflow-x-scroll">
                <table class="table-auto w-full border-collapse">
                    <thead class="bg-white shadow-lg border border-gray-100">
                        <tr>
                            <th class="p-4">Type</th>
                            <th class="p-4">Désignation</th>
                            <th class="p-4">Marque</th>
                            <th class="p-4">Modèle</th>
                            <th class="p-4">État</th>
                            <th class="p-4">Département</th>
                            <th class="p-4">Utilisateur Affecté</th>
                            <th class="p-4">Durée de vie (mois)</th>
                            <th class="p-4">Quantité</th>
                            <th class="p-4">Action</th>
                        </tr>
                    </thead>
                    <tbody class="shadow-lg ">
                        @foreach($rec as $resource)
                        <tr class="text-center hover:bg-blue-100/15 hover:shadow-md hover:border hover:border-gray-500">
                            <td class="p-4 border-b border-gray-300">{{ $resource['type'] }}</td>
                            <td class="p-4 border-b border-gray-300">{{ $resource['designation'] }}</td>
                            <td class="p-4 border-b border-gray-300">{{ $resource['marque'] ?? '---' }}</td>
                            <td class="p-4 border-b border-gray-300">{{ $resource['modele'] ?? '---' }}</td>
                            <td class="p-4 border-b border-gray-300">{{ $resource['etat'] }}</td>
                            <td class="p-4 border-b border-gray-300">{{ $resource['localisation'] }}</td>
                            <td class="p-4 border-b border-gray-300">{{ $resource['utilisateur_affecte'] }}</td>
                            <td class="p-4 border-b border-gray-300">{{ $resource['duree_vie_mois'] }}</td>
                            <td class="p-4 border-b border-gray-300">{{ $resource['quantite'] }}</td>
                            <td class="p-4 border-b border-gray-300">
                                <div class="flex justify-center items-center gap-2">
                                    <form action="{{ route('ResourceController.edit',['ResourceController'=> $resource['id']]) }}" method="GET">
                                        <button type="submit" class="w-20 h-8 bg-white border border-blue-400 hover:bg-blue-400 hover:text-white text-blue-400 rounded hover:scale-110 transition">
                                            voir
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-6 flex p-4 justify-center">
                <div class="text-black text-2xl font-bold mr-3">
                    {{ $rec->links('pagination::tailwind') }}
                </div>
            </div>

            <a href="{{ route('ResourceController.create') }}" class="block w-full bg-green-400 border border-white hover:bg-white hover:text-green-400 hover:border-green-400 text-white hover:scale-105 font-bold rounded-lg shadow-xl text-center mx-auto mt-6 py-2 hover:scale-[1.01] transition-colors">
                + Ajouter
            </a>
        </div>
    </div>
</body>
</html>
