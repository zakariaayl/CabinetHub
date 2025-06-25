<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier un collaborateur</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 py-8">
    <div class="max-w-3xl mx-auto px-4">
        <h1 class="text-3xl font-bold mb-6 text-gray-800">Modifier {{ $collab->prenom }} {{ $collab->nom }}</h1>

        <form action="{{ route('collaborateurs.update', $collab->id) }}" method="POST" class="bg-white p-6 rounded-lg shadow space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Nom</label>
                <input type="text" name="nom" value="{{ $collab->nom }}" class="w-full border border-gray-300 p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Prénom</label>
                <input type="text" name="prenom" value="{{ $collab->prenom }}" class="w-full border border-gray-300 p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Poste</label>
                <input type="text" name="poste" value="{{ $collab->poste }}" class="w-full border border-gray-300 p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Département</label>
                <input type="text" name="departement" value="{{ $collab->departement }}" class="w-full border border-gray-300 p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" value="{{ $collab->email }}" class="w-full border border-gray-300 p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Téléphone</label>
                <input type="text" name="telephone" value="{{ $collab->telephone }}" class="w-full border border-gray-300 p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Adresse</label>
                <input type="text" name="adresse" value="{{ $collab->adresse }}" class="w-full border border-gray-300 p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Date d'embauche</label>
                <input type="date" name="date_embauche" value="{{ $collab->date_embauche }}" class="w-full border border-gray-300 p-2 rounded">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Description du poste</label>
                <textarea name="description_poste" rows="3" class="w-full border border-gray-300 p-2 rounded">{{ $collab->description_poste }}</textarea>
            </div>

            <div class="pt-4">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Enregistrer</button>
                <a href="{{ route('collaborateurs.show', $collab->id) }}" class="ml-4 text-gray-600 hover:underline">Retour</a>
            </div>
        </form>
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
