<?php

namespace App\Http\Controllers;

use App\Models\ressource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
public function index(Request $request)
{
    $query = ressource::query();

    if ($request->filled('filtertype')) {
        $query->where('type', $request->filtertype);
    }

    if ($request->filled('etat')) {
        $query->where('etat', $request->etat);
    }

    if ($request->filled('utilisateur_affecte')) {
        $query->where('utilisateur_affecte', 'like', '%' . $request->utilisateur_affecte . '%');
    }

    $rec = $query->paginate(10);

    return view('rhview', compact('rec'));
}


    public function create() {
        return view("AjouterResourse");
    }
    public function edit($id) {
        $resource=ressource::find($id);
        return view('viewresource', ['resource'=> $resource]);
    }

    public function store(Request $request) {

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $resource=new ressource($request->all());
    $resource->save();

return redirect()->route('ResourceController.index')->with('success', 'Ressource ajoutée avec succès !');
} else return view("AjouterResourse");
    }
    public function update(Request $request) {
        return $request->all();
    }
}
