<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tests_kupit extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'test_id',
        'test_autor_id',
        'price',
        'proverka',
        'pribyl',
        'promocod',
        'time',
        'srok_dostupa',
        'kol_popytkov',
        'created_at',
        'updated_at',
    ];
    
    public function test(){
        return $this->belongsTo('App\Models\Test', 'test_id');
    }

    public function partnerka()
    {
        return $this->belongsTo('App\Models\Partnerka', 'promocod');
    }
    
}