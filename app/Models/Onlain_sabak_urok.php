<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onlain_sabak_urok extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'onlain_sabak_predmet_sabak_id',
        'data_uroka',
        'ssylka_na_online_urok',
        'service_online_uroka',
        'parol_i_identifikator_na_online_urok',
        'text',
        'youtube_control_status',
        'created_at',
        'updated_at',
        'den_nedeli',
        'online_sabak_dni_nedeli_id',
        'pokaz_soderjimoe_do_nachalo_uroka',
    ];
}