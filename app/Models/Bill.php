<?php

namespace App\Models;

use App\Http\Traits\BillTrait;
use Illuminate\Database\Eloquent\Model;
class Bill extends Model
{
    use  BillTrait;
    //

    //Bill Model

    public function billsSent()
    {
        return $this->belongsTo(Profile::class, 'from');
    }

    public function billsReceived()
    {
        return $this->belongsTo(Profile::class, 'to');
    }

    public function ChargeLog()
    {
        //this must be called in card and transfer log models to view charge bills for the user
        return $this->morphTo();
    }
}
