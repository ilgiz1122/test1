<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Raion_shaar extends Model
{
    use HasFactory;
    
    
    public function user()
    {
        return $this->hasMany('App\Models\User', 'raion_shaar_id');
    }
}