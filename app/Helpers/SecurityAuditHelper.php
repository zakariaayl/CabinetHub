<?php

namespace App\Helpers;

use App\Models\SecurityAudit;

class SecurityAuditHelper
{
    public static function log($eventType, $description = null, $targetUser = null,$id)
    {
        SecurityAudit::create([
            'event_type' => $eventType,
            'user_id' => $id,
            'target_user' => $targetUser,
            'description' => $description,
            'ip_address' => request()->ip(),
            'date_event'=> now(),
            'user_agent' => request()->userAgent(),
        ]);
    }
    public function __construct()
    {
    }
}
