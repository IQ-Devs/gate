<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cknow\Money\MoneyCast;

class Profile extends Model
{

    protected $fillable =['user_id','balance'];

    //


   public function  charge(){

        return $this->hasMany('App\Charge');
    }

   public function  user(){

        return $this->belongsTo('App\User');
    }


   public function  company(){

        return $this->hasOne('App\Company');
    }

    public function billsSent(){
        return $this->hasMany(Bill::class, 'from');
    }

    public function billsReceived(){
        return $this->hasMany(Bill::class, 'to');
    }


}
