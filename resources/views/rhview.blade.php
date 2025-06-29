<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<body class=" flex items-top justify-center min-h-screen relative">

    <div class="container  p-4 shadow shadow-md shadow-gray-300 items-center justify-center   ">
        @if(session('success'))
    <div id="success-message"
     class="fixed top-8 left-1/2 transform -translate-x-1/2 bg-green-300 border border-green-500 text-white text-2xl font-bold p-4 rounded text-center transition-opacity duration-1000 ease-in-out z-50 w-fit max-w-md">
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
        <h1 class="text-3xl font-bold mb-4">Liste des Ressources</h1>

        <h2 class="text-2xl font-bold text-gray-500 ">filter by</h2>
        <form action="{{ route('ResourceController.index') }}">
        <div class="flex">

                    <div class="m-auto">
                        <label for="etat" class="block text-sm font-medium text-gray-700 mb-2">
                            Type
                        </label>
                        <select name="filtertype"
                                id="filtertype"
                                class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Sélectionner</option>
                            <option value="Materiel">Materiel</option>
                            <option value="Logiciel">Logiciel</option>
                        </select>
                        </div>
                        <div class="m-auto">

                        <label for="etat" class="block text-sm font-medium text-gray-700 mb-2">
                            État
                        </label>
                        <select name="etat"
                                id="etat"
                                class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Sélectionner</option>
                            <option value="Neuf">Neuf</option>
                            <option value="Bon">Bon</option>
                            <option value="Usagé">Usagé</option>
                            <option value="Hors Service">Hors Service</option>
                        </select>

                        </div>
                        <div class="m-auto">
                        <label for="etat" class="block text-sm font-medium text-gray-700 mb-2">
                            utilisateur affecte
                        </label>
                        <input type="text" class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" name="utilisateur_affecte">
                        </div>
                        <div class="m-auto">
                        <label for="etat" class="block text-sm font-medium text-gray-700 mb-2">
                            designation
                        </label>
                        <input type="text" class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" name="designation">
                        </div>

                            <button type="submit" class="bg-green-600 hover:bg-green-300 text-center w-1/12 h-2/3 text-white " >filter</button>


                    </div>

        </form>
        <table class="table-auto w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-4">Type</th>
                    <th class=" p-4">Désignation</th>
                    <th class=" p-4">Marque</th>
                    <th class=" p-4">Modèle</th>
                    <th class="p-4">État</th>
                    <th class=" p-4">Departement</th>
                    <th class=" p-4 pr-5 mr-5">Utilisateur Affecté</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rec as $resource)

                    <tr onclick="window.location='{{ route('ResourceController.edit', ['ResourceController'=> $resource->id]) }}'" class="text-center hover:bg-gray-300">

                        <td class=" p-4  border-b border-gray-300">{{ $resource['type'] }}</td>
                        <td class="p-4  border-b border-gray-300">{{ $resource['designation'] }}</td>
                        <td class=" p-4 border-b border-gray-300">{{ $resource['marque'] ?? '---' }}</td>
                        <td class="p-4   border-b border-gray-300">{{ $resource['modele'] ?? '---' }}</td>
                        <td class="p-4  border-b border-gray-300">{{ $resource['etat'] }}</td>
                        <td class="p-4 border-b border-gray-300">{{ $resource['localisation'] }}</td>
                        <td class="p-4 pr-5 mr-4 border-b border-gray-300">{{ $resource['utilisateur_affecte'] }}</td>

                        {{-- <td class=" p-4 pr-5 border-b border-gray-300">
                            <div class="flex justify-center items-center gap-2">
                                <!-- Bouton Modifier -->
                                <form action="{{ route('ResourceController.edit',['ResourceController'=> $resource['id']]) }}" method="GET">

                                    <button type="submit" class="w-20 h-8 bg-blue-600 hover:bg-blue-400 text-white rounded">
                                        Modifier
                                    </button>
                                </form>


                                <form action="{{ route('ResourceController.destroy',['ResourceController'=>$resource['id']]) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-20 h-8 bg-red-600 hover:bg-red-400 text-white rounded">
                                        Supprimer
                                    </button>
                                </form>
                            </div>
                        </td> --}}
                    </tr>

                @endforeach
            </tbody>
        </table>
       <div class="mt-6 flex p-4 justify-center">
    <div class="text-black text-2xl font-bold mr-3">
        {{ $rec->links('pagination::tailwind') }}
    </div>
</div>
<a href="{{ route('ResourceController.create') }}"
   class="block w-full bg-green-600 hover:bg-green-400 text-white font-bold rounded-lg shadow-xl text-center mx-auto mt-6 py-2">
    + Ajouter
</a>

    </div>
</body>
</html>
