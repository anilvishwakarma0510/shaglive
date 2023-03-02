<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHourModel extends Model
{
    use HasFactory;
    protected $table = 'working_hour';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'user_id',
        'open_time',
        'close_time',
        'week_day'
    ];
}
