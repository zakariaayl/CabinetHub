<div class="flex items-top justify-center min-h-screen relative bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
    <div class="grid grid-cols-12 items-start justify-center w-full px-4 gap-6">
        <div class="col-span-12 md:col-span-8 w-full">
            <div class="container p-4 items-center justify-center mt-20">
                @if(session('success'))
                <div id="success-message"
                     class="fixed top-8 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-green-500 to-emerald-500 text-white px-8 py-4 rounded-xl shadow-xl border border-green-300 opacity-100 transition-all duration-500 z-50 max-w-md">
                    {{ session('success') }}
                </div>
                <script>
                    setTimeout(function() {
                        const msg = document.getElementById('success-message');
                        if (msg) {
                            msg.style.opacity = '0';
                            setTimeout(() => msg.style.display = 'none', 1000);
                        }
                    }, 4000);
                </script>
                @endif
            </div>

            <h1 class="text-4xl font-bold mb-6 text-gray-800 flex items-center gap-3">
                <div class="bg-indigo-100 p-2 rounded-full">
                    <i class="fa-solid fa-warehouse text-indigo-600 text-xl"></i>
                </div>
                Tous les Inventaires
            </h1>

            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-gradient-to-br from-white to-gray-50 h-32 rounded-2xl p-6 flex flex-col items-center justify-center border border-gray-200 hover:shadow-2xl transition-all duration-500 shadow-lg hover:-translate-y-1">
                    <div class="bg-indigo-100 p-3 rounded-full mb-2">
                        <i class="fa-solid fa-folder text-indigo-600 text-xl"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-700 mb-1 text-center">Total Inventaires</h3>
                    <p class="text-2xl font-bold text-indigo-600">{{ $all }}</p>
                </div>

                <div class="bg-gradient-to-br from-purple-50 to-purple-100 h-32 rounded-2xl p-6 flex flex-col items-center justify-center border border-purple-200 hover:shadow-2xl transition-all duration-500 shadow-lg hover:-translate-y-1">
                    <div class="bg-purple-200 p-3 rounded-full mb-2">
                        <i class="fa-solid fa-square-check text-purple-600 text-xl"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-700 mb-1 text-center">Validés</h3>
                    <p class="text-2xl font-bold text-purple-600">18</p>
                </div>

                <div class="bg-gradient-to-br from-red-50 to-red-100 h-32 rounded-2xl p-6 flex flex-col items-center justify-center border border-red-200 hover:shadow-2xl transition-all duration-500 shadow-lg hover:-translate-y-1">
                    <div class="bg-red-200 p-3 rounded-full mb-2">
                        <i class="fa-solid fa-exclamation-triangle text-red-600 text-xl"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-700 mb-1 text-center">Écarts Majeurs</h3>
                    <p class="text-2xl font-bold text-red-600">5</p>
                </div>

                <div class="bg-gradient-to-br from-teal-50 to-teal-100 h-32 rounded-2xl p-6 flex flex-col items-center justify-center border border-teal-200 hover:shadow-2xl transition-all duration-500 shadow-lg hover:-translate-y-1">
                    <div class="bg-teal-200 p-3 rounded-full mb-2">
                        <i class="fa-solid fa-calendar-check text-teal-600 text-xl"></i>
                    </div>
                    <h3 class="text-sm font-semibold text-gray-700 mb-1 text-center">Récurrents</h3>
                    <p class="text-2xl font-bold text-teal-600">12</p>
                </div>
            </div>

            <div class="bg-white/80 backdrop-blur-sm p-6 rounded-2xl shadow-lg border border-white/50 mb-6 hover:shadow-xl transition-all duration-300">
                <div class="mb-6">
                    <h2 class="text-xl font-semibold text-gray-700 flex items-center gap-2">
                        <div class="bg-indigo-100 p-2 rounded-lg">
                            <i class="ti ti-filter text-lg text-indigo-600"></i>
                        </div>
                        Filtres d'inventaire
                    </h2>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div class="space-y-2">
                        <label for="faite_par" class="block text-sm font-medium text-gray-700">Responsable</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-user text-gray-400"></i>
                            </div>
                            <input type="text" name="faite_par" id="faite_par" placeholder="Nom du responsable"
                                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 bg-white/50 backdrop-blur-sm"
                                wire:model.live.debounce.500ms="faite_par">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="date_inventaire" class="block text-sm font-medium text-gray-700">Date de l'inventaire</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-calendar text-gray-400"></i>
                            </div>
                            <input type="date" name="date_inventaire" id="date_inventaire"
                                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 bg-white/50 backdrop-blur-sm"
                                wire:model.live.debounce.500ms="date_inventaire">
                        </div>
                    </div>

                    <div class="space-y-2">
                        <label for="status" class="block text-sm font-medium text-gray-700">Statut</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-filter text-gray-400"></i>
                            </div>
                            <select name="status" id="status"
                                class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition-all duration-200 bg-white/50 backdrop-blur-sm appearance-none">
                                <option value="">Tous les statuts</option>
                                <option value="planifie">Planifié</option>
                                <option value="valide">Validé</option>
                                <option value="ecarts_majeurs">Écarts majeurs</option>
                                <option value="recurrent">Récurrent</option>
                                <option value="ponctuel">Ponctuel</option>
                            </select>
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-chevron-down text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-xl overflow-hidden border border-white/50">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-gradient-to-r from-indigo-400 to-blue-400 text-white">
                            <tr>
                                <th class="px-6 py-4 text-left font-semibold">Fait par</th>
                                <th class="px-6 py-4 text-left font-semibold">Date de l'inventaire</th>
                                <th class="px-6 py-4 text-left font-semibold">Statut</th>
                                <th class="px-6 py-4 text-left font-semibold">Remarque</th>
                                <th class="px-6 py-4 text-center font-semibold">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @foreach($inventaires as $inventaire)
                            <tr class="hover:bg-indigo-50/50 transition-all duration-200 group">
                                <td class="px-6 py-4 text-gray-800 font-medium">{{ $inventaire['faite_par'] }}</td>
                                <td class="px-6 py-4 text-gray-600">{{ $inventaire['date_inventaire'] }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-purple-100 text-purple-800 border border-purple-200">
                                        Validé
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-gray-600">{{ $inventaire['remarques'] ?? '---' }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center gap-2">
                                        <form action="{{route('inventaire.show',$inventaire['id'])}}" method="GET">
                                            <button type="submit" class="px-3 py-2 bg-emerald-100 border border-emerald-300 hover:bg-emerald-500 hover:text-white text-emerald-600 rounded-lg transition-all duration-200 hover:scale-105 text-sm font-medium">
                                                <i class="fa-solid fa-eye mr-1"></i>
                                                Voir
                                            </button>
                                        </form>

                                        <form action="{{route('inventaire.edit',$inventaire['id'])}}" method="GET">
                                            <button type="submit" class="px-3 py-2 bg-blue-100 border border-blue-300 hover:bg-blue-500 hover:text-white text-blue-600 rounded-lg transition-all duration-200 hover:scale-105 text-sm font-medium">
                                                <i class="fa-solid fa-edit mr-1"></i>
                                                Modifier
                                            </button>
                                        </form>

                                        <form action="{{route('inventaire.destroy',$inventaire['id'])}}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="px-3 py-2 bg-red-100 border border-red-300 hover:bg-red-500 hover:text-white text-red-600 rounded-lg transition-all duration-200 hover:scale-105 text-sm font-medium">
                                                <i class="fa-solid fa-trash mr-1"></i>
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="mt-6 flex justify-center">
                <div class="text-gray-700">
                    {{ $inventaires->links('pagination::tailwind') }}
                </div>
            </div>

            <a href="{{ route('inventaire.create') }}"
               class="block w-full bg-gradient-to-r from-green-500 to-emerald-500 hover:from-green-600 hover:to-emerald-600 text-white font-bold rounded-2xl shadow-xl text-center mt-6 py-4 hover:scale-[1.02] transition-all duration-300 text-lg">
                <i class="fa-solid fa-plus mr-2"></i>
                Ajouter un Inventaire
            </a>
        </div>

        <div class="flex flex-col col-span-12 md:col-span-4 mt-[170px] p-6 space-y-6">
            <div class="bg-white/90 backdrop-blur-sm border border-white/50 rounded-2xl shadow-md p-6" wire:ignore>
                <div class="mb-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center justify-center gap-2">
                        <div class="bg-indigo-100 p-2 rounded-lg">
                            <i class="fa-solid fa-chart-bar text-indigo-600"></i>
                        </div>
                        Statistiques des inventaires
                    </h3>
                </div>
                <div class="h-64 mb-6">
                    <canvas id="statusChart" class="w-full h-full"></canvas>
                    <script>
                        const ctxd = document.getElementById('statusChart').getContext('2d');
                        const statusChart = new Chart(ctxd, {
                            type: 'bar',
                            data: {
                                labels: ['{{$topUsers[0]->faite_par}}','{{$topUsers[1]->faite_par}}','{{$topUsers[2]->faite_par}}'],
                                datasets: [{
                                    label: 'Nombre de inventaires',
                                    data: [{{$topUsers[0]->total_inventaires}}, {{$topUsers[1]->total_inventaires}}, {{$topUsers[2]->total_inventaires}}],
                                    backgroundColor: ['rgba(99, 102, 241, 0.8)', 'rgba(34, 197, 94, 0.8)', 'rgba(251, 146, 60, 0.8)'],
                                    borderColor: ['#6366F1', '#22C55E', '#FB923C'],
                                    borderWidth: 2,
                                    borderRadius: 12,
                                    borderSkipped: false,
                                    barPercentage: 0.7,
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: { display: false },
                                    title: {
                                        display: true,
                                        text: 'Top 3 Responsables',
                                        font: { size: 16, weight: 'bold' },
                                        color: '#1F2937',
                                        padding: { bottom: 20 }
                                    }
                                },
                                scales: {
                                    y: { beginAtZero: true, grid: { color: 'rgba(156, 163, 175, 0.2)' } },
                                    x: { grid: { display: false } }
                                },
                                animation: { duration: 1000, easing: 'easeOutQuart' }
                            }
                        });
                    </script>
                </div>
            </div>

            <div class="bg-white/90 backdrop-blur-sm border border-white/50 rounded-2xl shadow-md p-6" wire:ignore>
                <div class="mb-6 text-center">
                    <h3 class="text-xl font-bold text-gray-800 flex items-center justify-center gap-2">
                        <div class="bg-green-100 p-2 rounded-lg">
                            <i class="fa-solid fa-boxes text-green-600"></i>
                        </div>
                        Statistiques des ressources
                    </h3>
                </div>
                <div class="h-64 mb-6">
                    <canvas id="ressourcechart" class="w-full h-full"></canvas>
                    <script>
                        const ctx2 = document.getElementById('ressourcechart').getContext('2d');
                        const ressourceChart = new Chart(ctx2, {
                            type: 'bar',
                            data: {
                                labels: ['{{$resourceChartData[0]["name"]}}','{{$resourceChartData[1]["name"]}}','{{$resourceChartData[2]["name"]}}'],
                                datasets: [{
                                    label: 'Nombre de inventaires par ressource',
                                    data: [{{$resourceChartData[0]["count"]}}, {{$resourceChartData[1]["count"]}}, {{$resourceChartData[2]["count"]}}],
                                    backgroundColor: ['#66c2a5', '#fc8d62', '#8da0cb'],
                                    borderColor: ['#10B981', '#F59E0B', '#8B5CF6'],
                                    borderWidth: 2,
                                    borderRadius: 12,
                                    borderSkipped: false,
                                    barPercentage: 0.6,
                                }]
                            },
                            options: {
                                responsive: true,
                                maintainAspectRatio: false,
                                plugins: {
                                    legend: { display: false },
                                    title: {
                                        display: true,
                                        text: 'Top 3 Ressources',
                                        font: { size: 16, weight: 'bold' },
                                        color: '#1F2937',
                                        padding: { bottom: 20 }
                                    }
                                },
                                scales: {
                                    y: { beginAtZero: true, grid: { color: 'rgba(156, 163, 175, 0.2)' } },
                                    x: { grid: { display: false } }
                                },
                                animation: { duration: 1000, easing: 'easeOutQuart' }
                            }
                        });
                    </script>
                </div>
            </div>

            <div class="bg-white/90 backdrop-blur-sm rounded-2xl shadow-md p-6">
                <div class="bg-gradient-to-r from-rose-400 to-red-400 text-white rounded-xl p-4 text-center mb-4">
                    <div class="flex items-center justify-center gap-2">
                        <div class="bg-white/20 p-2 rounded-lg">
                            <i class="fa-solid fa-clipboard text-xl"></i>
                        </div>
                        <h1 class="text-lg font-bold">Ressources sans inventaire</h1>
                    </div>
                </div>

                <div class="max-h-64 overflow-y-auto">
                    <ul class="space-y-2">
                        @forelse ($ressourcesNotInInventaire as $res)
                            <li class="flex items-center bg-gradient-to-r from-orange-50 to-red-50 hover:from-orange-100 hover:to-red-100 transition-all duration-200 rounded-xl px-4 py-3 shadow-sm border border-orange-200">
                                <div class="bg-orange-200 p-2 rounded-full mr-3">
                                    <i class="fa-solid fa-bell text-orange-600 text-sm"></i>
                                </div>
                                <span class="text-gray-700 font-medium">{{ $res->designation }}</span>
                            </li>
                        @empty
                            <li class="text-gray-500 text-center py-6 italic bg-green-50 rounded-xl border border-green-200">
                                <i class="fa-solid fa-check-circle text-green-500 mr-2"></i>
                                Toutes les ressources ont été inventoriées
                            </li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
