<?php

namespace App\Http\Traits;

use App\Bill;
use App\Profile;
use Cknow\Money\Money;

trait BillTrait
{
    public function createBill($from, $to, $quantity): Bill
    {
        $create = new Bill();
        $create->from = $from;
        $create->to = $to;
        $create->quantity = $quantity;
        $create->save();

        return $create;
    }

    public function confirmBill($Bill)
    {
        if ($Bill->confirmed == true | false) {
            return false;
        }
        $from = $Bill->from;
        $to = $Bill->to;
        $cost = Money::USD($Bill->quantity);
        $Bill->confirmed = true;

        $FromBalance = Profile::find($from);
        $FromBalance->balance = Money::USD($FromBalance->balance)->subtract($cost)->getAmount();
        $FromBalance->save();

        $ToBalance = Profile::find($to);
        $ToBalance->balance = Money::USD($ToBalance->balance)->add($cost)->getAmount();
        $ToBalance->save();

        $Bill->save();

        return $Bill->confirmed;
    }
}
