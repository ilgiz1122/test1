<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kreative_rezume_dop_info extends Model
{
    use HasFactory;
    protected $fillable=[
        'kreative_rezume_id',
        'type_info',
        'info',
        'title',
    ];
}