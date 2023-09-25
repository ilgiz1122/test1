<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'user_id',
        'title',
        'opisanie',
        'ssylka',
        'status',
        'created_at',
        'updated_at',
    ];
}