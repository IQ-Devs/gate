<?php

namespace App\Http\Traits;
use App\Bill;
use App\Profile;
use Illuminate\Support\Facades\Auth;
use Cknow\Money\Money;


trait BillTrait{


        public function createBill($from ,$to,$quantity)
        {

            $create=new Bill();
            $create->from=$from;
            $create->to=$to;
            $create->quantity=$quantity;
            $create->save();
            return $create;
        }


        public function confirmBill ($BillID)
        {

            if ($BillID->confirmed ==true){

            return abort(403,'your process is already complete');
            }
           $from=$BillID->from;
           $to=$BillID->to;
           $cost=Money::USD($BillID->quantity);
           $BillID->confirmed=true;



           $FromBalance=Profile::find($from);
           $FromBalance->balance= Money::USD($FromBalance->balance)->subtract($cost)->getAmount();
           $FromBalance->save();

           $ToBalance=Profile::find($to);
           $ToBalance->balance=Money::USD($ToBalance->balance)->add($cost)->getAmount();
           $ToBalance->save();

           $BillID->save();

        }









    }

