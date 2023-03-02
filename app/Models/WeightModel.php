<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightModel extends Model
{
    use HasFactory;
    protected $table = 'weight';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'in_ibs',
        'in_kg',
    ];
}
