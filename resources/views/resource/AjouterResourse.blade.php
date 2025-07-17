<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}

  <title>Ajouter une Ressource</title>
</head>
<body class=" bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 min-h-screen py-8">
     @include('shared.navbar_resource')
    <div class="max-w-2xl mx-auto px-4 ">
        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2 mt-10">Gestion d'Équipement</h1>
            <p class="text-gray-600 mt-10">Enregistrez un nouvel équipement</p>
        </div>

        <!-- Form -->
        <div class="bg-white rounded-lg  p-8    shadow-2xl">
            <form action="{{ route('ResourceController.store') }}" method="POST" class="space-y-6">

                @csrf

                <!-- Type -->
               <div>
                        <label for="etat" class="block text-sm font-medium text-gray-700 mb-2">
                            Type
                        </label>
                        <select name="type"
                                id="type"
                                class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Sélectionner</option>
                            <option value="Materiel">Materiel</option>
                            <option value="Logiciel">Logiciel</option>
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
                           required
                           class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent "
                           placeholder="Ordinateur, Imprimante...">
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
                               placeholder="Dell, HP...">
                    </div>
                    <div>
                        <label for="modele" class="block text-sm font-medium text-gray-700 mb-2">
                            Modèle
                        </label>
                        <input type="text"
                               name="modele"
                               id="modele"
                               class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               placeholder="Modèle">
                    </div>
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
                           placeholder="ABC123XYZ789">
                </div>

                <!-- Software Version -->
                <div>
                    <label for="version_logiciel" class="block text-sm font-medium text-gray-700 mb-2">
                        Version Logiciel
                    </label>
                    <input type="text"
                           name="version_logiciel"
                           id="version_logiciel"
                           class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="entrez la version du logiciel comme v1.2.5..">
                </div>
               <div>
                    <label for="quantite" class="block text-sm font-medium text-gray-700 mb-2">
                        quantite
                    </label>
                    <input type="number"
                           name="quantite"
                           id="quantitie"
                           class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                           placeholder="entrez la quantite du ressource"
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
                           placeholder="entrez la dure du vie par moi"
                           min="1">
                </div>
                <!-- Row: Purchase Date and Status -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="date_achat" class="block text-sm font-medium text-gray-700 mb-2">
                            Date d'Achat
                        </label>
                        <input type="date"
                               name="date_achat"
                               id="date_achat"
                               class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
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
                           placeholder="Bureau 101">
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
                           placeholder="Nom de l'utilisateur">
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
                               class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    </div>
                    <div>
                        <label for="prochaine_maintenance" class="block text-sm font-medium text-gray-700 mb-2">
                            Prochaine Maintenance
                        </label>
                        <input type="date"
                               name="prochaine_maintenance"
                               id="prochaine_maintenance"
                               class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
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
                              placeholder="Notes ou commentaires supplémentaires..."></textarea>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                            class="w-full  py-3 px-4 rounded-md bg-green-400 border border-white text-white hover:bg-white hover:text-green-400 hover:border-green-400 hover:scale-[1.01] transition focus:ring-offset-2  duration-200 font-medium">
                        Enregistrer l'équipement
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
