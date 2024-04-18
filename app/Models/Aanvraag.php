<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aanvraag extends Model
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
        return $this->belongsTo(User::class, 'oppasser_id');
    }

    //Get the huisfotos for this aanvraag
    public function huisfotos(): HasMany
    {
        return $this->hasMany(Huisfoto::class);
    }
}
