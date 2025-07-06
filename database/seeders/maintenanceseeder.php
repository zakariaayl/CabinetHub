<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaintenanceSeeder extends Seeder
{
    public function run(): void
    {
        $maintenances = [
            ['resource_id' => 1, 'date_maintenance' => '2024-01-10', 'type_maintenance' => 'Préventive', 'commentaire' => 'Nettoyage interne et vérification de température.'],
            ['resource_id' => 2, 'date_maintenance' => '2024-01-20', 'type_maintenance' => 'Corrective', 'commentaire' => 'Remplacement de l’alimentation défectueuse.'],
            ['resource_id' => 3, 'date_maintenance' => '2024-02-05', 'type_maintenance' => 'Prédictive', 'commentaire' => 'Analyse du comportement disque dur.'],
            ['resource_id' => 4, 'date_maintenance' => '2024-02-15', 'type_maintenance' => 'Préventive', 'commentaire' => 'Mise à jour du firmware du routeur.'],
            ['resource_id' => 5, 'date_maintenance' => '2024-03-01', 'type_maintenance' => 'Corrective', 'commentaire' => 'Réparation du ventilateur défectueux.'],
            ['resource_id' => 6, 'date_maintenance' => '2024-03-18', 'type_maintenance' => 'Préventive', 'commentaire' => 'Vérification complète des connexions réseau.'],
            ['resource_id' => 7, 'date_maintenance' => '2024-03-30', 'type_maintenance' => 'Corrective', 'commentaire' => 'Changement de la cartouche d’encre.'],
            ['resource_id' => 8, 'date_maintenance' => '2024-04-10', 'type_maintenance' => 'Préventive', 'commentaire' => 'Nettoyage et test général du scanner.'],
            ['resource_id' => 9, 'date_maintenance' => '2024-04-25', 'type_maintenance' => 'Prédictive', 'commentaire' => 'Monitoring des ressources du serveur.'],
            ['resource_id' => 10, 'date_maintenance' => '2024-05-01', 'type_maintenance' => 'Corrective', 'commentaire' => 'Remplacement de la RAM défectueuse.'],
            ['resource_id' => 11, 'date_maintenance' => '2024-05-15', 'type_maintenance' => 'Préventive', 'commentaire' => 'Mise à jour des logiciels de sécurité.'],
            ['resource_id' => 12, 'date_maintenance' => '2024-06-02', 'type_maintenance' => 'Corrective', 'commentaire' => 'Réinstallation du système.'],
            ['resource_id' => 13, 'date_maintenance' => '2024-06-20', 'type_maintenance' => 'Préventive', 'commentaire' => 'Vérification de la batterie.'],
            ['resource_id' => 14, 'date_maintenance' => '2024-06-28', 'type_maintenance' => 'Prédictive', 'commentaire' => 'Surveillance de température CPU.'],
            ['resource_id' => 15, 'date_maintenance' => '2024-07-03', 'type_maintenance' => 'Préventive', 'commentaire' => 'Contrôle physique complet du matériel.'],
            ['resource_id' => 16, 'date_maintenance' => '2024-07-10', 'type_maintenance' => 'Corrective', 'commentaire' => 'Remplacement du disque SSD.'],
            ['resource_id' => 17, 'date_maintenance' => '2024-07-20', 'type_maintenance' => 'Préventive', 'commentaire' => 'Entretien du ventilateur.'],
            ['resource_id' => 18, 'date_maintenance' => '2024-07-28', 'type_maintenance' => 'Prédictive', 'commentaire' => 'Analyse des performances réseau.'],
            ['resource_id' => 19, 'date_maintenance' => '2024-08-05', 'type_maintenance' => 'Corrective', 'commentaire' => 'Changement du clavier inutilisable.'],
            ['resource_id' => 20, 'date_maintenance' => '2024-08-10', 'type_maintenance' => 'Préventive', 'commentaire' => 'Mise à jour logicielle complète.'],
            ['resource_id' => 21, 'date_maintenance' => '2024-08-20', 'type_maintenance' => 'Préventive', 'commentaire' => 'Contrôle anti-virus.'],
            ['resource_id' => 22, 'date_maintenance' => '2024-09-01', 'type_maintenance' => 'Corrective', 'commentaire' => 'Réparation du câble d’alimentation.'],
            ['resource_id' => 23, 'date_maintenance' => '2024-09-10', 'type_maintenance' => 'Prédictive', 'commentaire' => 'Observation des pics de charge serveur.'],
            ['resource_id' => 23, 'date_maintenance' => '2024-09-15', 'type_maintenance' => 'Préventive', 'commentaire' => 'Nettoyage des ports USB.'],
            ['resource_id' => 21, 'date_maintenance' => '2024-09-25', 'type_maintenance' => 'Corrective', 'commentaire' => 'Remplacement du ventilateur processeur.'],
            ['resource_id' => 1, 'date_maintenance' => '2024-10-01', 'type_maintenance' => 'Préventive', 'commentaire' => 'Diagnostic global du matériel.'],
            ['resource_id' => 2, 'date_maintenance' => '2024-10-10', 'type_maintenance' => 'Prédictive', 'commentaire' => 'Analyse prédictive des logs systèmes.'],
            ['resource_id' => 1, 'date_maintenance' => '2024-10-20', 'type_maintenance' => 'Préventive', 'commentaire' => 'Mise à jour du BIOS.'],
            ['resource_id' => 5, 'date_maintenance' => '2024-10-30', 'type_maintenance' => 'Corrective', 'commentaire' => 'Changement du bloc alimentation.'],
            ['resource_id' => 3, 'date_maintenance' => '2024-11-05', 'type_maintenance' => 'Préventive', 'commentaire' => 'Maintenance périodique semestrielle.'],
        ];

        foreach ($maintenances as $data) {
            DB::table('maintenances')->insert(array_merge($data, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }
    }
}
