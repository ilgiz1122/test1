<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poputka_taxi_img extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'jolgo_chyguu_datasy',
        'img',
        'poputka_taxi_id',
        'created_at',
        'updated_at',
        'category_id',
        'img_org',
    ];


    public function poputka_taxi()
    {
        return $this->belongsTo('App\Models\Poputka_taxi', 'poputka_taxi_id');
    }
}
