<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    //

    public function profile()
    {
        return $this->belongsTo(\App\Models\Profile::class);
    }
}
