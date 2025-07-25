<?php

namespace App\Helpers;

use App\Models\EventAudit;

class AuditEventHelper
{
    public static function log($eventType, $description = null, $model = null, $old = null, $new = null,$id)
    {
        EventAudit::create([
            'event_type' => $eventType,
            'model_type' => $model ? get_class($model) : null,
            'model_id' => $model?->id,
            'user_id' => $id,
            'description' => $description,
            'old_values' => $old,
            'new_values' => $new,
            'date_event'=> now(),
            'ip_address' => request()->ip(),
        ]);
    }
    public function __construct()
    {
        //
    }
}
