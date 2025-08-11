<?php

namespace App\Http\Controllers\RH;

use App\Http\Controllers\Controller;
use App\Models\RH\Collaborateur;
use App\Models\RH\Conge;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CongeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // app/Http/Controllers/RH/CongeController.php

public function index(Request $request)
{
    $query = Conge::with('collaborateur')
        ->orderByRaw("FIELD(statut,'en attente','accepté','refusé')")
        ->latest('demande_effectuee_a');

    if ($request->filled('collaborateur')) {
        $query->whereHas('collaborateur', function ($q) use ($request) {
            $q->where('nom', 'like', '%' . $request->collaborateur . '%')
              ->orWhere('prenom', 'like', '%' . $request->collaborateur . '%');
        });
    }

    if ($request->filled('type')) {
        $query->where('type', $request->type);
    }

    if ($request->filled('statut')) {
        $query->where('statut', $request->statut);
    }

    $conges = $query->paginate(10);

    return view('conges.index', compact('conges'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        // On récupère les infos du collaborateur
        $collaborateur = Collaborateur::findOrFail($id);

        // On retourne la vue du formulaire en lui passant le collaborateur
        return view('conges.create', compact('collaborateur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'date_debut' => 'required|date|after_or_equal:today',
            'date_fin' => 'required|date|after_or_equal:date_debut',
            'type_conge' => 'required|string|max:255',
            'justificatif' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'motif' => 'nullable|string',
        ]);

        $collaborateur = Collaborateur::findOrFail($id);

        $justificatifPath = null;
        if ($request->hasFile('justificatif')) {
            $filename = Str::uuid() . '.' . $request->file('justificatif')->getClientOriginalExtension();
            $justificatifPath = $request->file('justificatif')->storeAs('justificatifs', $filename, 'public');
        }

        Conge::create([
            'collaborateur_id' => $collaborateur->id,
            'demande_effectuee_a' => now(),
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'type' => $request->type_conge,
            'statut' => 'en attente',
            'justificatif' => $justificatifPath,
            'motif'      => $request->motif,
        ]);

        return redirect()->route('collaborateur.home', ['id' => $collaborateur->id, 'vue' => 'conges'])
                         ->with('success', '✅ Demande de congé envoyée avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'statut' => 'required|in:accepté,refusé',
        ]);

        $conge = Conge::findOrFail($id);
        $conge->update([
            'statut' => $request->statut
        ]);

        return redirect()->route('rh.conges.index')->with('success', 'Le congé a été mis à jour.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function refuser(Request $request, $id)
{
    $request->validate([
        'response_message' => 'required|string|max:1000',
    ]);
    $conge = Conge::findOrFail($id);
    $conge->update([
        'statut'           => 'refusé',
        'response_message' => $request->response_message,
    ]);
    return redirect()->route('rh.conges.index')
                     ->with('success','Demande refusée.');
}

}
