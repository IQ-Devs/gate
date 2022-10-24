<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Company;
use App\Profile;
use App\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use App\Http\Traits\BillTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

class payment extends Controller
{
    use BillTrait;
    //
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function index (Company $companyID, $paymentID , Request $request){
        //check company account

        $request->validate([
            'cost'=>'required|string|gte:0',
            'hashcode'=>'required'
        ]);
        //check is fake or not by hash code
        $hashString=$companyID->token.$paymentID.$request->cost;
        $hash=md5($hashString);
        if ($hash !==strtolower($request->hashcode)){
           return abort(404);
        }

        //check balance/cost if enough
        $profile = Profile::where('user_id',Auth::user()->id)->first();
        if ($profile->balance < 100 * $request->cost) {
            // balance doesn't enough
         $notEnough=['notEnough'=>"you don't have enough money",'alert'=>'alert-danger'] ;
        }
        //bill process ..edit add payment id
        $bill= $this->createBill($profile->id,$companyID->profile_id,100 *$request->cost);

        $Returnarray= ['companyID'=>$companyID,'paymentID' =>Crypt::encryptString($paymentID),'bill'=>$bill,'notEnough'=>$notEnough ??''];
        return view('payments.receipt',$Returnarray);
    }


    //bug hash data
    public function confirm (Company $companyID,$paymentID,Bill $billID){
        //confirm payment process
        //payment process
        //change bill status

        //check if company and payment same


        //todo : if return false mean  bill either declined or completed
        if (!$this->confirmBill($billID)){
          return   abort(403,'your process is already complete');
        }

        $paymentID= Crypt::decryptString($paymentID);

        //make md5 hashcode from company

        $hashString=$companyID->token.$companyID->id.$paymentID.$billID->id;

        //post data array
        $data=['hashCode'=>md5($hashString),'companyID'=>$companyID->id,'paymentID'=>$paymentID,'billID'=>$billID->id];
        //send email ..idea

        // to callback url with company id payment id,bill id , hash code,
//         $callBack=Http::post('https://berrus.requestcatcher.com',$data);

        $callBack=Http::post($companyID->CallBackUrl,$data);

        return view('payments.receiptComplete');

    }
}
