<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_category extends Model
{
    use HasFactory;
    
    public function testy()
    {
        return $this->hasMany('App\Models\Test', 'test_category_id')->where('status', 1);
    }
    
    public function test_podcategory()
    {
        return $this->hasMany('App\Models\Test_podcategory', 'test_category_id');
    }
    public function tests_kupit()
    {
        return $this->hasManyThrough(Tests_kupit::class, Test::class, 'test_category_id', 'test_id', 'id', 'id');
    }
}