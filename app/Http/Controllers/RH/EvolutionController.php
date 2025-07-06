<?php

namespace App\Http\Controllers\RH;

use App\Http\Controllers\Controller;
use App\Models\RH\Collaborateur;
use App\Models\RH\Evolution;
use Illuminate\Http\Request;

class EvolutionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Collaborateur $collaborateur)
    {
        return view('AddEvolution', compact('collaborateur'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'collaborateur_id' => 'required|exists:collaborateurs,id',
            'date' => 'required|date',
            'poste' => 'required|string|max:255',
            'departement' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Evolution::create($validated);

        return redirect()->route('collaborateurs.show', $validated['collaborateur_id'])->with('success', 'Évolution ajoutée avec succès !');
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
    public function edit(Evolution $evolution)
    {
        $collaborateur = $evolution->collaborateur;
        return view('AddEvolution', compact('evolution', 'collaborateur'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evolution $evolution)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'poste' => 'required|string|max:255',
            'departement' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $evolution->update($validated);

        return redirect()->route('collaborateurs.show', $evolution->collaborateur_id)
                         ->with('success', "Évolution mise à jour avec succès !");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evolution $evolution)
    {
        $collaborateur_id = $evolution->collaborateur_id;
        $evolution->delete();

        return redirect()->route('collaborateurs.show', $collaborateur_id)
                         ->with('success', "Évolution supprimée avec succès !");
    }
}
