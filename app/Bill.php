<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //

    //Bill Model

    public function billsSent(){
        return $this->belongsTo(Profile::class, 'from' );
    }

    public function billsReceived(){
        return $this->belongsTo(Profile::class, 'to');
    }

    public function ChargeLog()
    {
        return $this->morphTo();
    }



}
