<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onlain_sabak_predmety extends Model
{
    use HasFactory;
    
    public function onlain_sabak_predmet_sabak()
    {
        return $this->hasMany('App\Models\Onlain_sabak_predmet_sabak', 'onlain_sabak_predmety_id');
    }
}