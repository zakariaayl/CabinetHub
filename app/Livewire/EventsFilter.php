<?php

namespace App\Livewire;

use App\Models\EventAudit;
use Livewire\Component;
use Livewire\WithPagination;
class EventsFilter extends Component
{
    use WithPagination;
    public static function layout(): ?string
    {
        return null;
    }
    public $search='';
     public function updating($field)
    {
        $this->resetPage();
    }
    public function render()
    {
        $query=EventAudit::query();
        if(!empty($this->search)) $query->where('description','like','%' . $this->search . '%');
        $eventAudits = $query->latest()->paginate(8);
        $modelTypes = EventAudit::whereNotNull('model_type')
            ->distinct()
            ->pluck('model_type')
            ->sort();
            $today=EventAudit::whereDate('date_event', today())->count();
            $thisweek=EventAudit::whereBetween('date_event', [
                now()->startOfWeek(),
                now()->endOfWeek()
            ])->count();
            $activeusers=EventAudit::whereDate('date_event', today())
            ->distinct('user_id')->count();
            // ->pluck('user_id');
            // $test=EventAudit::whereDate('date_event', today())
            // ->distinct('user_id');

             return view('livewire.events-filter',compact('eventAudits','modelTypes','today','thisweek','activeusers'));
    }
}
