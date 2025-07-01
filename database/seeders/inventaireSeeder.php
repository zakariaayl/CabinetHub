<?php

namespace Database\Seeders;

use App\Models\inventaire;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class inventaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        inventaire::create([
            "item_id"=> "1",
            "date_inventaire"=> "2023-05-01",
            "trouve"=> "0",
            "remarques"=> "il existe mais tu doit verifier chaque mois ",
        ]);
        inventaire::create([
            "item_id"=> "2",
            "date_inventaire"=> "2023-05-22",
            "trouve"=> "1",
            "remarques"=> "il n'existe pas mais tu doit verifier chaque mois ",
        ]);
        inventaire::create([
            "item_id"=> "3",
            "date_inventaire"=> "2021-05-01",
            "trouve"=> "1",
            "remarques"=> "il existe mais tu doit verifier chaque mois ",
        ]);
        inventaire::create([
            "item_id"=> "10",
            "date_inventaire"=> "2023-05-01",
            "trouve"=> "1",
            "remarques"=> "existe mais pas du bon etat ",
        ]);
    }
}
