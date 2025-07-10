<?php

namespace App\Http\Controllers\RH;

use App\Http\Controllers\Controller;
use App\Models\RH\Collaborateur;
use Illuminate\Http\Request;
use App\Models\RH\Presence;
use Carbon\Carbon;
use App\Models\RH\Conge;

class CollaborateurController extends Controller
{
    public function dashboard(Request $request)
{
    $today = Carbon::today();

    $query = Collaborateur::query();

    if ($request->filled('nom')) {
        $nom = $request->input('nom');
        $query->whereRaw("CONCAT(nom, ' ', prenom) LIKE ?", ["%$nom%"])
              ->orWhereRaw("CONCAT(prenom, ' ', nom) LIKE ?", ["%$nom%"]);
    }
    if ($request->filled('poste')) {
        $query->where('poste', $request->poste);
    }
    if ($request->filled('departement')) {
        $query->where('departement', $request->departement);
    }

    // Charger la présence du jour avec une relation "presencesToday"
    $collaborateurs = $query->with(['presences' => function ($query) use ($today) {
        $query->whereDate('date_jour', $today);
    }])->paginate(7);

    // Ajout d'une propriété isPresentToday pour chaque collaborateur
    foreach ($collaborateurs as $collab) {
        $collab->isPresentToday = $collab->presences->isNotEmpty();
    }

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
                     ->with('success', 'Collaborateur ajouté avec succès.');}

    public function home($id)
    {
        $collaborateur = Collaborateur::findOrFail($id);
        $today         = Carbon::today();

        /* ----- présence du jour ----- */
        $a_deja_pointe = Presence::where('id_collaborateur', $id)
                                 ->whereDate('date_jour', $today)
                                 ->exists();

        /* ----- vue demandée : présences ou congés ? ----- */
        $vue = request('vue', 'presences');   // ?vue=presences (défaut) ou ?vue=conges

        $presences = collect();   // collections vides par défaut
        $conges    = collect();

        if ($vue === 'presences') {
            $presences = Presence::where('id_collaborateur', $id)
                                 ->orderByDesc('date_jour')
                                 ->get();
        } else { // $vue === 'conges'
            $conges = Conge::where('collaborateur_id', $id)
                           ->orderByDesc('created_at')
                           ->get();
        }

        return view('collaborateur_home', [
            'collaborateur' => $collaborateur,
            'dejaPointe'    => $a_deja_pointe,
            'vue'           => $vue,         // ← on envoie l’info à la vue
            'presences'     => $presences,
            'conges'        => $conges,
        ]);
    }

    public function historiqueConges($id){
    $collaborateur = Collaborateur::findOrFail($id);
    $conges = $collaborateur->conges()->latest()->get();   // relation conges()

    return view('collaborateur_historique_conges',
                compact('collaborateur','conges'));}



}
