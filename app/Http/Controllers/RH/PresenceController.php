<?php

namespace App\Http\Controllers\RH;

use App\Http\Controllers\Controller;
use App\Models\RH\Presence;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PresenceController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_collaborateur' => 'required|exists:collaborateurs,id',
        ]);

        $today = Carbon::today();
        $now = Carbon::now();

        // Empêcher double pointage
        $alreadyPointed = Presence::where('id_collaborateur', $validated['id_collaborateur'])
            ->whereDate('date_jour', $today)
            ->exists();

        if ($alreadyPointed) {
            return redirect()->back()->with('error', 'Vous avez déjà pointé aujourd’hui.');
        }

        Presence::create([
            'id_collaborateur' => $validated['id_collaborateur'],
            'date_jour' => $today,
            'heure_arrivee' => $now->format('H:i:s'),
            'heure_depart' => '00:00:00',
            'remarque' => null,
        ]);

        return redirect()->back()->with('success', 'Présence enregistrée.');
    }
    public function storePresence(Request $request)
    {
        $collaborateurId = $request->input('id_collaborateur');

        // Vérifier si déjà pointé aujourd'hui
        $dejaPresent = Presence::where('id_collaborateur', $collaborateurId)
            ->whereDate('date_jour', Carbon::today())
            ->exists();

        if ($dejaPresent) {
            return redirect()->back()->with('warning', 'Tu as déjà pointé ta présence aujourd’hui.');
        }

        Presence::create([
            'id_collaborateur' => $collaborateurId,
            'date_jour' => Carbon::today(),
            'heure_arrivee' => Carbon::now()->format('H:i:s'),
            'heure_depart' => null, // optionnel
            'remarque' => null,
        ]);

        return redirect()->back()->with('success', 'Présence enregistrée avec succès !');
    }
}
