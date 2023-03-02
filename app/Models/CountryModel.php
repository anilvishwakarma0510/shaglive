<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CountryModel extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'iso',
        'name',
        'iso3',
        'phonecode',
        'UTC_offset',
    ];
}
