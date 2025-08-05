@extends('layouts.app')

@section('title', 'Gestion des demandes de congés')

@section('content')
<div class="border border-gray-200 shadow shadow-gray-300 px-4 py-8 max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Demandes de congés</h1>
    <div class="bg-white rounded-lg shadow">
        <livewire:rh.conges-filter />
    </div>

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
  @include('partials.flash')
@endsection
