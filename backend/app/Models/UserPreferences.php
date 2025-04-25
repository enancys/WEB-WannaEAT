<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPreferences extends Model
{
    use HasFactory;
    protected $table = 'user_preferences';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'user_id'
    ];

    public function getByUser($user_id)
{
    $preference = UserPreferences::where('user_id', $user_id)->first();

    if (!$preference) {
        return response()->json(['message' => 'User preference not found'], 404);
    }

    return response()->json($preference);
}


    public function user() {
        return $this->belongsTo(User::class);
    }

    public function userFavoriteCategories() {
        return $this->hasMany(UserFavoriteCategories::class, 'user_preference_id');
    }

    public function favCategoryIngredient() {
        return $this->hasMany(FavCategoryIngredients::class, 'user_preference_id');
    }
    
    public function userDietaryRestriction() {
        return $this->hasMany(UserDietaryResctrictions::class, 'user_preference_id');
    }

    // Piivot User_disliked_ingredients
    public function userDislikedIngredient() {
        return $this->hasMany(UserDislikedIngredients::class, 'user_preference_id');
    }

    // Pivot User_Favorite_Cuisines
    public function userFavoriteCuisine() {
        return $this->hasMany(UserFavoriteCuisines::class, 'user_preference_id');
    }
}
