<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variant_vyplaty extends Model
{
    use HasFactory;
    protected $table = 'variant_vyplaties';
    
    public function user_vyplaty()
    {
        return $this->hasMany('App\Models\User_vyplaty', 'id');
    }
}