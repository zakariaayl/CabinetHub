@extends('layouts.app2')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
  <div class="flex items-center justify-between mb-6">
    <h1 class="text-2xl font-semibold text-gray-900">Documents d'achat</h1>
    <div class="flex items-center gap-3">
      <form action="" method="GET" class="flex items-center gap-2">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Recherche (référence, fournisseur, type)" class="px-3 py-2 border rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500" />
        <select name="status" class="px-3 py-2 border rounded-lg text-sm focus:outline-none">
          <option value="">Tous</option>
          <option value="brouillon" {{ request('status')=='brouillon' ? 'selected' : '' }}>Brouillon</option>
          <option value="payé" {{ request('status')=='payé' ? 'selected' : '' }}>Payé</option>
          <option value="échoué" {{ request('status')=='échoué' ? 'selected' : '' }}>Échoué</option>
        </select>
        <button type="submit" class="inline-flex items-center gap-2 px-3 py-2 bg-indigo-600 text-white rounded-lg text-sm">Rechercher</button>
      </form>

      <a href="" class="inline-flex items-center gap-2 px-4 py-2 bg-green-600 text-white rounded-lg text-sm">Nouvel enregistrement</a>
    </div>
  </div>

  <!-- Table / List -->
  <div class="bg-white shadow rounded-lg overflow-hidden">
    <div class="hidden md:block">
      <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
          <tr>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Référence</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Type</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Fournisseur</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date émission</th>
            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date échéance</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Montant HT</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">TVA</th>
            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">TTC</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Fichier</th>
            <th class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th class="px-6 py-3"></th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
          @forelse($documents as $doc)
          <tr>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $doc->reference }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $doc->type }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">{{ $doc->fournisseur }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ optional($doc->date_emission)->format('d/m/Y') }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ optional($doc->date_echeance)->format('d/m/Y') }}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-mono">{{ number_format($doc->montant_ht, 2, ',', ' ') }} MAD</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-mono">{{ number_format($doc->montant_tva, 2, ',', ' ') }} MAD</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-right font-mono">{{ number_format($doc->montant_ttc, 2, ',', ' ') }} MAD</td>
            <td class="px-6 py-4 whitespace-nowrap text-center">
              @if($doc->fichier_pdf)
                <a href="{{ asset('storage/'.$doc->fichier_pdf) }}" target="_blank" class="inline-flex items-center gap-2 px-3 py-1 border rounded-md text-sm">Voir PDF</a>
              @else
                <span class="text-sm text-gray-400">—</span>
              @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-center">
              @php
                $status = strtolower($doc->status);
              @endphp
              @if($status === 'payé' || $status === 'paye' || $status === 'paid')
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-green-100 text-green-800">Payé</span>
              @elseif($status === 'en attente' || $status === 'pending')
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-yellow-100 text-yellow-800">En attente</span>
              @elseif($status === 'annulé' || $status === 'echoue' || $status === 'échoué')
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-red-100 text-red-800">Annulé</span>
              @else
                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-gray-100 text-gray-800">{{ ucfirst($doc->status) }}</span>
              @endif
            </td>
            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
              <a href="" class="text-indigo-600 hover:text-indigo-900 mr-3">Voir</a>
              <a href="" class="text-yellow-600 hover:text-yellow-900 mr-3">Éditer</a>
              <form action="" method="POST" class="inline-block" onsubmit="return confirm('Supprimer ce document ?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900">Supprimer</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="11" class="px-6 py-12 text-center text-gray-500">Aucun document trouvé.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <!-- Mobile list -->
    <div class="md:hidden p-4">
      @forelse($documents as $doc)
        <div class="border rounded-lg p-3 mb-3 bg-white">
          <div class="flex items-start justify-between">
            <div>
              <div class="text-sm font-semibold">{{ $doc->reference }}</div>
              <div class="text-xs text-gray-500">{{ $doc->fournisseur }} · {{ $doc->type }}</div>
            </div>
            <div class="text-right text-sm font-mono">{{ number_format($doc->montant_ttc, 2, ',', ' ') }} MAD</div>
          </div>
          <div class="mt-2 flex items-center justify-between text-xs text-gray-600">
            <div>Émis: {{ optional($doc->date_emission)->format('d/m/Y') }}</div>
            <div>Échéance: {{ optional($doc->date_echeance)->format('d/m/Y') }}</div>
          </div>
          <div class="mt-3 flex items-center justify-between">
            <div>
              @if($doc->fichier_pdf)
                <a href="{{ asset('storage/'.$doc->fichier_pdf) }}" target="_blank" class="inline-block px-3 py-1 border rounded-md text-xs">Voir PDF</a>
              @endif
            </div>
            <div class="flex items-center gap-2">
              <a href="" class="text-indigo-600 text-sm">Voir</a>
              <a href="" class="text-yellow-600 text-sm">Éditer</a>
            </div>
          </div>
        </div>
      @empty
        <div class="text-center text-gray-500">Aucun document trouvé.</div>
      @endforelse
    </div>

    <div class="px-4 py-3 bg-gray-50 border-t flex items-center justify-between">
      {{-- <div class="text-sm text-gray-600">Affichage de {{ $documents->firstItem() ?? 0 }} à {{ $documents->lastItem() ?? 0 }} sur {{ $documents->total() ?? 0 }}</div>
      <div>
        {{ $documents->appends(request()->query())->links() }}
      </div> --}}
    </div>
  </div>
</div>
@endsection
