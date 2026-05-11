<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(['certificate_id', 'payment_url', 'provider', 'payment_id', 'status', 'amount', 'raw_response'])]
class Payment extends Model
{
    public function certificate(): BelongsTo
    {
        return $this->belongsTo(Certificate::class);
    }
}
