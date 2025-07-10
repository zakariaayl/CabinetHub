<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class=" flex items-top justify-center min-h-screen relative ">
<div class="max-w-7xl mx-auto p-6 bg-gradient-to-b rounded-xl shadow-2xl from-yellow-100 via-white to-yellow-100">
  <h1 class="text-3xl font-bold text-gray-800 mb-6">Créer un Inventaire</h1>

  <form method="POST" action="{{ route('inventaire.update',$id) }}">
    @csrf
    @method('PUT')
  <input type="text" name="faite_par" class="mb-5" >
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 overflow-y-auto max-h-[83vh]">

      @foreach ($ressources as $index => $ressource)
      <div class="bg-white border border-gray-100 hover:shadow-2xl hover:scale-105 transition rounded-xl p-6">

        <input type="hidden" name="ressources[{{ $index }}][id]" value="{{ $ressource->id }}">

        <div class="mb-3">
          <h2 class="text-lg font-semibold text-gray-800">{{ $ressource->designation }}</h2>
          <p class="text-sm text-gray-500">{{ $ressource->type }} - {{ $ressource->marque }}</p>
        </div>

        <div class="space-y-3">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">État relevé</label>
            <select name="ressources[{{ $index }}][etat_releve]"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-400">
              <option value="">-- Choisir --</option>
              <option value="Bon" {{$ressource->pivot->etat_releve == "Bon" ? "selected":''}}>Active</option>
              <option value="Usagé" {{$ressource->pivot->etat_releve=="Usagé"?"selected" :''}}>needs a warning</option>
              <option value="Hors Service" {{$ressource->pivot->etat_releve=="Hors Service" ?"selected":''}}>expired</option>
            </select>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Quantité</label>
            <input type="number" name="ressources[{{ $index }}][quantite]" min="1"
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-400"
                   value={{$ressource->pivot->quantite}}>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Commentaire</label>
            <textarea name="ressources[{{ $index }}][commentaire]" rows="2"
                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-green-400"
                     >{{$ressource->pivot->commentaire}}</textarea>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="mt-8 text-right">
      <button type="submit"
              class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-xl transition duration-300">
        editer l'inventaire
      </button>
    </div>
  </form>
</div>
</body>
</html>
