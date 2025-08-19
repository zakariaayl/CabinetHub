<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche Demande</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">


</head>

<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 min-h-screen">



    @include('components.navbar_resource')

    <div class="relative z-10  mx-auto px-6 py-8 mt-20">

        <div class="text-center mb-12 animate-slide-in">
            <h1 class="text-5xl font-black mb-4 gradient-text">
                <i class="fas fa-file-alt mr-4"></i>Fiche de Demande
            </h1>
            <div class="w-32 h-1 bg-gradient-to-r from-purple-500 to-pink-500 mx-auto rounded-full"></div>
        </div>


        <div class=" rounded-3xl p-8 mb-8 card-hover animate-fade-in ">

            <div class="flex justify-between items-start mb-8">
                <div class="flex items-center space-x-4">
                    <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-xl">
                        <i class="fas fa-clipboard-list text-2xl text-black"></i>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-black">Demande #{{ $demande->id ?? '001' }}</h2>
                        <p class="text-gray-300">Détails de la demande d'achat</p>
                    </div>
                </div>

                <div class="bg-gray-400 px-6 py-3 rounded-full text-black font-bold text-sm shadow-lg">
                    <i class="fas fa-check-circle mr-2"></i>{{ $demande->statut ?? 'En attente' }}
                </div>
            </div>


            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <div class="space-y-6">
                    <div class="info-card p-6 bg-white rounded-2xl backdrop-blur-sm border border-gray-200  hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-user-tie text-blue-400 text-xl mr-3"></i>
                            <span class="text-gray-300 font-medium">Responsable</span>
                        </div>
                        <p class="text-black text-lg font-semibold">{{ $demande->responsabl_demande ?? 'Non spécifié' }}</p>
                    </div>

                    <div class="info-card p-6 bg-white rounded-2xl backdrop-blur-sm border border-gray-200  hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-calendar-alt text-green-400 text-xl mr-3"></i>
                            <span class="text-gray-300 font-medium">Date de Demande</span>
                        </div>
                        <p class="text-black text-lg font-semibold">{{ $demande->date_demande ?? 'Non spécifiée' }}</p>
                    </div>

                    <div class="info-card p-6 bg-white rounded-2xl backdrop-blur-sm border border-gray-200  hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-clock text-yellow-400 text-xl mr-3"></i>
                            <span class="text-gray-300 font-medium">Date de Besoin</span>
                        </div>
                        <p class="text-black text-lg font-semibold">{{ $demande->date_besoin ?? 'Non spécifiée' }}</p>
                    </div>

                    <div class="info-card p-6 bg-white rounded-2xl backdrop-blur-sm border border-gray-200  hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-box text-purple-400 text-xl mr-3"></i>
                            <span class="text-gray-300 font-medium">Ressource Demandée</span>
                        </div>
                        <p class="text-black text-lg font-semibold">{{ $demande->resource_demande ?? 'Non spécifiée' }}</p>
                    </div>

                    <div class="info-card p-6 bg-white rounded-2xl backdrop-blur-sm border border-gray-200  hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-tags text-pink-400 text-xl mr-3"></i>
                            <span class="text-gray-300 font-medium">Catégorie</span>
                        </div>
                        <p class="text-black text-lg font-semibold">{{ $demande->categorie ?? 'Non spécifiée' }}</p>
                    </div>

                    <div class="info-card p-6 bg-white rounded-2xl backdrop-blur-sm border border-gray-200  hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-building text-indigo-400 text-xl mr-3"></i>
                            <span class="text-gray-300 font-medium">Département</span>
                        </div>
                        <p class="text-black text-lg font-semibold">{{ $demande->departement ?? 'Non spécifié' }}</p>
                    </div>
                </div>


                <div class="space-y-6">
                    <div class="info-card p-6 bg-white rounded-2xl backdrop-blur-sm border border-gray-200  hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-map-marker-alt text-red-400 text-xl mr-3"></i>
                            <span class="text-gray-300 font-medium">Emplacement</span>
                        </div>
                        <p class="text-black text-lg font-semibold">{{ $demande->emplacement ?? 'Non spécifié' }}</p>
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                        <div class="info-card p-4 bg-gradient-to-br from-emerald-500 to-emerald-600/20 rounded-2xl backdrop-blur-sm border border-emerald-400/30 hover:shadow-xl transition duration-500">
                            <div class="text-center">
                                <i class="fas fa-sort-numeric-up text-emerald-800 text-2xl mb-2"></i>
                                <p class="text-gray-300 text-sm">Quantité</p>
                                <p class="text-black text-xl font-bold">{{ $demande->quantite ?? '0' }}</p>
                            </div>
                        </div>

                        <div class="info-card p-4 bg-gradient-to-br from-blue-500 to-blue-600/20 rounded-2xl backdrop-blur-sm border border-blue-400/30 hover:shadow-xl transition duration-500">
                            <div class="text-center">
                                <i class="fas fa-dollar-sign text-blue-800 text-2xl mb-2"></i>
                                <p class="text-gray-300 text-sm">Prix Unit.</p>
                                <p class="text-black text-xl font-bold">{{ $demande->prix_unitaire_estime ?? '0' }}€</p>
                            </div>
                        </div>

                        <div class="info-card p-4 bg-gradient-to-br from-yellow-500 to-yellow-600/20 rounded-2xl backdrop-blur-sm border border-yellow-400/30 hover:shadow-xl transition duration-500">
                            <div class="text-center">
                                <i class="fas fa-calculator text-yellow-800 text-2xl mb-2"></i>
                                <p class="text-gray-300 text-sm">Total</p>
                                <p class="text-black text-xl font-bold">{{ $demande->montant_total_estime ?? '0' }}€</p>
                            </div>
                        </div>
                    </div>

                    <div class="info-card p-6 bg-white rounded-2xl backdrop-blur-sm border border-gray-200  hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-align-left text-cyan-400 text-xl mr-3"></i>
                            <span class="text-gray-300 font-medium">Description</span>
                        </div>
                        <div class="bg-white text-black rounded-lg p-4 max-h-32 overflow-y-auto">
                            <p class="text-black whitespace-pre-line">{{ $demande->description ?? 'Aucune description disponible' }}</p>
                        </div>
                    </div>

                    <div class="info-card p-6 bg-white rounded-2xl backdrop-blur-sm border border-gray-200  hover:shadow-xl transition-all duration-300">
                        <div class="flex items-center mb-3">
                            <i class="fas fa-comment text-orange-400 text-xl mr-3"></i>
                            <span class="text-gray-300 font-medium">Commentaire</span>
                        </div>
                        <div class="bg-black/20 rounded-lg p-4 max-h-32 overflow-y-auto">
                            <p class="text-gray-200 whitespace-pre-line">{{ $demande->commentaire ?? 'Aucun commentaire' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="flex flex-col sm:flex-row items-center justify-between gap-6 animate-fade-in" style="animation-delay: 0.3s;">
            <div class="flex flex-col sm:flex-row gap-4">
                <form action="{{route('demande_achat.update',$demande->id ?? 1)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" name="action" value="refuser"
                            class="group relative px-8 py-4 bg-gradient-to-r from-emerald-500 to-green-600 text-black font-bold rounded-2xl shadow-xl  hover:shadow-2xl transform   border border-emerald-300 hover:bg-white hover:border-emerald-500 transition-all duration-300 overflow-hidden group flex ">

                        <div class="relative flex items-center transition-transform duration-300">
                            <div class="absolute inset-0 bg-gradient-to-br from-emerald-500 to-green-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300 justify-center rounded-lg">
                            <i class="fas fa-check-circle mr-3 text-xl"></i>
                        </div>
                            <span>Valider</span>
                        </div>
                    </button>
                    {{-- <button type="submit" name="action" value="valider"
                            class="group relative px-8 py-4 bg-gradient-to-r from-emerald-500 to-green-600 text-black font-bold rounded-2xl shadow-l hover:shadow-emerald-500/25 hover:shadow-2xl transform hover:scale-105 transition-all duration-300 overflow-hidden">

                        <div class=" flex items-center">
                            <div class="absolute inset-0 bg-gradient-to-r from-emerald-600 to-green-700 opacity-0 group-hover:opacity-100 transition-opacity duration-300 group ">
                            <i class="fas fa-check-circle mr-3 text-xl"></i>
                        </div>
                            <h1>Valider</h1>
                        </div>
                    </button> --}}
                </form>

                <form action="{{route('demande_achat.update',$demande->id ?? 1)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <button type="submit" name="action" value="refuser"
                            class="group relative px-8 py-4 bg-gradient-to-r from-red-500 to-rose-600 text-black font-bold rounded-2xl shadow-xl hover:shadow-red-500/25 hover:shadow-2xl transform hover:scale-105 transition-all duration-300 overflow-hidden group ">

                        <div class="relative flex items-center transition-transform duration-400">
                             <div class="absolute inset-0 bg-gradient-to-r from-red-500 to-rose-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300 rounded-lg ">
                            <i class="fas fa-xmark-circle mr-3 text-xl"></i>
                        </div>
                            <span>Refuser</span>
                        </div>
                    </button>
                </form>
            </div>

            <a href="{{ url('/raDemandes') }}"
               class="group flex items-center px-6 py-3 bg-white backdrop-blur-sm border border-gray-200 text-black rounded-2xl  hover:shadow-xl transition-all duration-300 shadow-lg">
                <i class="fas fa-arrow-left mr-2 transform group-hover:-translate-x-1 transition-transform duration-300"></i>
                <span class="font-medium">Retour</span>
            </a>
        </div>
    </div>


    @if(session('success'))
    <div id="success-message"
         class="fixed top-8 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-emerald-500 to-green-500 text-black px-8 py-4 rounded-2xl shadow-2xl border-2 border-emerald-300 opacity-100 transition-all duration-500 z-50 max-w-md">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-3 text-xl"></i>
            <span class="font-semibold">{{ session('success') }}</span>
        </div>
    </div>
    <script>
        setTimeout(function() {
            const msg = document.getElementById('success-message');
            if (msg) {
                msg.style.opacity = '0';
                msg.style.transform = 'translate(-50%, -100px)';
                setTimeout(() => msg.style.display = 'none', 1000);
            }
        }, 4000);
    </script>
    @endif



</body>
</html>
