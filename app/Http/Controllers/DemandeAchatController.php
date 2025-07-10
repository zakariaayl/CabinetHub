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
} elseif ($demand->statut === 'en cours de traitement') {
    $attente++;
} elseif ($demand->statut === 'refusée') {
    $refus++;
}
$all++;
    }

    return view("all_demandes_achats_view",compact("demandes","all","refus","aprouv","attente","livre"));
   }
}
