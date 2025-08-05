<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une fiche de poste</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 py-8">
    <div class="max-w-3xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Ajouter une fiche de poste</h1>

        <form action="{{ route('postes.store') }}" method="POST" class="bg-white p-6 rounded-lg shadow space-y-4">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">Intitulé <span class="text-red-500">*</span></label>
                <input type="text" name="intitule" value="{{ old('intitule') }}" class="w-full border border-gray-300 p-2 rounded">
                @error('intitule')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" rows="3" class="w-full border border-gray-300 p-2 rounded">{{ old('description') }}</textarea>
                @error('description')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Missions</label>
                <textarea name="missions" rows="3" class="w-full border border-gray-300 p-2 rounded">{{ old('missions') }}</textarea>
                @error('missions')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Compétences</label>
                <textarea name="competences" rows="3" class="w-full border border-gray-300 p-2 rounded">{{ old('competences') }}</textarea>
                @error('competences')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Salaire min (MAD)</label>
                    <input type="number" name="salaire_min" value="{{ old('salaire_min') }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('salaire_min')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Salaire max (MAD)</label>
                    <input type="number" name="salaire_max" value="{{ old('salaire_max') }}" class="w-full border border-gray-300 p-2 rounded">
                    @error('salaire_max')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
                </div>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Évolution possible</label>
                <input type="text" name="evolution_possible" value="{{ old('evolution_possible') }}" class="w-full border border-gray-300 p-2 rounded">
                @error('evolution_possible')<p class="text-red-500 text-sm">{{ $message }}</p>@enderror
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Ajouter</button>
                <a href="{{ route('postes.index') }}" class="ml-4 text-gray-600 hover:underline">Retour</a>
            </div>
        </form>
    </div>
</body>
</html>
