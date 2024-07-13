<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function review(): HasOne
    {
        return $this->hasOne(Review::class);
    }

    protected $fillable = [
        'oppasser_id',
        'antwoord'
    ];
}
