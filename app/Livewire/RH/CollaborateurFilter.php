<?php

namespace App\Livewire\RH;

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

    public $presence = '';

    protected $updatesQueryString = [
        'search'     => ['except' => ''],
        'poste'      => ['except' => ''],
        'departement'=> ['except' => ''],
        'presence'   => ['except' => ''],
    ];

    public function updating($field)
    {
        // reset pagination when filter changes
        $this->resetPage();
    }


    public function render()
{
    $today = now()->toDateString();

    $collaborateurs = Collaborateur::query()
        ->when($this->search, fn($q) =>
            $q->where(function ($query) {
                $query->where('nom', 'like', '%' . $this->search . '%')
                      ->orWhere('prenom', 'like', '%' . $this->search . '%');
            })
        )
        ->when($this->poste, fn($q) =>
            $q->where('poste', $this->poste)
        )
        ->when($this->departement, fn($q) =>
            $q->where('departement', $this->departement)
        )
        ->when($this->presence !== '', function ($q) use ($today) {
            if ($this->presence === 'present') {
                $q->whereHas('presences', fn($sub) => $sub->where('date_jour', $today));
            } elseif ($this->presence === 'absent') {
                $q->whereDoesntHave('presences', fn($sub) => $sub->where('date_jour', $today));
            }
        })
        ->with(['presences' => fn($q) => $q->whereDate('date_jour', $today)])
        ->paginate(7);

    // Ajouter la propriété isPresentToday
    $collaborateurs->each(function ($collab) {
        $collab->isPresentToday = $collab->presences->isNotEmpty();
    });

$all=$collaborateurs->count();
$pres = Collaborateur::whereHas('presences', function ($q) use ($today) {
    $q->where('date_jour', $today);
})->count();
$abs = $all- Collaborateur::whereHas('presences', function ($q) use ($today) {
    $q->where('date_jour', $today);
})->count();
    return view('livewire.rh.collaborateur-filter', [
        'collaborateurs' => $collaborateurs,
        'postes' => Collaborateur::distinct()->pluck('poste'),
        'departements' => Collaborateur::distinct()->pluck('departement'),
        'all'=>$all,
        'pres'=>$pres,
        'abs'=>$abs
    ]);
}
}
