<?php

namespace App\Models;

use App\Enums\Phone\Provider;
use Illuminate\Database\Eloquent\Model;

class Activation_sms extends Model
{
    //
    protected $table = 'activation_sms';

    protected $fillable = ['phoneNum', 'Provider', 'msgContext'];

    protected $casts=[
        'Provider'=>Provider::class
    ];
    public function phone()
    {
        return $this->belongsTo(Authcore::class, 'Phone', 'Phone');
    }
}
