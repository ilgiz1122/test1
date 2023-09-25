<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code_vhoda extends Model
{
    use HasFactory;
    protected $fillable=[
        'avtor_id',
        'type',
        'text_coda',
        'user_id',
        'status',
        'product_id',
        'colichestvo_ispolzovanie',
        'colichestvo_view',
        'product_price',
        'summa_komissii_sistemy',
        'created_at',
        'updated_at',
    ];
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}