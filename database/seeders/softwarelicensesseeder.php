<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Resource;
use App\Models\ressource;
use App\Models\SoftwareLicense;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SoftwareLicensesSeeder extends Seeder
{
    public function run()
    {
        $logicielResources = ressource::where('type', 'Logiciel')->get();

        if ($logicielResources->isEmpty()) {
            $this->command->info('Aucune ressource de type Logiciel trouvée.');
            return;
        }

        foreach ($logicielResources as $resource) {
            for ($i = 0; $i < 5; $i++) {
                SoftwareLicense::create([
                    'nom_logiciel' => $resource->designation ?? 'Logiciel inconnu',
                    'version' => 'v' . rand(1, 10) . '.' . rand(0, 9),
                    'cle_licence' => strtoupper(Str::random(16)),
                    'date_achat' => Carbon::now()->subMonths(rand(1, 24)),
                    'date_expiration' => Carbon::now()->addMonths(rand(6, 36)),
                    'utilisateur_affecte' => fake()->name(),
                    'remarque' => fake()->optional()->sentence(),
                ]);
            }
        }
    }
}
