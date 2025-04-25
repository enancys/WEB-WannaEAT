<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;
    
    protected $table = 'foods';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'name',
        'description',
        'price',
        'image_url',
        'restaurant_id',
        'cuisine_id'
    ];

    public function ingredients() {
        return $this->belongsToMany(Ingredients::class, 'food_ingredients')->withPivot('quantity', 'unit');
    }

    public function restaurants(){
        return $this->belongsToMany(Restaurants::class, 'restaurant_foods', 'food_id', 'restaurant_id');
    }

    public function tags() {
        return $this->belongsToMany(Tags::class, 'foods_tags');
    }

    public function cuisine() {
        return $this->belongsTo(Cuisines::class);
    }

    public function ratings() {
        return $this->hasMany(Ratings::class);
    }

    // Tags Foods
    public function tag()  {
        return $this->belongsToMany(
            Tags::class, 
            'food_tags', 
            'food_id', 
            'tag_id'
        );
    }
}
