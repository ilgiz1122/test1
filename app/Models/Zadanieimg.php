<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zadanieimg extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'img',
        'zadanie_id',
        'created_at',
        'updated_at',
    ];
    public function zadanie(){
        return $this->belongsTo(Zadanie::class);
    }
}