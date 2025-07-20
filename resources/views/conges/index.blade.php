@extends('layouts.app')

@section('title', 'Gestion des Absences / Congés')

@section('content')
    <div class="border border-gray-200 shadow shadow-gray-300 px-4 py-8">
        <!-- HEADER + NAVIGATION -->
        <div class="mb-6 flex items-center justify-between">
            <h1 class="text-3xl font-bold text-gray-900">Absences / Congés</h1>
        </div>

        <!-- FILTRES -->
        <form method="GET" action="{{ route('rh.conges.index') }}" class="mb-6 flex flex-wrap gap-4 items-end">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Collaborateur</label>
                <input type="text" name="q" value="{{ request('q') }}" placeholder="Nom ou prénom"
                    class="border border-gray-300 px-4 py-2 rounded-md w-56" />
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Type</label>
                <select name="type" class="border border-gray-300 px-4 py-2 rounded-md">
                    <option value="">Tous</option>
                    @foreach([ 'annuel','maladie','exceptionnel','maternité','paternité'] as $t)
                        <option value="{{ $t }}" {{ request('type') === $t ? 'selected' : '' }}>{{ ucfirst($t) }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                <select name="statut" class="border border-gray-300 px-4 py-2 rounded-md">
                    <option value="">Tous</option>
                    @foreach(['en attente','accepté','refusé'] as $s)
                        <option value="{{ $s }}" {{ request('statut') === $s ? 'selected' : '' }}>{{ ucfirst($s) }}</option>
                    @endforeach
                </select>
            </div>

            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition">Filtrer</button>
            <a href="{{ route('rh.conges.index') }}" class="text-gray-600 underline">Réinitialiser</a>
        </form>

        <!-- TABLE -->
        <div class="bg-white rounded-lg shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Collaborateur</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Type</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Début</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Fin</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Statut</th>
                        <th class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($conges as $conge)
                        <tr class="hover:bg-gray-100">
                            <td class="px-4 py-4 whitespace-nowrap text-center">{{ $conge->collaborateur->nom }} {{ $conge->collaborateur->prenom }}</td>
                            <td class="px-4 py-4 text-center capitalize">{{ $conge->type }}</td>
                            <td class="px-4 py-4 text-center">{{ $conge->date_debut->format('d/m/Y') }}</td>
                            <td class="px-4 py-4 text-center">{{ $conge->date_fin->format('d/m/Y') }}</td>
                            <td class="px-4 py-4 text-center">
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
                            <td class="px-4 py-4 text-center">
                                @if($conge->statut === 'en attente')
                                    <form action="{{ route('rh.conges.update', $conge->id) }}" method="POST" class="flex gap-2 justify-center">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="statut" value="accepté">
                                        <button type="submit" class="bg-green-500 hover:bg-green-600 text-white px-3 py-1 rounded">Accepter</button>
                                    </form>
                                    <form action="{{ route('rh.conges.update', $conge->id) }}" method="POST" class="flex gap-2 justify-center mt-1">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="statut" value="refusé">
                                        <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded">Refuser</button>
                                    </form>
                                @else
                                    <span class="text-gray-400 text-sm italic">Action terminée</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-gray-500">Aucune demande trouvée.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- PAGINATION -->
        <div class="mt-4 flex justify-center">
            {{ $conges->withQueryString()->links() }}
        </div>
    </div>

    @if (session('success'))
        <div id="flash-message" class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-3 rounded shadow-lg">
            ✅ {{ session('success') }}
        </div>
        <script>
            setTimeout(() => document.getElementById('flash-message')?.remove(), 3000);
        </script>
    @endif
@endsection
