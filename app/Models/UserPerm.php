<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserPerm extends Model
{
    protected $guarded = ["up_id"];
    public $table = 'user_perm';
    protected $primaryKey = "up_id";

    public function users()
    {
        return $this->belongsToMany(User::class, "users_user_perm",
            "up_id", "user_id");
    }

    public function route()
    {
        return $this->belongsTo(Route::class, 'route_id', 'r_id');
    }
}
