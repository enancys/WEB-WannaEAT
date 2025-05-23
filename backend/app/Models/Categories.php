<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'name'
    ];

    public function userFavoriteCategories() {
        return $this->belongsToMany(User::class, 'user_favorite_categories');
    }
}
