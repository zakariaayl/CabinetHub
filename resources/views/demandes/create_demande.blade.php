<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Nouvelle Demande</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-gray-100 via-white to-gray-100 min-h-screen py-10">
  @include('shared.navbar_resource')

  <div class="max-w-3xl mx-auto px-4">
    <h1 class="text-3xl font-bold text-center text-gray-900 mb-8 mt-10">Nouvelle Demande d'Achat</h1>

    <form action="{{ route('demande_achat.store') }}" method="POST" class="bg-white p-8 rounded-lg shadow-2xl space-y-6 border border-gray-200">
      @csrf

      <div>
        <label for="responsabl_demande" class="block text-sm font-medium text-gray-700 mb-2">Responsable de la demande</label>
        <input type="text" name="responsabl_demande" id="responsabl_demande" required placeholder="Nom complet"
               class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-green-500">
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="date_demande" class="block text-sm font-medium text-gray-700 mb-2">Date de la demande</label>
          <input type="date" name="date_demande" id="date_demande"
                 class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-green-500">
        </div>
        <div>
          <label for="date_besoin" class="block text-sm font-medium text-gray-700 mb-2">Date de besoin</label>
          <input type="date" name="date_besoin" id="date_besoin"
                 class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-green-500">
        </div>
      </div>

      <div>
        <label for="resource_demande" class="block text-sm font-medium text-gray-700 mb-2">Ressource demandée</label>
        <input type="text" name="resource_demande" id="resource_demande" required
               placeholder="Nom de la ressource (ex: PC, logiciel...)"
               class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-green-500">
      </div>

      <div>
        <label for="categorie" class="block text-sm font-medium text-gray-700 mb-2">Catégorie</label>
        <select name="categorie" id="categorie"
                class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-green-500">
          <option value="">-- Sélectionner --</option>
          <option value="Matériel">Matériel</option>
          <option value="Logiciel">Logiciel</option>
          <option value="Service">Service</option>
        </select>
      </div>

      <div>
        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
        <textarea name="description" id="description" rows="3"
                  class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-green-500"
                  placeholder="Description de la ressource..."></textarea>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div>
          <label for="quantite" class="block text-sm font-medium text-gray-700 mb-2">Quantité</label>
          <input type="number" name="quantite" id="quantite" min="1"
                 class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-green-500">
        </div>
        <div>
          <label for="prix_unitaire_estime" class="block text-sm font-medium text-gray-700 mb-2">Prix Unitaire Estimé (MAD)</label>
          <input type="number" name="prix_unitaire_estime" id="prix_unitaire_estime" min="0" step="0.01"
                 class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-green-500">
        </div>
        <div>
          <label for="montant_total_estime" class="block text-sm font-medium text-gray-700 mb-2">Montant Total Estimé (MAD)</label>
          <input type="number" name="montant_total_estime" id="montant_total_estime" min="0" step="0.01"
                 class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-green-500">
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
          <label for="emplacement" class="block text-sm font-medium text-gray-700 mb-2">Emplacement</label>
          <input type="text" name="emplacement" id="emplacement"
                 class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-green-500"
                 placeholder="Ex: Bureau 205">
        </div>
        <div>
          <label for="departement" class="block text-sm font-medium text-gray-700 mb-2">Département</label>
          <input type="text" name="departement" id="departement"
                 class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-green-500"
                 placeholder="Ex: IT, RH, Comptabilité">
        </div>
      </div>

      <div>
        <label for="commentaire" class="block text-sm font-medium text-gray-700 mb-2">Commentaire</label>
        <textarea name="commentaire" id="commentaire" rows="3"
                  class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-green-500"
                  placeholder="Commentaires supplémentaires (facultatif)"></textarea>
      </div>

      <div class="pt-4">
        <button type="submit"
                class="w-full py-3 px-4 rounded-md bg-green-500 text-white hover:bg-white hover:text-green-500 hover:border hover:border-green-500 transition font-semibold">
          Soumettre la demande
        </button>
      </div>
    </form>
  </div>
</body>
</html>
