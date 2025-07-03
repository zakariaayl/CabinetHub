<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class inventaire extends Model
{
   protected $table = "inventaire";
   protected $fillable = [
    "item_id",
    "date_inventaire",
    "trouve",
    "remarques"
   ];

   public function ressources() {
    return $this->belongsToMany(ressource::class, 'inventaire_ressource');
}
}
