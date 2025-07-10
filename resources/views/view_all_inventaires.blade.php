<!DOCTYPE html>
<html lang="en">
<head >
    <meta charset="UTF-8">
<script src="https://cdn.tailwindcss.com"></script>

</head>
<style>
.bg-custom {
    background-image: url('{{ asset('images_cabinethub/pic7.jpg') }}');
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
}
</style>
<body class=" flex items-top justify-center min-h-screen relative">
<nav class="bg-white shadow-md py-4 px-6 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-green-600">📦 Gestion de Stock</h1>
    <button class="bg-green-500 text-white px-4 py-2 rounded-xl hover:bg-green-600 transition">
      Ajouter une ressource
    </button>
  </nav>
    <div
   class="bg-custom container  p-4  shadow-2xl border-gray-200  items-center justify-center   ">
   {{-- bg-gradient-to-br from-green-50 to-blue-100 --}}
        @if(session('success'))
    <div id="success-message"
     class="fixed top-8 left-1/2 transform -translate-x-1/2 bg-green-300 border border-green-500 text-white text-2xl font-bold p-4 rounded text-center transition-opacity duration-1000 ease-in-out z-50 w-fit max-w-md">
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
        <h1 class="text-3xl font-bold mb-4">Inventaires </h1>

        <form action="{{ route('inventaire.index') }}" class="bg-white p-6 rounded-xl shadow-lg border border-gray-100 mb-6">
  <div class="mb-6">
    <h2 class="text-xl font-semibold text-gray-700 flex items-center gap-2">
      <i class="ti ti-filter text-lg"></i> Filtres d'inventaire
    </h2>
  </div>

  <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
    <div>
      <label for="faite_par" class="block text-sm font-medium text-gray-600 mb-1">Responsable</label>
      <input type="text" name="faite_par" id="faite_par" placeholder="Nom du responsable"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none"
        value="{{request('faite_par')}}">
    </div>
    <div>
      <label for="date_inventaire" class="block text-sm font-medium text-gray-600 mb-1">Date de l'inventaire</label>
      <input type="date" name="date_inventaire" id="date_inventaire"
        class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none"
        value="{{request('date_inventaire')}}">
    </div>
  </div>

  <div class="flex justify-end gap-4">
    <button type="submit"
      class="bg-green-400 text-white border border-white font-semibold px-5 py-2 rounded-md transition hover:scale-105 hover:bg-white hover:border-green-400 hover:text-green-400">
      Appliquer
    </button>
    <a href="{{route('inventaire.index')}}"
      class="bg-green-400 text-white border border-white font-semibold px-5 py-2 rounded-md transition hover:scale-105 hover:bg-white hover:border-green-400 hover:text-green-400">
      Réinitialiser
    </a>
  </div>
</form>



        <div class="overflow-x-scroll">
        <table class="table-auto w-full border-collapse">
            <thead class="bg-white shadow-md border border-gray-100">
                <tr>
                    <th class="p-4">faite par</th>
                    <th class=" p-4">date de l'inventaire</th>
                    <th class=" p-4">remarque</th>
                    <th class=" p-4">action</th>

                </tr>
            </thead>
            <tbody>
                @foreach($inventaires as $inventaire)

                    <tr class="text-center hover:bg-blue-100/15">

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
{{-- {{ $inventaires }} --}}
    </div>
</body>
</html>
