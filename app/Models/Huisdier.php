<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Huisdier extends Model
{
    use HasFactory;

    //Get the baasje to this huisdier.
    public function baasje(): BelongsTo
    {
        return $this->belongsTo(User::class, 'baasje_id');
    }

    //Get the oppastijden this huisdier needs to be babysat.
    public function oppastijds(): HasMany
    {
        return $this->hasMany(Oppastijd::class);
    }

    //Get the dierfotos of this huisdier
    public function dierfotos(): HasMany
    {
        return $this->hasMany(Dierfoto::class);
    }


    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'naam',
        'soort',
        'baasje_id'
    ];
}
