<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DProcessInc extends Model
{
    protected $guarded = ["dpr_id"];
    public $table = 'd_process_inc';
    protected $primaryKey = "dpr_id";

    public function processLib()
    {
        return $this->belongsTo(ProcessLib::class, 'dpr_process_id', 'pr_id');
    }

    public function detailsLib()
    {
        return $this->belongsTo(DetailsLib::class, 'dpr_detail_id', 'd_id');
    }
}
