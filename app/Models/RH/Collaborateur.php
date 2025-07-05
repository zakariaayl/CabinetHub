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
}
