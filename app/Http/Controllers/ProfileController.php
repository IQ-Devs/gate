<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Charge;
use App\User;
use App\Profile ;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Cknow\Money\Money;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //user details
    protected function userProfile(){
        $profile=Profile::find(Auth::user()->id);


        return $profile;
    }

    //need edit
    public function index(){
        $profile=$this->userProfile();
        $balance=$profile->balance;
        $bill=Bill::where([['from','=',$profile->id],['confirmed','=',true]])->orwhere([['to',$profile->id],['confirmed','=',true]])->get();


       // print_r( $profile->billsSent);
//        print_r( $bill->billsSent->user->name);

        $array= array('balance'=>$balance,'bills'=>$bill);
        return view('profile.index',$array);
    }

    //this for Get
    public function Getcharge(){
        $profile=$this->userProfile();
        $profile->charge;




          return view('profile.charge',$profile);
    }

    //this for post
    public function Postcharge(Request $request){

      $check=  $request->validate([
            'Card' => 'required|digits:14|unique:App\Charge,cardnumbere',
            'Count' => 'required',
        ]);
        $newcharge =new Charge();
        $newcharge->profile_id=$this->userProfile()->id;
        $newcharge->cardnumbere=$request['Card'];
        $newcharge->cardvalue= 100 * $request['Count'];
        $newcharge->comments='';
        $newcharge->timestamps;
        $newcharge->save();


      return redirect('/profile/charge');
    }
}
