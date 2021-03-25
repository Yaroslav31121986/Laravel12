<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Secret extends Model
{
    protected $guarded = ["id"];
    public $table = 'secrets';
    protected $primaryKey = "id";

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
