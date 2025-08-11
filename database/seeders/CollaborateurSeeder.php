<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RH\Collaborateur;
use Carbon\Carbon;
use Faker\Factory as Faker;

class CollaborateurSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create();
        $postes = [
            'Comptable',
            'Fiscaliste',
            'DevOps Engineer',
            'Full Stack Developer',
            'Data Analyst',
            'Marketing Specialist',
            'HR Manager'
        ];
        $departements = [
            'Comptabilité',
            'Fiscalité',
            'IT',
            'Data',
            'Marketing',
            'Ressources Humaines'
        ];

        for ($i = 0; $i < 20; $i++) {
            Collaborateur::create([
                'nom' => $faker->lastName,
                'prenom' => $faker->firstName,
                'poste' => $faker->randomElement($postes),
                'departement' => $faker->randomElement($departements),
                'email' => $faker->unique()->safeEmail,
                'telephone' => '+2126' . $faker->numberBetween(10000000, 99999999),
                'adresse' => $faker->city . ', Maroc',
                'date_embauche' => $faker->dateTimeBetween('-5 years', 'now'),
                'description_poste' => $faker->sentence(8),
            ]);
        }
    }
}
