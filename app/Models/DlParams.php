<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DlParams extends Model
{
    protected $guarded = ["dlpa_id"];
    public $table = 'dl_params';
    protected $primaryKey = "dlpa_id";

    public function detailsList()
    {
        return $this->belongsTo(DetailsList::class, 'dlpa_detail_id', 'dl_detail_id');
    }

    public function dParamsInc()
    {
        return $this->belongsTo(DParamsInc::class, 'dlpa_param_id', 'dpa_id');
    }
}
