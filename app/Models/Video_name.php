<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video_name extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'uroky_id',
        'video_name',
    ];

    public function uroky()
    {
        return $this->belongsTo('App\Models\Uroky', 'uroky_id');
    }
}
