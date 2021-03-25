<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Positions extends Model
{
    protected $fillable = ['upos_name'];

    public function users()
    {
        return $this->hasMany(User::class, 'u_position', 'upos_id');
    }
}
