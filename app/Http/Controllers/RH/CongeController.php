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
    public function index()
    {
        //
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
        ]);

        $collaborateur = Collaborateur::findOrFail($id);

        $justificatifPath = null;
        if ($request->hasFile('justificatif')) {
            $filename = Str::uuid() . '.' . $request->file('justificatif')->getClientOriginalExtension();
            $justificatifPath = $request->file('justificatif')->storeAs('justificatifs', $filename, 'public');
        }

        Conge::create([
            'collaborateur_id' => $collaborateur->id,
            'demande_effectuee_a' => now(),              // timestamp actuel
            'date_debut' => $request->date_debut,
            'date_fin' => $request->date_fin,
            'type' => $request->type_conge,              // correction ici
            'statut' => 'en attente',
            'justificatif' => $justificatifPath,         // correction ici
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
