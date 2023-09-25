<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitrina extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'title',
        'opisanie',
        'user_id',
        'vitrina_category_id',
        'vitrina_podcategory_id',
        'dop_category',
        'language',
        'price',
        'oldprice',
        'status_moderator',
        'status_admin',
        'vip_status',
        'view',
        'demofile',
        'youtube',
        'phone_for_zvonok',
        'phone_for_whatsapp',
        'telegram',
        'type_dostavki',
        'created_at',
        'updated_at',
        'materialy_id',
    ];
    
    public function vitrina_podcategory()
    {
        return $this->belongsTo('App\Models\Vitrina_podcategory', 'vitrina_podcategory_id');
    }

    public function vitrina_category()
    {
        return $this->belongsTo('App\Models\Vitrina_category', 'vitrina_category_id');
    }
 
    
    public function vitrina_img(){
        return $this->hasMany(Vitrina_img::class);
    }
    
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

     public function languages()
    {
        return $this->belongsTo('App\Models\Language', 'language');
    }
}