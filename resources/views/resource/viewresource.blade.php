<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche Ressource</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 min-h-screen">

   @include('components.navbar_resource')
    <div class=" mx-auto px-4 py-8">
        <div class="mb-8 animate-fade-in-up">
            <nav class="flex items-center space-x-2 text-sm text-gray-600 mb-4">
                <a href="/RH/seeAllresources" class="hover:text-indigo-600 transition-colors">
                    <i class="fas fa-home"></i> Accueil
                </a>
                <i class="fas fa-chevron-right text-xs"></i>
                <span class="text-gray-800 font-medium">Fiche Ressource</span>
            </nav>

            <div class="flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-gray-800 mb-2">
                        Fiche de <span class="bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">{{ $resource->designation }}</span>
                    </h1>
                    @if($check !=null)
                    <p class="text-gray-600 flex items-center">
                        <i class="fas fa-calendar-alt mr-2"></i>
                        @if ($der_date<date('Y'))
                            Dernière mise à jour: <span class="ml-1 font-medium">{{$der_date}}</span>
                        @else
                            Prochaine mise à jour: <span class="ml-1 font-medium">{{$der_date}}</span>
                        @endif

                    </p>
                    @endif
                </div>
                <div class="flex items-center space-x-3">
                    @if ($resource->etat=="Hors Service")
                        <div class="px-4 py-2 bg-red-100 text-red-800 rounded-full text-sm font-medium flex items-center">
                        <i class="fas fa-circle text-xs mr-2"></i>
                        {{ $resource->etat }}
                    </div>
                    @endif
                    @if ($resource->etat=="Bon")
                        <div class="px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-medium flex items-center">
                        <i class="fas fa-circle text-xs mr-2"></i>
                        {{ $resource->etat }}
                    </div>
                    @endif
                    @if ($resource->etat=="Usagé")
                        <div class="px-4 py-2 bg-yellow-100 text-yellow-800 rounded-full text-sm font-medium flex items-center">
                        <i class="fas fa-circle text-xs mr-2"></i>
                        {{ $resource->etat }}
                    </div>
                    @endif


                </div>
            </div>
        </div>


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">


            <div class="lg:col-span-2 space-y-6">
                <img class="w-82 mx-auto h-82 rounded-xl shadow-xl hover:shadow-2xl  transition duration-500 " src="{{ asset($resource->imageRc) }}" alt="il n y a pas une image disponible" />
                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-8 shadow-xl border border-white/20 hover:shadow-2xl transition-all duration-300 hover:-translate-y-1 animate-fade-in-up">
                    <div class="flex items-center mb-6">
                        <div class="w-12 h-12 bg-gradient-to-r from-indigo-500 to-purple-500 rounded-lg flex items-center justify-center mr-4">
                            <i class="fas fa-laptop text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-gray-800">Détails de la Ressource</h2>
                            <p class="text-gray-600">Informations techniques et administratives</p>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="flex items-center p-4 bg-gradient-to-r from-blue-50 to-indigo-50 rounded-lg border border-blue-100 hover:shadow-xl  transition duration-500">
                                <i class="fas fa-tag text-blue-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Type</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $resource->type }}</p>
                                </div>
                            </div>

                            <div class="flex items-center p-4 bg-gradient-to-r from-purple-50 to-pink-50 rounded-lg border border-purple-100 hover:shadow-xl  transition duration-500">
                                <i class="fas fa-industry text-purple-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Marque</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $resource->marque }}</p>
                                </div>
                            </div>

                            <div class="flex items-center p-4 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg border border-green-100 hover:shadow-xl transition duration-500">
                                <i class="fas fa-cog text-green-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Modèle</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $resource->modele }}</p>
                                </div>
                            </div>

                            <div class="flex items-center p-4 bg-gradient-to-r from-yellow-50 to-orange-50 rounded-lg border border-yellow-100 hover:shadow-xl  transition duration-500">
                                <i class="fas fa-calendar text-yellow-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Date d'achat</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $resource->date_achat }}</p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center p-4 bg-gradient-to-r from-indigo-50 to-blue-50 rounded-lg border border-indigo-100 hover:shadow-xl  transition duration-500">
                                <i class="fas fa-barcode text-indigo-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Numéro de série</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $resource->numero_serie }}</p>
                                </div>
                            </div>

                            <div class="flex items-center p-4 bg-gradient-to-r from-teal-50 to-cyan-50 rounded-lg border border-teal-100 hover:shadow-xl  transition duration-500">
                                <i class="fas fa-map-marker-alt text-teal-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Localisation</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $resource->localisation }}</p>
                                </div>
                            </div>

                            <div class="flex items-center p-4 bg-gradient-to-r from-rose-50 to-pink-50 rounded-lg border border-rose-100 hover:shadow-xl  transition duration-500">
                                <i class="fas fa-user text-rose-600 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-gray-600">Utilisateur assigné</p>
                                    <p class="text-lg font-semibold text-gray-800">{{ $resource->utilisateur_affecte }}</p>
                                </div>
                            </div>

                            {{-- <div class="p-4 bg-gradient-to-r from-gray-50 to-slate-50 rounded-lg border border-gray-100 hover:shadow-xl">
                                <div class="flex items-center mb-2">
                                    <i class="fas fa-heart text-gray-600 mr-2"></i>
                                    <p class="text-sm font-medium text-gray-600">État</p>
                                </div>
                                <div class="flex items-center">
                                    <div class="w-3 h-3 bg-green-500 rounded-full mr-2 animate-pulse"></div>
                                    <span class="px-3 py-1 bg-green-100 text-green-800 rounded-full text-sm font-medium">{{ $resource->etat }}</span>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-8 shadow-xl border border-white/20 hover:shadow-2xl transition duration-300 ">
                    <div class="flex items-center mb-4">
                        <i class="fas fa-comment-alt text-gray-600 mr-3"></i>
                        <h3 class="text-xl font-bold text-gray-800">Remarques</h3>
                    </div>
                    <div class="bg-gray-50 rounded-lg p-4 border-l-4 border-indigo-500 hover:shadow-xl transition duration-500">
                        <p class="text-gray-700 leading-relaxed whitespace-pre-line">
                            {{ $resource->remarque }}
                        </p>
                    </div>

                </div>

            </div>

            <div class="space-y-6">
                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-white/20 hover:shadow-2xl transition-all duration-300 animate-fade-in-up">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-bolt text-yellow-500 mr-2"></i>
                        Actions Rapides
                    </h3>
                    <div class="space-y-3">
                        <a href="{{ route('resourceview.view',[$resource->id,rawurlencode($resource->designation)]) }}" class="w-full flex items-center px-4 py-3 bg-white border border-emerald-500 text-emerald-500 hover:text-white rounded-lg hover:bg-gradient-to-r hover:from-green-500 hover:to-emerald-500 hover:scale-105  transition duration-500 group">
                            <i class="fas fa-calendar-plus mr-3 group-hover:scale-110 transition-transform"></i>
                            <span class="font-medium">Planifier Maintenance</span>
                        </a>

                        <a href="{{ route('resourceview.edit', $resource->id) }}" class="w-full flex items-center px-4 py-3 bg-white border border-sky-500 text-sky-500 hover:text-white rounded-lg hover:bg-gradient-to-r hover:from-sky-500 hover:to-blue-400 hover:scale-105  transition duration-500 group">
                            <i class="fas fa-edit mr-3 group-hover:scale-110 transition-transform"></i>
                            <span class="font-medium">Modifier</span>
                        </a>

                        <form action="{{ route('resourceview.destroy', $resource->id) }}" method="POST" onsubmit="return confirm('⚠️ Êtes-vous sûr de vouloir supprimer cette ressource ?')" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="w-full flex items-center px-4 py-3 bg-white border border-red-500 text-red-500 hover:text-white rounded-lg hover:bg-gradient-to-r hover:from-red-500 hover:to-rose-500 hover:scale-105  transition duration-500 group">
                                <i class="fas fa-trash mr-3 group-hover:scale-110 transition-transform"></i>
                                <span class="font-medium">Supprimer</span>
                            </button>
                        </form>
                    </div>
                </div>
                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-6 shadow-xl border border-white/20 hover:shadow-2xl transition-all duration-300 animate-fade-in-up">
                    <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center">
                        <i class="fas fa-chart-line text-indigo-500 mr-2"></i>
                        Statistiques
                    </h3>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Maintenances</span>
                            <span class="font-bold text-2xl text-indigo-600">{{ count($maintenance) }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Durée de vie</span>
                            <span class="font-bold text-2xl text-green-600">{{ $resource->duree_vie_mois/12 }} ans</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Prochaine maintenance</span>
                            <span class="font-bold text-sm text-orange-600">À programmer</span>
                        </div>
                    </div>
                </div>
                <div class="bg-white shadow-xl p-10 rounded-xl hover:shadow-2xl transition duration-300">
                    <h1 class="text-xl font-semibold text-center mb-2">facture</h1>
                <img class="w-full rounded-xl shadow-xl hover:shadow-2xl  transition duration-500 " src="{{ asset($resource->facture) }}" alt="il n y a pas une facture disponible" />
                </div>
            </div>
        </div>

        <div class="mt-8 bg-white/70 backdrop-blur-sm rounded-2xl p-8 shadow-xl border border-white/20 hover:shadow-2xl transition-all duration-300 animate-fade-in-up">
            <div class="flex items-center justify-between mb-6">
                <div class="flex items-center">
                    <i class="fas fa-history text-indigo-600 mr-3 text-xl"></i>
                    <h2 class="text-2xl font-bold text-gray-800">Historique des Maintenances</h2>
                </div>
                <a href="{{ route('resourceview.view',[$resource->id,rawurlencode($resource->designation)]) }}" class="px-6 py-2 bg-white border border-emerald-500 text-emerald-500 hover:text-white rounded-lg hover:bg-gradient-to-r hover:from-green-500 hover:to-emerald-500 hover:scale-110  transition duration-500 flex items-center group ">
                    <i class="fas fa-plus mr-2 group-hover:rotate-90 transition-transform"></i>
                    Nouvelle Maintenance
                </a>
            </div>

            <div class="overflow-x-auto rounded-xl">
                <table class="w-full">
                    <thead >
                        <tr class="bg-gradient-to-r from-indigo-300 to-purple-300 border-b border-gray-200">
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Date</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Type</th>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">Commentaire</th>
                            <th class="px-6 py-4 text-right text-sm font-semibold text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($maintenance as $maint)
                        <tr class="border-b border-gray-100 hover:bg-gradient-to-r hover:from-blue-50 hover:to-indigo-50 transition-all duration-300 group">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <i class="fas fa-calendar-alt text-blue-500 mr-2"></i>
                                    <span class="font-medium text-gray-800">{{ $maint['date_maintenance'] }}</span>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium">
                                    {{ $maint['type_maintenance'] }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-gray-700">{{ $maint['commentaire'] ?? '---' }}</td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-end space-x-2">
                                    <form action="{{ route('resourceview.editmain', [$maint['id'].'-'.$resource->id]) }}" method="GET" class="inline">
                                        <button type="submit" class="p-2 bg-blue-100 hover:bg-blue-200 text-blue-600 rounded-lg transition-colors group-hover:scale-110">
                                            <i class="fas fa-edit"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('resourceview.deleteplanif',['id'=>$maint['id']]) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 bg-red-100 hover:bg-red-200 text-red-600 rounded-lg transition-colors group-hover:scale-110">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="mt-8 flex justify-end">
            <a href="{{ url('/raView') }}" class="px-6 py-2 bg-gradient-to-r from-gray-500 to-gray-600 text-white rounded-lg hover:from-gray-600 hover:to-gray-700 transition-all duration-300 flex items-center group">
                <i class="fas fa-arrow-left mr-2 group-hover:-translate-x-1 transition-transform"></i>
                Retour à la liste
            </a>
        </div>
    </div>
    @if(session('success'))
    <div id="success-message" class="fixed top-8 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-green-500 to-emerald-500 text-white px-8 py-4 rounded-xl shadow-xl border border-green-300 opacity-100 transition-all duration-500 z-50 max-w-md">
        <div class="flex items-center">
            <i class="fas fa-check-circle mr-3 text-xl"></i>
            <span class="font-medium">{{ session('success') }}</span>
        </div>
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
