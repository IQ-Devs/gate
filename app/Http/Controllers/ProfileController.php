<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use App\Models\Charge;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    //user details
    protected function userProfile()
    {
        return Profile::find(Auth::user()->id);
    }

    //need edit
    public function index()
    {
        $profile = $this->userProfile();
        $balance = $profile->balance;
        $bill = Bill::where([['from', '=', $profile->id], ['confirmed', '=', true]])->orwhere([['to', $profile->id], ['confirmed', '=', true]])->get();

        // print_r( $profile->billsSent);
//        print_r( $bill->billsSent->user->name);

        $array = ['balance' => $balance, 'bills' => $bill];

        return view('profile.index', $array);
    }

    //this for Get
    public function GetCardCharge()
    {
        $profile = $this->userProfile();
        $profile->charge;

        return view('profile.charge', $profile);
    }

    //this for post
    public function PostCardCharge(Request $request)
    {
        $check = $request->validate([
            'Card' => 'required|digits:14|unique:App\Models\Charge,cardnumber',
            'Count' => 'required',
        ]);
        $newcharge = new Charge();
        $newcharge->profile_id = $this->userProfile()->id;
        $newcharge->cardnumbere = $request['Card'];
        $newcharge->cardvalue = 100 * $request['Count'];
        $newcharge->comments = '';
        $newcharge->timestamps;
        $newcharge->save();

        return redirect('/profile/charge');
    }
}
