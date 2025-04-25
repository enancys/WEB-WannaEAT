<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodsIngredients extends Model
{
    use HasFactory;
    protected $table = 'food_ingredients';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'food_id',
        'ingredient_id',
        'quantity',
        'unit'
    ];

    public function food() {
        return $this->belongsTo(Foods::class);
    }

    public function ingredient() {
        return $this->belongsTo(Ingredients::class);
    }
}
