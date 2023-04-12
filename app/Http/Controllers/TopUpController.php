<?php

namespace App\Http\Controllers;

use App\Enums\Phone\PhoneStatus;
use App\Jobs\PendingTransactionSolver;
use App\Models\Authcore;
use App\Models\Bill;
use App\Models\Enums;
use App\Models\PhoneTransferLog;
use Illuminate\Support\Facades\Auth;

class TopUpController extends Controller
{
    public function index()
    {

    }

    public function transfer()
    {

        //return active number in the end of the request
        $PhoneNumber = Authcore::where('status', PhoneStatus::Active)->first();
//

        //open session for the user  ,check for timeout transaction
        $this->dispatch(new  PendingTransactionSolver($PhoneNumber));

        //by broadcaster,event inside the job
        //log the transaction
        PhoneTransferLog::create();
        //bill and send the money to the user
        Bill::create;


    }
}
