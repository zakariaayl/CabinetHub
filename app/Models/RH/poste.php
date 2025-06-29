<?php

namespace App\Models\RH;

use Illuminate\Database\Eloquent\Model;

class poste extends Model
{
    protected $table = "postes";
    protected $guarded = [];
    protected $fillable = ['intitule', 'description', 'missions', 'competences', 'salaire_min', 'salaire_max', 'evolution_possible'];

}
