<?php

namespace App\Http\Controllers;

use App\Models\Charge;
use App\Models\Company;
use Illuminate\Http\Request;

class donate extends Controller
{
    //

    public function index(Company $companyID)
    {
        return view('donate.index', ['companyID' => $companyID]);
    }

    //this for post
    public function confirm(Company $companyID, Request $request)
    {
        $check = $request->validate([
            'Card' => 'required|digits:14|unique:App\Models\Charge,cardnumbere',
            'Count' => 'required',
        ]);
        $newcharge = new Charge();
        $newcharge->profile_id = $companyID->profile->id;
        $newcharge->cardnumbere = $request['Card'];
        $newcharge->cardvalue = 100 * $request['Count'];
        $newcharge->comments = 'donate';
        $newcharge->timestamps;
        $newcharge->save();

        return view('donate.donateComplete');
    }
}
