<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoParameter extends Model
{
    protected $table = 'video_parameters';
    protected $fillable = [
        'audio_bitrate',
        'video_bitrate',
        'rtmp_url',
        'flag',
        'status',
       
    ];
}
