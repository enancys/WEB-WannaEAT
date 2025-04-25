<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDietaryResctrictions extends Model
{
    use HasFactory;
    protected $table = 'user_dietary_restrictions';
    protected $primaryKey  = 'id';
    protected $fillable = [
        'user_preference_id',
        'restriction_id'
    ];

    public function userPreference() {
        return $this->belongsTo(UserPreferences::class, 'user_preference_id');
    }

    public function restriction() {
        return $this->belongsTo(Restrictions::class, 'restriction_id');
    }
}
