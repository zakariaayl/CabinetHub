<?php

namespace App\Models\RH;

use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    protected $table = 'presences';
    protected $primaryKey = 'id_presence';

    protected $fillable = [
        'id_collaborateur',
        'date_jour',
        'heure_arrivee',
        'heure_depart',
        'remarque',
    ];

    public function collaborateur()
    {
        return $this->belongsTo(Collaborateur::class, 'id_collaborateur');
    }
}
    