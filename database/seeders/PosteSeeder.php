<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\RH\Poste;
use Illuminate\Database\Seeder;

class PosteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Poste::create([
            'intitule' => 'Comptable',
            'description' => 'Responsable de la comptabilité générale du cabinet.',
            'missions' => 'Saisie des écritures, clôture mensuelle, déclaration TVA...',
            'competences' => 'Maîtrise comptable, rigueur, confidentialité.',
            'salaire_min' => '7000',
            'salaire_max' => '12000',
            'evolution_possible' => 'Chef comptable, Directeur financier'
        ]);
        Poste::create([
            'intitule' => 'Fiscaliste',
            'description' => 'Expert en fiscalité pour les entreprises clientes.',
            'missions' => 'Déclarations fiscales, optimisation fiscale, veille réglementaire...',
            'competences' => 'Connaissances fiscales, conseil, autonomie.',
            'salaire_min' => '8000',
            'salaire_max' => '13000',
            'evolution_possible' => 'Responsable fiscal, Associé du cabinet'
        ]);
    }
}
