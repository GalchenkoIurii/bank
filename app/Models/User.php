<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'login',
        'phone',
        'email',
        'password',
        'ip_address',
        'first_name',
        'last_name',
        'patronymic',
        'birth_date',
        'gender',
        'is_admin',
        'is_banned',
        'need_confirmation',
        'confirmation',
        'confirmed',
        'confirmed_at',
        'show_card',
        'withdrawable',
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

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function userData()
    {
        return $this->hasOne(UserData::class);
    }

    public function balance()
    {
        return $this->hasOne(Balance::class);
    }
}
