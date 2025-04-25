<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userPreference() {
        return $this->hasOne(UserPreferences::class);
    }    

    public function ratings() {
        return $this->hasMany(Ratings::class);
    }
    public function userDietaryResctrictions() {
        return $this->belongsToMany(Ingredients::class, 'user_dietary_restrictions');
    }
    public function userDislikedIngredients() {
        return $this->belongsToMany(Ingredients::class, 'user_disliked_ingredients');
    }
    public function userFavoriteCategories() {
        return $this->belongsToMany(Categories::class, 'user_favorite_categories');
    }
    public function userFavoriteCuisines() {
        return $this->belongsToMany(Ingredients::class, 'user_favorite_cuisines');
    }
}
