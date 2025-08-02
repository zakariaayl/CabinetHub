<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\RH\Collaborateur;
use Carbon\Carbon;

class CollaborateurFilter extends Component
{
    use WithPagination;

    public $search = '';
    public $poste  = '';
    public $departement = '';

    protected $updatesQueryString = [
        'search'     => ['except' => ''],
        'poste'      => ['except' => ''],
        'departement'=> ['except' => ''],
    ];

    public function updating($field)
    {
        // reset pagination when filter changes
        $this->resetPage();
    }
    public function resetFilters()
    {
        $this->reset(['search', 'poste', 'departement']);
    }

    public function render()
    {
        $today = Carbon::today();

        $query = Collaborateur::query();

        if ($this->search) {
            $s = $this->search;
            $query->where(function($q) use ($s) {
                $q->whereRaw("CONCAT(nom,' ',prenom) LIKE ?", ["%{$s}%"])
                  ->orWhereRaw("CONCAT(prenom,' ',nom) LIKE ?", ["%{$s}%"]);
            });
        }

        if ($this->poste) {
            $query->where('poste', $this->poste);
        }

        if ($this->departement) {
            $query->where('departement', $this->departement);
        }

        // eager-load presences today
        $collaborateurs = $query
            ->with(['presences' => fn($q) => $q->whereDate('date_jour',$today)])
            ->paginate(7);

        foreach ($collaborateurs as $c) {
            $c->isPresentToday = $c->presences->isNotEmpty();
        }

        // fetch distinct for dropdowns
        $postes = Collaborateur::select('poste')->distinct()->pluck('poste');
        $depts  = Collaborateur::select('departement')->distinct()->pluck('departement');

        return view('livewire.collaborateur-filter', compact(
            'collaborateurs','postes','depts'
        ));
    }
}
