<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poputka_taxi_prilojenie_menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'prilojenie_name_id',
        'poputka_taxi_category_id',
        'status',
        'created_at',
        'updated_at',
    ];
}
