<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Unguarded]
class Nominal extends Model
{
    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class);
    }
}
