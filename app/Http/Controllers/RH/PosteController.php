<?php

namespace App\Http\Controllers\RH;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RH\poste;

class PosteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $postes = Poste::all(); // récupérer tous les postes
        return view('postes.index', compact('postes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('postes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'description' => 'nullable|string',
            'missions' => 'nullable|string',
            'competences' => 'nullable|string',
            'salaire_min' => 'nullable|numeric|min:0',
            'salaire_max' => 'nullable|numeric|gte:salaire_min',
            'evolution_possible' => 'nullable|string',]);
            // Création du poste
    \App\Models\RH\Poste::create($validated);

    // Redirection vers la liste avec un message flash
    return redirect()->route('postes.index')->with('success', 'Fiche de poste créée avec succès !');
    }

    /**
     * Display the specified resource.
     */
    public function show(poste $poste)
    {
        return view('postes.show', compact('poste'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(poste $poste)
    {
        return view('postes.edit', compact('poste'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, poste $poste)
    {
        $validated = $request->validate([
            'intitule' => 'required|string|max:255',
            'description' => 'nullable|string',
            'missions' => 'nullable|string',
            'competences' => 'nullable|string',
            'salaire_min' => 'nullable|numeric',
            'salaire_max' => 'nullable|numeric',
            'evolution_possible' => 'nullable|string',
        ]);

        $poste->update($validated);

        return redirect()->route('postes.index')->with('success', 'Fiche de poste modifiée avec succès !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(poste $poste)
    {
        $poste->delete();

        return redirect()->route('postes.index')->with('success', 'La fiche de poste a été supprimée avec succès.');
    }
}
