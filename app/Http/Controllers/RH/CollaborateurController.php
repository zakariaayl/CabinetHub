<?php

namespace App\Http\Controllers\RH;

use App\Http\Controllers\Controller;
use App\Models\RH\Collaborateur;
use Illuminate\Http\Request;

class CollaborateurController extends Controller
{
    public function dashboard(Request $request)
{
    $query = Collaborateur::query();

    // Filtrer par nom complet
    if ($request->filled('nom')) {
        $nom = $request->input('nom');
        $query->whereRaw("CONCAT(nom, ' ', prenom) LIKE ?", ["%$nom%"]);
    }

    // Filtrer par poste
    if ($request->filled('poste')) {
        $query->where('poste', $request->poste);
    }

    // Filtrer par département
    if ($request->filled('departement')) {
        $query->where('departement', $request->departement);
    }

    $collaborateurs = $query->paginate(7);

    // Pour alimenter les <select> avec des options uniques
    $postes = Collaborateur::select('poste')->distinct()->pluck('poste');
    $departements = Collaborateur::select('departement')->distinct()->pluck('departement');

    return view('Collaborateur', compact('collaborateurs', 'postes', 'departements'));
}


    public function show($id)
    {
    $collab = Collaborateur::findOrFail($id);
    return view('fiche', compact('collab'));
    }

    public function edit($id)
    {
    $collab = Collaborateur::findOrFail($id);
    return view('edit', compact('collab'));
    }

    public function update(Request $request, $id)
    {
    $collab = Collaborateur::findOrFail($id);

    $collab->update($request->all());

    return redirect()->route('collaborateurs.show', $collab->id)
    ->with('success', 'Collaborateur modifié avec succès.');

    }

    public function destroy($id)
    {
    $collab = Collaborateur::findOrFail($id);
    $collab->delete();

    return redirect()->route('collaborateurs.index')
        ->with('danger', 'Collaborateur supprimé avec succès.');
    }
     public function create()
    {
    // Juste afficher la vue du formulaire vide
    return view('create');
    }

    public function store(Request $request)
{
    // Validation simple (à adapter selon besoins)
    $validated = $request->validate([
        'nom' => 'required|string|max:255',
        'prenom' => 'required|string|max:255',
        'poste' => 'required|string|max:255',
        'departement' => 'required|string|max:255',
        'email' => 'required|email|unique:collaborateurs,email',
        'telephone' => 'nullable|string|max:20',
        'adresse' => 'nullable|string|max:255',
        'date_embauche' => 'nullable|date',
        'description_poste' => 'nullable|string',
    ]);

    // Création avec mass assignment (vérifie bien le $fillable dans le modèle)
    Collaborateur::create($validated);

    // Redirection vers le dashboard avec message de succès
    return redirect()->route('collaborateurs.index')
                     ->with('success', 'Collaborateur ajouté avec succès.');
}

}
