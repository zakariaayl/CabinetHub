{{-- resources/views/postes/index.blade.php ou le fichier correspondant --}}
@extends('layouts.app')

@section('title', 'Fiches de poste')

@section('content')
<div class="border border-gray-200 shadow shadow-gray-300 px-4 py-8 max-w-7xl mx-auto">
    <h1 class="text-3xl font-bold text-gray-900 mb-6">Fiches de Poste</h1>

    <!-- TABLEAU DES POSTES -->
    <div class="bg-white rounded-lg shadow">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Intitulé</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Salaire</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Évolution</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @forelse ($postes as $poste)
                    <tr class="hover:bg-gray-100">
                        <td class="px-6 py-4">{{ $poste->intitule }}</td>
                        <td class="px-6 py-4">{{ $poste->salaire_min }} – {{ $poste->salaire_max }} MAD</td>
                        <td class="px-6 py-4">{{ $poste->evolution_possible }}</td>
                        <td class="px-6 py-4">
                            <a href="{{ route('postes.show', $poste->id) }}" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600">Voir</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="px-6 py-4 text-center">Aucune fiche trouvée.</td>
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
</div>

{{-- Inclusion du partial flash --}}
@include('partials.flash')

@endsection
