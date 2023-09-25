<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Onlain_sabak_predmet_sabak extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'onlain_sabak_predmety_id',
        'onlain_sabak_mugalim_id',
        'col_uchenikov',
        'status_admin',
        'status',
        'price',
        'old_price',
        'akcia',
        'akcia_data_okonchanie',
        'dostup_na_pokupku_za_neskolko_mesyacev',
        'opisanie',
        'ssylka_na_online_urok',
        'service_online_uroka',
        'parol_i_identifikator_na_online_urok',
        'ispolzovat_dlya_vseh_urokov',
        'created_at',
        'updated_at',
        'nomer_gruppy',
        'akcia_price',
        'uch_ai_akcia',
        'alty_ai_akcia',
        'toguz_ai_akcia',
        'bir_jyl_akcia',
    ];
    
    
    public function onlain_sabak_predmety()
    {
        return $this->belongsTo('App\Models\Onlain_sabak_predmety', 'onlain_sabak_predmety_id');
    }
    
    public function onlain_sabak_dni_nedeli()
    {
        return $this->hasMany('App\Models\Online_sabak_dni_nedeli', 'onlain_sabak_predmet_sabak_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}