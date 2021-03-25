<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UsersGroups extends Model
{
    public $table = 'users_groups';
    protected $primaryKey = "ugroups_id";
    protected $guarded = ["ugroups_id"];

    public function users()
    {
        return $this->hasMany(User::class, 'u_group', 'ugroups_id');
    }

    public function usersGroupsPerms()
    {
        return $this->belongsToMany(UserGroupsPerm::class, "users_groups_user_groups_perm",
            "ugroups_id", "ugp_id");
    }
}
