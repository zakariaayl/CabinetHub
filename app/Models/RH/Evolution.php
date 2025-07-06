<?php

namespace App\Models\RH;

use Illuminate\Database\Eloquent\Model;

class Evolution extends Model
{
    protected $fillable = ['collaborateur_id', 'date', 'poste', 'departement', 'description'];

    public function collaborateur()
    {
        return $this->belongsTo(Collaborateur::class);
    }
}
