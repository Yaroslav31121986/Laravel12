<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DlProcess extends Model
{
    protected $guarded = ["dlpr_id"];
    public $table = 'dl_process';
    protected $primaryKey = "dlpr_id";

    public function detailsList()
    {
        return $this->belongsTo(DetailsList::class, 'dlpr_detail_id', 'dl_detail_id');
    }

    public function processLib()
    {
        return $this->belongsTo(ProcessLib::class, 'dlpr_process_id', 'pr_id');
    }
}
