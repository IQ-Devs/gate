<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneTransferLog extends Model
{
    //link with auth core to show the done transactions in the sim card


    //to get the bill of the charge
    public function Bill(): \Illuminate\Database\Eloquent\Relations\MorphMany
    {
        return $this->morphMany(Bill::class, 'ChargeLog');
    }

    public function logs(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(PhoneLog::class,'loggable');
    }
}
