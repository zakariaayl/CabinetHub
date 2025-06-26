<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Fiche Collaborateur</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-3xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Fiche de {{ $resource->designation }}</h1>

        <div class="bg-white shadow-md rounded-lg p-6 space-y-4">
            <div><strong class="text-gray-700">Type :</strong> {{ $resource->type }}</div>
            <div><strong class="text-gray-700">marque :</strong> {{ $resource->marque }}</div>
            <div><strong class="text-gray-700">modele :</strong> {{ $resource->modele }}</div>
            <div><strong class="text-gray-700">etat :</strong> {{ $resource->etat }}</div>
            <div><strong class="text-gray-700">localisation :</strong> {{ $resource->localisation }}</div>
            <div><strong class="text-gray-700">Date d'achat :</strong> {{ $resource->date_achat }}</div>
            <div><strong class="text-gray-700">numero de serie :</strong> {{ $resource->numero_serie }}</div>
            <div><strong class="text-gray-700">utilisateur affecte :</strong> {{ $resource->utilisateur_affecte }}</div>

            <div><strong class="text-gray-700">remarque :</strong><br>
                <p class="mt-1 text-gray-600 whitespace-pre-line">{{ $resource->remarque }}</p>
            </div>

        </div>

        <!-- BOUTONS -->
        <div class="mt-6 flex space-x-4">
            <a href="{{ route('resourceview.edit', $resource->id) }}" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-400">Modifier</a>

            <form action="{{ route('resourceview.destroy', $resource->id) }}" method="POST" onsubmit="return confirm('⚠️ Êtes-vous sûr de vouloir supprimer ce collaborateur ?')" class="inline">
            @csrf
            @method('DELETE')
            <a href="#"><button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-400">Supprimer</button></a>
            </form>
            <a href="{{ url('/RH/seeAllresources') }}" class="ml-auto text-blue-600 hover:underline">← Retour</a>
        </div>
    </div>
</body>
@if (session('success') || session('danger'))
    <div
        id="flash-message"
        class="fixed top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-50 px-6 py-4 rounded-md shadow-lg text-white text-center
            {{ session('success') ? 'bg-green-500' : 'bg-red-500' }}"
        role="alert"
    >
        @if (session('success')) ✅ {{ session('success') }} @endif
        @if (session('danger')) ❌ {{ session('danger') }} @endif
    </div>

    <script>
        setTimeout(() => {
            const toast = document.getElementById('flash-message');
            if (toast) {
                toast.style.opacity = '0';
                toast.style.transition = 'opacity 0.5s';
                setTimeout(() => toast.remove(), 500);
            }
        }, 3000);
    </script>
@endif
</html>
