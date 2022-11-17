<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Enums extends Model
{
    //

    const PhoneStatus = ['active' => 1, 'disabled' => 2, 'deleted' => 3, 'busy' => 4]; //phones status

    const chargeType = ['cards' => 1, 'transfer' => 2]; //the same for checkout

    const providers = ['asiacell' => 1, 'korek' => 2, 'zain' => 3]; //should become from the modules

    const charge_status = ['completed' => 1, 'pending' => 2, 'rejected' => 3, 'timeout' => 4]; //transaction status

    const billType = ['charge', 'transfer', 'checkout']; //transfer for sending money from 1 to 1 , charge for account charging , checkout for payment page
}
