<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Tailwind Inventory Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.30.0/tabler-icons.min.css" rel="stylesheet">

 <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

</head>
<style>
.bg-custom {
    background-image: url('{{ asset('images_cabinethub/pic7.jpg') }}');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
</style>

<body class=" min-h-screen bg-white text-gray-800 font-sans">

  <div class="max-w-7xl mx-auto p-6 border border-gray-200 shadow-2xl b-gradient-to-br from-gray-100 via-white to-gray-100">
    <header class="text-center text-white mb-10">
      <h1 class="text-4xl font-bold text-gray-800 drop-shadow">Gestion Avancée des Inventaires</h1>
      <p class="text-lg text-gray-800 opacity-90">Suivi en temps réel et analyses de vos ressources</p>
    </header>

    <div class="flex flex-wrap gap-4 mb-8 items-center">
      <form method="GET"{{route('inventaire.show',['inventaire'])}}" class="relative flex-1">
        <input name="search" id="searchInput" type="text" value="{{request('search')}}" placeholder="Search inventory items..."
               class="  border border-gray-100 w-full p-4 pl-5 pr-12 rounded-xl bg-white shadow-lg text-sm focus:outline-none focus:ring-2 focus:ring-indigo-400">
        <i class="ti ti-search absolute right-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
      </form>
      <div class="flex gap-2 flex-wrap shadow-lg  border border-gray-100 bg-white rounded-lg ">
        <button class="filter-btn  my-2 ml-2 active px-5 py-2 rounded-full font-semibold text-white bg-gray-400 hover:bg-white hover:text-gray-400 hover:border-gray-400 border border-white shadow-md hover:scale-105 transition" data-filter="all">Tous les ressources</button>
        <button class="filter-btn my-2 px-5 py-2 rounded-full font-semibold text-white bg-green-400 hover:bg-white hover:text-green-400 hover:border-green-400 border shadow-md border-white hover:scale-105 transition " data-filter="active">Actif</button>
        <button class="filter-btn my-2  px-5 py-2 rounded-full font-semibold text-white bg-orange-400 hover:bg-white hover:text-orange-400 hover:border-orange-400 shadow-md border border-white hover:scale-105 transition" data-filter="warning">Attention</button>
        <button class="filter-btn my-2 mr-2 px-5 py-2 rounded-full font-semibold text-white bg-red-400 hover:bg-white hover:text-red-400 hover:border-red-400 border shadow-md border-white hover:scale-105 transition" data-filter="expired">Expiré</button>
      </div>
    </div>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
      <div class="text-center p-6 bg-white rounded-2xl shadow shadow-lg border border-gray-100 items-center justify-center">
        <svg class="mx-auto mb-0.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#53b333" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M22 12h-2.48a2 2 0 0 0-1.93 1.46l-2.35 8.36a.25.25 0 0 1-.48 0L9.24 2.18a.25.25 0 0 0-.48 0l-2.35 8.36A2 2 0 0 1 4.49 12H2"></path></svg>
        <h3 id="activeCount" class="text-2xl font-bold">{{$active}}</h3>
        <p class="text-sm text-gray-600">Ressources actives</p>
      </div>
      <div class="text-center p-6 bg-white rounded-2xl shadow shadow-lg border border-gray-100">
        <i class="ti ti-alert-triangle text-3xl text-yellow-500 mb-3"></i>
        <h3 id="warningCount" class="text-2xl font-bold">{{ $neartoend}}</h3>
        <p class="text-sm text-gray-600">En fin de vie</p>
      </div>
      <div class="text-center p-6 bg-white rounded-2xl shadow shadow-lg border border-gray-100">
<svg class="mx-auto" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24" fill="none" stroke="#f30101" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3.85 8.62a4 4 0 0 1 4.78-4.77 4 4 0 0 1 6.74 0 4 4 0 0 1 4.78 4.78 4 4 0 0 1 0 6.74 4 4 0 0 1-4.77 4.78 4 4 0 0 1-6.75 0 4 4 0 0 1-4.78-4.77 4 4 0 0 1 0-6.76Z"></path><line x1="15" x2="9" y1="9" y2="15"></line><line x1="9" x2="15" y1="9" y2="15"></line></svg>
        <h3 id="expiredCount" class="text-2xl font-bold">{{$expired}}</h3>
        <p class="text-sm text-gray-600">Ressources Expiré</p>
      </div>
      <div class="text-center p-6 bg-white rounded-2xl shadow shadow-lg border border-gray-100">
        <i class="ti ti-database text-3xl text-indigo-500 mb-3"></i>
        <h3 id="totalCount" class="text-2xl font-bold">{{$all}}</h3>
        <p class="text-sm text-gray-600">Nombre total d’éléments</p>
      </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
      <div class="overflow-y-auto max-h-[600px] lg:col-span-2 grid grid-cols-1 sm:grid-cols-2 gap-6" id="inventoryGrid">



        @foreach ($ressources as $ressource)

        @if ($ressource->pivot->etat_releve=="Hors Service")
<div class="bg-white rounded-2xl p-6 relative border-t-4 border-red-500 shadow-lg">
          <div class="absolute top-4 right-4 bg-red-100 text-red-700 text-xs font-bold px-3 py-1 rounded-full">Expiré</div>
          <div class="flex items-center mb-4">
            <i class="ti ti-router text-red-500 text-2xl mr-3"></i>
            <h3 class="text-lg font-semibold"> {{$ressource['designation']}}</h3>
          </div>
          <ul class="text-sm space-y-1 text-gray-600">
            <li><strong>Type:</strong> {{$ressource['type']}}</li>
            <li><strong>Marque:</strong> {{$ressource['marque']}}</li>
            <li><strong>Modele:</strong> {{$ressource['modele']}}</li>
            <li><strong>Serial:</strong> {{$ressource['numero_serie']}}</li>
            <li><strong>Life Duration:</strong> {{$ressource['duree_vie_mois']}}</li>
            <li><strong>Quantite:</strong> {{$ressource->pivot->quantite}}</li>
          </ul>
        </div>
        @elseif ($ressource->pivot->etat_releve=="Bon")
<div class="bg-white rounded-2xl p-6 relative border-t-4 border-green-500 shadow-lg  ">
          <div class="absolute top-4 right-4 bg-green-100 text-green-700 text-xs font-bold px-3 py-1 rounded-full">Actif</div>
          <div class="flex items-center mb-4">
            <i class="ti ti-device-laptop text-green-500 text-2xl mr-3"></i>
            <h3 class="text-lg font-semibold"> {{$ressource['designation']}}</h3>
          </div>
          <ul class="text-sm space-y-1 text-gray-600">
            <li><strong>Type:</strong> {{$ressource['type']}}</li>
            <li><strong>Marque:</strong> {{$ressource['marque']}}</li>
            <li><strong>Modele:</strong> {{$ressource['modele']}}</li>
            <li><strong>Serial:</strong> {{$ressource['numero_serie']}}</li>
            <li><strong>Life Duration:</strong> {{$ressource['duree_vie_mois']}}</li>
            <li><strong>Quantite:</strong> {{$ressource->pivot->quantite}}</li>
          </ul>
        </div>

        @elseif ($ressource->pivot->etat_releve=="Usagé")

         <div class="bg-white rounded-2xl shadow p-6 relative border-t-4 border-yellow-400 shadow-lg">
          <div class="absolute top-4 right-4 bg-yellow-100 text-yellow-700 text-xs font-bold px-3 py-1 rounded-full">besoin d'Attention</div>
          <div class="flex items-center mb-4">
            <i class="ti ti-license text-yellow-500 text-2xl mr-3"></i>
            <h3 class="text-lg font-semibold"> {{$ressource['designation']}}</h3>
          </div>
          <ul class="text-sm space-y-1 text-gray-600">
            <li><strong>Type:</strong> {{$ressource['type']}}</li>
            <li><strong>Marque:</strong> {{$ressource['marque']}}</li>
            <li><strong>Modele:</strong> {{$ressource['modele']}}</li>
            <li><strong>Serial:</strong> {{$ressource['numero_serie']}}</li>
            <li><strong>Life Duration:</strong> {{$ressource['duree_vie_mois']}}</li>
            <li><strong>Quantite:</strong> {{$ressource->pivot->quantite}}</li>
          </ul>
        </div>





        @endif

     @endforeach


      </div>

      <div class="space-y-6 ">
        <div class="bg-white rounded-2xl  p-6 shadow-lg border border-gray-100 ">
          <h3 class="text-lg font-semibold mb-4">Distribution des Status</h3>
          <canvas id="statusChart" class="w-full h-64"></canvas>
          <script>
  const ctx = document.getElementById('statusChart').getContext('2d');

  const statusChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['Active', 'Nearing End', 'Expired'],
      datasets: [{
        label: 'Status Distribution',
        data: [{{ $active }}, {{ $neartoend }}, {{ $expired }}],
        backgroundColor: ['#22c55e', '#facc15', '#ef4444'],
        borderColor: ['#16a34a', '#eab308', '#dc2626'],
        borderWidth: 1
      }]
    },
    options: {
      responsive: true,
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

        <div class="bg-white rounded-2xl  p-6 shadow-lg border border-gray-100 ">
          <h3 class="text-lg font-semibold mb-4">Alerts des Maintenances </h3>

          <div class="space-y-4">
            @foreach ($ressources as $ressource )

            @if ($ressource->pivot->etat_releve=="Hors Service")
            <div class="flex items-start p-4 border-l-4 border-red-500 bg-red-100 rounded-xl">
              <i class="ti ti-alert-circle text-red-500 text-xl mr-3"></i>
              <div>
                <h4 class="font-semibold">{{$ressource->designation}}</h4>
                <p class="text-sm text-gray-600">{{$ressource->pivot->commentaire}}</p>
              </div>
            </div>
            @elseif ($ressource->pivot->etat_releve=="Usagé")
            <div class="flex items-start p-4 border-l-4 border-yellow-500 bg-yellow-100 rounded-xl">
              <i class="ti ti-calendar text-yellow-500 text-xl mr-3"></i>
              <div>
                <h4 class="font-semibold">{{$ressource->designation}}</h4>
                <p class="text-sm text-gray-600">{{$ressource->pivot->commentaire}}</p>
              </div>
            </div>
            @endif
             @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
