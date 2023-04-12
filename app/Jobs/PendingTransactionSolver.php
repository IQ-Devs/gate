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
// be sure of the transaction type transfer

// TO-Do
// check busy phones  then get the transaction log  by the relation in the mode and run checks according to the charge type transfer
    public ?Authcore $PhoneNumber;
    private bool $timeout;

//    if  phone null and time out null then check all pending, this is probably triggered by the task scheduler
//    if  phone null and time out exits  then check all timout , this is probably triggered by the task scheduler
//    if phone exist and timeout null then  process the pending transaction of the phone
//    if phone exist and timeout exist then process the timeout transaction of the phone if there's any , and this is triggered by the controller immediately when he checks
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Authcore $PhoneNumber = null, bool $timeout = false)
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
            if (!$this->timeout) {
                //check busy and balance if there change
                $this->PhoneNumber = Authcore::where('Status', PhoneStatus::Busy)->whereRelation('logs', 'chargeStatus', ChargeTransactionStatus::Pending)->get();//get all pending transactions
                $this->PhoneNumber = $this->PhoneNumber->map(function ($item) {

                    $item->logs()->where('created_at', '<=', now()->subMinute(5)->toDateTime())->update(['chargeStatus' => ChargeTransactionStatus::Timeout]); //check and update if the transaction got timeout
                    $item->update(['Status' => PhoneStatus::Active]);//not tested yet
                    $item->logs = $item->logs()->where('chargeStatus', ChargeTransactionStatus::Pending)->with('loggable')->first();
                    return $item; // get the still valid transactions
                });
            } elseif ($this->timeout) {
                $this->PhoneNumber = Authcore::where('Status', PhoneStatus::Active)->whereRelation('logs', 'chargeStatus', ChargeTransactionStatus::Timeout)->with('logs.loggable')->get();//get all Timeout transactions
//what if changed get to first ? will foreach works ?

            }
            foreach ($this->PhoneNumber as $phoneNumber) {
//                balance not the same
//                $phoneNumber->balance = $phoneNumber->getProvider()->Balance();
                $phoneNumber->balance = 12; //for test purpose

                if ($phoneNumber->balance !== $phoneNumber->logs->loggable->BalanceBefore) {

//                    self::dispatch($phoneNumber);
                    self::dispatchSync($phoneNumber);


                }


            }


        } //        not finished yet
        elseif ($this->PhoneNumber) {


//            //change phone status
//            //send event
            if ($this->timeout) {
                $this->PhoneNumber = $this->PhoneNumber->with(['logs' => fn($query) => $query->where('chargeStatus', ChargeTransactionStatus::Timeout)])->first();
            } elseif (!$this->timeout) {
                $this->PhoneNumber = $this->PhoneNumber->with(['logs' => fn($query) => $query->where('chargeStatus', ChargeTransactionStatus::Pending)])->first();
            }
//            //check balance
            if ($this->PhoneNumber->Balance() !== $this->PhoneNumber->logs->first()->loggable->BalanceBefore) {
                // update balance
                echo 'not equal going to update:' . $this->PhoneNumber->logs->first()->user->profile->balance . " \n ";
                $profile = $this->PhoneNumber->logs->first()->user->profile;
                $newBalance = $profile->update(['balance' => $profile->balance += ($this->PhoneNumber->Balance() - $this->PhoneNumber->logs->first()->loggable->BalanceBefore)]);//need to check in case minus or exploit
                echo 'after update:' . $this->PhoneNumber->logs->first()->user->profile->balance . " \n ";
                echo 'amount update:' . $this->PhoneNumber->Balance() - $this->PhoneNumber->logs->first()->loggable->BalanceBefore . " \n ";
                //change to completed
                $this->PhoneNumber->logs->first()->update(['chargeStatus' => ChargeTransactionStatus::Completed]);


            } else {//balance the same

                //if pending(not timeout) and balance  the same then release back to the queue
                if ($this->PhoneNumber->logs->first()->chargeStatus === ChargeTransactionStatus::Pending) {
                    //stop
                    return;
//                idea to use release instead of return , and make the code checking from the begging if it's assigned by adding flag to the phone in queue and change it in the end of the process

                } //complete from here next time

                elseif ($this->PhoneNumber->logs->first()->chargeStatus === ChargeTransactionStatus::Timeout) {
                    //if timeout and balance  the same then reject
                    //change charge status to reject


                }

            }


        }
//              and phone to active back
//
//
//
//            //notifications with charge status
//            //broadcast
//
//
    }


}
