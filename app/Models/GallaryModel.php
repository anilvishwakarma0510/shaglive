<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GallaryModel extends Model
{
    use HasFactory;
    protected $table = 'gallary';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'file',
        'status',
        'is_free',
        'credits',
        'description'
    ];
}
