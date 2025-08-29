<div class="p-4">

    <form class=" justify-center bg-white p-6 rounded-lg shadow-md gap-2  border border-gray-100 items-end mb-4">
         <h1 class="text-2xl font-sans text-black mb-3">Filtres des Collaborateurs</h1>
        <div class="mb-6 grid grid-col-1 md:grid-cols-4 gap-3 ">
        <div class="flex flex-col  w-full">
            <label for="search" class="text-sm font-semibold text-gray-700 mb-1">Nom complet</label>
            <input
                id="search"
                type="text"
                wire:model.live.debounce.500ms="search"
                placeholder="Nom ou Prénom"
                class=" px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300 w-full"
            />
        </div>

        <!-- Poste -->
        <div class="flex flex-col w-full">
            <label for="poste" class="text-sm font-semibold text-gray-700 mb-1">Poste</label>
            <select
                id="poste"
                wire:model.live.debounce="poste"
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
            >
                <option value="">Tous les postes</option>
                @foreach($postes as $p)
                    <option value="{{ $p }}">{{ $p }}</option>
                @endforeach
            </select>
        </div>

        <!-- Département -->
        <div class="flex flex-col  w-full">
            <label for="departement" class="text-sm font-semibold text-gray-700 mb-1">Département</label>
            <select
                id="departement"
                wire:model.live.debounce="departement"
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
            >
                <option value="">Tous les départements</option>
                @foreach($departements as $d)
                    <option value="{{ $d }}">{{ $d }}</option>
                @endforeach
            </select>
        </div>

        <!-- Présence -->
        <div class="flex flex-col  w-full">
            <label for="presence" class="text-sm font-semibold text-gray-700 mb-1">Présence</label>
            <select
                id="presence"
                wire:model.live="presence"
                class="w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-300"
            >
                <option value="">Tous</option>
                <option value="present">Présent</option>
                <option value="absent">Absent</option>
            </select>
        </div>

        </div>
    </form>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-gradient-to-br from-blue-400 to-indigo-400 shadow-md rounded-2xl p-6 flex flex-col items-center justify-center border border-gray-200 hover:shadow-lg transition">
        {{-- <i class="fa-solid  fa-hourglass-half text-gray-200 text-3xl"></i> --}}
        <i class="fa-regular fa-user text-purple-700 text-3xl"></i>
        <h4 class="text-md font-snas text-purple-700 mb-1">total d'employee</h4>
        <p class="text-xl font-bold text-purple-700">{{$all}}</p>
    </div>
     <div class="bg-gradient-to-br from-green-400 to-emerald-400 shadow-md rounded-2xl p-6 flex flex-col items-center justify-center border border-green-200 hover:shadow-lg transition">
        {{-- <i class="fa-solid fa-check-circle "></i> --}}
        <i class="fa-regular fa-square-check text-emerald-700 text-3xl"></i>
        <h4 class="text-md font-snas text-emerald-700  mb-1">present aujourd hui</h4>
        <p class="text-xl font-bold  text-emerald-700">{{$pres}}</p>
    </div>
    <div class="bg-gradient-to-br from-blue-400 to-indigo-400 shadow-md rounded-2xl p-6 flex flex-col items-center justify-center border border-indigo-200 hover:shadow-lg transition">
        <i class="fa-solid  fa-hourglass-half  text-indigo-700 text-3xl"></i>
        <h4 class="text-md font-snas text-indigo-700 text-indifo-700 mb-1">besoin actuel d'employe</h4>
        <p class="text-xl font-bold text-indigo-700">1</p>
    </div>

    <div class="bg-gradient-to-br from-red-400 to-rose-400 shadow-md rounded-2xl p-6 flex flex-col items-center justify-center border border-red-200 hover:shadow-lg transition">
        <i class="fa-regular fa-times-circle text-red-900 text-3xl"></i>
        <h4 class="text-md font-semibold text-red-900 mb-1">absent aujourd hui </h4>
        <p class="text-xl font-bold text-red-900">{{$abs}}</p>
    </div>
</div>

    <!-- Table des collaborateurs -->
    <div class="bg-white  rounded-lg  overflow-x-auto">
        <table class="min-w-full divide-y shadow-xl  divide-gray-200">
            <thead class="bg-gradient-to-br from-sky-300 to-indigo-200">
                <tr>
                    <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">Nom</th>
                    <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">Prénom</th>
                    <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">Poste</th>
                    <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">Département</th>
                    <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">Présent aujourd'hui</th>
                    <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">Actions</th>
                </tr>
            </thead>
            <tbody class="">
                @forelse($collaborateurs as $collab)
                    <tr class="bg-indigo-400/10 hover:bg-blue-400/20 text-center hover:border-2 border-b-2 border-black/20 hover:border-blue-300 hover:scale-[1.001] transition duration-400">
                        <td class="px-6 py-4 ">{{ $collab->nom }}</td>
                        <td class="px-6 py-4">{{ $collab->prenom }}</td>
                        <td class="px-6 py-4">{{ $collab->poste }}</td>
                        <td class="px-6 py-4">{{ $collab->departement }}</td>
                        <td class="px-6 py-4">
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
                        <td class="px-6 py-4">
                            <a
                                href="{{ route('collaborateurs.show', $collab->id) }}"
                                class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 transition"
                            >
                                Voir
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-4 text-center text-gray-500">
                            Aucun collaborateur trouvé.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
