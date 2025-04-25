<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restrictions extends Model
{
    use HasFactory;
    protected $table = 'restrictions';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'name'
    ];

    public function userDietaryRestriction() {
        return $this->belongsToMany(User::class, 'user_dietary_restrictions');
    }
}
