<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['certificate_id', 'send_at', 'status'])]
class SendSchedule extends Model
{
    public function certificate(): BelongsTo
    {
        return $this->belongsTo(Certificate::class);
    }
}
