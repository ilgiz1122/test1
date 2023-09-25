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
        'balance',
        'email_verified_at',
        'password',
        'two_factor_secret',
        'two_factor_recovery_codes',
        'remember_token',
        'created_at',
        'updated_at',
        'fb_id',
        'google_id',
        'instagram_id',
        'phone',
        'for_role',
        'balance_test',
        'f_fio',
        'i_fio',
        'o_fio',
        'oblast_id',
        'raion_shaar_id',
        'aiyly',
        'mektep_id',
        'mugalim_id',
        'aiyl_title',
        'mektep_title',
        'mugalim_fio',
        'org_img',
        'img_80_80',
        'img_160_160',
        'img_250_250',
        'img_600_600',
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
    
    public function oblast()
    {
        return $this->belongsTo('App\Models\Oblast', 'oblast_id');
    }
    
    public function raion_shaar()
    {
        return $this->belongsTo('App\Models\Raion_shaar', 'raion_shaar_id');
    }
    
    
    public function olimpiada_registrasia_user()
    {
        return $this->hasMany('App\Models\Olimpiada_registrasia', 'user_id');
    }
    
    public function code_vhoda_user()
    {
        return $this->hasMany('App\Models\Code_vhoda', 'user_id');
    }
    
    public function comment()
    {
        return $this->hasMany('App\Models\Comment', 'user_id');
    }
    
    public function online_sabak_dni_nedeli()
    {
        return $this->hasMany('App\Models\Online_sabak_dni_nedeli', 'user_id');
    }
    
    public function onlain_sabak_predmet_sabak()
    {
        return $this->hasMany('App\Models\Onlain_sabak_predmet_sabak', 'user_id');
    }
    
}