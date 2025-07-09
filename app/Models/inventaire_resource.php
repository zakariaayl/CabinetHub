<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inventaire_resource extends Model
{
   protected $table="inventaire_ressource";
   protected $fillable=[
    "inventaire_id",
    "resource_id",
    "quantite",
    "etat_releve",
    "commentaire",
];
}
