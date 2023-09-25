<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vitrina_img extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'img1',
        'img2',
        'vitrina_id',
    ];
    
    public function vitrina(){
        return $this->belongsTo(Vitrina::class);
    }

}