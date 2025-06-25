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
        return view('editview', ['resource'=> $resource]);
    }
    public function update(Request $request,$id) {
        $resource=ressource::find( $id );
        $resource->update($request->all());
        return redirect()->route('ResourceController.index')->with('success',' modification a ete effectue');
    }
    public function destroy($id) {
        $resource=ressource::find($id);
        $resource->delete();
      return redirect()->route('ResourceController.index')->with('success','supprimer avec succes');
    }
    public function store(Request $request) {

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $resource=new ressource($request->all());
    $resource->save();

return redirect()->route('ResourceController.index')->with('success', 'Ressource ajoutée avec succès !');
} else return view("AjouterResourse");
    }
}
