<?php

namespace App\Models\RH;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborateur extends Model
{
    protected $table = 'collaborateurs';
    protected $fillable = [
        'nom',
        'prenom',
        'poste',
        'departement',
        'email',
        'telephone',
        'adresse',
        'date_embauche',
        'description_poste'
    ];
    public function evolutions()
{
    return $this->hasMany(Evolution::class);
}

public function conges()
{
    return $this->hasMany(\App\Models\RH\Conge::class, 'collaborateur_id');
}
public function presences()
{
    return $this->hasMany(Presence::class, 'id_collaborateur', 'id');
}
}
