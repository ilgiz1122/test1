<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materialy;
use App\Models\Materialpodcategory;
 
class Kupitmaterialov extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'user_name',
        'materialy_id',
        'materialy_title',
        'price',
        'proverka',
        'materialy_user_id',
        'pribyl',
        'promocod',
        'created_at',
        'updated_at',
    ];

     public function materialies(){
        return $this->belongsTo(Materialy::class);
    }

    public function materialpodcategory()
    {
        return $this->belongsTo('App\Models\Materialpodcategory',);
    }

    public function materialcategory()
    {
        return $this->belongsTo('App\Models\Materialcategory',);
    }

    public function partnerka()
    {
        return $this->belongsTo('App\Models\Partnerka', 'promocod');
    }


    public function materialy(){
        return $this->belongsTo('App\Models\Materialy', 'materialy_id');
    }
}