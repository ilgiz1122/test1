<?php

namespace App\Models; 

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function podcategory()
    {
        return $this->hasMany('App\Models\Podcategory', 'cat_id');
    }

    public function podcategories()
    {
        return $this->hasMany('App\Models\Podcategory', 'cat_id');
    }
    
    public function podcategories2()
    {
        return $this->hasMany('App\Models\Podcategory', 'cat_id')->where('status', 1);
    }
    
    public function podcategories3()
    {
        return $this->hasMany('App\Models\Podcategory', 'cat_id')->where('status', 0);
    }

    public function kupit()
    {
        return $this->hasManyThrough(Kupit::class, Podcategory::class, 'cat_id', 'kurs_id', 'id', 'id');
    }

}