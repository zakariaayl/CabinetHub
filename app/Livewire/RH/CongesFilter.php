<?php

namespace App\Livewire\RH;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\RH\Conge;

class CongesFilter extends Component
{
    use WithPagination;

    public $collaborateur = '';
    public $type          = '';
    public $statut        = '';

    // on synchronise ces propriétés dans l’URL
    protected $updatesQueryString = [
        'collaborateur' => ['except' => ''],
        'type'          => ['except' => ''],
        'statut'        => ['except' => ''],
    ];

    public function updating($field)
    {
        // revenir à la première page quand on change un filtre
        $this->resetPage();
    }

    public function render()
    {
        $query = Conge::with('collaborateur')
            ->orderByRaw("FIELD(statut,'en attente','accepté','refusé')")
            ->latest('demande_effectuee_a');

        if ($this->collaborateur) {
            $q = $this->collaborateur;
            $query->whereHas('collaborateur', fn($q2) =>
                $q2->where('nom','like',"%{$q}%")
                   ->orWhere('prenom','like',"%{$q}%")
            );
        }

        if ($this->type) {
            $query->where('type', $this->type);
        }

        if ($this->statut) {
            $query->where('statut', $this->statut);
        }

        $conges = $query->paginate(10);

        return view('livewire.rh.conges-filter', compact('conges'));
    }
    public function resetFilters()
{
    $this->reset(['collaborateur', 'type', 'statut']);
}

}
