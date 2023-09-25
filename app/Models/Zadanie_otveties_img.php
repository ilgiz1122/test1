<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zadanie_otveties_img extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'img',
        'zadanie_otveties_id',
        'created_at',
        'updated_at',
    ];
    
    public function zadanie_otvety(){
        return $this->belongsTo(Zadanie_otvety::class);
    }
}