<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class review extends Model
{
    use HasFactory;

    //Get the baasje that left this review
    public function baasje(): BelongsTo
    {
        return $this->belongsTo(User::class, 'review_baasje_id');
    }

    //Get the oppasser that got this review
    public function oppasser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'review_oppasser_id');
    }
}
