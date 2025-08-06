<?php
namespace App\Livewire\RH;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\RH\Poste;

class PosteFilter extends Component
{
    use WithPagination;

    public $search    = '';
    public $salary    = '';    // remplace minSalary + maxSalary
    public $evolution = '';

    protected $updatesQueryString = [
        'search'    => ['except' => ''],
        'salary'    => ['except' => ''],
        'evolution' => ['except' => ''],
    ];

    protected $paginationTheme = 'tailwind';

    public function updating($field)
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset(['search', 'salary', 'evolution']);
    }

    public function render()
{
    $query = Poste::query();

    if ($this->search) {
        $query->where('intitule','like',"%{$this->search}%");
    }

    if ($this->evolution) {
        $query->where('evolution_possible','like',"%{$this->evolution}%");
    }

    if (is_numeric($this->salary)) {
        $salary = (int) $this->salary;
        $query->where('salaire_min','<=',$salary)
              ->where('salaire_max','>=',$salary);
    }

    $postes = $query->orderBy('intitule')->paginate(10);

    return view('livewire.rh.poste-filter', compact('postes'));
}
}
