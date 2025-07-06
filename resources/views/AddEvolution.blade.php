<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>{{ isset($evolution) ? 'Modifier' : 'Ajouter' }} une évolution</title>
</head>
<body class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-2xl mx-auto px-4">
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-900 mb-2">
                {{ isset($evolution) ? 'Modifier' : 'Ajouter' }} une évolution pour {{ $collaborateur->nom }}
            </h1>
        </div>

        <div class="bg-white rounded-lg shadow-md p-8">
            <form
                action="{{ isset($evolution) ? route('evolutions.update', $evolution->id) : route('evolutions.store') }}"
                method="POST"
                class="space-y-6"
            >
                @csrf
                @if(isset($evolution))
                    @method('PUT')
                @endif

                <input type="hidden" name="collaborateur_id" value="{{ $collaborateur->id }}">

                <div>
                    <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Date</label>
                    <input type="date" name="date" id="date" required
                        value="{{ old('date', isset($evolution) ? $evolution->date : '') }}"
                        class="w-full px-3 py-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <div>
                    <label for="poste" class="block text-sm font-medium text-gray-700 mb-2">Poste évolué</label>
                    <input type="text" name="poste" id="poste" required
                        value="{{ old('poste', isset($evolution) ? $evolution->poste : '') }}"
                        class="w-full px-3 py-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <div>
                    <label for="departement" class="block text-sm font-medium text-gray-700 mb-2">Département</label>
                    <input type="text" name="departement" id="departement" required
                        value="{{ old('departement', isset($evolution) ? $evolution->departement : '') }}"
                        class="w-full px-3 py-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                </div>

                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description (optionnelle)</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full px-3 py-2 border border-gray-400 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 resize-none"
                        placeholder="Notes ou commentaires supplémentaires...">{{ old('description', isset($evolution) ? $evolution->description : '') }}</textarea>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 font-medium transition-colors">
                    {{ isset($evolution) ? 'Mettre à jour' : 'Enregistrer l\'évolution' }}
                </button>
                <a href="{{ route('collaborateurs.show', $collaborateur->id) }}"
                    class="block text-center w-full bg-gray-300 hover:bg-gray-400 text-gray-800 py-2 px-4 rounded-md font-medium transition-colors">
                     ← Retour à la fiche du collaborateur
                 </a>
            </form>
        </div>
    </div>
</body>
</html>
