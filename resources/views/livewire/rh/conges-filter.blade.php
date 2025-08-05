<div>
    {{-- FILTRES DYNAMIQUES --}}
    <form class="mb-6 flex flex-wrap justify-center gap-6 bg-white p-6 rounded-lg shadow items-end">
        <!-- Collaborateur -->
        <div class="flex flex-col">
            <label for="collaborateur" class="text-sm font-semibold text-gray-700 mb-1">Collaborateur</label>
            <input
                id="collaborateur"
                type="text"
                wire:model.live.debounce.500ms="collaborateur"
                placeholder="Nom ou Prénom"
                class="w-60 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
            />
        </div>

        <!-- Type -->
        <div class="flex flex-col">
            <label for="type" class="text-sm font-semibold text-gray-700 mb-1">Type</label>
            <select
                id="type"
                wire:model.live="type"
                class="w-52 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
            >
                <option value="">Tous les types</option>
                @foreach(['annuel','maladie','exceptionnel','sans_solde','maternite_paternite'] as $t)
                    <option value="{{ $t }}">{{ ucfirst($t) }}</option>
                @endforeach
            </select>
        </div>

        <!-- Statut -->
        <div class="flex flex-col">
            <label for="statut" class="text-sm font-semibold text-gray-700 mb-1">Statut</label>
            <select
                id="statut"
                wire:model.live="statut"
                class="w-52 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
            >
                <option value="">Tous les statuts</option>
                @foreach(['en attente','accepté','refusé'] as $s)
                    <option value="{{ $s }}">{{ ucfirst($s) }}</option>
                @endforeach
            </select>
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
  </div>
