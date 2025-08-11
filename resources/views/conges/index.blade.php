@extends('layouts.app')

@section('title', 'Gestion des demandes de congés')

@section('content')
<div class="border border-gray-200 shadow shadow-gray-300 px-4 py-8 max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Demandes de congés</h1>

    {{-- Boîte blanche contenant les filtres (même visuel que l'ancien) --}}
    <div class="bg-white rounded-lg shadow mb-6 p-4">
        {{-- Si tu veux réutiliser le composant Livewire à la place du form, remplace ce form par <livewire:rh.conges-filter /> --}}
        <form method="GET" action="{{ route('rh.conges.index') }}" class="mb-0 flex flex-wrap justify-center gap-6 items-end">
            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-700 mb-1">Collaborateur</label>
                <input
                  type="text"
                  name="collaborateur"
                  value="{{ request('collaborateur') }}"
                  placeholder="Nom ou prénom"
                  class="border border-gray-300 px-4 py-2 rounded-md w-60"
                />
            </div>

            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-700 mb-1">Type</label>
                <select name="type" class="border border-gray-300 px-4 py-2 rounded-md w-48">
                    <option value="">Tous</option>
                    @foreach(['annuel','maladie','exceptionnel','sans_solde','maternite_paternite'] as $t)
                        <option value="{{ $t }}" @selected(request('type')==$t)>{{ ucfirst($t) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col">
                <label class="text-sm font-medium text-gray-700 mb-1">Statut</label>
                <select name="statut" class="border border-gray-300 px-4 py-2 rounded-md w-48">
                    <option value="">Tous</option>
                    @foreach(['en attente','accepté','refusé'] as $s)
                        <option value="{{ $s }}" @selected(request('statut')==$s)>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex items-end gap-2">
                <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                  Filtrer
                </button>
                <a href="{{ route('rh.conges.index') }}"
                   class="px-4 py-2 bg-gray-200 text-gray-800 rounded-md hover:bg-gray-300 transition">
                  Réinitialiser
                </a>
            </div>
        </form>
    </div>

    {{-- TABLE DES DEMANDES (même markup que tu avais) --}}
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
                <!-- within the <td> for actions (per-row modal) -->
                <td class="px-4 py-2 text-center" x-data="{ openReject: false }" @keydown.escape.window="openReject = false">
                    @if($conge->statut === 'en attente')
                    <form action="{{ route('rh.conges.update', $conge->id) }}" method="POST" class="inline-block">
                        @csrf @method('PUT')
                        <input type="hidden" name="statut" value="accepté">
                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">Valider</button>
                    </form>

                    <button @click="openReject = true" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded ml-2">
                        Refuser
                    </button>

                    <!-- Overlay -->
                    <div x-cloak x-show="openReject" x-transition.opacity
                        class="fixed inset-0 z-40 bg-black/50"></div>

                    <!-- Modal container (above overlay) -->
                    <div x-cloak x-show="openReject" x-transition
                        class="fixed inset-0 z-50 flex items-center justify-center p-4">
                        <div @click.away="openReject = false"
                            class="bg-white rounded-lg shadow-lg w-full max-w-md p-6">
                        <h2 class="text-lg font-bold mb-4">Motif du refus</h2>

                        <form action="{{ url('rh/conges/' . $conge->id . '/refuser') }}" method="POST">
                            @csrf @method('PATCH')
                            <textarea name="response_message"
                                    class="w-full border-gray-300 rounded-md p-2 mb-4"
                                    rows="4"
                                    placeholder="Expliquez la raison du refus…" required></textarea>

                            <div class="flex justify-end space-x-2">
                            <button type="button" @click="openReject = false"
                                    class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Annuler</button>
                            <button type="submit"
                                    class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Envoyer le refus</button>
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

      {{-- Pagination --}}
      <div class="mt-4 flex justify-center">
        {{ $conges->withQueryString()->links() }}
      </div>

  @include('partials.flash')
</div>
@endsection
