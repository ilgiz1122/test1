<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User_vyplaty extends Model
{
    use HasFactory;
    
    public function variant_vyplaty()
    {
        return $this->belongsTo('App\Models\Variant_vyplaty', 'variant');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}