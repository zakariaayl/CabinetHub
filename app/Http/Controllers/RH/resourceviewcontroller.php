<?php

namespace App\Http\Controllers\RH;

use App\Models\ressource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class resourceviewcontroller extends Controller
{
    public function index() {
    $resources = ressource::paginate(12);
    return view('rhview', ['rec' => $resources]);
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

}
