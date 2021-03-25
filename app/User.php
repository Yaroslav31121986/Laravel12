<?php

namespace App;

use App\Models\Departments;
use App\Models\Positions;
use App\Models\UserPerm;
use App\Models\UsersGroups;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'u_name',
        'u_login',
        'password',
        'u_group',
        'u_lang',
        'u_timezone',
        'u_ip_restrict',
        'u_bot',
        'u_active',
        'u_position',
        'u_department',
        'u_phone',
        'u_surname',
        'u_second_name',
        'u_email',
        'u_who_create',
        'u_who_lastedit',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function position()
    {
        return $this->belongsTo(Positions::class, 'u_position', 'upos_id');
    }

    public function department()
    {
        return $this->belongsTo(Departments::class, 'u_department', 'dep_id');
    }

    public function usersGroups()
    {
        return $this->belongsTo(UsersGroups::class, 'u_group', 'ugroups_id');
    }

    public function userPerm()
    {
        return $this->belongsToMany(UserPerm::class, "users_user_perm",
            "user_id", "up_id");
    }
}
