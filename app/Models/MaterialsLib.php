<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MaterialsLib extends Model
{
    protected $guarded = ["m_id"];
    public $table = 'materials_lib';
    protected $primaryKey = "m_id";

    public function dMaterialsInc()
    {
        return $this->hasMany(DMaterialsInc::class, 'dm_material_id', 'm_id');
    }

    /**
     * @param Request $request
     */
    public function updateMaterials(Request $request)
    {
        $this->m_who_lastedit = Auth::user()->id;
        $this->update($request->all());
    }
}
