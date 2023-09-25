<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Podcategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'user_id',
        'price',
        'img',
        'cat_id',
        'opisanie',
        'language',
        'oldprice',
        'video',
        'status',
        'partnerka',
        'youtube_video',
        'telegram',
        'phone_for_whatsapp',
        'phone_for_zvonok',
        'col_modulei',
        'otuu_ykmasy',
        'procent_perehoda',
    ];

    
    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'cat_id');
    }
    public function uroky()
    {
        return $this->hasMany('App\Models\Uroky', 'podcat_id');
    }
    public function kupit()
    {
        return $this->hasMany('App\Models\Kupit', 'kurs_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function languages()
    {
        return $this->belongsTo('App\Models\Language', 'language');
    }


    public function video()
    {
        return $this->hasManyThrough(Video::class, Uroky::class, 'podcat_id', 'uroky_id', 'id', 'id');
    }

    public function youtube()
    {
        return $this->hasManyThrough(Youtube::class, Uroky::class, 'podcat_id', 'uroky_id', 'id', 'id');
    }

    public function kupits(){
        return $this->hasMany('App\Models\Kupit', 'kurs_id');
    }
}