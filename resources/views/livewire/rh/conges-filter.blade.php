<div class="p-4">
    <form class="mb-6 flex flex-wrap justify-center gap-6 bg-white p-6 rounded-lg shadow items-end">

        {{-- Collaborateur --}}
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

        {{-- Type --}}
        <div class="flex flex-col">
            <label for="type" class="text-sm font-semibold text-gray-700 mb-1">Type</label>
            <select
                id="type"
                wire:model.live="type"
                class="w-52 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
            >
                <option value="">Tous les types</option>
                <option value="annuel">Annuel</option>
                <option value="maladie">Maladie</option>
                <option value="exceptionnel">Exceptionnel</option>
                <option value="sans_solde">Sans solde</option>
                <option value="maternite_paternite">Maternité / Paternité</option>
            </select>
        </div>

        {{-- Statut --}}
        <div class="flex flex-col">
            <label for="statut" class="text-sm font-semibold text-gray-700 mb-1">Statut</label>
            <select
                id="statut"
                wire:model.live="statut"
                class="w-52 px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
            >
                <option value="">Tous les statuts</option>
                <option value="en attente">En attente</option>
                <option value="accepté">Accepté</option>
                <option value="refusé">Refusé</option>
            </select>
        </div>

        {{-- Bouton Réinitialiser --}}
        <div>
            <button
                wire:click.prevent="resetFilters"
                class="mt-1 px-5 py-2 bg-red-500 text-white font-medium rounded hover:bg-red-600 transition"
            >
                Réinitialiser
            </button>
        </div>

    </form>

    {{-- TABLE --}}
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
                                   class="text-blue-600 hover:underline">
                                    Télécharger
                                </a>
                            @else
                                —
                            @endif
                        </td>
                        <td class="px-4 py-2 text-center" x-data="{ openReject: false }">
                            @if($conge->statut === 'en attente')
                                <form action="{{ route('rh.conges.update', $conge->id) }}" method="POST" class="inline-block">
                                    @csrf @method('PUT')
                                    <input type="hidden" name="statut" value="accepté">
                                    <button type="submit"
                                            class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">
                                        Valider
                                    </button>
                                </form>
                                <button @click="openReject = true"
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded ml-2">
                                    Refuser
                                </button>
                                <div x-cloak x-show="openReject"
                                     x-transition
                                     class="fixed inset-0 bg-transparent bg-opacity-50 flex items-center justify-center p-4">
                                    <div @click.away="openReject = false" class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                                        <h2 class="text-lg font-bold mb-4">Motif du refus</h2>
                                        <form action="{{ url('rh/conges/' . $conge->id . '/refuser') }}" method="POST">
                                            @csrf @method('PATCH')
                                            <textarea name="response_message"
                                                      class="w-full border-gray-300 rounded-md p-2 mb-4"
                                                      rows="4"
                                                      placeholder="Expliquez la raison du refus…" required></textarea>
                                            <div class="flex justify-end space-x-2">
                                                <button type="button"
                                                        @click="openReject = false"
                                                        class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                                                    Annuler
                                                </button>
                                                <button type="submit"
                                                        class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                                                    Envoyer le refus
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @else
                                <span class="text-gray-500 italic">—</span>
                            @endif
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

    {{-- PAGINATION --}}
    <div class="mt-4 flex justify-center">
        {{ $conges->links() }}
    </div>
</div>
