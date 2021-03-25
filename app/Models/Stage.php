<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Stage extends Model
{
    protected $guarded = ["st_id"];
    public $table = 'stages';
    protected $primaryKey = "st_id";

    public function updateStage(Request $request)
    {
        $this->st_edit_uid = Auth::user()->id;
        $this->update($request->all());
    }
}
