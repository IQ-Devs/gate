<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PhoneCardLog extends Model
{
    //link with auth core to show the done transactions in the sim card


    //to get the bill of the charge
    public function Bill()
    {
        return $this->morphMany(Bill::class, 'ChargeLog');
    }
}
