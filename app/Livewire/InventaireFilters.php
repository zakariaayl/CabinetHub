<?php

namespace App\Livewire;

use App\Models\inventaire;
use Livewire\Component;
use Livewire\WithPagination;

class InventaireFilters extends Component

{    use WithPagination;
    public $faite_par='';
    public $date_inventaire='';
    public function updating($field)
    {
        $this->resetPage();
    }
    public function render()
    {

    $query=inventaire::query();
    if(!empty($this->faite_par)){
       $query->where("faite_par", "like", "%" . $this->faite_par . "%");
    }
    if (!empty($this->date_inventaire)) {
    $query->whereDate("date_inventaire", $this->date_inventaire);
    }
    $inventaires=$query->paginate(8);


        return view('livewire.inventaire-filters',compact('inventaires'));
    }
}
