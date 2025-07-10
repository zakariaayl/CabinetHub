<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Demande de congé - Formulaire</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50 py-10">
    <div class="max-w-xl mx-auto bg-white p-8 rounded shadow">
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Demande de congé</h2>

        {{-- Affichage des erreurs Laravel --}}
        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('conges.store', ['id' => $collaborateur->id]) }}" method="POST" enctype="multipart/form-data" novalidate>
            @csrf
            <input type="hidden" name="collaborateur_id" value="{{ $collaborateur->id }}">

            <div class="mb-5">
                <label for="date_debut" class="block font-semibold mb-1 text-gray-700">Date de début <span class="text-red-500">*</span></label>
                <input
                    type="date"
                    id="date_debut"
                    name="date_debut"
                    value="{{ old('date_debut') }}"
                    required
                    class="w-full border rounded px-4 py-2"
                    min="{{ date('Y-m-d') }}"
                />
            </div>

            <div class="mb-5">
                <label for="date_fin" class="block font-semibold mb-1 text-gray-700">Date de fin <span class="text-red-500">*</span></label>
                <input
                    type="date"
                    id="date_fin"
                    name="date_fin"
                    value="{{ old('date_fin') }}"
                    required
                    class="w-full border rounded px-4 py-2"
                    min="{{ date('Y-m-d') }}"
                />
            </div>

            <div class="mb-5">
                <label for="type_conge" class="block font-semibold mb-1 text-gray-700">Type de congé <span class="text-red-500">*</span></label>
                <select
                    id="type_conge"
                    name="type_conge"
                    required
                    class="w-full border rounded px-4 py-2"
                >
                    <option value="">-- Sélectionnez --</option>
                    <option value="annuel" {{ old('type_conge') == 'annuel' ? 'selected' : '' }}>Annuel</option>
                    <option value="maladie" {{ old('type_conge') == 'maladie' ? 'selected' : '' }}>Maladie</option>
                    <option value="exceptionnel" {{ old('type_conge') == 'exceptionnel' ? 'selected' : '' }}>Exceptionnel</option>
                    <option value="sans_solde" {{ old('type_conge') == 'sans_solde' ? 'selected' : '' }}>Sans solde</option>
                </select>
            </div>

            <div class="mb-5">
                <label for="motif" class="block font-semibold mb-1 text-gray-700">Motif / Commentaire</label>
                <textarea
                    id="motif"
                    name="motif"
                    rows="4"
                    class="w-full border rounded px-4 py-2"
                    placeholder="Expliquez brièvement la raison de votre demande..."
                >{{ old('motif') }}</textarea>
            </div>

            <div class="mb-6">
                <label for="justificatif" class="block font-semibold mb-1 text-gray-700">Justificatif (optionnel)</label>
                <div class="mb-6 border border-gray-300 rounded p-2 bg-white">
                    <input
                        type="file"
                        id="justificatif"
                        name="justificatif"
                        accept=".pdf,.jpg,.jpeg,.png,.doc,.docx"
                        class="w-full cursor-pointer text-gray-700"
                    />
                </div>
                <small class="text-gray-500">Formats acceptés: pdf, jpg, png, doc. Max 2 Mo.</small>
            </div>

            <button
                type="submit"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded font-semibold transition-colors"
            >
                Envoyer la demande
            </button>
            <a href="{{ route('collaborateur.home', ['id' => $collaborateur->id]) }}"
                class="inline-block mt-4 px-6 py-3 bg-gray-300 rounded-md hover:bg-gray-400 text-gray-800 font-semibold transition-colors">
                 ← Retour
             </a>
        </form>
    </div>

    <script>
        // Validation simple côté client
        document.querySelector('form').addEventListener('submit', function(e) {
            const dateDebut = document.getElementById('date_debut').value;
            const dateFin = document.getElementById('date_fin').value;

            if (dateFin < dateDebut) {
                alert('La date de fin doit être postérieure ou égale à la date de début.');
                e.preventDefault();
            }
        });
    </script>
</body>
</html>
