<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ressource extends Model
{
    protected $table = "resource";
    protected $fillable = [
    'type',
    'designation',
    'marque',
    'modele',
    'numero_serie',
    'version_logiciel',
    'date_achat',
    'etat',
    'localisation',
    'utilisateur_affecte',
    'date_fin_garantie',
    'prochaine_maintenance',
    'remarque',
];

}
