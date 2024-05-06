<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoParameter extends Model
{
    protected $table = 'video_parameters';
    protected $fillable = [
        'regulation_name',
        'audio_bitrate',
        'video_bitrate',
        'rtmp_url',
        'flag',
        'status',
        'write_to_nginx',
        'read_from_nginx',
       
    ];
}
