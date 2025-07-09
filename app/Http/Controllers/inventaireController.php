<?php

namespace App\Http\Controllers;

use App\Models\inventaire;
use App\Models\ressource;
use Illuminate\Http\Request;

class inventaireController extends Controller
{
 public function index(Request $request){

    $query=inventaire::query();
    if($request->filled("faite_par")){
       $query->where("faite_par", "like", "%" . $request->faite_par . "%");
    }
    if ($request->filled("date_inventaire")) {
    $query->whereDate("date_inventaire", $request->date_inventaire);
}
    $inventaires=$query->paginate(8);
    return view("view_all_inventaires",compact("inventaires"));
 }
 public function store(Request $request)
{
    $inventaire = Inventaire::create([
        'date_inventaire' => now(),
        'faite_par' => $request->faite_par,
'remarques'=>'j ai fais cet inventaire'
    ]);

    foreach ($request->ressources as $res) {
        if (!empty($res['etat_releve'])) {
            $inventaire->ressources()->attach($res['id'], [
                'etat_releve' => $res['etat_releve'],
                'quantite' => $res['quantite'],
                'commentaire' => $res['commentaire'],
            ]);
        }
    }

    return redirect()->route('inventaire.index')->with('success', 'Inventaire créé avec succès.');
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
    return view ("view_one_inventaire",compact("ressources","active","neartoend","all","expired"));
 }
public function create() {
    $ressources=ressource::all();
    return view('add_inventaire',compact('ressources'));
}
}
