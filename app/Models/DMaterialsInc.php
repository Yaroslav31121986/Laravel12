<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DMaterialsInc extends Model
{
    protected $guarded = ["dm_id"];
    public $table = 'd_materials_inc';
    protected $primaryKey = "dm_id";

    public function materialsLib()
    {
        return $this->belongsTo(MaterialsLib::class, 'dm_material_id', 'm_id');
    }

    public function detailsLib()
    {
        return $this->belongsTo(DetailsLib::class, 'dm_detail_id', 'd_id');
    }
}
