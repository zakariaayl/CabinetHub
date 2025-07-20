<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Ajouter une Ressource</title>

</head>

<body class="bg-gray-50 min-h-screen py-8 bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    @include('shared.navbar_resource')
    <div class="max-w-2xl mx-auto px-4  rounded-lg ">
        <!-- Header -->
        <div class="text-center m-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">Planification du maintenance</h1>
            <p class="text-gray-600">editer maintenance</p>
        </div>

        <!-- Form -->
        <div class="bg-white hover:shadow-none transition duration-500 border border-gray-100 rounded-lg shadow-2xl p-8 mb-5">
            <form action="{{route('resourceview.updateplanif',$maintenance['id'])}}" method="PUT" class="space-y-6">

                @csrf

                <!-- Type -->
               <div>
                        <label for="etat" class="block text-sm font-medium text-gray-700 mb-2">
                            Type
                        </label>
                        <select name="type_maintenance"
                                id="type_maintenance"
                                class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="">Sélectionner</option>
                            <option value="Predictive" {{ $maintenance['type_maintenance'] == 'Predictive' ? 'selected' : '' }}>Predictive</option>
                            <option value="Corrective" {{ $maintenance['type_maintenance'] == 'Corrective' ? 'selected' : '' }}>Corrective</option>
                            <option value="Préventive" {{ $maintenance['type_maintenance'] == 'Préventive' ? 'selected' : '' }} value="">Préventive</option>

                        </select>
                    </div>


                   <div>
                        <label for="date_achat" class="block text-sm font-medium text-gray-700 mb-2">
                            Date d'Achat
                        </label>
                        <input type="date"
                               name="date_maintenance"
                               id="date_achat"
                               class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                               value="{{ $maintenance['date_maintenance'] }}">

                    </div>

                <div>
                    <label for="remarque" class="block text-sm font-medium text-gray-700 mb-2">
                        Remarques
                    </label>
                    <textarea name="commentaire"
                              id="commentaire"
                              rows="3"
                              class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                              placeholder="Notes ou commentaires supplémentaires..."
                              value=""
                              >{{ $maintenance['commentaire'] }}</textarea>
                </div>

                <!-- Submit Button -->
                <div class="pt-4">
                    <button type="submit"
                            class="w-full bg-blue-400 text-white py-3 px-4 rounded-md hover:bg-white hover:text-blue-400  border border-white hover:border-blue-400 transition-colors duration-200 font-medium">
                        editer la maintenance
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
