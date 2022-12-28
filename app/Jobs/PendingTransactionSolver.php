<?php

namespace App\Jobs;

use App\Enums\Phone\ChargeTransactionStatus;
use App\Enums\Phone\PhoneStatus;
use App\Enums\Phone\ChargeStatus;

use App\Models\Authcore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use function PHPUnit\Framework\assertGreaterThanOrEqual;

class PendingTransactionSolver implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//I'm using same class for the tasks scheduler and queue{task schedule for pending only don't do any timeout checking}
// be sure of the translation type transfer
// TO-Do
// check busy phones  then get the transaction log  by the relation in the mode and run checks according to the charge type transfer
    private $PhoneNumber;
    private $timeout;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Authcore $PhoneNumber = null, $timeout = null)
    {
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
            //check busy and balance if there change
            $PhoneNumbers = Authcore::where('Status', PhoneStatus::Busy)->whereRelation('logs', 'chargeStatus', ChargeTransactionStatus::Pending)->get();//get all pending transactions
            $validRows = $PhoneNumbers->map(function ($item) {
                $item->logs()->where('created_at', '<=', now()->subMinute(5)->toDateTime())->update(['chargeStatus' => ChargeTransactionStatus::Timeout]); //check if the transaction got outdated
                $item->logs = $item->logs()->where('chargeStatus', ChargeTransactionStatus::Pending)->with('loggable')->first();
                return $item; // get the still valid transactions
            });
            foreach ($validRows as $phoneNumber) {
//                balance not the same /*/
                if ( $phoneNumber->getProvider()->Balance() == $phoneNumber->logs->loggable->BalanceBefore) {
                    
                }


            }
            //if timeout change the phone active and log timeout
//            return ChargeStatus::Pending;


        } else {
            //check balance
            // update balance
            //change phone status
            //send event
            //if timeout and balance not the same then reject
            //if pending and
            if ($this->timeout !== null) {
                $log = $this->PhoneNumber->logs()->where('chargeStatus', Enums::charge_status['timeout'])->with('loggable')->first();
            } else {
                $log = $this->PhoneNumber->logs()->where('chargeStatus', Enums::charge_status['pending'])->with('loggable')->first();

            }


        }
        // check all pending top-up requests for transfer by phone status and charge type then check the balance
        Authcore::where([['Status', Enums::PhoneStatus['busy']], ['ChargeType', Enums::chargeType['transfer']]]);

    }
}
