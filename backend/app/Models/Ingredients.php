<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredients extends Model
{
    use HasFactory;
    protected $table = 'ingredients';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'name'
    ];

    public function foods() {
        return $this->belongsToMany(Foods::class, 'food_ingredients');
    }
    public function userDietaryResctrictions() {
        return $this->belongsToMany(User::class, 'user_dietary_restrictions');
    }
    public function userDislikedIngredients() {
        return $this->belongsToMany(User::class, 'user_disliked_ingredients');
    }

// Pivot Fav_Category_Ingredients
    public function favCategoryIngredient() {
        return $this->belongsToMany(User::class, 'fav_category_ingredients');
    }

    // Pivot Table User_Disliked_Ingredients
    public function userDislikedIngredient() {
        return $this->belongsToMany(User::class, 'user_disliked_ingredients');
    }
}
