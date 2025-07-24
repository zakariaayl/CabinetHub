<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche Demande</title>
    <script src="https://cdn.tailwindcss.com"></script>\

</head>


<body class=" min-h-screen bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-0">
    @include('shared.navbar_resource')
    <div class="w-2/3 mx-auto  ">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Fiche de la Demande</h1>
        <div class="bg-white rounded-lg p-6 space-y-4 border border-gray-100  shadow-2xl">
            <div><strong class="text-gray-700">Responsable :</strong> {{ $demande->responsabl_demande }}</div>
            <div><strong class="text-gray-700">Date de Demande :</strong> {{ $demande->date_demande }}</div>
            <div><strong class="text-gray-700">Date de Besoin :</strong> {{ $demande->date_besoin }}</div>
            <div><strong class="text-gray-700">Ressource Demandée :</strong> {{ $demande->resource_demande }}</div>
            <div><strong class="text-gray-700">Catégorie :</strong> {{ $demande->categorie }}</div>
            <div><strong class="text-gray-700">Description :</strong><br>
                <p class="mt-1 text-gray-600 whitespace-pre-line">{{ $demande->description }}</p>
            </div>
            <div><strong class="text-gray-700">Quantité :</strong> {{ $demande->quantite }}</div>
            <div><strong class="text-gray-700">Prix Unitaire Estimé :</strong> {{ $demande->prix_unitaire_estime }}</div>
            <div><strong class="text-gray-700">Montant Total Estimé :</strong> {{ $demande->montant_total_estime }}</div>
            <div><strong class="text-gray-700">Emplacement :</strong> {{ $demande->emplacement }}</div>
            <div><strong class="text-gray-700">Département :</strong> {{ $demande->departement }}</div>
            <div><strong class="text-gray-700">Statut :</strong> {{ $demande->statut }}</div>
            <div><strong class="text-gray-700">Commentaire :</strong><br>
                <p class="mt-1 text-gray-600 whitespace-pre-line">{{ $demande->commentaire }}</p>
            </div>

        </div>

        <div class="mt-6 flex space-x-4 relative">
            <div class="flex space-x-1">
            <form action="{{route('demande_achat.update',$demande->id)}}" method="POST" class="w-full">
                             @csrf
                            @method('PUT')
                            <button class="px-4 py-2 bg-green-400 border border-white hover:bg-white hover:text-green-400 hover:border-green-400 text-white transition hover:scale-105 shadow-2xl rounded" name="action" value="valider">
                                valider
                            </button>
                        </form>

            <form action="{{route('demande_achat.update',$demande->id)}}" method="POST"  class="w-full">
                            @csrf
                            @method('PUT')
                            <button class="px-4 py-2 bg-red-400 border border-white hover:bg-white hover:text-red-400 hover:border-red-400 text-white hover:scale-105 transition shadow-2xl" name="action" value="refuser">
                                refuser
                            </button>
                        </form>
</div>
            <a href="{{ url('/raDemandes') }}" class="absolute right-0 text-blue-600 hover:underline">← Retour</a>
        </div>
    </div>

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
</body>
</html>
