<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CityModel extends Model
{
    use HasFactory;
    protected $table = 'cities';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'name',
        'country_id',
        'state_id',
    ];
}
