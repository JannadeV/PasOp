<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class huisdier extends Model
{
    use HasFactory;

    //Get the baasje to this huisdier.
    public function baasje(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    //Get the oppastijden this huisdier needs to be babysat.
    public function oppastijds(): HasMany
    {
        return $this->hasMany(Oppastijd::class);
    }

}
