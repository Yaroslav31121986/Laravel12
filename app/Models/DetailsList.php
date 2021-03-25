<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailsList extends Model
{
    protected $guarded = ["dl_id"];
    public $table = 'details_list';
    protected $primaryKey = "dl_id";

    public function dlParams()
    {
        return $this->hasMany(DlParams::class, 'dlpa_detail_id', 'dl_detail_id');
    }

    public function dlMaterials()
    {
        return $this->hasMany(DlMaterials::class, 'dlm_detail_id', 'dl_detail_id');
    }

    public function dlProcess()
    {
        return $this->hasMany(DlProcess::class, 'dlpr_detail_id', 'dl_detail_id');
    }

    public function detailsLib()
    {
        return $this->belongsTo(DetailsLib::class, 'dl_type_id', 'd_id');
    }
}
