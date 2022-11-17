<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'balance'];

    //

    public function charge()
    {
        return $this->hasMany(\App\Charge::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function company()
    {
        return $this->hasOne(\App\Company::class);
    }

    public function billsSent()
    {
        return $this->hasMany(Bill::class, 'from');
    }

    public function billsReceived()
    {
        return $this->hasMany(Bill::class, 'to');
    }
}
