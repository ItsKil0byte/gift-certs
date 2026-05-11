<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['type', 'name', 'email', 'phone', 'message', 'card_number', 'order_number', 'is_read'])]
class Feedback extends Model
{
    // TODO
}
