<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Olimpiada_tury extends Model
{
    use HasFactory;
    
    
    protected $fillable = [
        'olimpiada_id',
        'tur_number',
        'title',
        'opisanie',
        'img',
        'price',
        'nachalo_zdachi_tura',
        'status',
        'dostup',
        'pokazat_rezultat_tura',
        'max_kol_users',
        'created_at',
        'updated_at',
        'test_id',
    ];
    
    public function olimpiada()
    {
        return $this->belongsTo('App\Models\Olimpiada', 'olimpiada_id');
    }

    public function olimpiada_tury_class()
    {
        return $this->hasMany('App\Models\OlimpiadaTuryKlass', 'olimpiada_tury_id');
    }
}