<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DemandeAchatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('fr_FR');

        $statuts = ['en attente', 'approuvée', 'refusée', 'en cours de traitement', 'livrée'];
        $categories = ['Informatique', 'Bureautique', 'Électronique', 'Mobilier', 'Autres'];
        $departements = ['IT', 'RH', 'Finance', 'Logistique', 'Maintenance'];
        $emplacements = ['Casablanca', 'Marrakech', 'Rabat', 'Tanger', 'Fès'];

        for ($i = 0; $i < 20; $i++) {
    $quantite = $faker->numberBetween(1, 10);
    $prixUnitaire = $faker->randomFloat(2, 100, 2000);
    $dateBesoin = $faker->optional()->dateTimeBetween('now', '+1 month');

    DB::table('demande_achats')->insert([
        'responsabl_demande'     => $faker->name,
        'date_demande'           => $faker->dateTimeBetween('-3 months', 'now')->format('Y-m-d'),
        'date_besoin'            => $dateBesoin ? $dateBesoin->format('Y-m-d') : null,
        'resource_demande'       => $faker->word,
        'categorie'              => $faker->randomElement($categories),
        'description'            => $faker->sentence(8),
        'quantite'               => $quantite,
        'prix_unitaire_estime'   => $prixUnitaire,
        'montant_total_estime'   => $quantite * $prixUnitaire,
        'emplacement'            => $faker->randomElement($emplacements),
        'statut'                 => $faker->randomElement($statuts),
        'commentaire'            => $faker->optional()->sentence(10),
        'departement'            => $faker->randomElement($departements),
        'created_at'             => now(),
        'updated_at'             => now(),
    ]);
}

    }
}
