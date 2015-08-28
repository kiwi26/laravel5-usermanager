<?php

namespace Kiwi\UserManager\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Kiwi\UserManager\Contracts\IgnoreFieldsOnMassUpdate as IgnoreFieldsOnMassUpdateContract;
use Kiwi\UserManager\Traits\IgnoreFieldsOnMassUpdate;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, IgnoreFieldsOnMassUpdateContract
{
    use Authenticatable, CanResetPassword, IgnoreFieldsOnMassUpdate;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['firstname', 'lastname', 'password', 'email'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];
}
