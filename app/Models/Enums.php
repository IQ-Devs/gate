<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enums extends Model
{
    //


    const charge_status = ['completed' => 1, 'pending' => 2, 'rejected' => 3, 'timeout' => 4]; //transaction status

    const billType = ['charge', 'transfer', 'checkout']; //transfer for sending money from 1 to 1 , charge for account charging , checkout for payment page
}
