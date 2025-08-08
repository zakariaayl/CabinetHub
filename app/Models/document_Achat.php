<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class document_Achat extends Model
{
    public $table="documents_achat";
    protected $fillable = [
    'reference',
    'type',
    'fournisseur',
    'date_emission',
    'date_echeance',
    'montant_ht',
    'montant_tva',
    'montant_ttc',
    'status',
    'fichier_pdf',
];

}
