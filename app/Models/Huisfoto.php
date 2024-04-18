<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Huisfoto extends Foto
{
    use HasFactory;
    
    //Get the aanvraag that got this foto
    public function aanvraag(): BelongsTo
    {
        return $this->belongsTo(Aanvraag::class);
    }
}
