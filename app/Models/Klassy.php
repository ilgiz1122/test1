<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klassy extends Model
{
    use HasFactory;
    
    public function olimpiada()
    {
        return $this->hasMany('App\Models\Olimpiada', 'klass');
    }
}