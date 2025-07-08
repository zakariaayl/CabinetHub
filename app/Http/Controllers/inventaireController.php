<?php

namespace App\Http\Controllers;

use App\Models\inventaire;
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
    return view("inventaireview",compact("inventaires"));
 }
}
