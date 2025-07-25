<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SecurityAudit extends Model
{
    protected $fillable = [
    'event_type', 'user_id', 'target_user',
    'description', 'ip_address', 'user_agent','date_event',
];

}
