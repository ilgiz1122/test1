<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poputka_taxi extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'status',
        'price',
        'reklama_baasy',
        'phone_z',
        'phone_w',
        'phone_t',
        'ssylka_na_sait',
        'text',
        'created_at',
        'updated_at',
        'category_id',
        'oblast',
        'raion',
        'chykkan_oblast',
        'chykkan_raion',
        'barchu_oblast',
        'barchu_raion',
        'phone_z2',
        'valuta',
    ];

    public function poputka_taxi_img()
    {
        return $this->hasMany('App\Models\Poputka_taxi_img', 'poputka_taxi_id', 'id');
    }

    public function poputka_taxi_raion_shaar_c()
    {
        return $this->belongsTo('App\Models\Poputka_taxi_raion_shaar', 'chykkan_raion');
    }

    public function poputka_taxi_raion_shaar_b()
    {
        return $this->belongsTo('App\Models\Poputka_taxi_raion_shaar', 'barchu_raion');
    }

    public function poputka_taxi_dop_info_for_taxi()
    {
        return $this->hasOne('App\Models\Poputka_taxi_dop_info_for_taxi', 'poputka_taxi_id', 'id');
    }
}
