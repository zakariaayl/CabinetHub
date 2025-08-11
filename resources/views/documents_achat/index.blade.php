@extends('layouts.app2')

@section('content')
<div class="px-4 sm:px-6 lg:px-8 py-8 mt-10">
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


  <div class="w-full ">
    <div class="grid grid-cols-1 md:grid-cols-5 gap-4">

          @forelse($documents as $doc)
         <div class="bg-white shadow-lg hover:shadow-xl hover:scale-105 transition rounded-lg w-full ">

            <div class="w-full relative group overflow-hidden rounded-t-lg">
    <div class="absolute rounded-t-lg bg-black bg-opacity-40 px-6 py-4 text-sm text-white mr-7 w-full
        transform -translate-y-full transition-transform duration-200 ease-in-out group-hover:translate-y-0">
        {{ $doc->type }}
    </div>

    <img class="w-full h-64 rounded-md" src="{{ asset($doc->fichier_pdf).'.png'}}" alt="il n y a pas une image disponible" />
</div>

            <div class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex ">

              @if($doc->fichier_pdf)
                <a href="{{ asset($doc->fichier_pdf).'.pdf' }}" target="_blank" class="inline-flex items-center gap-2 px-3 py-1 border rounded-md text-sm text-blue-500">Voir PDF</a>
              @else
                <span class="text-sm text-gray-400">—</span>
              @endif
              <a href="{{route('Document_achat.edit',$doc->id)}}" class=" ml-3 inline-flex items-center gap-2 px-3 py-1 border rounded-md text-sm text-emerald-400">utiliser</a>
            </div>
          </div>
          @empty
          <tr>
            <div colspan="11" class="px-6 py-12 text-center text-gray-500">Aucun document trouvé.</div>
          </tr>
          </div>
          @endforelse

    </div>

    {{-- <div class="md:hidden p-4">
      @forelse($documents as $doc)
        <div class="border rounded-lg p-3 mb-3 md:hidden bg-white">
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
    </div> --}}

    {{-- <div class="px-4 py-3 bg-gray-50 border-t flex items-center justify-between">
      {{-- <div class="text-sm text-gray-600">Affichage de {{ $documents->firstItem() ?? 0 }} à {{ $documents->lastItem() ?? 0 }} sur {{ $documents->total() ?? 0 }}</div>
      <div>
        {{ $documents->appends(request()->query())->links() }}
      </div>
    </div> --}}
  </div>
</div>
@endsection
