<?php

namespace App\Http\Controllers;

use App\Models\demande_achat;
use Illuminate\Http\Request;

class DemandeAchatController extends Controller
{
   public function index(){
    $demandes=demande_achat::paginate(12);
    $livre=0;
    $aprouv=0;
    $attente=0;
    $refus=0;
    $all=0;
    foreach ($demandes as $demand) {
        if ($demand->statut === 'livrée') {
    $livre++;
} elseif ($demand->statut === 'approuvée') {
    $aprouv++;
} elseif ($demand->statut === 'en attente') {
    $attente++;
} elseif ($demand->statut === 'refusée') {
    $refus++;
}
$all++;
    }

    return view("demandes.all_demandes_achats_view",compact("demandes","all","refus","aprouv","attente"));
   }
   public function update(Request $request,$id) {
       $demande=demande_achat::find($id);
      if ($request->input('action') === 'valider') {
        $demande->statut = "approuvée";
    } elseif ($request->input('action') === 'refuser') {
        $demande->statut = "refusée";
    }
       $demande->save();
       return redirect()->route('demande_achat.index');
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
      return redirect()->route('demande_achat.index')->with('success','demande effectuee avec succes');
   }
}
