<?php

namespace App\Livewire;

use App\Models\inventaire;
use Livewire\Component;
use Livewire\WithPagination;

class InventairevoirFilter extends Component
{   use WithPagination;
    public $search='';
     public $id;
     public $filter='';

    public function mount($id)
    {
        $this->id = $id;
    }
    public function updating(){
        $this->resetPage();
    }
    public function render()
{
    $query = Inventaire::find($this->id)?->ressources();

    if (!$query) {
        return view('livewire.inventairevoir-filter', [
            'ressources' => [],
            'active' => 0,
            'neartoend' => 0,
            'all' => 0,
            'expired' => 0,
        ]);
    }

    if (!empty($this->filter)) {
        if ($this->filter === 'actif') {
            $query->wherePivot('etat_releve', 'Bon');
        } elseif ($this->filter === 'warning') {
            $query->wherePivot('etat_releve', 'Usagé');
        } elseif ($this->filter === 'expired') {
            $query->wherePivot('etat_releve', 'Hors Service');
        }
    }

    if (!empty($this->search)) {
        $query->where('designation', 'like', '%' . $this->search . '%');
    }
    $query->orderBy("created_at","asc");
    $ressources = $query->get();

    // your stats logic here...
    $active = 0;
    $neartoend = 0;
    $expired = 0;
    $all = 0;

    foreach ($ressources as $ressource) {
        $all++;
        if ($ressource->pivot->etat_releve === "Usagé") $neartoend++;
        if ($ressource->pivot->etat_releve === "Hors Service") $expired++;
        if ($ressource->pivot->etat_releve === "Bon") $active++;
    }

    return view('livewire.inventairevoir-filter', compact(
        "ressources", "active", "neartoend", "all", "expired"
    ));
}

}
