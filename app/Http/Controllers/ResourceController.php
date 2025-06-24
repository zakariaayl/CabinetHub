<?php

namespace App\Http\Controllers;

use App\Models\ressource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function showPage() {
       $resources=ressource::all();
       return view("rhview",["rec"=>$resources]);
    }
    public function create() {
        return view("AjouterResourse");
    }
    public function store(Request $request) {

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Collect all the input fields
    $type = $_POST['type'] ?? '';
    $designation = $_POST['designation'] ?? '';
    $marque = $_POST['marque'] ?? '';
    $modele = $_POST['modele'] ?? '';
    $numero_serie = $_POST['numero_serie'] ?? '';
    $version_logiciel = $_POST['version_logiciel'] ?? '';
    $date_achat = $_POST['date_achat'] ?? '';
    $etat = $_POST['etat'] ?? '';
    $localisation = $_POST['localisation'] ?? '';
    $utilisateur_affecte = $_POST['utilisateur_affecte'] ?? '';
    $date_fin_garantie = $_POST['date_fin_garantie'] ?? '';
    $prochaine_maintenance = $_POST['prochaine_maintenance'] ?? '';
    $remarque = $_POST['remarque'] ?? '';

    $resource=new ressource();
    $resource->type = $type;
    $resource->designation = $designation;
    $resource->marque = $marque;
    $resource->modele = $modele;
    $resource->numero_serie = $numero_serie;
    $resource->version_logiciel = $version_logiciel;
    $resource->date_achat = $date_achat;
    $resource->etat = $etat;
    $resource->prochaine_maintenance = $prochaine_maintenance;
    $resource->remarque = $remarque;
   $resource->utilisateur_affecte = $utilisateur_affecte;
   $resource->date_fin_garantie = $date_fin_garantie;
   $resource->prochaine_maintenance = $prochaine_maintenance;
   $resource->localisation=$localisation;

$resource->save();
$res=$resource::all();
return view('rhview',['rec'=>$res]);

} else {
    return view("AjouterResourse");
}


    }

}
