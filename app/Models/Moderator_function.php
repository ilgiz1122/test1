<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moderator_function extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'user_id',
        'olimpiada_plus_user',
    ];
}