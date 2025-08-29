<div>
 <div class="flex">
   <div class="ml-7 bg-indigo-100 p-2 rounded-full mt-20">
                    <i class="fa-solid fa-warehouse text-indigo-600 text-xl"></i>
    </div>
   <h1 class="ml-7 text-4xl font-semibold  text-start mx-auto block mt-20 mb-6">Tableau du Bord du Ressources</h1>
</div>
    <div class="grid grid-cols-12  items-start justify-center w-full px-4">
        <div class="container p-4  border-gray-200   col-span-12 lg:col-span-8 ">

            @if(session('success'))
            <div id="success-message" class="fixed top-8 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-green-500 to-emerald-500 text-white px-8 py-4 rounded-xl shadow-xl border border-green-300 opacity-100 transition-all duration-500 z-50 max-w-md">
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
<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
    <div class="bg-gradient-to-br from-indigo-50 to-indigo-100 h-32 rounded-2xl p-6 flex flex-col items-center justify-center border border-indigo-200 hover:shadow-lg transition-all duration-500 shadow-md hover:-translate-y-1 ">
    <i class="fa-solid fa-folder text-indigo-400 text-3xl"></i>
    <h3 class="text-lg font-medium text-indigo-400 mb-1">Toutes les Ressourcess</h3>
    <p class="text-2xl font-medium text-indigo-400">{{ $all }}</p>
</div>
    <div class="bg-gradient-to-br from-yellow-50 to-yellow-100 shadow-md rounded-2xl p-3 flex flex-col items-center justify-center border border-yellow-200 hover:shadow-xl transition-all hover:-translate-y-1 duration-500">
        <i class="fa-solid fa-recycle text-yellow-400 text-3xl"></i>
        <h4 class="text-md font-medium text-yellow-400 mb-1">Usagé</h4>
        <p class="text-xl font-medium text-yellow-400">{{ $Usage }}</p>
    </div>
    <div class="bg-gradient-to-br from-green-50 to-emerald-100 shadow-md rounded-2xl p-3 flex flex-col items-center justify-center border border-emerald-200 hover:shadow-xl transition-all hover:-translate-y-1 duration-500">
        <i class="fa-solid fa-bolt text-green-400 text-3xl"></i>
        <h4 class="text-md font-medium text-green-400 mb-1">Bon</h4>
        <p class="text-xl font-medium text-green-400">{{ $bon }}</p>
    </div>
    <div class="bg-gradient-to-br from-red-50 to-red-100  shadow-md rounded-2xl p-3 flex flex-col items-center justify-center border border-red-200 hover:shadow-xl transition-all hover:-translate-y-1 duration-500">
         <i class="fa-solid fa-trash text-red-400 text-center text-3xl"></i>
        <h4 class="text-md font-medium text-red-400 mb-1">Hors Service</h4>

        <p class="text-xl font-medium text-red-400">{{ $hors }}</p>
    </div>
</div>
            <div class="bg-white p-6 rounded-2xl shadow-md border border-gray-200 mb-6">
    <div class="flex items-center mb-6">
        <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-600 rounded-xl flex items-center justify-center mr-4">
            <i class="fas fa-filter text-white"></i>
        </div>
        <div class="flex">



        <h1 class="text-2xl font-sans text-gray-800">Filtres des Ressources</h1>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="space-y-2">
            <label for="filtertype" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-layer-group text-blue-500 mr-2"></i>
                Type
            </label>
            <div class="relative">
                <select name="filtertype" id="filtertype" class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-blue-100 focus:border-blue-500 transition-all duration-200 bg-white appearance-none cursor-pointer" wire:model.live.debounce.500ms="filtertype">
                    <option value="">Sélectionner un type</option>
                    <option value="Materiel">Matériel</option>
                    <option value="Logiciel">Logiciel</option>
                </select>
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                <i class="fas fa-layer-group absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
            </div>
        </div>

        <div class="space-y-2">
            <label for="etat" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-heartbeat text-green-500 mr-2"></i>
                État
            </label>
            <div class="relative">
                <select name="etat" id="etat" class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-green-100 focus:border-green-500 transition-all duration-200 bg-white appearance-none cursor-pointer" wire:model.live.debounce.500ms="etat">
                    <option value="">Sélectionner un état</option>
                    <option value="Bon">Bon</option>
                    <option value="Usagé">Usagé</option>
                    <option value="Hors Service">Hors Service</option>
                </select>
                <i class="fas fa-heartbeat absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <i class="fas fa-chevron-down absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 pointer-events-none"></i>
            </div>
        </div>

        <div class="space-y-2">
            <label for="utilisateur_affecte" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-user text-purple-500 mr-2"></i>
                Utilisateur affecté
            </label>
            <div class="relative">
                <input type="text" name="utilisateur_affecte" class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-purple-100 focus:border-purple-500 transition-all duration-200 bg-white" wire:model.live.debounce.500ms="utilisateur_affecte" placeholder="Nom de l'utilisateur...">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-user text-gray-400"></i>
                            </div>
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <i class="fa-solid fa-user text-gray-400"></i>
                            </div>
            </div>
        </div>

        <div class="space-y-2">
            <label for="designation" class="flex items-center text-sm font-semibold text-gray-700 mb-2">
                <i class="fas fa-tag text-orange-500 mr-2"></i>
                Désignation
            </label>
            <div class="relative">
                <input type="text" name="designation" class="w-full pl-10 pr-4 py-3 border-2 border-gray-200 rounded-xl focus:outline-none focus:ring-4 focus:ring-orange-100 focus:border-orange-500 transition-all duration-200 bg-white" wire:model.live.debounce.500ms="designation" placeholder="Nom du produit...">
                <i class="fas fa-tag absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                <i class="fas fa-search absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
        </div>
    </div>
</div>




            <div class="overflow-x-scroll rounded-2xl shadow-md">
                <table class="table-auto w-full border-collapse">
                    <thead class="bg-gradient-to-r from-indigo-300 to-blue-300   rounded-t-2xl  shadow-md">
                        <tr>
                            <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">image</th>
                            <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">Type</th>
                            <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">Désignation</th>
                            <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">Marque</th>
                            <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">Modèle</th>
                            <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">État</th>
                            <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">Utilisateur Affecté</th>
                            <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">Durée vie(moi)</th>
                            <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">Durée resté(moi)</th>
                            <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">Quantité</th>
                            <th class="px-6 py-5 text-xs font-medium text-gray-900 uppercase text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-indido-100/15  ">
                        @foreach($rec as $resource)
                        <tr class="text-center hover:bg-blue-200/40  hover:border-x-2 hover:border-blue-500">
                            <td class="p-3 border-b border-gray-300"><img class="w-10 mx-2 h-10 rounded-md   transition duration-500 " src="{{ asset($resource->imageRc) }}" alt="il n y a pas une image disponible" /></td>
                            <td class="p-3 border-b border-gray-300">{{ $resource['type'] }}</td>
                            <td class="p-3 border-b border-gray-300">{{ $resource['designation'] }}</td>
                            <td class="p-4 border-b border-gray-300">{{ $resource['marque'] ?? '---' }}</td>
                            <td class="p-4 border-b border-gray-300">{{ $resource['modele'] ?? '---' }}</td>
                            <td class="p-4 border-b border-gray-300">{{ $resource['etat'] }}</td>

                            <td class="p-4 border-b border-gray-300">{{ $resource['utilisateur_affecte'] }}</td>
                            <td class="p-4 border-b border-gray-300">{{ $resource['duree_vie_mois'] }}</td>

                            @php
                                $moirest = $resource['duree_vie_mois'] - \Carbon\Carbon::parse($resource['created_at'])->floatDiffInMonths(now());
                                $moirest = round($moirest, 2);
                            @endphp

                            <td class="p-4 border-b border-gray-300 {{ $moirest <= 0 ? 'text-red-500 font-bold' : '' }}">
                                {{ $moirest > 0 ? $moirest  : 'Expired' }}
                            </td>

                                <td class="p-4 border-b border-gray-300">{{ $resource['quantite'] }}</td>
                            <td class="p-3 border-b border-gray-300">
                                <div class="flex justify-center items-center gap-2">
                                    <form action="{{ route('ResourceController.edit',['ResourceController'=> $resource['id']]) }}" method="GET">
                                        <button type="submit" class="w-20 h-8 bg-white border border-blue-400 hover:bg-blue-400 hover:text-white text-blue-400 rounded hover:scale-110 transition">
                                            voir
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($rec->isEmpty() && $filtertype && $etat && $designation && $utilisateur_affecte)
        <p class="mt-4 text-gray-500">Aucun résultat trouvé pour ce ressource</p>
    @endif
            <div class="mt-6 flex p-4 justify-center">
                <div class="text-black text-2xl font-bold mr-3">
                    {{ $rec->links('pagination::tailwind') }}
                </div>
            </div>

            <a href="{{ route('ResourceController.create') }}" class="block w-full bg-green-400 border border-white hover:bg-white hover:text-green-400 hover:border-green-400 text-white hover:scale-105 font-bold rounded-lg shadow-xl text-center mx-auto mt-6 py-2 hover:scale-[1.01] transition-colors">
                + Ajouter
            </a>
        </div>
        <div class="flex flex-col   col-span-12 lg:col-span-4 p-6  ">

            <div class="bg-white border border-gray-100 rounded-xl shadow-md" wire:ignore>
            <div class="mb-6 flex items-center justify-center">
    <div class="flex items-center space-x-2">
        <h3 class="text-xl font-bold text-gray-800">Statistiques des resources</h3>
        <i class="fa-solid fa-signal text-yellow-400 text-xl"></i>
    </div>
</div>

            <div class=" h-80 mb-6">
                <canvas id="statusChart" class="w-full h-full"></canvas>
          <script>
  const ctx = document.getElementById('statusChart').getContext('2d');

  const statusChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Bon', 'Usagé', 'Hors Service'],
                datasets: [{
            data: [{{$totalBon}},{{$totalUsage}},{{$totalHors}}],
                    backgroundColor: ['#34D399', '#F7D23D', '#F46A6B'],

                    borderColor: '#fff',
                    borderWidth: 0,
                }]
            },
            options: {
                // cutout: '70%',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true,
                            font: { size: 14 }
                        }
                    },
                    title: {
                        display: true,
                        text: 'Répartition des Ressources',
                        font: { size: 16, weight: 'bold' }
                    }
                },
                elements: {
                    arc: {
                        borderWidth: 0
                    }
                }
            },
            plugins: [{
                beforeDraw: function(chart) {
                    const width = chart.width,
                          height = chart.height,
                          ctx = chart.ctx;

                    ctx.restore();
                    const fontSize = (height / 114).toFixed(2);
                    ctx.font = fontSize + "em sans-serif";
                    ctx.textBaseline = "middle";
                    ctx.fillStyle = "#374151";

                    const total = {{$totalAll}};
                    const text = total,
                          textX = Math.round((width - ctx.measureText(text).width) / 2.04),
                          textY = height / 2.05;

                    ctx.fillText(text, textX, textY - 10);
                    ctx.font = (fontSize * 0.6) + "em sans-serif";
                    ctx.fillText("Total", textX + 5, textY + 20);
                    ctx.save();
                }
            }]
        });
</script>
            </div>

            </div>
<div class="bg-white rounded-lg shadow-lg p-6 mb-8 mt-8">
            <h2 class="text-xl font-semibold mb-4 text-gray-700 text-center">Cartes de Statut</h2>
            <div class="space-y-4">
                <div class="border-l-4 border-green-500 rounded-md  bg-green-50 p-4 rounded-r-lg">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-semibold text-green-700">Bon etat</span>
                        <span class="text-2xl font-bold text-green-600">{{$bon}}</span>
                    </div>
                    <div class="w-full bg-green-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: {{ $all != 0 ? number_format($bon * 100 / $all, 2) : '0' }}%"></div>
                    </div>
                    <div class="text-sm text-green-600 mt-1">{{ $all != 0 ? number_format($bon * 100 / $all, 2) : '0' }}%
% du total</div>
                </div>
                <div class="border-l-4 border-yellow-500 rounded-md bg-yellow-50 p-4 rounded-r-lg">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-semibold text-yellow-700">Usage</span>
                        <span class="text-2xl font-bold text-yellow-600">{{$Usage}}</span>
                    </div>
                    <div class="w-full bg-yellow-200  rounded-full h-2">
                        <div class="bg-yellow-500 h-2 rounded-full" style="width: {{ $all != 0 ? number_format($Usage * 100 / $all, 2) : '0' }}%"></div>
                    </div>
                    <div class="text-sm text-yellow-600 mt-1">{{ $all != 0 ? number_format($Usage * 100 / $all, 2) : '0' }}%
 du total</div>
                </div>
                <div class="border-l-4 border-red-500 rounded-md bg-red-50 p-4 rounded-r-lg">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-semibold text-red-700">Hors Service</span>
                        <span class="text-2xl font-bold text-red-600">{{$hors}}</span>
                    </div>
                    <div class="w-full bg-red-200 rounded-full h-2">
                        <div class="bg-red-500 h-2 rounded-full" style="width: {{ $all != 0 ? number_format($hors * 100 / $all, 2) : '0' }}%"></div>
                    </div>
                    <div class="text-sm text-red-600 mt-1">{{ $all != 0 ? number_format($hors * 100 / $all, 2) : '0' }}%
% du total</div>
                </div>
            </div>

        </div>
         <script>
            const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Bon', 'Usagé', 'Hors Service'],
                datasets: [{
                    label: 'Nombre de demandes',
                    data: [{{$bon}}, {{$Usage}}, {{$hors}}],
                    backgroundColor: ['#10B981', '#F59E0B', '#EF4444'],
                    borderRadius: 6,
                    barThickness: 40
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Statut des Demandes d\'Achat',
                        font: { size: 16, weight: 'bold' }
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: {
                            display: false
                        }
                    },
                    y: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
         </script>
            <div class=" bg-white text-center text-amber-300 text-2xl shadow-xl w-full  mt-5 border border-gray-100 rounded-xl h-full grid grid-cols-1 mb-10 p-4">
    <h1 class="font-bold text-xl text-black text-center items-center mb-2  ">Liste des resources Hors Service</h1>
    <div class="overflow-y-scroll overflow-x-hidden gap-2">
@php
    $horsService = $rec->where('etat', 'Hors Service');
@endphp
@if($horsService->isEmpty())
    <div class="flex flex-col  p-5 border-l-[6px] border-green-500 bg-green-50 rounded-md shadow-sm hover:shadow-lg transition-all duration-500 m-3">
    <p class="text-sm font-semibold text-gray-600 leading-relaxed text-start">
        Aucune ressource est Hors service
    </p>
</div>
@else
    @foreach($rec as $resource)
    @if(trim($resource['etat']) == "Hors Service")

          <div class="flex flex-col  p-5 border-l-[6px] border-red-500 bg-red-50 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 m-3">
    <h4 class="text-lg font-semibold text-gray-800 mb-2 text-center">
        {{ $resource->designation }}
    </h4>
    <p class="text-sm text-gray-600 leading-relaxed text-start">
        {{ $resource->remarque ?? 'Aucune description.' }}
    </p>
</div>


      @endif
  @endforeach
@endif

  </div>
    </div>
        </div>


</div>
