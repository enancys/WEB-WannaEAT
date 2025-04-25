<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserFavoriteCategories extends Model
{
    use HasFactory;
    protected $table = 'user_favorite_categories';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'user_preference_id',
        'category_id'
    ];

    public function userPreferences() {
        return $this->belongsTo(UserPreferences::class, 'user_preference_id');
    }

    public function category() {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
