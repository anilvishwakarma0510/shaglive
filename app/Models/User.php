<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'username',
        'phone',
        'phone_code',
        'country',
        'state',
        'city',
        'zip',
        'address',
        'dob',
        'gender',
        'sexual_preference',
        'height',
        'weight',
        'hair_colour',
        'eyes_color',
        'ethnicity',
        'public_hair',
        'bust',
        'facebook',
        'twitter',
        'insta',
        'about_me',
        'user_id_doc',
        'user_address_doc',
        'user_type',
        'is_approved',
        'status',
        'profile_image',
        'cover_image',
        'tags',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
