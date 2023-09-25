<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kupit extends Model
{
    use HasFactory;

    public function podcategory()
    {
        return $this->belongsTo('App\Models\Podcategory',);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category',);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function podcategories(){
        return $this->belongsTo('App\Models\Podcategory', 'kurs_id');
    }

    public function uroky(){
        return $this->hasManyThrough(Uroky::class, Podcategory::class, 'id', 'podcat_id', 'kurs_id', 'id');
    }
    
}