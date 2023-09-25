<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitrina_dop_info extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'type_info',
        'info',
        'vitrina_id',
    ];
}