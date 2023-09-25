<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materialcategory extends Model
{
    use HasFactory;


    protected $fillable = [
        'title',
        'img',
        'dop_category',
    ];

    public function materialpodcategory()
    {
        return $this->hasMany('App\Models\Materialpodcategory', 'materialcategory_id');
    }

    public function materialy()
    {
        return $this->hasMany('App\Models\Materialy', 'materialcategory_id');
    }

    public function kupitmaterialov()
    {
        return $this->hasManyThrough(Kupitmaterialov::class, Materialy::class, 'materialcategory_id', 'materialy_id', 'id', 'id');
    }
}