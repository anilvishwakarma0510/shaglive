<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeightModel extends Model
{
    use HasFactory;
    protected $table = 'height';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'in_inch',
        'in_cm',
    ];
}
