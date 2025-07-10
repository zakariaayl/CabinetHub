<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class demande_achat extends Model
{
    protected $table='demande_achats';

protected $fillable = [
    'responsabl_demande',
    'date_demande',
    'date_besoin',
    'resource_demande',
    'categorie',
    'description',
    'quantite',
    'prix_unitaire_estime',
    'montant_total_estime',
    'emplacement',
    'statut',
    'commentaire',
    'departement',
];

}
