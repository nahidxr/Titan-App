<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M3u8File extends Model
{
    use HasFactory;

    protected $table = 'm3u8_files';

    protected $fillable = [
        'filename',
        'status',
    ];
}
