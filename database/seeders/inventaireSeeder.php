<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class InventaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // On suppose qu'on a déjà des ressources (id de 1 à 30)
        $ressourceIds = DB::table('resource')->pluck('id')->toArray();

        $inventaires = [
            ['2024-01-10', 'Khalid Mounir', 'Vérification annuelle des ressources informatiques.'],
            ['2024-02-15', 'Imane Badr', 'Audit interne des équipements réseau.'],
            ['2024-03-20', 'Samira Zahraoui', 'Contrôle des licences logicielles installées.'],
            ['2024-04-12', 'Youssef Hamza', 'Inventaire trimestriel des ordinateurs de bureau.'],
            ['2024-05-05', 'Nada El Amrani', 'Mise à jour des données matérielles pour le S.I.'],
            ['2024-06-18', 'Omar Lahlou', 'Inspection physique du matériel.'],
            ['2024-07-01', 'Asmae Chraibi', 'Relevé pour le rapport de conformité ISO.'],
            ['2024-08-08', 'Rachid El Idrissi', 'État des ressources pour le nouveau budget.'],
            ['2024-09-09', 'Hind Khattabi', 'Validation avant renouvellement de parc.'],
            ['2024-10-01', 'Soufiane Anwar', 'Relevé périodique pour le service informatique.'],
        ];

        foreach ($inventaires as $key => $inv) {
            $inventaireId = DB::table('inventaire')->insertGetId([
                'date_inventaire' => $inv[0],
                'faite_par' => $inv[1],
                'remarques' => $inv[2],
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Associer entre 3 et 6 ressources au hasard à chaque inventaire
            $ressources = collect($ressourceIds)->random(rand(3, 6))->toArray();

            foreach ($ressources as $ressourceId) {
                DB::table('inventaire_ressource')->insert([
                    'inventaire_id' => $inventaireId,
                    'ressource_id' => $ressourceId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
