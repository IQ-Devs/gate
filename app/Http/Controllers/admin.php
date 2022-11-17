<?php

namespace App\Http\Controllers;

use App\Charge;
use App\Company;
use App\Profile;
use Illuminate\Http\Request;

class admin extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:is-admin');
        //   $this->authorize('is-admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    public function chargeCheck()
    {
        $allChargeRecords = Charge::where('status', null)->get();

        return view('admin.charge.chargeCheck', compact('allChargeRecords', $allChargeRecords));
    }

    // make 3 func for update accept reject

    public function chargeAccept($id)
    {

        //change to accept status
        $ChargeRecords = Charge::find($id);
        $ChargeRecords->status = '1';
        $ChargeRecords->save();

        //add to profile card value
        $profileBalance = Profile::find($ChargeRecords->profile_id);
        $profileBalance->balance += $ChargeRecords->cardvalue;
        $profileBalance->save();

        return back()->with(['message' => 'complete', 'alert' => 'alert-success']);
    }

    public function chargeEdit($id)
    {
        $allChargeRecords = Charge::find($id);

        return view('admin.charge.edit', compact('allChargeRecords', $allChargeRecords));
    }

    public function chargeEditPost($id, Request $request)
    {

        //fill the action + new value

        // put the new count with comment in records
        $ChargeRecords = Charge::find($id);
        $ChargeRecords->cardvalue = 100 * $request['Count'];
        $ChargeRecords->comments = 'correct card value '.$request['Count'];
        $ChargeRecords->status = '1';
        $ChargeRecords->save();
        //add the new count to balance
        $profileBalance = Profile::find($ChargeRecords->profile_id);
        $profileBalance->balance += $ChargeRecords->cardvalue;
        $profileBalance->save();

        return redirect()->route('chrage.check')->with(['message' => 'complete', 'alert' => 'alert-info']);
    }

    public function chargeReject($id)
    {
        //change to reject status
        $allChargeRecords = Charge::find($id);
        $allChargeRecords->status = '0';
        $allChargeRecords->comments = 'expired!';
        $allChargeRecords->save();

        return back()->with(['message' => 'complete', 'alert' => 'alert-danger']);
    }

    // for link companys with user profile
    //edit add inside user profile url option
    public function addCompany(Request $request)
    {
        $request->validate([
            'profileID' => 'required|exists:App\Profile,id',
        ]);

        $profile = Company::where('profile_id', '=', $request->profileID)->first();
        if ($profile === null) {
            // user doesn't exist
            $addCompany = new Company();
            $addCompany->profile_id = $request->profileID;
            $addCompany->save();

            return back()->with(['message' => 'complete and the company id is '.$addCompany->id, 'alert' => 'alert-success']);
        } else {
            return back()->with(['message' => 'complete and alrady exists id is '.$profile->id, 'alert' => 'alert-success']);
        }
    }

    public function Company()
    {
        $allCompanyRecords = Company::all();

        return view('admin.company.add', compact('allCompanyRecords', $allCompanyRecords));

        //     $user=Company::find(4);
        //     print_r( $user->Profile->id);
    }
}
