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
'remarques'=>"j'ai fais cet inventaire"
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
        if (!empty($res['etat_releve'])) {
            if($res['quantite']>=0){
            $inventaire->ressources()->updateExistingPivot($res['id'], [
                'etat_releve' => $res['etat_releve'],
                'quantite' => $res['quantite'],
                'commentaire' => $res['commentaire'],
            ]);
            }else{
                $inventaire->ressources()->updateExistingPivot($res['id'], [
                'etat_releve' => $res['etat_releve'],
                'quantite' => 0,
                'commentaire' => $res['commentaire'],
            ]);
            }
        }else {
            if($res['quantite']>=0){
                $inventaire->ressources()->attach($res['id'], [
                    'etat_releve' => $res['etat_releve'],
                    'quantite' => $res['quantite'],
                    'commentaire' => $res['commentaire'],
                ]);
            }else {
                $inventaire->ressources()->attach($res['id'], [
                    'etat_releve' => $res['etat_releve'],
                    'quantite' => 1,
                    'commentaire' => $res['commentaire'],
                ]);
            }
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
