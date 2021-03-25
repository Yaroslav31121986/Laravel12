<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsLib extends Model
{
    protected $guarded = ["d_id"];
    public $table = 'details_lib';
    protected $primaryKey = "d_id";

    public function dProcessInc()
    {
        return $this->hasMany(DProcessInc::class, 'dpr_detail_id', 'd_id');
    }

    public function dMaterialsInc()
    {
        return $this->hasMany(DMaterialsInc::class, 'dm_detail_id', 'd_id');
    }

    public function dParamsInc()
    {
        return $this->hasMany(DParamsInc::class, 'dpa_detail_id', 'd_id');
    }

    public function detailsList()
    {
        return $this->hasMany(DetailsList::class, 'dl_type_id', 'd_id');
    }
}
