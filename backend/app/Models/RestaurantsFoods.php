<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RestaurantsFoods extends Model
{
    use HasFactory;
    protected $table = 'restaurant_foods';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'restaurant_id',
        'food_id',
        'price'
    ];

    public function food()
    {
        return $this->belongsTo(Foods::class, 'food_id');
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurants::class, 'restaurant_id');
    }
}
