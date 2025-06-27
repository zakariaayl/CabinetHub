<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class maintenance extends Model
{
    protected $table = "maintenances";
    protected $fillable = [
    'resource_id',
    'date_maintenance',
    'type_maintenance',
    'commentaire',
];
}
