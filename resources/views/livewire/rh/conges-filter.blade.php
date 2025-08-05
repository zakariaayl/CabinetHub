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

    {{-- TABLE DES DEMANDES --}}
    <div class="overflow-x-auto bg-white rounded-lg shadow">
      <table class="min-w-full divide-y divide-gray-200 text-sm">
        <thead class="bg-gray-50">
          <tr class="text-gray-600 uppercase">
            <th class="px-4 py-2 text-center">Collaborateur</th>
            <th class="px-4 py-2 text-center">Date début</th>
            <th class="px-4 py-2 text-center">Date fin</th>
            <th class="px-4 py-2 text-center">Type</th>
            <th class="px-4 py-2 text-center">Statut</th>
            <th class="px-4 py-2 text-center">Commentaire</th>
            <th class="px-4 py-2 text-center">Justificatif</th>
            <th class="px-4 py-2 text-center">Actions</th>
          </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
          @forelse($conges as $conge)
            <tr class="hover:bg-gray-50">
              <td class="px-4 py-2 text-center">
                {{ $conge->collaborateur->prenom }} {{ $conge->collaborateur->nom }}
              </td>
              <td class="px-4 py-2 text-center">
                {{ \Carbon\Carbon::parse($conge->date_debut)->format('d/m/Y') }}
              </td>
              <td class="px-4 py-2 text-center">
                {{ \Carbon\Carbon::parse($conge->date_fin)->format('d/m/Y') }}
              </td>
              <td class="px-4 py-2 text-center">{{ ucfirst($conge->type) }}</td>
              <td class="px-4 py-2 text-center">
                @php
                  $colors = [
                    'en attente' => 'bg-yellow-100 text-yellow-800',
                    'accepté'    => 'bg-green-100 text-green-800',
                    'refusé'     => 'bg-red-100 text-red-800',
                  ];
                @endphp
                <span class="inline-flex items-center px-2 py-1 text-xs font-semibold rounded-full {{ $colors[$conge->statut] }}">
                  {{ ucfirst($conge->statut) }}
                </span>
              </td>
              <td class="px-4 py-2">{{ $conge->motif ?? '—' }}</td>
              <td class="px-4 py-2 text-center">
                @if($conge->justificatif)
                  <a href="{{ Storage::url($conge->justificatif) }}"
                     download
                     class="text-blue-600 hover:underline">Télécharger</a>
                @else — @endif
              </td>
              <td class="px-4 py-2 text-center">
                {{-- Ici tu reinjectes ton code “Valider/Refuser + modal Alpine” tel quel --}}
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="8" class="px-4 py-4 text-center text-gray-500">Aucune demande trouvée.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-4 flex justify-center">
      {{ $conges->links() }}
    </div>
  </div>
