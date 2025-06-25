<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

</head>
@vite(['resources/css/app.css', 'resources/js/app.js'])
<body class=" flex items-top justify-center min-h-screen relative">

    <div class="container mx-auto p-4 shadow-lg shadow-black items-center justify-center   ">
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
        <h2 class="text-2xl font-bold mb-4">Liste des Ressources</h2>


        <table class="table-auto w-full border-collapse">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-5">Type</th>
                    <th class=" p-5">Désignation</th>
                    <th class=" p-5">Marque</th>
                    <th class=" p-5">Modèle</th>
                    <th class="p-5">État</th>
                    <th class=" p-5">Localisation</th>
                    <th class=" p-5">Utilisateur Affecté</th>
                    <th class="p-5">Remarque</th>
                    <th class=" p-5">Changement</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rec as $resource)
                    <tr class="text-center">
                        <td class=" p-4 pr-5 border-b border-gray-300">{{ $resource['type'] }}</td>
                        <td class="p-4 pr-5 border-b border-gray-300">{{ $resource['designation'] }}</td>
                        <td class=" p-4 pr-5 border-b border-gray-300">{{ $resource['marque'] ?? '---' }}</td>
                        <td class="p-4  pr-5 border-b border-gray-300">{{ $resource['modele'] ?? '---' }}</td>
                        <td class="p-4 pr-5 border-b border-gray-300">{{ $resource['etat'] }}</td>
                        <td class="p-4 pr-5 border-b border-gray-300">{{ $resource['localisation'] }}</td>
                        <td class="p-4 pr-5 border-b border-gray-300">{{ $resource['utilisateur_affecte'] }}</td>
                        <td class=" p-4 pr-5 border-b border-gray-300">{{ $resource['remarque'] }}</td>
                        <td class=" p-4 pr-5 border-b border-gray-300">
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
                        </td>
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
