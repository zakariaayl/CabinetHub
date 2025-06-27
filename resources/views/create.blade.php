    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Ajouter un collaborateur</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="bg-gray-100 py-8">
        <div class="max-w-3xl mx-auto px-4">
            <h1 class="text-3xl font-bold mb-6 text-gray-800">Ajouter un collaborateur</h1>

            <form action="{{ route('collaborateurs.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow space-y-4">
                @csrf

                <div>
                    <label class="block text-sm font-medium text-gray-700">Nom</label>
                    <input type="text" name="nom" value="{{ old('nom') }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('nom')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Prénom</label>
                    <input type="text" name="prenom" value="{{ old('prenom') }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('prenom')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Poste</label>
                    <input type="text" name="poste" value="{{ old('poste') }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('poste')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Département</label>
                    <input type="text" name="departement" value="{{ old('departement') }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('departement')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('email')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Téléphone</label>
                    <input type="text" name="telephone" value="{{ old('telephone') }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('telephone')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Adresse</label>
                    <input type="text" name="adresse" value="{{ old('adresse') }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('adresse')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Date d'embauche</label>
                    <input type="date" name="date_embauche" value="{{ old('date_embauche') }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('date_embauche')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Description du poste</label>
                    <textarea name="description_poste" rows="3" class="w-full border border-gray-300 p-2 rounded">{{ old('description_poste') }}</textarea>
                    @error('description_poste')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>

                <div class="pt-4">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Ajouter</button>
                    <a href="{{ route('collaborateurs.index') }}" class="ml-4 text-gray-600 hover:underline">Retour</a>
                </div>
            </form>
        </div>
    </body>
    </html>
