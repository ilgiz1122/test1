<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online_sabak_urok_youtube extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'onlain_sabak_urok_id',
        'title',
        'ssylka',
        'created_at',
        'updated_at',
    ];
}