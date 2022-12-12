<?php

namespace App\Http\Controllers;

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

        //return active number
        $number= Authcore::where('status',Enums::PhoneStatus['active'])->first();
        //open session for the user
        $this->dispatch(PendingTransactionSolver::class); // five minute
        //log the transaction
        PhoneTransferLog::class;
        //bill and send the money to the user
        Bill::create;


    }
}
