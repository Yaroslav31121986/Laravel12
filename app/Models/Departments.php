<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $fillable = ['dep_name', 'dep_location'];

    public function users()
    {
        return $this->hasMany(User::class, 'u_department', 'dep_id');
    }
}
