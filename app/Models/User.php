<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Auth;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    public $timestamps  = true;

    protected $fillable = [
        'first_name',
        'last_name',
        'name',
        'email',
        'password',
        'remember_token',
        'user_role',
        'gender',
        'city',
        'address',
        'mobile',
        'confirm_status',
        'status',        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
