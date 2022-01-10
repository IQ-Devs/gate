<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activation_sms extends Model
{
    //
    protected $table='activation_sms';
public function phone (){

    return $this->belongsTo(Phonelist::class,'Phone','Phone');
}

}
