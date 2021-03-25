<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    protected $guarded = ["r_id"];
    public $table = 'routes';
    protected $primaryKey = "r_id";

    public function userPerm()
    {
        return $this->hasMany(UserPerm::class, 'route_id', 'r_id');
    }

    public function userGroupsPerm()
    {
        return $this->hasMany(UserGroupsPerm::class, 'route_id', 'r_id');
    }
}
