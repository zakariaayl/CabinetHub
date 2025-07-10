<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil Collaborateur</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 min-h-screen py-8">
    <div class="max-w-4xl mx-auto px-4">

        {{-- Message de bienvenue --}}
        <h1 class="text-3xl font-bold text-gray-800 mb-6">
            Bonjour {{ $collaborateur->prenom }} {{ $collaborateur->nom }}
        </h1>

        {{-- Bloc Présence du jour --}}
        <div class="bg-white p-6 rounded-lg shadow-md mb-8">
            @if ($dejaPointe)
                <p class="text-green-700 font-medium text-lg mb-4">✅ Vous avez déjà pointé aujourd’hui.</p>

                {{-- Bouton Départ (sans logique pour l’instant) --}}
                <form action="#" method="POST">
                    @csrf
                    <input type="hidden" name="id_collaborateur" value="{{ $collaborateur->id }}">
                    <button type="submit"
                        class="bg-red-600 text-white px-6 py-3 rounded-md hover:bg-red-700 font-semibold transition-colors">
                        Enregistrer mon départ
                    </button>
                </form>

            @else
                {{-- Bouton Présence --}}
                <form action="{{ route('presences.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_collaborateur" value="{{ $collaborateur->id }}">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded-md hover:bg-blue-700 font-semibold transition-colors">
                        Enregistrer ma présence
                    </button>
                </form>
            @endif
        </div>

        {{-- Historique des présences --}}
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-semibold text-gray-800 mb-4">Historique des présences</h2>

            @if ($presences->isEmpty())
                <p class="text-gray-500">Aucune présence enregistrée.</p>
            @else
                <div class="overflow-x-auto">
                    <table class="min-w-full table-auto border border-gray-200 text-sm">
                        <thead class="bg-gray-100 text-left text-gray-600 uppercase">
                            <tr>
                                <th class="px-4 py-2 border-b">Date</th>
                                <th class="px-4 py-2 border-b">Heure arrivée</th>
                                <th class="px-4 py-2 border-b">Heure départ</th>
                                <th class="px-4 py-2 border-b">Remarque</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($presences as $presence)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-4 py-2 border-b">{{ \Carbon\Carbon::parse($presence->date_jour)->format('d/m/Y') }}</td>
                                    <td class="px-4 py-2 border-b">{{ $presence->heure_arrivee }}</td>
                                    <td class="px-4 py-2 border-b">
                                        {{ $presence->heure_depart ?? '—' }}
                                    </td>
                                    <td class="px-4 py-2 border-b">
                                        {{ $presence->remarque ?? '—' }}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        {{-- Flash Message --}}
        @if (session('success') || session('danger'))
            <div
                id="flash-message"
                class="fixed top-4 left-1/2 transform -translate-x-1/2 z-50 px-6 py-4 rounded-md shadow-lg text-white text-center
                    {{ session('success') ? 'bg-green-500' : 'bg-red-500' }}"
                role="alert"
            >
                {{ session('success') ?? session('danger') }}
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

    </div>
</body>
</html>
