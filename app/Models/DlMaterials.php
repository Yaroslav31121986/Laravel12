<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DlMaterials extends Model
{
    protected $guarded = ["dlm_id"];
    public $table = 'dl_materials';
    protected $primaryKey = "dlm_id";

    public function detailsList()
    {
        return $this->belongsTo(DetailsList::class, 'dlm_detail_id', 'dl_detail_id');
    }
}
