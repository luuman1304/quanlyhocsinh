<?php

namespace App;

use App\Model\Role;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    const ROLE_TYPE = [
        'ADMIN' => 1,
        'USER' => 2
    ];

    const ROLE_TYPE_TEXT = [
        'ADMIN' => "Quản trị viên",
        'USER' => "Người dùng"
    ];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role_id',
    ];

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function roleTypeText()
    {
        return $this->role_id ? User::ROLE_TYPE_TEXT[array_keys(User::ROLE_TYPE, $this->role_id)[0]] : '';
    }

    public function isAdmin()
    {
        return $this->role_id == 1 ? true : false;
    }

    /**
     * Get the role of user.
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role','role_id');
    }
}
