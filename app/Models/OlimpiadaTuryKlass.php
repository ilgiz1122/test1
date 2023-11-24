<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OlimpiadaTuryKlass extends Model
{
    use HasFactory;
    protected $table = 'olimpiada_tury_klasses';
    protected $fillable = [
        'olimpiada_id',
        'olimpiada_tury_id',
        'klassy_id',
        'status',
        'created_at',
        'updated_at',
    ];
    

    public function olimpiada_tury()
    {
        return $this->belongsTo('App\Models\Olimpiada_tury', 'olimpiada_tury_id');
    }

    public function klass()
    {
        return $this->belongsTo('App\Models\Klassy', 'klassy_id');
    }

    public function class_predmety()
    {
        return $this->hasMany('App\Models\OlimpiadaTuryKlassPredmety', 'olimpiada_tury_klass_id');
    }
}
