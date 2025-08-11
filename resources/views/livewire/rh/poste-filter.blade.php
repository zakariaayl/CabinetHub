<div class="p-4">
    {{-- FILTRE --}}
    <form class="mb-6 flex flex-wrap justify-center gap-6 bg-white p-6 rounded-lg shadow items-end">
        <!-- Intitulé -->
        <div class="flex flex-col">
            <label for="search" class="text-sm font-semibold text-gray-700 mb-1">Intitulé</label>
            <input
                id="search"
                type="text"
                wire:model.live.debounce.500ms="search"
                placeholder="Recherche par intitulé"
                class="w-60 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-300"
            />
        </div>

        <!-- Salaire (unique) -->
        <div class="flex flex-col">
            <label for="salary" class="text-sm font-semibold text-gray-700 mb-1">Salaire (MAD)</label>
            <input
            id="salary"
            type="number"
            wire:model.live.debounce.500ms="salary"
            min="0"
            placeholder="Ex : 10000"
            class="w-40 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-300"
            />
        </div>

        <!-- Évolution possible -->
        <div class="flex flex-col">
            <label for="evolution" class="text-sm font-semibold text-gray-700 mb-1">Évolution</label>
            <input
                id="evolution"
                type="text"
                wire:model.live.debounce.500ms="evolution"
                placeholder="Ex : promotion, chef d’équipe…"
                class="w-60 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-2 focus:ring-indigo-300"
            />
        </div>

        <!-- Réinitialiser -->
        <div>
            <button
                wire:click.prevent="resetFilters"
                class="mt-1 px-5 py-2 bg-red-500 text-white font-medium rounded hover:bg-red-600 transition"
            >
                Réinitialiser
            </button>
        </div>
    </form>

    {{-- TABLE DES POSTES --}}
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200 text-sm">
            <thead class="bg-gray-50">
                <tr class="text-gray-600 uppercase">
                    <th class="px-6 py-3 text-left">Intitulé</th>
                    <th class="px-6 py-3 text-left">Salaire</th>
                    <th class="px-6 py-3 text-left">Évolution</th>
                    <th class="px-6 py-3 text-left">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($postes as $poste)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $poste->intitule }}</td>
                        <td class="px-6 py-4">{{ $poste->salaire_min }}–{{ $poste->salaire_max }} MAD</td>
                        <td class="px-6 py-4">{{ $poste->evolution_possible }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('postes.show', $poste->id) }}"
                               class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition">
                                Voir
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                            Aucune fiche trouvée.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <!-- BOUTON AJOUT -->
    <div class="mt-6 flex justify-center">
        <a href="{{ route('postes.create') }}"
           class="bg-blue-600 text-white px-6 py-3 rounded-xl shadow hover:bg-blue-700 transition">
            + Ajouter une fiche de poste
        </a>
    </div>

    {{-- PAGINATION --}}
    <div class="mt-4 flex justify-center">
        {{ $postes->links() }}
    </div>
</div>
