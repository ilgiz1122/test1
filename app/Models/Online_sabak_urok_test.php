<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online_sabak_urok_test extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'onlain_sabak_urok_id',
        'test_id',
        'created_at',
        'updated_at',
    ];
}