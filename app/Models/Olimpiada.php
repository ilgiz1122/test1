<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Olimpiada extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'nazvanie_orgonizasii',
        'title',
        'opisanie',
        'img',
        'data_zavershenie_registrasii',
        'data_public_itogov',
        'status',
        'language',
        'partnerka',
        'predmet',
        'klass',
        'phone_for_zvonok',
        'phone_for_whatsapp',
        'telegram',
        'img2',
        'data_nachalo_registrasii',
        'max_kol_users',
        'created_at',
        'updated_at',
    ];
    
    public function languages()
    {
        return $this->belongsTo('App\Models\Language', 'language');
    }
    
    public function predmety()
    {
        return $this->belongsTo('App\Models\Predmety', 'predmet');
    }
    
    public function klassy()
    {
        return $this->belongsTo('App\Models\Klassy', 'klass');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    
    public function olimpiada_tury()
    {
        return $this->hasMany('App\Models\Olimpiada_tury', 'olimpiada_id');
    }
    
    public function olimpiada_tury2()
    {
        return $this->hasMany('App\Models\Olimpiada_tury', 'olimpiada_id')->where('status', 1);
    }
}