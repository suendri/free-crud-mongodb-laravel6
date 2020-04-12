<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

/**
 * Illuminate\Foundation\Auth\User sudah extend Model implements Authenticatable, Authorizable, CanResetPassword
 * Karena Mongodb punya Model sendiri, ini kita pisah.
 *
 * User extend Model implements Authenticatable, Authorizable, MustVerifyEmail, CanResetPassword
 */

class User extends Model implements Authenticatable
{

    use AuthenticatableTrait;

    protected $collection = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
}
