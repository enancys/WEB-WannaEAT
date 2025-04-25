<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavCategoryIngredients extends Model
{
    use HasFactory;
    protected $table = 'fav_category_ingredients';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'user_preference_id',
        'ingredient_id'
    ];

    public function userPreference() {
        return $this->belongsTo(UserPreferences::class, 'user_preference_id');
    }
    public function ingredient(){
        return $this->belongsTo(Ingredients::class, 'ingredient_id');
    }
}
