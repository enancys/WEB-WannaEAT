<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteCuisines extends Model
{
    use HasFactory;
    protected $table = 'user_favorite_cuisines';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'user_preference_id',
        'cuisine_id'
    ];

    public function userPreference() {
        return $this->belongsTo(UserPreferences::class);
    }

    public function cuisine() {
        return $this->belongsTo(Cuisines::class);
    }
}
