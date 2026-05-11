<?php

namespace App\Models;

use App\Enums\SendScheduleStatus;
use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Override;

#[Unguarded]
class SendSchedule extends Model
{
    public function certificate(): BelongsTo
    {
        return $this->belongsTo(Certificate::class);
    }

    #[Override]
    protected function casts(): array
    {
        return [
            'status' => SendScheduleStatus::class,
        ];
    }
}
