<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zadanie extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'kurs_id',
        'urok_id',
        'text',
        'file',
        'ball',
        'created_at',
        'updated_at',
    ];
    
    public function uroky()
    {
        return $this->belongsTo('App\Models\Uroky', 'urok_id');
    }
    
    public function zadanie_otvety()
    {
        return $this->belongsTo('App\Models\Zadanie_otvety', 'zadanie_id');
    }
    
    public function zadanieimgs(){
        return $this->hasMany(Zadanieimg::class);
    }
}