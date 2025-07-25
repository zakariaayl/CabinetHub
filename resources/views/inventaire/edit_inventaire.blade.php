<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 flex items-top justify-center min-h-screen relative ">
    @include('components.navbar_resource')
<div class="max-w-7xl mx-auto p-6 bg-white rounded-xl shadow-2xl ">
  <h1 class="text-3xl font-bold text-gray-800 mb-6">Créer un Inventaire</h1>

  <form method="POST" action="{{ route('inventaire.update',$id) }}">
    @csrf
    @method('PUT')
  <label for="faite_par"class=" text-gray-400 text-lg text-medium mb-4" >Responsable s'Inventaire</label><br>
  <input type="text" id="faite_par" name="faite_par" class="mb-5 mt-4 w-1/2 h-[43px] rounded-xl border border-gray-200 focus:ring-blue-400 focus:ring-1 outline-none transition  focus:border-blue-400 " placeholder="entrez votre nom ..." value="{{$inventaire['faite_par']}}">
  <h2 class="text-gray-600 text-xl text-semibold mb-4">Listes des ressources</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 overflow-y-hidden max-h-[83vh] overflow-x-hidden">

      @foreach ($ressources as $index => $ressource)
      <div class="bg-white border border-gray-200 hover:shadow-2xl hover:scale-105 transition rounded-xl p-6">

        <input type="hidden" name="ressources[{{ $index }}][id]" value="{{ $ressource->id }}">
         <input type="hidden" name="ressources[{{ $index }}][designation]" value="{{ $ressource->designation }}">

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
