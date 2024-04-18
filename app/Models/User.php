<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    //Get the huisdiers of this baasje.
    public function huisdiers(): HasMany
    {
        return $this->hasMany(Huisdier::class, 'huisdier_baasje_id');
    }
    //Get the reviews left by this baasje
    public function reviewsLeft(): HasMany
    {
        return $this->hasMany(Review::class, 'review_baasje_id');
    }

    //Get the aanvraags this oppasser made
    public function aanvraags(): HasMany
    {
        return $this->hasMany(Aanvraag::class, 'aanvraag_oppasser_id');
    }
    //Get the reviews this oppasser got
    public function reviewsGot(): HasMany 
    {
        return $this->hasMany(Review::class, 'review_oppasser_id');
    }



    /**The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**The attributes that should be hidden for serialization.
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**Get the attributes that should be cast.
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
