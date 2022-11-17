<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Activation_sms extends Model
{
    //
    protected $table = 'activation_sms';

    protected $fillable = ['phoneNum', 'Provider', 'msgContext'];

    public function phone()
    {
        return $this->belongsTo(Authcore::class, 'Phone', 'Phone');
    }
}
