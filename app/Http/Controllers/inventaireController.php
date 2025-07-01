<?php

namespace App\Http\Controllers;

use App\Models\inventaire;
use Illuminate\Http\Request;

class inventaireController extends Controller
{
 public function index(){
    $inventaires=inventaire::all();
    return view("inventaireview",compact("inventaires"));
 }
}
