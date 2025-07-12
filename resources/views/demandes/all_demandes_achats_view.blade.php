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
        <!-- All demandes -->
<div class="bg-white shadow-lg rounded-2xl p-6 flex flex-col items-center justify-center border border-gray-200 mb-6">
    <h3 class="text-lg font-semibold text-gray-800 mb-1">Toutes les demandes</h3>
    <p class="text-2xl font-bold text-gray-600">{{ $all }}</p>
</div>


<div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
    <div class="bg-yellow-50 shadow-md rounded-2xl p-6 flex flex-col items-center justify-center border border-yellow-200 hover:shadow-lg transition">
        <h4 class="text-md font-semibold text-yellow-700 mb-1">En attente</h4>
        <p class="text-xl font-bold text-yellow-600">{{ $attente }}</p>
    </div>
    <div class="bg-green-50 shadow-md rounded-2xl p-6 flex flex-col items-center justify-center border border-green-200 hover:shadow-lg transition">
        <h4 class="text-md font-semibold text-green-700 mb-1">Approuvée</h4>
        <p class="text-xl font-bold text-green-600">{{ $aprouv }}</p>
    </div>
    <div class="bg-red-50 shadow-md rounded-2xl p-6 flex flex-col items-center justify-center border border-red-200 hover:shadow-lg transition">
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
                        <p class="text-sm text-gray-500"> {{ $demande['description'] ?? '---' }}</p>
                    </div>

                    <div class="flex gap-2 mt-4">
                        <form action="{{ route('demande_achat.update', $demande['id']) }}" method="GET" class="w-full">
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
                        <form action="{{route('demande_achat.update',$demande->id)}}" method="POST" onsubmit="return confirm('Confirmer la suppression ?');" class="w-full">
                            @csrf
                            @method('PUT')
                            <button class="w-full bg-white text-red-400 border border-red-400 py-2 rounded hover:bg-red-400  hover:scale-110  hover:text-white transition text-sm font-semibold" name="action" value="refuser">
                                refuser
                            </button>
                        </form>
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
                        <form action="{{route('demande_achat.update',$demande->id)}}" method="POST" class="w-full">
                             @csrf
                            @method('PUT')
                            <button class="w-full bg-white text-blue-400 border border-blue-400 py-2 rounded hover:bg-blue-400  hover:scale-110  hover:text-white transition text-sm font-semibold" name="action" value="valider">
                                valider
                            </button>
                        </form>
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
      labels: ['approuvée', 'refusée','en cours de traitement'],
      datasets: [{
        label: 'Status du Distribution',
        data: [{{ $aprouv }}, {{ $refus }}, {{ $attente  }}],
        backgroundColor: ['#74E149', '#EE3A3C', '#FFDA44'],
        borderColor: ['#74E149', '#EE3A3C', '#FFDA44'],
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
</body>
</html>
