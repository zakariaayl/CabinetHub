<div>

    <div class="grid grid-cols-12 gap-2 mt-20">

    @if(session('success'))
        <div id="success-message"
             class="fixed top-8 left-1/2 transform -translate-x-1/2 bg-gradient-to-r from-green-500 to-emerald-500 text-white px-8 py-4 rounded-xl shadow-xl border border-green-300 opacity-100 transition-all duration-500 z-50 max-w-md">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                const msg = document.getElementById('success-message');
                if (msg) {
                    msg.style.opacity = '0';
                    setTimeout(() => msg.style.display = 'none', 1000);
                }
            }, 4000);
        </script>
    @endif

    <div class="max-w-7xl mx-auto lg:col-span-8  col-span-12 sm:col-span-12">
        <h1 class="text-3xl font-bold mb-6">Tableau de bord des demandes</h1>

        <div
              class="bg-white p-6 rounded-xl shadow border border-gray-100 mb-8">
            <h2 class="text-xl font-semibold mb-4">Filtres de recherche</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                    <div>
                        <label for="date_besoin" class="block text-sm font-medium text-gray-600 mb-1">date du besoin</label>
                        <input type="date" name="date_besoin" id="date_besoin"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none"
        wire:model.live.debounce.500ms="date_besoin">
                    </div>
                    <div>
                        <label for="date_demande" class="block text-sm font-medium text-gray-600 mb-1">date du demande</label>
                        <input type="date" name="date_demande" id="date_demande"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none"
        wire:model.live.debounce.500ms="date_demande">
                    </div>
                    <div>
                        <label for="utilisateur_affecte" class="block text-sm font-medium text-gray-600 mb-1">responsabl du demande</label>
                        <input type="text" name="utilisateur_affecte" class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" wire:model.live.debounce.500ms="responsabl_demande">
                        <i class="ti ti-search absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                    <div>
                        <label for="designation" class="block text-sm font-medium text-gray-600 mb-1">resource du demande</label>
                        <input type="text" name="designation" class="w-full px-3 py-2 border border-black rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent"wire:model.live.debounce.500m="resource_demande">
                        <i class="ti ti-search absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                    </div>
                </div>
            </div>

        </div>

<div class="bg-white shadow-lg rounded-2xl p-6 flex flex-col items-center justify-center border border-gray-200 mb-6">
    <i class="fa-solid fa-folder text-gray-500 text-3xl"></i>
    <h3 class="text-lg font-semibold text-gray-800 mb-1">Toutes les demandes</h3>
    <p class="text-2xl font-bold text-gray-600">{{ $all }}</p>
</div>


<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
    <div class="bg-yellow-50 shadow-md rounded-2xl p-6 flex flex-col items-center justify-center border border-yellow-200 hover:shadow-lg transition">
        <i class="fa-solid  fa-hourglass-half text-yellow-500 text-3xl"></i>
        <h4 class="text-md font-semibold text-yellow-700 mb-1">En attente</h4>
        <p class="text-xl font-bold text-yellow-600">{{ $attente }}</p>
    </div>
    <div class="bg-green-50 shadow-md rounded-2xl p-6 flex flex-col items-center justify-center border border-green-200 hover:shadow-lg transition">
        <i class="fa-solid fa-check-circle text-green-500 text-3xl"></i>
        <h4 class="text-md font-semibold text-green-700 mb-1">Approuvée</h4>
        <p class="text-xl font-bold text-green-600">{{ $aprouv }}</p>
    </div>
    <div class="bg-red-50 shadow-md rounded-2xl p-6 flex flex-col items-center justify-center border border-red-200 hover:shadow-lg transition">
        <i class="fa-solid fa-times-circle text-red-500 text-3xl"></i>
        <h4 class="text-md font-semibold text-red-700 mb-1">Refusée</h4>
        <p class="text-xl font-bold text-red-600">{{ $refus }}</p>
    </div>
</div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($demandes as $demande)
            @if ($demande['statut']=="approuvée")

                <div class="bg-white shadow-lg rounded-xl p-5 flex flex-col justify-between border-t-4  hover:shadow-2xl transition border-green-500">
                    <div>
                        <h3 class="text-xl font-semibold text-black mb-2">{{ $demande['responsabl_demande'] }}</h3>
                        <p class="text-sm text-gray-500 mb-1"> {{ $demande['date_demande'] }}</p>
                        <p class="text-sm text-gray-500 mb-1">par  {{ $demande['responsabl_demande'] }}</p>
                        <p class="text-sm text-gray-500"> {{ $demande['description'] ?? '---' }}</p>
                    </div>

                    <div class="flex gap-2 mt-4">
                        <form action="{{ route('demande_achat.show', $demande['id']) }}" method="GET" class="w-full">
                            <button class="w-full bg-white text-green-400 border border-green-400 py-2 rounded hover:bg-green-400  hover:scale-110  hover:text-white transition text-sm font-semibold">
                                Voir
                            </button>
                        </form>
                        {{-- <form action="{{route('demande_achat.update',$demande->id)}}" method="POST" class="w-full">
                             @csrf
                            @method('PUT')
                            <button class="w-full bg-white text-blue-400 border border-blue-400 py-2 rounded hover:bg-blue-400  hover:scale-110  hover:text-white transition text-sm font-semibold" name="action" value="valider">
                                valider
                            </button>
                        </form> --}}
                        {{-- <form action="{{route('demande_achat.update',$demande->id)}}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');" class="w-full">
                            @csrf
                            @method('PUT')
                            <button class="w-full bg-white text-red-400 border border-red-400 py-2 rounded hover:bg-red-400  hover:scale-110  hover:text-white transition text-sm font-semibold" name="action" value="refuser">
                                refuser
                            </button>
                        </form> --}}
                    </div>
                </div>
                @elseif ($demande['statut']=="refusée")
                     <div class="bg-white shadow-lg rounded-xl p-5 flex flex-col justify-between border-t-4  hover:shadow-2xl transition border-red-400 duration-300">
                    <div>
                        <h3 class="text-xl font-semibold text-black mb-2">{{ $demande['responsabl_demande'] }}</h3>
                        <p class="text-sm text-gray-500 mb-1"> {{ $demande['date_demande'] }}</p>
                        <p class="text-sm text-gray-500"> {{ $demande['description'] ?? '---' }}</p>
                    </div>

                    <div class="flex gap-2 mt-4">
                        <form action="{{ route('demande_achat.show', $demande['id']) }}" method="GET" class="w-full">
                            <button class="w-full bg-white text-green-400 border border-green-400 py-2 rounded hover:bg-green-400  hover:scale-110  hover:text-white transition text-sm font-semibold">
                                Voir
                            </button>
                        </form>
                        {{-- <form action="{{route('demande_achat.update',$demande->id)}}" method="POST" class="w-full">
                             @csrf
                            @method('PUT')
                            <button class="w-full bg-white text-blue-400 border border-blue-400 py-2 rounded hover:bg-blue-400  hover:scale-110  hover:text-white transition text-sm font-semibold" name="action" value="valider">
                                valider
                            </button>
                        </form> --}}
                        {{-- <form action="{{route('demande_achat.update',$demande->id)}}" method="POST"  class="w-full">
                            @csrf
                            @method('PUT')
                            <button class="w-full bg-white text-red-400 border border-red-400 py-2 rounded hover:bg-red-400  hover:scale-110  hover:text-white transition text-sm font-semibold" name="action" value="refuser">
                                refuser
                            </button>
                        </form> --}}
                    </div>
                </div>
                 @elseif(trim($demande['statut']) == "en cours de traitement" || trim($demande['statut']) == "en attente")
                      <div class="bg-white shadow-lg rounded-xl p-5 flex flex-col justify-between border-t-4  hover:shadow-2xl transition border-yellow-500">
                    <div>
                        <h3 class="text-xl font-semibold text-black mb-2">{{ $demande['responsabl_demande'] }}</h3>
                        <p class="text-sm text-gray-500 mb-1"> {{ $demande['date_demande'] }}</p>
                        <p class="text-sm text-gray-500"> {{ $demande['description'] ?? '---' }}</p>
                    </div>

                    <div class="flex gap-2 mt-4">
                        <form action="{{ route('demande_achat.show', $demande['id']) }}" method="GET" class="w-full">
                            <button class="w-full bg-white text-green-400 border border-green-400 py-2 rounded hover:bg-green-400  hover:scale-110  hover:text-white transition text-sm font-semibold">
                                Voir
                            </button>
                        </form>
                        <form action="{{route('demande_achat.update',$demande->id)}}" method="POST" class="w-full">
                             @csrf
                            @method('PUT')
                            <button class="w-full bg-white text-blue-400 border border-blue-400 py-2 rounded hover:bg-blue-400  hover:scale-110  hover:text-white transition text-sm font-semibold" name="action" value="valider">
                                valider
                            </button>
                        </form>
                        <form action="{{route('demande_achat.update',$demande->id)}}" method="POST"  class="w-full">
                            @csrf
                            @method('PUT')
                            <button class="w-full bg-white text-red-400 border border-red-400 py-2 rounded hover:bg-red-400  hover:scale-110  hover:text-white transition text-sm font-semibold" name="action" value="refuser">
                                refuser
                            </button>
                        </form>
                    </div>
                </div>

                @else

    <div class="bg-red-100 text-red-700 p-4 rounded shadow">
        Statut inconnu: {{ $demande['statut'] ?? 'N/A' }}
    </div>
                @endif
            @empty
                <p class="text-gray-600 col-span-full text-center">Aucune demande trouvée.</p>
            @endforelse
        </div>

        <div class="mt-10 flex justify-center">
            {{ $demandes->links('pagination::tailwind') }}
        </div>

        {{-- <a href="{{ route('demande_achat.create') }}"
           class="block mt-8 w-full text-center bg-green-500 hover:bg-white text-white hover:text-green-500 border hover:border-green-500 font-bold py-3 rounded-lg shadow-lg transition">
            + Ajouter une nouvelle demande
        </a> --}}
    </div>
    <div class="flex flex-col  col-span-12 lg:col-span-4 lg:h-1/3">
    <div class="bg-white text-center text-amber-300 text-2xl shadow-lg w-full  mt-14 rounded-lg grid grid-cols-1 mb-10">

    <div class="h-80" wire:ignore>
         <canvas id="statusChart" class="w-full h-full"></canvas>
          <script>
  const ctx = document.getElementById('statusChart').getContext('2d');

  const statusChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Approuvées', 'Refusées', 'En attente'],
                datasets: [{
            data: [{{$aprouv}}, {{$refus}}, {{$attente}}],
                    backgroundColor: ['#10B981', '#EF4444', '#F59E0B'],
                    borderWidth: 4,
                    borderColor: '#fff'
                }]
            },
            options: {
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

                    const total = {{$all}};
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
<div class="bg-white rounded-lg shadow-lg p-6 mb-8">
            <h2 class="text-xl font-semibold mb-4 text-gray-700 text-center">Cartes de Statut</h2>
            <div class="space-y-4">
                <!-- Approved -->
                <div class="border-l-4 border-green-500 bg-green-50 p-4 rounded-r-lg">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-semibold text-green-700">Approuvées</span>
                        <span class="text-2xl font-bold text-green-600">{{$aprouv}}</span>
                    </div>
                    <div class="w-full bg-green-200 rounded-full h-2">
                        <div class="bg-green-500 h-2 rounded-full" style="width: 45%"></div>
                    </div>
                    <div class="text-sm text-green-600 mt-1">{{ $all != 0 ? number_format($aprouv * 100 / $all, 2) : '0' }}%
% du total</div>
                </div>
                <div class="border-l-4 border-yellow-500 bg-yellow-50 p-4 rounded-r-lg">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-semibold text-yellow-700">En attente</span>
                        <span class="text-2xl font-bold text-yellow-600">{{$attente}}</span>
                    </div>
                    <div class="w-full bg-yellow-200 rounded-full h-2">
                        <div class="bg-yellow-500 h-2 rounded-full" style="width: 36%"></div>
                    </div>
                    <div class="text-sm text-yellow-600 mt-1">{{ $all != 0 ? number_format($attente * 100 / $all, 2) : '0' }}%
 du total</div>
                </div>
                <div class="border-l-4 border-red-500 bg-red-50 p-4 rounded-r-lg">
                    <div class="flex justify-between items-center mb-2">
                        <span class="font-semibold text-red-700">Refusées</span>
                        <span class="text-2xl font-bold text-red-600">{{$refus}}</span>
                    </div>
                    <div class="w-full bg-red-200 rounded-full h-2">
                        <div class="bg-red-500 h-2 rounded-full" style="width: 18%"></div>
                    </div>
                    <div class="text-sm text-red-600 mt-1">{{ $all != 0 ? number_format($refus * 100 / $all, 2) : '0' }}%
% du total</div>
                </div>
            </div>

        </div>
         <script>
            const barCtx = document.getElementById('barChart').getContext('2d');
        new Chart(barCtx, {
            type: 'bar',
            data: {
                labels: ['Approuvées', 'En attente', 'Refusées'],
                datasets: [{
                    label: 'Nombre de demandes',
                    data: [{{$aprouv}}, {{$attente}}, {{$refus}}],
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
<div class=" bg-white text-center text-amber-300 text-2xl shadow-lg w-full  mt-5 rounded-lg h-full grid grid-cols-1 mb-10 p-4">
    <h1 class="font-bold text-xl text-black text-center items-center mb-2  ">Liste des demandes en attentes</h1>
    <div class="overflow-y-scroll overflow-x-hidden gap-2">

@foreach($demandes as $demande)
    @if(trim($demande['statut']) == "en cours de traitement" || trim($demande['statut']) == "en attente")

          <div class="flex flex-col  p-5 border-l-[6px] border-yellow-500 bg-yellow-50 rounded-xl shadow-sm hover:shadow-md transition-all duration-200 m-3">
    <h4 class="text-lg font-semibold text-gray-800 mb-2 text-center">
        {{ $demande->resource_demande }}
    </h4>
    <p class="text-sm text-gray-600 leading-relaxed text-start">
        {{ $demande->description ?? 'Aucune description.' }}
    </p>
</div>


      @endif
  @endforeach
  </div>
    </div>

</div>
</div>

</div>
