<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VideoModel extends Model
{
    use HasFactory;
    protected $table = 'videos';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'video',
        'status',
        'is_fee',
        'credits',
        'thumb',
        'trailer',
        'description'
    ];
}
