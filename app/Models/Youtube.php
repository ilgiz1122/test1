<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Youtube extends Model
{
    use HasFactory;

    protected $fillable = [
        'uroky_id',
        'youtube_video_title',
    ];

    public function uroky()
    {
        return $this->belongsTo('App\Models\Uroky', 'uroky_id');
    }
}
