<?php

namespace CodeEduUser\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function generatePassword($password = null)
    {

        return !$password ? bcrypt(str_random(8)) : bcrypt($password);

    }

    public function books()
    {
        return $this->hasMany('CodePub\Model\Book');
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    /**
     * @param Collection/string $role
     * @return boolean
     */
    public function hasRole($role)
    {

        return is_string($role) ?
            $this->roles->contains('name', $role) :
            (boolean) $role->intersect($this->roles)->count();

    }

    public function isAdmin()
    {
        return $this->hasRole(config('codeeduuser.acl.role_admin'));
    }


}
