<?php

namespace App\Http\Controllers;

use App\Models\demande_achat;
use Illuminate\Http\Request;

class DemandeAchatController extends Controller
{

   public function update(Request $request,$id) {
       $demande=demande_achat::find($id);
      if ($request->input('action') === 'valider') {
        $demande->statut = "approuvée";
    } elseif ($request->input('action') === 'refuser') {
        $demande->statut = "refusée";
    }
       $demande->save();
     return redirect()->route('raDemandes')->with('success', 'Demande est ' . $demande->statut);

   }
   public function show($id) {
       $demande=demande_achat::find( $id );
       return view('demandes.view_one_demande',compact('demande'));
   }
   public function create() {
      return view('demandes.create_demande');
   }
   public function store(Request $request) {
      $demande=demande_achat::create($request->all());
      return redirect()->route('raDemandes')->with('success','demande effectuee avec succes');
   }
}
