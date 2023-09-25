<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kreative_rezume extends Model
{
    use HasFactory;
    protected $fillable=[
        'familya',
        'aty',
        'at_aty',
        'tuulgan_kunu',
        'ui_buloluk_abaly',
        'email',
        'staj',
        'azyrky_kyzmaty',
        'whatsapp',
    ];
}