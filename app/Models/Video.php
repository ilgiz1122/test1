<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'uroky_id',
        'video_title',
    ];

    public function uroky()
    {
        return $this->belongsTo('App\Models\Uroky', 'uroky_id');
    }
}
