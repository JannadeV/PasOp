<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Aanvraag extends Model
{
    use HasFactory;

    //Get the oppastijden in this aanvraag
    public function oppastijds(): BelongsToMany
    {
        return $this->belongsToMany(Oppastijd::class);
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

    protected $fillable = [
        'oppasser_id',
        'antwoord'
    ];
}
