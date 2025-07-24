<?php

namespace App\Http\Controllers\RH;

use App\Models\ressource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\maintenance;
use Laravel\Pail\ValueObjects\Origin\Console;

class resourceviewcontroller extends Controller
{

   public function edit($id) {
        $resource=ressource::find($id);

        return view('resource.editview', ['resource'=> $resource]);
    }
     public function update(Request $request,$id) {
        $resource=ressource::find( $id );
        $dataToUpdate = array_filter(
        $request->only([
            'type',
            'designation',
            'marque',
            'modele',
            'etat',
            'localisation',
            'utilisateur_affecte'
        ]),
        function ($value) {
            return !is_null($value) && $value !== '';
        }
    );
    $resource->update($dataToUpdate);
        return redirect()->route('raView')->with('success',' modification a ete effectue');
    }
     public function destroy($id) {
        $resource=ressource::find($id);
        $resource->delete();
      return redirect()->route('raView')->with('success','suppression avec succes');
    }
    public function view($id,$des) {
        return view('maintenance.planifierMaintenance',['id'=>$id,'des'=>$des]);
    }

    public function storeplanif(Request $request,$id) {
        $maintenance=new maintenance($request->all());
        $maintenance->resource_id=$id;
        $maintenance->save();
        return redirect()->route('ResourceController.edit',$id)->with('success','planification a ete efectue');
        // return $request->all();
    }
    public function editmain($id){

        [$maintId, $idrec] = explode('-', $id);
        $maintenance=maintenance::find($maintId);
        return view('maintenance.editmaintview',compact('maintenance','idrec'));
    }
    public function updateplanif(Request $request,$id) {
        $maintenance=maintenance::find($id);
        if($request!=null){

        $maintenance->update($request->all());
        }

        return redirect()->route('ResourceController.edit',['ResourceController'=>$maintenance['resource_id']])->with('success','maintenance updated succesifuly ');
    }

    public function deleteplanif($id) {
         $maintenance=maintenance::find($id);
         $resource_id=$maintenance['resource_id'];
         $maintenance->delete();
         return redirect()->route('ResourceController.edit',['ResourceController'=>$resource_id])->with('success','maintenance deleted succesifuly ');
    }

}
