<?php

namespace App\Http\Controllers;

use App\Helpers\AuditEventHelper;
use App\Models\maintenance;
use App\Models\ressource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
// public function index(Request $request)
// {
//     $query = ressource::query();

//     if ($request->filled('filtertype')) {
//         $query->where('type', $request->filtertype);
//     }

//     if ($request->filled('etat')) {
//         $query->where('etat', $request->etat);
//     }

//     if ($request->filled('utilisateur_affecte')) {
//         $query->where('utilisateur_affecte', 'like', '%' . $request->utilisateur_affecte . '%');
//     }
//     if ($request->filled('designation')) {
//         $query->where('designation', 'like', '%' . $request->designation . '%');
//     }
//     $rec = $query->paginate(8);
//     $bon=0;$Usage=0;$hors=0;$all=0;

//     foreach($rec as $resource){
//         if ($resource->etat=='Bon') $bon++;
//         if ($resource->etat=='Usagé')$Usage++;
//         if ($resource->etat=='Hors Service') $hors++;
//         $all++;
//     }

//     return view('resource.rhview', compact('rec','all','hors','bon','Usage'));
// }


    public function create() {
        return view("resource.AjouterResourse");
    }
    public function edit($id) {
        $resource=ressource::find($id);
         $maintenances=maintenance::where('resource_id',$id)->get()->sortByDesc('date_maintenance');
         $check=maintenance::where('resource_id',$id)->get()->sortByDesc('date_maintenance')->first();
         if($check!=null) {
            $date_maintenance=$check['date_maintenance'];
            return view('resource.viewresource', ['resource'=> $resource,'check'=>$check,'der_date'=>$date_maintenance,'maintenance'=>$maintenances]);
        }
         return view('resource.viewresource', ['resource'=> $resource,'maintenance'=>$maintenances,'check'=>$check]);
    }

    public function store(Request $request) {

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $resource=new ressource($request->all());
    AuditEventHelper::log("creation d'un resource'","creation effectuee pour le ressource ".$resource['designation'],$resource,null,null,$resource->id);
    $resource->save();

return redirect()->route('raView')->with('success', 'Ressource ajoutée avec succès !');
} else return view("resource.AjouterResourse");
    }

}
