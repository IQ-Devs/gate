<?php

namespace App\Jobs;

use App\Enums\Phone\ChargeTransactionStatus;
use App\Enums\Phone\PhoneStatus;

use App\Models\Authcore;
use App\Models\Enums;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use function PHPUnit\Framework\assertGreaterThanOrEqual;

class PendingTransactionSolver implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//I'm using same class for the tasks scheduler and queue(task schedule for pending only don't do any timeout checking)
// be sure of the translation type transfer

// TO-Do
// check busy phones  then get the transaction log  by the relation in the mode and run checks according to the charge type transfer
    private $PhoneNumber;
    private $timeout;


//    if  phone null and time out null then check all pending, this is probably triggered by the task scheduler
//    if  phone null and time out exits  then check all timout , this is probably triggered by the task scheduler
//    if phone exist and timeout null then  process the pending transaction of the phone
//    if phone exist and timeout exist then process the timeout transaction of the phone if there's any , and this is triggered by the controller immediately when he checks
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Authcore $PhoneNumber = null, $timeout = null)
    {
        logger($PhoneNumber);// check if I pass a properties not in the model is it going to stay or fetch again new one
        $this->PhoneNumber = $PhoneNumber;
        $this->timeout = $timeout;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): void
    {
        if ($this->PhoneNumber == null) {
            if ($this->timeout == null) {
                //check busy and balance if there change
                $this->PhoneNumber = Authcore::where('Status', PhoneStatus::Busy)->whereRelation('logs', 'chargeStatus', ChargeTransactionStatus::Pending)->get();//get all pending transactions
                $this->PhoneNumber = $this->PhoneNumber->map(function ($item) {
                    $item->logs()->where('created_at', '<=', now()->subMinute(5)->toDateTime())->update(['chargeStatus' => ChargeTransactionStatus::Timeout]); //check and update if the transaction got timeout
                    $item->logs = $item->logs()->where('chargeStatus', ChargeTransactionStatus::Pending)->with('loggable')->first();
                    return $item; // get the still valid transactions
                });
            }elseif ($this->timeout !== null){
                $this->PhoneNumber = Authcore::where('Status', PhoneStatus::Busy)->whereRelation('logs', 'chargeStatus', ChargeTransactionStatus::Timeout)->with('logs.loggable')->get();//get all pending transactions


            }
            foreach ($this->PhoneNumber as $phoneNumber) {
//                balance not the same
                $phoneNumber->balance = $phoneNumber->getProvider()->Balance();
                if ($phoneNumber->balance !== $phoneNumber->logs->loggable->BalanceBefore) {

                    self::dispatch($phoneNumber);
//                    self::dispatchSync($phoneNumber);


                }


            }


        }
//        not finished yet
        elseif ($this->PhoneNumber) {

            //check balance
            // update balance
            //change phone status
            //send event
            //if timeout and balance not the same then reject
            //if pending and balance not the same then release
            if ($this->timeout !== null) {
                $log = $this->PhoneNumber->logs()->where('chargeStatus', Enums::charge_status['timeout'])->with('loggable')->first();

            } else {

                $log = $this->PhoneNumber->logs()->where('chargeStatus', Enums::charge_status['pending'])->with('loggable')->first();


            }




        }


    }
}
