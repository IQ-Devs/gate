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
         $phone->Pid =$response['pid'];
         $phone->DeviceId =$response['fake_id'];
         $phone->save();
         return $phone;
    }

    public function SetAuthSms($phonenumber ,Request $passcode ){
//        save the new token in the db
        $body = json_decode(str_replace('``','"', $passcode->message));
        $message=$body->message;
        $regex="/code: ([0-9]*)/";
        preg_match($regex,$message,$passcode);

        $phone= Authcore::where('Phone',$phonenumber)->first();

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
