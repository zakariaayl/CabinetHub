<div>
    <form class="mb-6 flex flex-wrap gap-4 items-end">
      <div>
        <label class="block text-sm font-medium text-gray-700">Nom complet</label>
        <input type="text" wire:model.live.debounce.500ms="search"
               class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2"
               placeholder="Nom ou Prénom">
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Poste</label>
        <select wire:model.live.debounce="poste"
                class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
          <option value="">Tous les postes</option>
          @foreach($postes as $p)
            <option value="{{ $p }}">{{ $p }}</option>
          @endforeach
        </select>
      </div>

      <div>
        <label class="block text-sm font-medium text-gray-700">Département</label>
        <select wire:model.live.debounce="departement"
                class="mt-1 block w-full border border-gray-300 rounded-md px-3 py-2">
          <option value="">Tous les départements</option>
          @foreach($depts as $d)
            <option value="{{ $d }}">{{ $d }}</option>
          @endforeach
        </select>
      </div>

      <div>
        <button
            wire:click.prevent="resetFilters"
            class="bg-gray-200 text-gray-800 px-4 py-2 rounded hover:bg-gray-300"
            >
            Réinitialiser
        </button>
       </div>
    </form>

    <div class="bg-white rounded-lg shadow overflow-hidden">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Nom</th>
            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Prénom</th>
            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Poste</th>
            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Département</th>
            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Présent&nbsp;aujourd'hui</th>
            <th class="px-6 py-3 text-xs font-medium text-gray-500 uppercase">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @forelse($collaborateurs as $collab)
            <tr class="hover:bg-gray-100">
              <td class="px-6 py-4 text-center">{{ $collab->nom }}</td>
              <td class="px-6 py-4 text-center">{{ $collab->prenom }}</td>
              <td class="px-6 py-4 text-center">{{ $collab->poste }}</td>
              <td class="px-6 py-4 text-center">{{ $collab->departement }}</td>
              <td class="px-6 py-4 text-center">
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
              <td class="px-6 py-4 text-center">
                <a href="{{ route('collaborateurs.show',$collab->id) }}"
                   class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">
                  Voir
                </a>
              </td>
            </tr>
          @empty
            <tr><td colspan="6" class="px-6 py-4 text-center text-gray-500">Aucun collaborateur trouvé.</td></tr>
          @endforelse
        </tbody>
      </table>
    </div>

  </div>
