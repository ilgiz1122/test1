<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Potcat extends Model
{
    use HasFactory;
    public function kupits()
    {
        return $this->hasMany('App\Models\Kupit',);
    }
}
