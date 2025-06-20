<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoftwareLicense extends Model
{
    protected $table = "SoftwareLicense";
    protected $fillable = [
    'nom_logiciel',
    'version',
    'cle_licence',
    'date_achat',
    'date_expiration',
    'utilisateur_affecte',
    'remarque',
];

}
