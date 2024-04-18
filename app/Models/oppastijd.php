<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class oppastijd extends Model
{
    use HasFactory;

    //Get the huisdier that needs to be babysat in this oppastijd.
    public function huisdier(): BelongsTo
    {
        return $this->belongsTo(Huisdier::class);
    }

    //Get the aanvraags for this oppastijd
    public function aanvraags(): HasMany
    {
        return $this->hasMany(Aanvraag::class);
    }

}
