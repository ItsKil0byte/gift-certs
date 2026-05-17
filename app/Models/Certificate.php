<?php

namespace App\Models;

use App\Enums\CertificateStatus;
use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Override;

#[Unguarded]
class Certificate extends Model
{
    public function design(): BelongsTo
    {
        return $this->belongsTo(Design::class);
    }

    public function nominal(): BelongsTo
    {
        return $this->belongsTo(Nominal::class);
    }

    public function sendSchedule(): HasOne
    {
        return $this->hasOne(SendSchedule::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }

    #[Override]
    protected function casts(): array
    {
        return [
            'status' => CertificateStatus::class,
        ];
    }
}
