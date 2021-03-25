<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessLib extends Model
{
    protected $guarded = ["pr_id"];
    public $table = 'process_lib';
    protected $primaryKey = "pr_id";

    public function dlProcess()
    {
        return $this->hasMany(DlProcess::class, 'dlpr_process_id', 'pr_id');
    }

    public function dProcessInc()
    {
        return $this->hasMany(DProcessInc::class, 'dpr_process_id', 'pr_id');
    }
}
