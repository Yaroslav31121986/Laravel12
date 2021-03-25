<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $guarded = ["m_id"];
    public $table = 'materials';
    protected $primaryKey = "m_id";
}
