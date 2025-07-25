<?php

namespace App\Http\Controllers;

use App\Helpers\AuditEventHelper;
use App\Models\inventaire;
use App\Models\ressource;
use Illuminate\Http\Request;

class inventaireController extends Controller
{

 public function store(Request $request)
{
    $inventaire = Inventaire::create([
        'date_inventaire' => now(),
        'faite_par' => $request->faite_par,
'remarques'=>'j ai fais cet inventaire'
    ]);
$designation='';
    foreach ($request->ressources as $res) {
        $designation .= $res['designation'] . ', ';

        if (!empty($res['etat_releve'])) {
            $inventaire->ressources()->attach($res['id'], [
                'etat_releve' => $res['etat_releve'],
                'quantite' => $res['quantite'],
                'commentaire' => $res['commentaire'],
            ]);
        }
    }
   AuditEventHelper::log("creation d'un inventaire'","creation d'inventaire effectuee pour les ressources ".$designation,$inventaire,null,null,$inventaire->id);
    return redirect()->route('raInventaire')->with('success', 'Inventaire créé avec succès.');
}

 public function show($id,Request $request){
    $inventaire=inventaire::find($id);
    $ressources=$inventaire->ressources;
   if ($request->filled('search')) {
    $search=$request->search;
        $ressources = $inventaire->ressources()
    ->where('designation', 'like', '%' . $search . '%')
    ->get();
    }

    $active=0;
    $neartoend=0;
    $expired=0;
    $all=0;
    foreach($ressources as $ressource){
        $all++;
        if($ressource->pivot->etat_releve=="Usagé") $neartoend++;
        if($ressource->pivot->etat_releve=="Hors Service") $expired++;
        if($ressource->pivot->etat_releve=="Bon") $active++;
    }
    return view ("inventaire.view_one_inventaire",compact("ressources","active","neartoend","all","expired"));
 }
public function create() {
    $ressources=ressource::all();
    return view('inventaire.add_inventaire',compact('ressources'));
}
public function edit($id) {
    $inventaire=inventaire::find($id);
    $ressources=$inventaire->ressources;
    return view('inventaire.edit_inventaire',compact('ressources','id','inventaire'));
}
public function update(Request $request,$id)
{
    $inventaire = Inventaire::find($id);
    $designation='';
    foreach ($request->ressources as $res) {
       $designation .= $res['designation'] . ', ';
// dd($request->ressources);

        if (!empty($res['etat_releve'])) {
            $inventaire->ressources()->updateExistingPivot($res['id'], [
                'etat_releve' => $res['etat_releve'],
                'quantite' => $res['quantite'],
                'commentaire' => $res['commentaire'],
            ]);
        }else {
                $inventaire->ressources()->attach($res['id'], [
                    'etat_releve' => $res['etat_releve'],
                    'quantite' => $res['quantite'],
                    'commentaire' => $res['commentaire'],
                ]);
            }
    }
AuditEventHelper::log("modification d'inventaire'","modification d'inventaire effectuee pour les ressources ".$designation,$inventaire,null,null,$id);
    return redirect()->route('raInventaire')->with('success', 'Inventaire edité avec succès.');
}
public function destroy($id) {
   $inventaire=Inventaire::find($id);
   $inventaire->ressources()->detach();
   AuditEventHelper::log("suppression d'un inventaire","suppression d'un inventaire ". $inventaire,$inventaire,null,null,$id);
   $inventaire->delete();
    return redirect()->route('raInventaire')->with('success', 'Inventaire supprimé avec succès.');
}
}
