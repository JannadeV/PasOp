<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Oppastijd extends Model
{
    use HasFactory;

    //Get the huisdier that needs to be babysat in this oppastijd.
    public function huisdier(): BelongsTo
    {
        return $this->belongsTo(Huisdier::class);
    }

    //Get the aanvraags for this oppastijd
    public function aanvraags(): BelongsToMany
    {
        return $this->belongsToMany(Aanvraag::class);
    }

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'huisdier_id',
        'datum',
        'start',
        'eind',
    ];

}
