<div class="flex items-top justify-center min-h-screen relative  bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100">
 <div class="grid grid-cols-12  items-start justify-center w-full px-4">
    <div class="col-span-12 md:col-span-8 w-full ">
    <div
   class=" container  p-4     items-center justify-center mt-20  ">
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

        <h1 class="text-3xl font-bold mb-4 text-start ml-4">Tous les Inventaires </h1>

        <div  class="bg-white p-6 rounded-xl shadow-xl border border-gray-100 mb-6">
  <div class="mb-6">
    <h2 class="text-xl font-semibold text-gray-700 flex items-center gap-2">
      <i class="ti ti-filter text-lg"></i> Filtres d'inventaire
    </h2>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6 ">
    <div>
      <label for="faite_par" class="block text-sm font-medium text-gray-600 mb-1">Responsable</label>
      <input type="text" name="faite_par" id="faite_par" placeholder="Nom du responsable"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none"
        wire:model.live.debounce.500ms="faite_par">
    </div>
    <div>
      <label for="date_inventaire" class="block text-sm font-medium text-gray-600 mb-1">Date de l'inventaire</label>
      <input type="date" name="date_inventaire" id="date_inventaire"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none"
        wire:model.live.debounce.500ms="date_inventaire">
    </div>
  </div>


</div>
<div class="bg-white  rounded-2xl p-6 flex flex-col items-center justify-center border border-gray-200 mb-6 hover:shadow-xl transition duration-500 shadow-md">
    <i class="fa-solid fa-folder text-gray-500 text-3xl"></i>
    <h3 class="text-lg font-semibold text-gray-800 mb-1">nombres des inventaires</h3>
    {{-- fa-folder --}}

    <p class="text-2xl font-bold text-gray-600">{{ $all }}</p>
</div>



        <div class="overflow-x-scroll rounded-2xl shadow-2xl">
        <table class="table-auto w-full border-collapse">
            <thead class="bg-gradient-to-r from-indigo-300 to-purple-300 shadow-lg border border-gray-100">
                <tr>
                    <th class="p-4">faite par</th>
                    <th class=" p-4">date de l'inventaire</th>
                    <th class=" p-4">remarque</th>
                    <th class=" p-4">action</th>

                </tr>
            </thead>
            <tbody class="bg-white/60">
                @foreach($inventaires as $inventaire)

                    <tr class="text-center hover:bg-blue-50 hover:shadow-lg hover:border hover:border-gray-500">

                        <td class=" p-4  border-b border-gray-300">{{ $inventaire['faite_par'] }}</td>
                        <td class="p-4  border-b border-gray-300">{{ $inventaire['date_inventaire'] }}</td>
                        <td class="p-4   border-b border-gray-300">{{ $inventaire['remarques'] ?? '---' }}</td>


                        <td class=" p-4 pr-5 border-b border-gray-300">
                            <div class="flex justify-center items-center gap-2">
                                <form action="{{route('inventaire.show',$inventaire['id'])}}" method="GET">

                                    <button type="submit" class="w-20 h-8 bg-white border border-green-400 hover:bg-green-400 hover:text-white text-green-400 hover:scale-110 transition rounded">
                                        voir
                                    </button>
                                </form>

                                <form action="{{route('inventaire.edit',$inventaire['id'])}}" method="GET">

                                    <button type="submit" class="w-20 h-8 bg-white border border-blue-400 hover:bg-blue-400 hover:text-white text-blue-400  rounded hover:scale-110 transition ">
                                        Modifier
                                    </button>
                                </form>


                                <form action="{{route('inventaire.destroy',$inventaire['id'])}}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="w-20 h-8 bg-white border border-red-400 hover:bg-red-400 hover:text-white text-red-400 hover:scale-110 transition rounded">
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
       <div class="mt-6 flex p-4 justify-center">
     <div class="text-black text-2xl font-bold mr-3">
        {{ $inventaires->links('pagination::tailwind') }}
    </div>
</div>
<a href="{{ route('inventaire.create') }}"
   class="block w-full bg-green-400 border border-white hover:bg-white hover:text-green-400 hover:border-green-400 text-white  hover:scale-105 font-bold rounded-lg shadow-xl text-center mx-auto mt-6 py-2 hover:scale-[1.01] transition-colors">
    + Ajouter
</a>

 </div>
    <div class="flex flex-col   col-span-12 md:col-span-4 mt-32 p-6  ">

            <div class="bg-white border border-gray-100 rounded-xl shadow-xl" wire:ignore>
            <div class="mb-6 text-center">
                <h3 class="text-xl font-bold text-gray-800">Statistiques des inventaires</h3>
            </div>
            <div class="h-80 mb-6">
    <canvas id="statusChart" class="w-full h-full"></canvas>
    <script>
        const ctxd = document.getElementById('statusChart').getContext('2d');

        const statusChart = new Chart(ctxd, {
            type: 'bar',
            data: {
                labels: ['{{$topUsers[0]->faite_par}}',' {{$topUsers[1]->faite_par}}','{{$topUsers[2]->faite_par}}'],
                datasets: [{
                    label: 'Nombre de inventaires',
                    data: [{{$topUsers[0]->total_inventaires}}, {{$topUsers[1]->total_inventaires}}, {{$topUsers[2]->total_inventaires}}],
                    backgroundColor: [
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(245, 158, 11, 0.8)',
                        'rgba(239, 68, 68, 0.8)'
                    ],
                    borderColor: [
                        '#10B981',
                        '#F59E0B',
                        '#EF4444'
                    ],
                    borderWidth: 2,
                    borderRadius: 8,
                    borderSkipped: false,
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Répartition des inventaires',
                        font: {
                            size: 18,
                            weight: 'bold',
                            family: 'Inter, system-ui, sans-serif'
                        },
                        color: '#1F2937',
                        padding: {
                            top: 10,
                            bottom: 30
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(17, 24, 39, 0.95)',
                        titleColor: '#F9FAFB',
                        bodyColor: '#F9FAFB',
                        borderColor: '#374151',
                        borderWidth: 1,
                        cornerRadius: 8,
                        displayColors: false,
                        callbacks: {
                            label: function(context) {
                                const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                const percentage = ((context.parsed.y / total) * 100).toFixed(1);
                                return `${context.parsed.y} ressources (${percentage}%)`;
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(156, 163, 175, 0.3)',
                            drawBorder: false
                        },
                        ticks: {
                            font: {
                                size: 12,
                                family: 'Inter, system-ui, sans-serif'
                            },
                            color: '#6B7280',
                            stepSize: 1
                        },
                        title: {
                            display: true,
                            text: 'Nombre de ressources',
                            font: {
                                size: 13,
                                weight: '500',
                                family: 'Inter, system-ui, sans-serif'
                            },
                            color: '#374151',
                            padding: 15
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        },
                        ticks: {
                            font: {
                                size: 14,
                                weight: '500',
                                family: 'Inter, system-ui, sans-serif'
                            },
                            color: '#374151',
                            maxRotation: 0
                        }
                    }
                },
                elements: {
                    bar: {
                        borderWidth: 2
                    }
                },
                animation: {
                    duration: 1200,
                    easing: 'easeOutQuart'
                },
                interaction: {
                    intersect: false,
                    mode: 'index'
                }
            },
             barPercentage: 0.5,
    categoryPercentage: 0.6 ,
            plugins: [{
                afterDatasetsDraw: function(chart) {
                    const ctx = chart.ctx;
                    chart.data.datasets.forEach((dataset, i) => {
                        const meta = chart.getDatasetMeta(i);
                        meta.data.forEach((bar, index) => {
                            const data = dataset.data[index];
                            if (data > 0) {
                                ctx.fillStyle = '#1F2937';
                                ctx.font = 'bold 13px Inter, system-ui, sans-serif';
                                ctx.textAlign = 'center';
                                ctx.textBaseline = 'bottom';

                                const x = bar.x;
                                const y = bar.y - 5;

                                ctx.fillText(data, x, y);
                            }
                        });
                    });
                }
            }]
        });

    </script>
</div>
            </div>
             <div class="bg-white border border-gray-100 rounded-xl shadow-xl mt-6" wire:ignore>
            <div class="mb-6 text-center">
                <h3 class="text-xl font-bold text-gray-800">Statistiques des ressources</h3>
            </div>
            <div class="h-80 mb-6">
    <canvas id="ressourcechart" class="w-full h-full"></canvas>
<script>

    const ctx2 = document.getElementById('ressourcechart').getContext('2d');

    const ressourceChart = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: ['{{$resourceChartData[0]["name"]}}',
    '{{$resourceChartData[1]["name"]}}',
    '{{$resourceChartData[2]["name"]}}'],
            datasets: [{
                label: 'Nombre de inventaires par ressource',
                data: [{{$resourceChartData[0]["count"]}}, {{$resourceChartData[1]["count"]}}, {{$resourceChartData[2]["count"]}}],
                backgroundColor: [
                    '#66c2a5',
  '#fc8d62',
  '#8da0cb'
                ],
                borderColor: [
                    '#10B981',
                    '#F59E0B',
                    '#EF4444'
                ],
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            cutout: '70%',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Répartition des ressources',
                    font: {
                        size: 18,
                        weight: 'bold',
                        family: 'Inter, system-ui, sans-serif'
                    },
                    color: '#1F2937',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.95)',
                    titleColor: '#F9FAFB',
                    bodyColor: '#F9FAFB',
                    borderColor: '#374151',
                    borderWidth: 1,
                    cornerRadius: 8,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((context.parsed.y / total) * 100).toFixed(1);
                            return `${context.parsed.y} ressources (${percentage}%)`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(156, 163, 175, 0.3)',
                        drawBorder: false
                    },
                    ticks: {
                        font: {
                            size: 12,
                            family: 'Inter, system-ui, sans-serif'
                        },
                        color: '#6B7280',
                        stepSize: 1
                    },
                    title: {
                        display: true,
                        text: 'Nombre de inventaires',
                        font: {
                            size: 13,
                            weight: '500',
                            family: 'Inter, system-ui, sans-serif'
                        },
                        color: '#374151',
                        padding: 15
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 14,
                            weight: '500',
                            family: 'Inter, system-ui, sans-serif'
                        },
                        color: '#374151',
                        maxRotation: 0
                    }
                }
            },
            elements: {
                bar: {
                    borderWidth: 2
                }
            },
            animation: {
                duration: 1200,
                easing: 'easeOutQuart'
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        },
        barPercentage: 0.5,
        categoryPercentage: 0.6,
        plugins: [{
            afterDatasetsDraw: function(chart) {
                const ctx = chart.ctx;
                chart.data.datasets.forEach((dataset, i) => {
                    const meta = chart.getDatasetMeta(i);
                    meta.data.forEach((bar, index) => {
                        const data = dataset.data[index];
                        if (data > 0) {
                            ctx.fillStyle = '#1F2937';
                            ctx.font = 'bold 13px Inter, system-ui, sans-serif';
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'bottom';

                            const x = bar.x;
                            const y = bar.y - 5;

                            ctx.fillText(data, x, y);
                        }
                    });
                });
            }
        }]
    });
</script>
</div>
            </div>
             <div class="bg-white border border-gray-100 rounded-xl shadow-xl mt-6" wire:ignore>
            <div class="mb-6 text-center">
               <h3 class="text-xl font-bold text-gray-800">
  Statistiques des 3 ressources les plus rares à inventorier
</h3>

            </div>
            <div class="h-80 mb-6">
    <canvas id="ressourcechartBottom" class="w-full h-full"></canvas>
<script>

    const ctx3 = document.getElementById('ressourcechartBottom').getContext('2d');

    const ressourcechartBottom = new Chart(ctx3, {
        type: 'bar',
        data: {
            labels: ['{{$resourceChartDataBottom[0]["name"]}}',
    '{{$resourceChartDataBottom[1]["name"]}}',
    '{{$resourceChartDataBottom[2]["name"]}}'],
            datasets: [{
                label: 'Nombre de inventaires par ressource',
                data: [{{$resourceChartDataBottom[0]["count"]}}, {{$resourceChartDataBottom[1]["count"]}}, {{$resourceChartDataBottom[2]["count"]}}],
                backgroundColor: [
                    '#66c2a5',
  '#fc8d62',
  '#8da0cb'
                ],
                borderColor: [
                    '#10B981',
                    '#F59E0B',
                    '#EF4444'
                ],
                borderWidth: 2,
                borderRadius: 8,
                borderSkipped: false,
            }]
        },
        options: {
            indexAxis: 'y',
            cutout: '70%',
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Répartition des ressources',
                    font: {
                        size: 18,
                        weight: 'bold',
                        family: 'Inter, system-ui, sans-serif'
                    },
                    color: '#1F2937',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(17, 24, 39, 0.95)',
                    titleColor: '#F9FAFB',
                    bodyColor: '#F9FAFB',
                    borderColor: '#374151',
                    borderWidth: 1,
                    cornerRadius: 8,
                    displayColors: false,
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((context.parsed.y / total) * 100).toFixed(1);
                            return `${context.parsed.y} ressources (${percentage}%)`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(156, 163, 175, 0.3)',
                        drawBorder: false
                    },
                    ticks: {
                        font: {
                            size: 12,
                            family: 'Inter, system-ui, sans-serif'
                        },
                        color: '#6B7280',
                        stepSize: 1
                    },
                    title: {
                        display: true,
                        text: 'Nombre de inventaires',
                        font: {
                            size: 13,
                            weight: '500',
                            family: 'Inter, system-ui, sans-serif'
                        },
                        color: '#374151',
                        padding: 15
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 14,
                            weight: '500',
                            family: 'Inter, system-ui, sans-serif'
                        },
                        color: '#374151',
                        maxRotation: 0
                    }
                }
            },
            elements: {
                bar: {
                    borderWidth: 2
                }
            },
            animation: {
                duration: 1200,
                easing: 'easeOutQuart'
            },
            interaction: {
                intersect: false,
                mode: 'index'
            }
        },
        barPercentage: 0.5,
        categoryPercentage: 0.6,
        plugins: [{
            afterDatasetsDraw: function(chart) {
                const ctx = chart.ctx;
                chart.data.datasets.forEach((dataset, i) => {
                    const meta = chart.getDatasetMeta(i);
                    meta.data.forEach((bar, index) => {
                        const data = dataset.data[index];
                        if (data > 0) {
                            ctx.fillStyle = '#1F2937';
                            ctx.font = 'bold 13px Inter, system-ui, sans-serif';
                            ctx.textAlign = 'center';
                            ctx.textBaseline = 'bottom';

                            const x = bar.x;
                            const y = bar.y - 5;

                            ctx.fillText(data, x, y);
                        }
                    });
                });
            }
        }]
    });
</script>
</div>
            </div>
    </div>
   <div class="bg-white rounded-2xl shadow-xl p-6 w-full md:col-span-8 col-span-12">
    <div class="bg-gradient-to-r from-indigo-300 to-purple-300 shadow-lg border border-gray-100 rounded-xl p-4 text-center ">
        <div class="flex items-center justify-center">
       <i class="fa-solid fa-clipboard text-2xl mr-2 text-gray-900"></i>
        <h1 class="text-2xl font-bold text-black tracking-wide">Ressources sans inventaire</h1>
        </div>
    </div>

    <ul class="mt-4 space-y-3">
        @forelse ($ressourcesNotInInventaire as $res)
            <li class="flex items-center bg-gray-50 hover:bg-gray-100 transition rounded-lg px-4 py-2 shadow-sm">
                <i class="fa-solid fa-bell mr-2 text-emerald-400"></i>
                <span class="text-gray-700 font-medium"> {{ $res->designation }}</span>
            </li>
        @empty
            <li class="text-gray-500 text-center py-4 italic">Toutes les ressources ont été inventoriées</li>
        @endforelse
    </ul>


</div>


    </div>

</div>
