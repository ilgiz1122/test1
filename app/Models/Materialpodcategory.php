<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Materialpodcategory extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id',
        'title',
        'img',
        'materialcategory_id',
    ];


    public function materialcategory()
    {
        return $this->belongsTo('App\Models\Materialcategory', 'materialcategory_id');
    }

    public function materialy()
    {
        return $this->hasMany('App\Models\Materialy', 'materialpodcategory_id');
    }

    public function kupitmaterialov()
    {
        return $this->hasManyThrough(Kupitmaterialov::class, Materialy::class, 'materialpodcategory_id', 'materialy_id', 'id', 'id');
    }
}