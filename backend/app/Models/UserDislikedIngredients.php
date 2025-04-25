<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDislikedIngredients extends Model
{
    use HasFactory;
    protected $table = 'user_disliked_ingredients';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'user_preference_id',
        'ingredient_id'
    ];

    public function userPreference() {
        return $this->belongsTo(UserPreferences::class);
    }

    public function ingredient() {
        return $this->belongsTo(Ingredients::class);
    }
}
