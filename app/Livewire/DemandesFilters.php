<?php

namespace App\Livewire;

use App\Models\demande_achat;
use Livewire\Component;

class DemandesFilters extends Component
{
    public $date_besoin='';
    public $date_demande='';
    public $resource_demande='';
    public $responsabl_demande='';
    public function render()
    { $livre=0;
    $aprouv=0;
    $attente=0;
    $refus=0;
    $all=0;
    $query=demande_achat::query();
    $dem=$query->get();
    if (!empty($this->date_demande)) {
        $query->whereDate('date_demande', $this->date_demande);
    }

    if (!empty($this->date_besoin)) {
        $query->whereDate('date_besoin', $this->date_besoin);
    }

    if (!empty($this->resource_demande)) {
        $query->where('resource_demande', 'like', '%' . $this->resource_demande . '%');
    }

    if (!empty($this->responsabl_demande)) {
        $query->where('responsabl_demande', 'like', '%' . $this->responsabl_demande . '%');
    }
    $demandes= $query->paginate(8);

    foreach ($demandes as $demand) {
        if ($demand->statut === 'livrée') {
    $livre++;
} elseif ($demand->statut === 'approuvée') {
    $aprouv++;
} elseif ($demand->statut === 'en attente') {
    $attente++;
} elseif ($demand->statut === 'refusée') {
    $refus++;
}
$all++;
    }
        return view('livewire.demandes-filters',compact('demandes','all','refus','aprouv','attente'));
    }
}
