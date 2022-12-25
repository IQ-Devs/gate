<?php

namespace App\Models;

use App\Http\Traits\BillTrait;
use Illuminate\Database\Eloquent\Model;
class Bill extends Model
{
    use  BillTrait;
    //

    //Bill Model

    public function billsSent(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Profile::class, 'from');
    }

    public function billsReceived(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Profile::class, 'to');
    }

    public function ChargeLog(): \Illuminate\Database\Eloquent\Relations\MorphTo
    {
        //this must be called in card and transfer log models to view charge bills for the user
        return $this->morphTo();
    }
}
