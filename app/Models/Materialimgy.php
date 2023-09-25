<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materialy;

class Materialimgy extends Model
{
    use HasFactory;

    protected $fillable=[
        'img1',
        'img2',
        'materialy_id',
    ];
    public function materialies(){
        return $this->belongsTo(Materialy::class);
    }

    
}