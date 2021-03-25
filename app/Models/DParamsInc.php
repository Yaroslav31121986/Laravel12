<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DParamsInc extends Model
{
    protected $guarded = ["dpa_id"];
    public $table = 'd_params_inc';
    protected $primaryKey = "dpa_id";

    public function dlParams()
    {
        return $this->hasOne(DlParams::class, 'dlpa_param_id', 'dpa_id');
    }

    public function detailsLib()
    {
        return $this->belongsTo(DetailsLib::class, 'dpa_detail_id', 'd_id');
    }
}
