<?php

namespace App\Http\Controllers;

use App\Models\ressource;
use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function index() {
    $resources = ressource::paginate(12);
    return view('rhview', ['rec' => $resources]);
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
}
