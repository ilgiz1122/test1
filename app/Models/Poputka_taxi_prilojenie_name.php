<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poputka_taxi_prilojenie_name extends Model
{
    use HasFactory;

    protected $fillable = [
        'prilojenie_big_title',
        'prilojenie_small_title',
        'prilojenie_img',
        'prilojenie_opisanie',
        'ssylka',
        'region_id',
        'created_at',
        'updated_at',
    ];
}
