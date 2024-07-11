<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Review extends Model
{
    use HasFactory;

    //Get the baasje that left this review
    public function baasje(): BelongsTo
    {
        return $this->belongsTo(User::class, 'baasje_id');
    }

    //Get the oppasser that got this review
    public function oppasser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'oppasser_id');
    }

    public function aanvraag(): BelongsTo
    {
        return $this->belongsTo(User::class, 'aanvraag_id');
    }
}
