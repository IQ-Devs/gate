<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PhoneTokenRenew implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $phonenumber;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($phonenumber= null)
    {
        //here run the check token function from asiacell trait according to phone providers 


        $this->phonenumber= $phonenumber;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->phonenumber == null){
        // condition for expired phones with queue time
        }else{

        }


        //
    }
}
