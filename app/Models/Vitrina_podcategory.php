<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitrina_podcategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'img',
        'vitrina_category_id',
    ];
    
    public function vitrina_category()
    {
        return $this->belongsTo('App\Models\Vitrina_category', 'vitrina_category_id');
    }
    
    public function vitrina()
    {
        return $this->hasMany('App\Models\Vitrina', 'vitrina_podcategory_id');
    }
}