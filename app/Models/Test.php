<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'title',
        'opisanie',
        'img',
        'time',
        'price',
        'oldprice',
        'language',
        'oldprice',
        'language',
        'status',
        'partnerka',
        'kol_popytkov',
        'srok_dostupa',
        'test_category_id',
        'test_podcategory_id',
    ];
    
    
    public function languages()
    {
        return $this->belongsTo('App\Models\Language', 'language');
    }
    
    public function test_category()
    {
        return $this->belongsTo('App\Models\Test_category', 'test_category_id');
    }
    
    public function test_podcategory()
    {
        return $this->belongsTo('App\Models\Test_podcategory', 'test_podcategory_id');
    }
    public function test_voprosy()
    {
        return $this->hasMany('App\Models\Test_voprosy', 'test_id');
    }

    public function olim_predmet()
    {
        return $this->hasMany('App\Models\OlimpiadaTuryKlassPredmety', 'test_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
    public function tests_kupit(){
        return $this->hasMany('App\Models\Tests_kupit', 'test_id');
    }
}