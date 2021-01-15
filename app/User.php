<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    use SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'rut',
        'name',
        'email',
        'password',
        'phone',
        'address',
        'country',
        'state',
        'city',
        'description',
        'cumple',
        'avatar',
        'pet_type_ptrac',
        'is_active',
        'is_private',
        'is_manager',
        'user_type',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pets()
    {
        return $this->hasMany(Pets::class,'user_id');
    }

    public function organizaciones()
    {
        return $this->hasMany(Organizacion::class,'user_id');
    }

    public function views()
    {
        return $this->hasMany(View::class,'user_id');
    }


}
