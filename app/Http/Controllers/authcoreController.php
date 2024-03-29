<?php

namespace App\Http\Controllers;

use App\Models\Activation_sms;
use App\Models\Authcore;
use App\Http\Traits\Asiacell;
use Illuminate\Http\Request;

class authcoreController extends Controller
{
    //...
    use Asiacell;

    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('can:is_admin');
    }

    public function index()
    {
        return Authcore::all();
        // return view('admin.authcore.index',['records'=>$records]);
    }

    public function create()
    {
    }

    //

    public function SendAuthSms($phonenumber)
    {
//        save the pid in the db

        $response = $this->login($phonenumber);
        $phone = Authcore::where('Phone', $phonenumber)->first();
        //  for test only need fix default value UsageLimit/Pid/DeviceId..etc and the number should be already registered
        if ($phone === null) {
            $phone = new Authcore();
            $phone->Phone = $phonenumber;
            $phone->UsageLimit = 0;
            $phone->Pid = 0;
            $phone->DeviceId = 0;
            $phone->access_token = 0;
            $phone->refresh_token = 0;
            $phone->save();
        }
        $phone->Pid = $response['pid'];
        $phone->DeviceId = $response['fake_id'];
        $phone->save();

        return $phone;
    }

    // this function return the api key

    public function SetAuthSms(Request $passcode)
    {
        logger($passcode);
//        save the new token in the db
        $body = json_decode(str_replace('``', '"', $passcode->message));
        $message = $body->message;
        $from = $body->from;
        $regex = '/code: ([0-9]*)/';
        Activation_sms::create([
            'phoneNum' => $from,
            'msgContext' => $message,
        ]);
        preg_match($regex, $message, $passcode);
        $phone = Authcore::where('Phone', $from)->first();
        $response = $this->login_sms($phone->DeviceId, $phone->Pid, $passcode[1]);
        $phone = Authcore::where('Phone', $response->username)->first();
        $phone->access_token = $response->access_token;
        $phone->refresh_token = $response->refresh_token;
        $phone->save();

        return $phone;
    }

    public function RefreshToken($refresh_token)
    {
        return $this->refresh_Token($refresh_token);
    }

    public function getBalances($token)
    {
        return $this->getBalance($token);
    }

    public function checkToken($token)
    {
        return $this->check_Token($token);
    }
}
