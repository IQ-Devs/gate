<?php

namespace App;

use App\Http\Traits\Asiacell;
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
        logger('this token usde'.$this->access_token);

        return $this->check_Token($this->access_token);
    }
}
