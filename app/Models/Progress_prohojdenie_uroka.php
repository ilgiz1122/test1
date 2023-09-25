<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress_prohojdenie_uroka extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'urok_id',
        'otkryl',
        'status_vypol_zadanii',
        'created_at',
        'updated_at',
    ];
    
    public function uroky()
    {
        return $this->belongsTo('App\Models\Uroky', 'urok_id');
    }
}