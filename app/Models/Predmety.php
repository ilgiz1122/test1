<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Predmety extends Model
{
    use HasFactory;
    
    public function olimpiada()
    {
        return $this->hasMany('App\Models\Olimpiada', 'predmet');
    }

    public function olimpiada_tury_class_predmety()
    {
        return $this->hasMany('App\Models\OlimpiadaTuryKlassPredmety', 'predmety_id');
    }
}