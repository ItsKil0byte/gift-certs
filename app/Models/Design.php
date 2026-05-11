<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['title, image_path'])]
class Design extends Model
{
    public function certificates(): HasMany
    {
        return $this->hasMany(Certificate::class);
    }
}
