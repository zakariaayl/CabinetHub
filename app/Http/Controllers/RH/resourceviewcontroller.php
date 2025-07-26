<?php

namespace App\Http\Controllers\RH;

use App\Helpers\AuditEventHelper;
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


    $oldData=ressource::find( $id );
    $resource->update($request->all());
    AuditEventHelper::log("modification d'un ressource ".$resource['designation'],"modification d'un ressource",$resource,$oldData,$resource,$id);

        return redirect()->route('raView')->with('success',' modification a ete effectue');
    }
     public function destroy($id) {
        $resource=ressource::find($id);
        AuditEventHelper::log("suppression d'un ressource","suppression d'un resource est effectuee a ".$resource->designation,$resource,$resource,null,$id);
        $resource->delete();
      return redirect()->route('raView')->with('success','suppression avec succes');
    }
    public function view($id,$des) {
        return view('maintenance.planifierMaintenance',['id'=>$id,'des'=>$des]);
    }

    public function storeplanif(Request $request,$id) {
        $maintenance=new maintenance($request->all());
        $maintenance->resource_id=$id;
        $resource=ressource::find($id);
        $maintenance->save();
        AuditEventHelper::log("creation du maintenance","creation effectuee pour le ressource ".$resource->designation,$maintenance,null,null,$id);
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
        $resource=ressource::find($maintenance->resource_id);
        if($request!=null){
            $oldData=maintenance::find($id);
            $maintenance->update($request->all());
         AuditEventHelper::log("modification d'une maintenance","modification d'une maintenance effectuee pour le ressource ".$resource->designation,$maintenance,$oldData,$maintenance,$id);

        }

        return redirect()->route('ResourceController.edit',['ResourceController'=>$maintenance['resource_id']])->with('success','maintenance updated succesifuly ');
    }

    public function deleteplanif($id) {
         $maintenance=maintenance::find($id);
         $resource=ressource::find($maintenance->resource_id);
         $resource_id=$maintenance['resource_id'];
         AuditEventHelper::log("suppression d'une maintenance","suppressioin d'une maintenance effectuee pour le ressource ".$resource->designation,$maintenance,null,null,$id);
         $maintenance->delete();
         return redirect()->route('ResourceController.edit',['ResourceController'=>$resource_id])->with('success','maintenance deleted succesifuly ');
    }

}
