<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Dierfoto extends Foto
{
    use HasFactory;

    //Get the huisdier that is on this foto
    public function huisdier(): BelongsTo
    {
        return $this->belongsTo(Huisdier::class);
    }
}
