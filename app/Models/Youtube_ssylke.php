<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtube_ssylke extends Model
{
    use HasFactory;

    protected $fillable = [
        'uroky_id',
        'youtube_video_ssylka',
    ];

    public function uroky()
    {
        return $this->belongsTo('App\Models\Uroky', 'uroky_id');
    }
}
