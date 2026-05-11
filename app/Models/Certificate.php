<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

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
    public function design(): HasOne
    {
        return $this->hasOne(Design::class);
    }

    public function nominal(): HasOne
    {
        return $this->hasOne(Nominal::class);
    }

    public function sendSchedule(): HasOne 
    {
        return $this->hasOne(SendSchedule::class);
    }

    public function payment(): HasOne
    {
        return $this->hasOne(Payment::class);
    }
}
