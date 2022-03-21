<?php

namespace App\Http\Controllers;
use App\Authcore;
use Illuminate\Http\Request;
use App\Http\Traits\Asiacell;
class authcoreController extends Controller
{
    //
    use Asiacell;

    public function __construct()
    {
//        $this->middleware('auth');
//        $this->middleware('can:is_admin');
    }
    public function  index(){
        $records=Authcore::all();

        return view('admin.authcore.index',['records'=>$records]);
    }

    public function create (){




    }
    //

    public function SendAuthSms($phonenumber){
//        save the pid in the db

         $response= $this->login($phonenumber);
         $phone= Authcore::where('Phone',$phonenumber)->first();
        //  for test only need fix default value UsageLimit/Pid/DeviceId..etc and the numnber should be already registerd
         if ($phone === null) {
            $phone = new Authcore();
            $phone->Phone =$phonenumber;
            $phone->UsageLimit =0;
            $phone->Pid =0;
            $phone->DeviceId =0;
            $phone->API_Token =0;
            
            $phone->save();
        }
        //
         $phone->Pid =$response['pid'];
         $phone->DeviceId =$response['fake_id'];
         $phone->save();
         return $phone;
    }
// this function return the api key
    public function SetAuthSms(Request $passcode ){
        logger($passcode);
//        save the new token in the db
        $body = json_decode(str_replace('``','"', $passcode->message));
        $message=$body->message;
        $from= $body->from;
        $regex="/code: ([0-9]*)/";
        preg_match($regex,$message,$passcode);

        $phone= Authcore::where('Phone',$from)->first();

        $response=  $this->login_sms($phone->DeviceId ,$phone->Pid,$passcode[1]);
        print_r($response);
        $phone= Authcore::where('Phone',$response->username)->first();
        $phone->API_Token =$response->access_token;
        $phone->save();
        return $phone;

    }
    public function getBalances($token){

        return  $this->getBalance($token);

    }
}
