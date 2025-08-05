<?php

namespace App\Livewire;

use App\Models\inventaire;
use Livewire\Component;
use Livewire\WithPagination;

class InventairevoirFilter extends Component
{   use WithPagination;
    public $search='';
     public $id; // This will hold the inventaire ID

    public function mount($id)
    {
        $this->id = $id;
    }
    public function updating(){
        $this->resetPage();
    }
    public function render()
    {
    $inventaire=inventaire::find($this->id);
    $ressources=$inventaire->ressources;
   if (!Empty($this->search)) {
    $ressources = $inventaire->ressources()
    ->where('designation', 'like', '%' . $this->search . '%')
    ->get();
    }

    $active=0;
    $neartoend=0;
    $expired=0;
    $all=0;
    foreach($ressources as $ressource){
        $all++;
        if($ressource->pivot->etat_releve=="Usagé") $neartoend++;
        if($ressource->pivot->etat_releve=="Hors Service") $expired++;
        if($ressource->pivot->etat_releve=="Bon") $active++;
    }
        return view('livewire.inventairevoir-filter',compact("ressources","active","neartoend","all","expired"));
    }
}
