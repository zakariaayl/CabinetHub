<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Tableau de bord des demandes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body class="bg-gradient-to-b from-gray-100 via-white to-gray-100 min-h-screen py-8 px-4 text-gray-800 grid grid-cols-12 gap-2">

    @if(session('success'))
        <div id="success-message"
             class="fixed top-8 left-1/2 transform -translate-x-1/2 bg-green-500 text-white font-bold text-lg px-6 py-3 rounded shadow-lg transition-opacity duration-1000 z-50">
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

    <div class="max-w-7xl mx-auto lg:col-span-8 sm:col-span-12">
        <h1 class="text-3xl font-bold mb-6">Tableau de bord des demandes</h1>

        <form action="{{ route('demande_achat.index') }}" method="GET"
              class="bg-white p-6 rounded-xl shadow border border-gray-100 mb-8">
            <h2 class="text-xl font-semibold mb-4">Filtres de recherche</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-4">
                <div>
                    <label class="block text-sm font-medium mb-1">Responsable</label>
                    <input type="text" name="responsabl_demande" value="{{ request('responsabl_demande') }}"
                           class="w-full border px-4 py-2 rounded focus:ring-2 focus:ring-green-500">
                </div>
                <div>
                    <label class="block text-sm font-medium mb-1">Date d'inventaire</label>
                    <input type="date" name="date_demande" value="{{ request('date_demande') }}"
                           class="w-full border px-4 py-2 rounded focus:ring-2 focus:ring-green-500">
                </div>
            </div>
            <div class="flex justify-end gap-4">
                <button type="submit"
                        class="bg-green-500 text-white px-5 py-2 rounded hover:bg-white hover:text-green-500 border hover:border-green-500 transition">
                    Appliquer
                </button>
                <a href="{{ route('demande_achat.index') }}"
                   class="bg-red-400 text-white px-5 py-2 rounded hover:bg-white hover:text-red-400 border hover:border-red-400 transition">
                    Réinitialiser
                </a>
            </div>
        </form>
        <div class=" bg-white shadow-lg rounded-2xl p-5 flex flex-col justify-center border border-gray-200 items-center">
            <div>tous les demandes</div>
            <div>{{$all}}</div>
           </div>
        <div class="grid grid-cols-4 h-1/6 m-2 gap-4 mb-6">

           <div class=" bg-white shadow-lg rounded-2xl p-5 flex flex-col justify-center border border-gray-200 items-center">
            <div>livree</div>
            <div>{{$livre}}</div>
           </div>
           <div class="bg-white shadow-lg rounded-2xl p-5 flex flex-col justify-center border border-gray-200  text-center items-center">
            <div>en cours de traitement</div>
            <div>{{$attente}}</div>
           </div>
           <div class=" bg-white shadow-lg rounded-2xl p-5 flex flex-col justify-center border border-gray-200  text-center items-center">
              <div>approuvee</div>
            <div>{{$aprouv}}</div>
           </div>
           <div class=" bg-white shadow-lg rounded-2xl p-5 flex flex-col justify-center border border-gray-200  text-center items-center">
               <div>refusee</div>
            <div>{{$refus}}</div>
           </div>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @forelse($demandes as $demande)
            @if ($demande['statut']=="approuvée")

                <div class="bg-white shadow-lg rounded-xl p-5 flex flex-col justify-between border-t-4  hover:shadow-2xl transition border-green-500">
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
                        <form action="" method="GET" class="w-full">
                            <button class="w-full bg-white text-blue-400 border border-blue-400 py-2 rounded hover:bg-blue-400  hover:scale-110  hover:text-white transition text-sm font-semibold">
                                Modifier
                            </button>
                        </form>
                        <form action="" method="POST" onsubmit="return confirm('Confirmer la suppression ?');" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button class="w-full bg-white text-red-400 border border-red-400 py-2 rounded hover:bg-red-400  hover:scale-110  hover:text-white transition text-sm font-semibold">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                @elseif ($demande['statut']=="refusée")
                     <div class="bg-white shadow-lg rounded-xl p-5 flex flex-col justify-between border-t-4  hover:shadow-2xl transition border-red-400">
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
                        <form action="" method="GET" class="w-full">
                            <button class="w-full bg-white text-blue-400 border border-blue-400 py-2 rounded hover:bg-blue-400  hover:scale-110  hover:text-white transition text-sm font-semibold">
                                Modifier
                            </button>
                        </form>
                        <form action="" method="POST" onsubmit="return confirm('Confirmer la suppression ?');" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button class="w-full bg-white text-red-400 border border-red-400 py-2 rounded hover:bg-red-400  hover:scale-110  hover:text-white transition text-sm font-semibold">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>
                @elseif($demande['statut']==" en cours de traitement" || "en attente")
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
                        <form action="" method="GET" class="w-full">
                            <button class="w-full bg-white text-blue-400 border border-blue-400 py-2 rounded hover:bg-blue-400  hover:scale-110  hover:text-white transition text-sm font-semibold">
                                Modifier
                            </button>
                        </form>
                        <form action="" method="POST" onsubmit="return confirm('Confirmer la suppression ?');" class="w-full">
                            @csrf
                            @method('DELETE')
                            <button class="w-full bg-white text-red-400 border border-red-400 py-2 rounded hover:bg-red-400  hover:scale-110  hover:text-white transition text-sm font-semibold">
                                Supprimer
                            </button>
                        </form>
                    </div>
                </div>

                @else
    {{-- Debug unknown statut --}}
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

        <a href="{{ route('demande_achat.create') }}"
           class="block mt-8 w-full text-center bg-green-500 hover:bg-white text-white hover:text-green-500 border hover:border-green-500 font-bold py-3 rounded-lg shadow-lg transition">
            + Ajouter une nouvelle demande
        </a>
    </div>
    <div class="flex flex-col  md:col-span-12 lg:col-span-4 lg:h-1/3">
    <div class="bg-white text-center text-amber-300 text-2xl shadow-lg w-full  mt-14 rounded-lg grid grid-cols-1 mb-10">

    <div class="h-80">
         <canvas id="statusChart" class="w-full h-full"></canvas>
          <script>
  const ctx = document.getElementById('statusChart').getContext('2d');

  const statusChart = new Chart(ctx, {
    type: 'pie',
    data: {
      labels: ['livrée','en cours de traitement', 'approuvée','refusée'],
      datasets: [{
        label: 'Status du Distribution',
        data: [{{ $aprouv }}, {{ $refus }}, {{ $attente }},{{ $livre }}],
        //
        backgroundColor: ['#74E149', '#EE3A3C', '#FFDA44','#CBBDBD'],
        borderColor: ['#74E149', '#EE3A3C', '#FFDA44','#CBBDBD'],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
      maintainAspectRatio: false,
      plugins: {
        legend: {
          position: 'bottom',
          labels: {
            font: {
              size: 14
            }
          }
        },
        title: {
          display: true,
          text: 'Status des Inventaires',
          font: {
            size: 16
          }
        }
      }
    }
  });
</script>
    </div>

</div>
<div class=" bg-white text-center text-amber-300 text-2xl shadow-lg w-full  mt-14 rounded-lg h-full grid grid-cols-1 mb-10 p-4">
    <div class="overflow-y-scroll overflow-x-hidden gap-2">
@foreach($demandes as $demande)

     @if($demande['statut']==" en cours de traitement" || "en attente")
            <div class="flex items-start p-4 border-l-4 border-yellow-500 bg-yellow-100 rounded-xl mb-2">
              <i class="ti ti-calendar text-yellow-500 text-xl mr-3"></i>
              <div>
                <h4 class="font-semibold">{{$demande->resource_demande}}</h4>
                <p class="text-sm text-gray-600">{{$demande->description}}</p>
              </div>
            </div>
      @endif
  @endforeach
  </div>
    </div>
</div>
</body>
</html>
