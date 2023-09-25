<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate_user extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'for_role',
        'user_id',
        'fio',
        'product_id',
        'text',
        'status',
        'nomer_certificata',
        'data_in_certificate',
        'created_at',
        'updated_at',
    ];
}