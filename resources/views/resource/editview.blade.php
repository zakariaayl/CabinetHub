<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
  <script src="https://cdn.tailwindcss.com"></script>
  @include('shared.navbar_resource')
  <title>Ajouter une Ressource</title>
</head>

<body class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-2xl mx-auto px-4 ">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Gestion d'Équipement</h1>
            <p class="text-gray-600 font-bold">modifier {{ $resource->designation }}</p>
        </div>

        <!-- Form -->
        <div class="rounded-lg p-8 b-gradient-to-br from-gray-100 via-white to-gray-100  shadow-2xl">
            <form action="{{ route('resourceview.update',['resourceview'=>$resource->id ]) }}" method="POST" class="space-y-6">

                @csrf
  @method('PUT')
               <div>
                        <label for="etat" class="block text-sm font-medium text-gray-700 mb-2">
                            Type
                        </label>
                        <select name="type"
                                id="type"
                                class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Sélectionner</option>
                            <option value="Materiel" {{ $resource['type'] == 'Materiel' ? 'Logiciel' : '' }} >Materiel</option>
                            <option value="Logiciel" {{ $resource['type'] == 'Logiciel' ? 'Materiel' : '' }}>Logiciel</option>
                        </select>
                    </div>

                <!-- Designation -->
                <div>
                    <label for="designation" class="block text-sm font-medium text-gray-700 mb-2">
                        Désignation <span class="text-red-500">*</span>
                    </label>
                    <input type="text"
                           name="designation"
                           id="designation"

                           class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent "
                           value="{{ $resource->designation }}"
                           placeholder="imprimante,ordinateur..">
                </div>

                <!-- Row: Brand and Model -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="marque" class="block text-sm font-medium text-gray-700 mb-2">
                            Marque
                        </label>
                        <input type="text"
                               name="marque"
                               id="marque"
                               class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               value="{{ $resource->marque }}"
                               placeholder="entrez la marque">
                    </div>
                    <div>
                        <label for="modele" class="block text-sm font-medium text-gray-700 mb-2">
                            Modèle
                        </label>
                        <input type="text"
                               name="modele"
                               id="modele"
                               class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               value="{{ $resource->modele }}"
                               placeholder="entrez le modele">
                    </div>
                </div>

                <div>
                    <label for="quantite" class="block text-sm font-medium text-gray-700 mb-2">
                        quantite
                    </label>
                    <input type="number"
                           name="quantite"
                           id="quantitie"
                           class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ $resource->quantite }}"
                           placeholder="entrez la quantite"
                           min="1">
                </div>
                <div>
                    <label for="duree_vie_mois" class="block text-sm font-medium text-gray-700 mb-2">
                        duree de vie par mois
                    </label>
                    <input type="number"
                           name="duree_vie_mois"
                           id="duree_vie_mois"
                           class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ $resource->duree_vie_mois }}"
                           placeholder="entrez la duree du vie par moi  "
                           min="1">
                </div>
                <!-- Serial Number -->
                <div>
                    <label for="numero_serie" class="block text-sm font-medium text-gray-700 mb-2">
                        Numéro de Série
                    </label>
                    <input type="text"
                           name="numero_serie"
                           id="numero_serie"
                           class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent font-mono"
                           value="{{ $resource->numero_serie }}"
                           placeholder="entrez le numero de serie">
                </div>


                @if ($resource->type == "Logiciel")


                <div>
                    <label for="version_logiciel" class="block text-sm font-medium text-gray-700 mb-2">
                        Version Logiciel
                    </label>
                    <input type="text"
                           name="version_logiciel"
                           id="version_logiciel"
                           class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ $resource->version_logiciel }}"
                           placeholder="entrez la version du logiciel">
                </div>
                @endif

                <!-- Row: Purchase Date and Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                    <div>
                        <label for="etat" class="block text-sm font-medium text-gray-700 mb-2">
                            État
                        </label>
                        <select name="etat"
                                id="etat"
                                class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Sélectionner</option>
                            <option value="Neuf" {{ $resource['etat'] == 'Neuf' ? 'selected' : '' }}>Neuf</option>
                            <option value="Bon" {{ $resource['etat'] == 'Bon' ? 'selected' : '' }} >Bon</option>
                            <option value="Usagé" {{ $resource['etat'] == 'Usagé' ? 'selected' : '' }}>Usagé</option>
                            <option value="Hors Service" {{ $resource['etat'] == 'Hors Service' ? 'selected' : '' }}>Hors Service</option>
                        </select>
                    </div>
                </div>

                <!-- Location -->
                <div>
                    <label for="localisation" class="block text-sm font-medium text-gray-700 mb-2">
                        Localisation
                    </label>
                    <input type="text"
                           name="localisation"
                           id="localisation"
                           class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ $resource->localisation }}"
                           placeholder="entrez quel departement">
                </div>

                <!-- Assigned User -->
                <div>
                    <label for="utilisateur_affecte" class="block text-sm font-medium text-gray-700 mb-2">
                        Utilisateur Affecté
                    </label>
                    <input type="text"
                           name="utilisateur_affecte"
                           id="utilisateur_affecte"
                           class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           value="{{ $resource->utilisateur_affecte }}"
                           placeholder="entrez l'utilisateur Affecté">
                </div>

                <!-- Row: Warranty and Maintenance -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="date_fin_garantie" class="block text-sm font-medium text-gray-700 mb-2">
                            Date Fin de Garantie
                        </label>
                        <input type="date"
                               name="date_fin_garantie"
                               id="date_fin_garantie"
                               class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               value="{{ $resource->date_fin_garantie }}">
                    </div>
                    <div>
                        <label for="prochaine_maintenance" class="block text-sm font-medium text-gray-700 mb-2">
                            Prochaine Maintenance
                        </label>
                        <input type="date"
                               name="prochaine_maintenance"
                               id="prochaine_maintenance"
                               class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               value="{{ $resource->prochaine_maintenance }}">
                    </div>
                </div>

                <!-- Remarks -->
                <div>
                    <label for="remarque" class="block text-sm font-medium text-gray-700 mb-2">
                        Remarques
                    </label>
                    <textarea name="remarque"
                              id="remarque"
                              rows="3"
                              class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                              placeholder="entrez votre remarque">{{ $resource->remarque }}</textarea>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                            class="w-full  py-3 px-4 rounded-md bg-green-400 border border-white text-white hover:bg-white hover:text-green-400 hover:border-green-400 hover:scale-[1.01] transition focus:ring-offset-2  duration-200 font-medium">
                        Enregistrer les modifications
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
