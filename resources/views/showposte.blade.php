<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail de la fiche de poste</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 py-8">
    <div class="max-w-3xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Détail de la fiche de poste</h1>

        <div class="bg-white p-6 rounded-lg shadow space-y-4">
            <div><strong class="text-gray-700">Intitulé :</strong> {{ $poste->intitule }}</div>
            <div><strong class="text-gray-700">Description :</strong> {{ $poste->description }}</div>
            <div><strong class="text-gray-700">Missions :</strong><br> {!! nl2br(e($poste->missions)) !!}</div>
            <div><strong class="text-gray-700">Compétences :</strong><br> {!! nl2br(e($poste->competences)) !!}</div>
            <div><strong class="text-gray-700">Salaire :</strong> {{ $poste->salaire_min }} - {{ $poste->salaire_max }} MAD</div>
            <div><strong class="text-gray-700">Évolution possible :</strong> {{ $poste->evolution_possible }}</div>
        </div>

        <div class="flex space-x-4 mt-6">
            <a href="{{ route('postes.edit', $poste->id) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-400">Modifier</a>

            <form action="{{ route('postes.destroy', $poste->id) }}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Supprimer</button>
            </form>

            <a href="{{ route('postes.index') }}" class="ml-auto text-blue-600 hover:underline">← Retour à la liste</a>
        </div>
    </div>
</body>
</html>
