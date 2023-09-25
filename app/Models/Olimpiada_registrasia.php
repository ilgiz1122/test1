<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Olimpiada_registrasia extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'olimpiada_id',
        'tur_number',
        'status',
        'price',
        'price_minus_in_moderator',
        'created_at',
        'updated_at',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
    public function oblast()
    {
        return $this->hasOneThrough(Oblast::class, User::class, 'oblast_id', 'id', 'id', 'user_id');
    }
}