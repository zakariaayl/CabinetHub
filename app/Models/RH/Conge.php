<?php

namespace App\Models\RH;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    protected $fillable = [
        'collaborateur_id',
        'demande_effectuee_a',
        'date_debut',
        'date_fin',
        'type',
        'statut',
        'justificatif',
    ];
    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
    ];

    public function collaborateur()
    {
        return $this->belongsTo(Collaborateur::class);
    }
}
