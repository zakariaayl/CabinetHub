<?php

namespace App\Livewire;

use App\Models\ressource;
use Livewire\Component;
use Livewire\WithPagination;

class FilterRessources extends Component
{
    use WithPagination;
public static function layout(): ?string
    {
        return null;
    }
    public $filtertype = '';
    public $etat = '';
    public $utilisateur_affecte = '';
    public $designation = '';

    public function updating($field)
    {
        $this->resetPage();
    }

    public function render()
{
    $query = ressource::query();

    if (!empty($this->filtertype)) {
        $query->where('type', $this->filtertype);
    }

    if (!empty($this->etat)) {
        $query->where('etat', $this->etat);
    }

    if (!empty($this->utilisateur_affecte)) {
        $query->where('utilisateur_affecte', 'like', '%' . $this->utilisateur_affecte . '%');
    }

    if (!empty($this->designation)) {
        $query->where('designation', 'like', '%' . $this->designation . '%');
    }
    $rec = $query->paginate(8);

    $filteredResults = $query->get();
    $all = $filteredResults->count();
    $bon = $filteredResults->where('etat', 'Bon')->count();
    $Usage = $filteredResults->where('etat', 'Usagé')->count();
    $hors = $filteredResults->where('etat', 'Hors Service')->count();
    $totalResources = ressource::all();
    $totalAll = $totalResources->count();
    $totalBon = $totalResources->where('etat', 'Bon')->count();
    $totalUsage = $totalResources->where('etat', 'Usagé')->count();
    $totalHors = $totalResources->where('etat', 'Hors Service')->count();

    return view('livewire.filter-ressources', compact(
        'rec',
        'bon', 'hors', 'Usage', 'all',
        'totalBon', 'totalHors', 'totalUsage', 'totalAll'
    ));
}
}
