<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    public $timestamps = true;
    public $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname', 'birth', 'pic', 'name', 'diploma', 'email', 'password', 'status', 'permission'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'pic', 'diploma', 'status', 'permission', 'rememberToken'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = env('PASSWORD_HASH') ? bcrypt($value) : $value;
    }

    public function getBirhAttribute($value)
    {
        $birth = explode('-', $birth);
        return (count($birth) == 3) ? ($birth[2] . '/' . $birth[1] . '/' . $birth[0]) : "";
    }
}
