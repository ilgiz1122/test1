<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Online_sabak_dni_nedeli extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'onlain_sabak_predmet_sabak_id',
        'den_nedeli',
        'nachalo_uroka',
        'okonchanie_uroka',
        'status',
        'created_at',
        'updated_at',
        'user_id',
    ];
    
    public function onlain_sabak_predmet_sabak()
    {
        return $this->belongsTo('App\Models\Onlain_sabak_predmet_sabak', 'onlain_sabak_predmet_sabak_id');
    }
    
    public function onlain_sabak_predmety()
    {
        return $this->hasOneThrough(Onlain_sabak_predmety::class, Onlain_sabak_predmet_sabak::class, 'id', 'id', 'onlain_sabak_predmet_sabak_id', 'onlain_sabak_predmety_id');
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}