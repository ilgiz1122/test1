<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poputka_taxi_dop_info_for_taxi extends Model
{
    use HasFactory;

    protected $fillable = [
        'poputka_taxi_id',
        'jolgo_chyguu_datasy',
        'status_toldu',
        'created_at',
        'updated_at',
    ];

    public function poputka_taxi()
    {
        return $this->belongsTo('App\Models\Poputka_taxi', 'poputka_taxi_id');
    }
}
