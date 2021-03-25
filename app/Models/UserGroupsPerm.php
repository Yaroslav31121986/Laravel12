<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserGroupsPerm extends Model
{
    protected $guarded = ["up_id"];
    public $table = 'user_groups_perm';
    protected $primaryKey = "ugp_id";

    public function usersGroups()
    {
        return $this->belongsToMany(UsersGroups::class, "users_groups_user_groups_perm",
            "ugp_id", "ugroups_id");
    }

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id', 'r_id');
    }
}
