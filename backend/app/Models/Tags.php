<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    use HasFactory;
    protected $table = 'tags';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'name'
    ];

    // Pivot Food_Tags
    public function food() {
        return $this->belongsToMany(
            Foods::class, 
            'food_tags', 
            'tag_id', 
            'food_id');
    }

}
