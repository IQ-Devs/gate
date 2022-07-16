<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enums extends Model
{
    //

    const status = ['active' => 1, 'disabled' => 2, 'deleted' => 3,'busy'=>4];
    const chargeType = ['cards' => 1, 'transfere' => 2,];
    const providers = ['asiacell' => 1, 'korek' => 2, 'zain' => 3,];
    const charge_status = ['completed' => 1, 'pending' => 2, 'rejected' => 3,];
    const billType = [];

}
