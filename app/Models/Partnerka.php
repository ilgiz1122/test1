<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnerka extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'promocod',
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function kupitmaterialov()
    {
        return $this->hasMany('App\Models\Kupitmaterialov', 'promocod');
    }

    public function kupit()
    {
        return $this->hasMany('App\Models\Kupit', 'promocod');
    }

    public function tests_kupit()
    {
        return $this->hasMany('App\Models\Tests_kupit', 'promocod');
    }
}