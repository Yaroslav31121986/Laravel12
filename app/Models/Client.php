<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = ["c_id"];
    public $table = 'clients';
    protected $primaryKey = "c_id";
}
