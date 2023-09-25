<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zadanie_otvety extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'urok_id',
        'zadanie_id',
        'text',
        'file',
        'ball',
        'comment',
        'created_at',
        'updated_at',
    ];
    
    public function uroky()
    {
        return $this->belongsTo('App\Models\Uroky', 'urok_id');
    }
    
    public function zadanie()
    {
        return $this->belongsTo('App\Models\Zadanie', 'zadanie_id');
    }
    
    public function zadanie_otvety_img(){
        return $this->hasMany(Zadanie_otveties_img::class);
    }
}