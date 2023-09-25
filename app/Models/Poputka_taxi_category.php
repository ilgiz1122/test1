<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poputka_taxi_category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_big_title',
        'category_small_title',
        'category_img',
        'category_opisanie',
    ];
}
