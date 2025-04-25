<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ratings extends Model
{
    use HasFactory;
    protected $table = 'ratings';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'user_id',
        'food_id',
        'restaurant_id',
        'rating',
        'review'
    ];

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function food() {
        return $this->belongsTo(Foods::class, 'food_id');
    }
    
    public function restaurant() {
        return $this->belongsTo(Restaurants::class, 'restaurant_id');
    }
    
}


