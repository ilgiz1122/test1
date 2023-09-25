<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_voprosy extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_id',
        'text_voprosa',
        'img_voprosa',
        'ball',
    ];
    
    public function test()
    {
        return $this->belongsTo('App\Models\Test', 'test_id');
    }
    
}