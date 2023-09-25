<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materialimgy;
use App\Models\Kupitmaterialov;
use App\Models\User;

 
class Materialy extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'title',
        'opisanie',
        'language',
        'materialcategory_id',
        'materialpodcategory_id',
        'ssylka',
        'price',
        'partnerka',
        'oldprice',
        'size',
        'type',
        'dop_category',
        'kol_skachek',
        'primaya_ssylka',
    ];

    public function materialpodcategory()
    {
        return $this->belongsTo('App\Models\Materialpodcategory', 'materialpodcategory_id');
    }

    public function materialcategory()
    {
        return $this->belongsTo('App\Models\Materialcategory', 'materialcategory_id');
    }
 
    
    public function materialimgies(){
        return $this->hasMany(Materialimgy::class);
    }

     public function kupitmaterialov(){
        return $this->hasMany(Kupitmaterialov::class);
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

     public function languages()
    {
        return $this->belongsTo('App\Models\Language', 'language');
    }

    public function kupitmaterialovs(){
        return $this->hasMany('App\Models\Kupitmaterialov', 'materialy_id');
    }
}