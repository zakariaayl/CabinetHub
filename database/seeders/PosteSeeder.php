<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\RH\Poste;
use Illuminate\Database\Seeder;

class PosteSeeder extends Seeder
{
    public function run(): void
    {
        $postes = [
            [
                'intitule' => 'Comptable',
                'description' => 'Responsable de la comptabilité générale du cabinet.',
                'missions' => 'Saisie des écritures, clôture mensuelle, déclaration TVA...',
                'competences' => 'Maîtrise comptable, rigueur, confidentialité.',
                'salaire_min' => '7000',
                'salaire_max' => '12000',
                'evolution_possible' => 'Chef comptable, Directeur financier'
            ],
            [
                'intitule' => 'Fiscaliste',
                'description' => 'Expert en fiscalité pour les entreprises clientes.',
                'missions' => 'Déclarations fiscales, optimisation fiscale, veille réglementaire...',
                'competences' => 'Connaissances fiscales, conseil, autonomie.',
                'salaire_min' => '8000',
                'salaire_max' => '13000',
                'evolution_possible' => 'Responsable fiscal, Associé du cabinet'
            ],
            [
                'intitule' => 'DevOps Engineer',
                'description' => 'Gestion des infrastructures et déploiements continus.',
                'missions' => 'CI/CD, monitoring, optimisation des serveurs...',
                'competences' => 'Linux, Docker, Kubernetes, automatisation.',
                'salaire_min' => '12000',
                'salaire_max' => '20000',
                'evolution_possible' => 'Lead DevOps, Architecte Cloud'
            ],
            [
                'intitule' => 'Full Stack Developer',
                'description' => 'Développement front-end et back-end des applications internes.',
                'missions' => 'PHP, Laravel, JavaScript, API REST...',
                'competences' => 'Laravel, Vue.js/React, MySQL.',
                'salaire_min' => '10000',
                'salaire_max' => '17000',
                'evolution_possible' => 'Chef d’équipe développement'
            ],
            [
                'intitule' => 'Data Analyst',
                'description' => 'Analyse des données financières et opérationnelles.',
                'missions' => 'SQL, Power BI, reporting...',
                'competences' => 'Analyse, statistiques, visualisation.',
                'salaire_min' => '9000',
                'salaire_max' => '15000',
                'evolution_possible' => 'Senior Data Analyst, Data Scientist'
            ],
            [
                'intitule' => 'Marketing Specialist',
                'description' => 'Développement et suivi des campagnes marketing.',
                'missions' => 'Réseaux sociaux, SEO, campagnes Google Ads...',
                'competences' => 'Communication, analyse marketing.',
                'salaire_min' => '8000',
                'salaire_max' => '13000',
                'evolution_possible' => 'Responsable marketing digital'
            ],
            [
                'intitule' => 'HR Manager',
                'description' => 'Gestion des ressources humaines du cabinet.',
                'missions' => 'Recrutement, formations, relations sociales...',
                'competences' => 'Leadership, communication, droit du travail.',
                'salaire_min' => '11000',
                'salaire_max' => '18000',
                'evolution_possible' => 'Directeur RH'
            ],
        ];

        foreach ($postes as $poste) {
            Poste::create($poste);
        }
    }
}
