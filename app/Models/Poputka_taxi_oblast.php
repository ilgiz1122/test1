<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poputka_taxi_oblast extends Model
{
    use HasFactory;

    protected $fillable = [
        'oblast',
        'created_at',
        'updated_at',
    ];
}
