<?php

namespace App\Models;

use App\Http\Traits\Asiacell;
use App\Repositories\AsiacellProvider;
use Illuminate\Database\Eloquent\Model;

class Authcore extends Model
{
    use Asiacell;

    //return register this-> access_token/ refresh_token
    public function RefreshToken()
    {
        $response = $this->refresh_Token($this->refresh_token);
        $this->refresh_token = $response['refresh_token'];
        $this->access_token = $response['access_token'];
        $this->save();
    }

    public function checkToken()
    {
        logger('this token used'.$this->access_token);

        return $this->check_Token($this->access_token);
    }

    public function logs(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PhoneLog::class);
    }

    public function getSmsProvider(): AsiacellProvider
    {
        return match ($this->Provider) {
            'asiacell' => app()->makeWith(AsiacellProvider::class,['authcore'=>$this]),//going to use enum here
            default => throw new InvalidArgumentException("[{$this->Provider}] is an invalid provider"),
        };
    }
}
