<?php

namespace App\Http\Controllers\RH;

use App\Http\Controllers\Controller;
use App\Models\RH\Collaborateur;
use Illuminate\Http\Request;

class CollaborateurController extends Controller
{
    public function dashboard()
    {
    $collaborateurs = Collaborateur::all();
    return view('Collaborateur', compact('collaborateurs'));
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

}
