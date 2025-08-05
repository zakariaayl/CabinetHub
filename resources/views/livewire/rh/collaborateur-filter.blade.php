<div class="p-4">
    <form class="mb-6 flex flex-wrap justify-center gap-6 bg-white p-6 rounded-lg shadow items-end">
        <!-- Nom complet -->
        <div class="flex flex-col">
            <label for="search" class="text-sm font-semibold text-gray-700 mb-1">Nom complet</label>
            <input
                id="search"
                type="text"
                wire:model.live.debounce.500ms="search"
                placeholder="Nom ou Prénom"
                class="w-60 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
            />
        </div>

        <!-- Poste -->
        <div class="flex flex-col">
            <label for="poste" class="text-sm font-semibold text-gray-700 mb-1">Poste</label>
            <select
                id="poste"
                wire:model.live.debounce="poste"
                class="w-52 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
            >
                <option value="">Tous les postes</option>
                @foreach($postes as $p)
                    <option value="{{ $p }}">{{ $p }}</option>
                @endforeach
            </select>
        </div>

        <!-- Département -->
        <div class="flex flex-col">
            <label for="departement" class="text-sm font-semibold text-gray-700 mb-1">Département</label>
            <select
                id="departement"
                wire:model.live.debounce="departement"
                class="w-52 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
            >
                <option value="">Tous les départements</option>
                @foreach($departements as $d)
                    <option value="{{ $d }}">{{ $d }}</option>
                @endforeach
            </select>
        </div>

        <!-- Présence -->
        <div class="flex flex-col">
            <label for="presence" class="text-sm font-semibold text-gray-700 mb-1">Présence</label>
            <select
                id="presence"
                wire:model.live="presence"
                class="w-52 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
            >
                <option value="">Tous</option>
                <option value="present">Présent</option>
                <option value="absent">Absent</option>
            </select>
        </div>
        
        <!-- Bouton Réinitialiser -->
        <div>
            <button
                wire:click.prevent="resetFilters"
                class="mt-1 px-5 py-2 bg-red-500 text-white font-medium rounded hover:bg-red-600 transition"
            >
                Réinitialiser
            </button>
        </div>
    </form>

    <!-- Table des collaborateurs -->
    <div class="bg-white rounded-lg shadow overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-center">Nom</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-center">Prénom</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-center">Poste</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-center">Département</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-center">Présent aujourd'hui</th>
                    <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse($collaborateurs as $collab)
                    <tr class="hover:bg-gray-100 text-center">
                        <td class="px-6 py-4">{{ $collab->nom }}</td>
                        <td class="px-6 py-4">{{ $collab->prenom }}</td>
                        <td class="px-6 py-4">{{ $collab->poste }}</td>
                        <td class="px-6 py-4">{{ $collab->departement }}</td>
                        <td class="px-6 py-4">
                            @if($collab->isPresentToday)
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-green-100 text-green-800">
                                    Présent
                                </span>
                            @else
                                <span class="px-2 py-1 text-xs font-semibold rounded-full bg-red-100 text-red-800">
                                    Absent
                                </span>
                            @endif
                        </td>
                        <td class="px-6 py-4">
                            <a
                                href="{{ route('collaborateurs.show', $collab->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition"
                            >
                                Voir
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            Aucun collaborateur trouvé.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
