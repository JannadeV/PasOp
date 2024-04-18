<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class aanvraag extends Model
{
    use HasFactory;

    //Get the oppastijd for this aanvraag
    public function oppastijd(): BelongsTo
    {
        return $this->belongsTo(Oppastijd::class);
    }

    //Get the oppasser that made this aanvraag
    public function oppasser(): BelongsTo
    {
        return $this->belongsTo(User::class, 'aanvraag_oppasser_id');
    }
}
