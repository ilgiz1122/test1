<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitrina_category extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'img',
        'dop_category',
    ];
    
    public function vitrina_podcategory()
    {
        return $this->hasMany('App\Models\Vitrina_podcategory', 'vitrina_category_id');
    }
    public function vitrina()
    {
        return $this->hasMany('App\Models\Vitrina', 'vitrina_category_id');
    }
}