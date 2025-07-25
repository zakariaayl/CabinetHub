<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EventAudit extends Model
{
    protected $fillable = [
    'event_type', 'model_type', 'model_id', 'user_id',
    'description', 'old_values', 'new_values', 'ip_address','date_event',
];

}
