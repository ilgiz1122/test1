<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Uroky extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'podcat_id',
        'text',
        'status',
        'ssylka',
        'porydkovyi_nomer',
        'test_id',
        'youtube_control_status',
        'created_at',
        'updated_at',
        'modul_number',
    ];

    public function podcategory()
    {
        return $this->belongsTo('App\Models\Podcategory', 'podcat_id');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function youtube()
    {
        return $this->hasMany('App\Models\Youtube', 'uroky_id');
    }
    
    public function video()
    {
        return $this->hasMany('App\Models\Video', 'uroky_id');
    }

    public function video_name()
    {
        return $this->hasMany('App\Models\Video_name', 'uroky_id');
    }

    public function youtube_ssylke()
    {
        return $this->hasMany('App\Models\Youtube_ssylke', 'uroky_id');
    }
    
    public function zadanie()
    {
        return $this->belongsTo('App\Models\Zadanie', 'urok_id');
    }
    
    public function zadanie_otvety()
    {
        return $this->belongsTo('App\Models\Zadanie_otvety', 'urok_id');
    }

}