<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OlimpiadaTuryKlassPredmety extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function olimpiada_tury_class()
    {
        return $this->belongsTo('App\Models\OlimpiadaTuryKlass', 'olimpiada_tury_klass_id');
    }

    public function predmety()
    {
        return $this->belongsTo('App\Models\Predmety', 'predmety_id');
    }

    public function test()
    {
        return $this->belongsTo('App\Models\Test', 'test_id');
    }
}
