<?php

namespace App\Models;

use App\Enums\FeedbackType;
use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Model;
use Override;

#[Unguarded]
class Feedback extends Model
{
    #[Override]
    protected function casts(): array
    {
        return [
            'type' => FeedbackType::class,
        ];
    }
}
