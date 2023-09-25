<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poputka_taxi_raion_shaar extends Model
{
    use HasFactory;

    protected $fillable = [
        'raion_shaar',
        'poputka_taxi_oblasts_id',
        'created_at',
        'updated_at',
    ];

    
}
