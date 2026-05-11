<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[Fillable(
    [
        'promo_code', 
        'hash', 
        'design_id', 
        'custom_image_path', 
        'nominal_id', 
        'custom_nominal_value', 
        'sender_name', 
        'sender_email', 
        'sender_phone', 
        'receiver_email', 
        'status'
    ]
)]
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
}
