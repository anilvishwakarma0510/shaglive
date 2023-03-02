<?php

namespace App\Models;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AdminModel extends Authenticatable
{
    use HasFactory;
    protected $table = 'admin';
    protected $guarded =[];
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'first_name',
        'last_name',
        'email',
        'password',
    ];
}
