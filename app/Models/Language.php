<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'language',
    ];

    public function materialy()
    {
        return $this->hasMany('App\Models\Materialy', 'language');
    }

    public function podcategory()
    {
        return $this->hasMany('App\Models\Podcategory', 'language');
    }
    
    public function vitrina()
    {
        return $this->hasMany('App\Models\Vitrina', 'language');
    }
    
    public function olimpiada()
    {
        return $this->hasMany('App\Models\Olimpiada', 'language');
    }
}