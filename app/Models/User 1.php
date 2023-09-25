<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
 

use Spatie\Permission\Traits\HasRoles;


class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable. 
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'fb_id',
        'google_id',
        'instagram_id',
        'phone',
        'balance',
        'for_role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function moikursy()
    {
        return $this->hasOneThrough(Podcategory::class, Kupit::class, 'user_id', 'id', 'id', 'kurs_id');
    }

    public function materialy()
    {
        return $this->hasMany('App\Models\Materialy', 'user_id');
    }
    
    public function testy()
    {
        return $this->hasMany('App\Models\Test', 'user_id');
    }
    public function test_controls()
    {
        return $this->hasMany('App\Models\Test_controls', 'test_id');
    }

    public function podcategory()
    {
        return $this->hasMany('App\Models\Podcategory', 'user_id');
    }
    
    public function olimpiada()
    {
        return $this->hasMany('App\Models\Olimpiada', 'user_id');
    }

    public function partnerka()
    {
        return $this->hasMany('App\Models\Partnerka', 'user_id');
    }


    public function kupitmaterialov()
    {
        return $this->hasManyThrough(Kupitmaterialov::class, Partnerka::class, 'user_id', 'promocod', 'id', 'id');
    }

    public function user_vyplaty()
    {
        return $this->hasMany('App\Models\User_vyplaty', 'user_id');
    }
    
}