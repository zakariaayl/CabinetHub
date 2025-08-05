<?php

namespace App\Livewire;

use App\Models\inventaire;
use App\Models\ressource;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class InventaireFilters extends Component
{
    use WithPagination;

    public $faite_par = '';
    public $date_inventaire = '';

    public function updating($field)
    {
        $this->resetPage();
    }

    public function getTopUsers()
    {
        return inventaire::select('faite_par', DB::raw('COUNT(*) as total_inventaires'))
            ->whereNotNull('faite_par')
            ->where('faite_par', '!=', '')
            ->groupBy('faite_par')
            ->orderBy('total_inventaires', 'desc')
            ->limit(3)
            ->get();
    }

    public function getTopInventaires()
    {
        return inventaire::select('faite_par', DB::raw('COUNT(*) as total_inventaires'))
            ->whereNotNull('faite_par')
            ->where('faite_par', '!=', '')
            ->groupBy('faite_par')
            ->orderBy('total_inventaires', 'desc')
            ->limit(3)
            ->get();
    }

    public function getTopRessources()
    {
        $topRessources = DB::table('inventaire_ressource')
            ->select('ressource_id', DB::raw('COUNT(*) as total_appearances'))
            ->groupBy('ressource_id')
            ->orderBy('total_appearances', 'desc')
            ->limit(3)
            ->get();

        // Fill with empty data if less than 3 results - MOVED BEFORE RETURN
        while ($topRessources->count() < 3) {
            $topRessources->push((object)[
                'ressource_id' => null,
                'total_appearances' => 0
            ]);
        }

        return $topRessources;
    }
    public function getBottomRessources()
    {
        $topRessources = DB::table('inventaire_ressource')
            ->select('ressource_id', DB::raw('COUNT(*) as total_appearances'))
            ->groupBy('ressource_id')
            ->orderBy('total_appearances', 'asc')
            ->limit(3)
            ->get();


        while ($topRessources->count() < 3) {
            $topRessources->push((object)[
                'ressource_id' => null,
                'total_appearances' => 0
            ]);
        }

        return $topRessources;
    }

    public function render()
    {
        $query = inventaire::query();

        if (!empty($this->faite_par)) {
            $query->where("faite_par", "like", "%" . $this->faite_par . "%");
        }

        if (!empty($this->date_inventaire)) {
            $query->whereDate("date_inventaire", $this->date_inventaire);
        }

        $inventaires = $query->paginate(8);
        $topUsers = $this->getTopUsers();
        $topRessources = $this->getTopRessources();

        $ids = $topRessources->pluck('ressource_id')->filter()->toArray();
        $ressources = Ressource::whereIn('id', $ids)->get();

        $resourceChartData = [];
        foreach ($topRessources as $topResource) {
            if ($topResource->ressource_id) {
                $resource = $ressources->where('id', $topResource->ressource_id)->first();
                $resourceChartData[] = [
                    'name' => $resource ? $resource->designation : 'Resource inconnue',
                    'count' => $topResource->total_appearances
                ];
            } else {
                $resourceChartData[] = [
                    'name' => 'Aucune donnée',
                    'count' => 0
                ];
            }
        }
        while (count($resourceChartData) < 3) {
            $resourceChartData[] = [
                'name' => 'Aucune donnée',
                'count' => 0
            ];
        }
        $all=inventaire::count();
        $BottomRessources = $this->getBottomRessources();
        $ids = $BottomRessources->pluck('ressource_id')->filter()->toArray();
        $ressources = Ressource::whereIn('id', $ids)->get();

        $resourceChartDataBottom = [];
        foreach ($BottomRessources as $BottomResource) {
            if ($BottomResource->ressource_id) {
                $resource = $ressources->where('id', $BottomResource->ressource_id)->first();
                $resourceChartData[] = [
                    'name' => $resource ? $resource->designation : 'Resource inconnue',
                    'count' => $BottomResource->total_appearances
                ];
            } else {
                $resourceChartData[] = [
                    'name' => 'Aucune donnée',
                    'count' => 0
                ];
            }
        }
        while (count($resourceChartData) < 3) {
            $resourceChartData[] = [
                'name' => 'Aucune donnée',
                'count' => 0
            ];
        }
        return view('livewire.inventaire-filters', compact('inventaires', 'topUsers', 'resourceChartData','all','resourceChartDataBottom'));
    }
}
