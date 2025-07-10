<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche Collaborateur</title>
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<style>
.bg-custom {
    background-image: url('{{ asset('images_cabinethub/pic7.jpg') }}');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
</style>
<body class=" bg-white min-h-screen py-8">
    <div class="w-2/3  mx-auto px-4 to-green-50">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Fiche de {{ $resource->designation }}</h1>
        <div class="bg-white rounded-lg p-6 space-y-4 border border-gray-100 bg-gradient-to-br from-yellow-100 via-white to-orange-50 bg-cutom shadow-2xl">
            <div><strong class="text-gray-700">Type :</strong> {{ $resource->type }}</div>
            <div><strong class="text-gray-700">marque :</strong> {{ $resource->marque }}</div>
            <div><strong class="text-gray-700">modele :</strong> {{ $resource->modele }}</div>
            <div><strong class="text-gray-700">etat :</strong> {{ $resource->etat }}</div>
            <div><strong class="text-gray-700">localisation :</strong> {{ $resource->localisation }}</div>
            <div><strong class="text-gray-700">Date d'achat :</strong> {{ $resource->date_achat }}</div>
            <div><strong class="text-gray-700">numero de serie :</strong> {{ $resource->numero_serie }}</div>
            <div><strong class="text-gray-700">utilisateur affecte :</strong> {{ $resource->utilisateur_affecte }}</div>

            <div><strong class="text-gray-700">remarque :</strong><br>
                <p class="mt-1 text-gray-600 whitespace-pre-line">{{ $resource->remarque }}</p>
            </div>
<div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse ">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-2 py-4">date de maintenance</th>
                    <th class=" px-6">type maintenance</th>
                    <th class=" px-9">commentaire</th>
                    <th class=" px-10">action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($maintenance as $maint)

                    <tr class="text-center hover:bg-gray-200">
                        <td class=" p-4  border-b border-gray-300">{{ $maint['date_maintenance'] }}</td>
                        <td class="p-4  border-b border-gray-300">{{ $maint['type_maintenance'] }}</td>
                        <td class=" p-4 border-b border-gray-300">{{ $maint['commentaire'] ?? '---' }}</td>
                         <td class=" p-4 pr-5 border-b border-gray-300">
                            <div class="flex justify-center items-center gap-2">
                                <!-- Bouton Modifier -->
                                <form action="{{ route('resourceview.editmain', $maint['id']) }}" method="GET">

                                    <button type="submit" class="w-20 h-8 bg-white border border-blue-400 hover:bg-blue-400 hover:text-white text-blue-400  rounded hover:scale-110
                                      transition">
                                        Modifier
                                    </button>
                                </form>


                                <form action="{{ route('resourceview.deleteplanif',['id'=>$maint['id']]) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-20 h-8 bg-white border border-red-400 hover:bg-red-400 hover:text-white text-red-400  rounded hover:scale-110
                                      transition">
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
        <a href="{{ route('resourceview.view',[$resource->id,rawurlencode($resource->designation)]) }}"
   class="block w-full bg-green-400 border border-white hover:bg-white hover:text-green-400 hover:border-green-400 text-white  hover:scale-105 font-bold rounded-lg shadow-xl text-center mx-auto mt-6 py-2 hover:scale-[1.01] transition-colors">
    + planifier une maintenance
</a>
        </div>

        <!-- BOUTONS -->
        <div class="mt-6 flex space-x-4 relative">
            <a href="{{ route('resourceview.edit', $resource->id) }}" class="px-4 py-2 bg-green-400 border border-white hover:bg-white hover:text-green-400 hover:border-green-400 text-white transition hover:scale-105 shadow-2xl rounded">Modifier</a>

            <form action="{{ route('resourceview.destroy', $resource->id) }}" method="POST" onsubmit="return confirm('⚠️ Êtes-vous sûr de vouloir supprimer ce collaborateur ?')" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="px-4 py-2 bg-red-400 border border-white hover:bg-white hover:text-red-400 hover:border-red-400 text-white hover:scale-105 transition shodow-2xl">Supprimer</button>
            </form>
            <a href="{{ url('/RH/seeAllresources') }}" class="absolute right-0 text-blue-600 hover:underline ">← Retour</a>
        </div>
    </div>

</body>
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
</html>
