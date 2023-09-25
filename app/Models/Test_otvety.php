<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test_otvety extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'test_voprosy_id',
        'test_otvety',
        'status_otveta',
        'ball',
        'test_id',
    ];
}