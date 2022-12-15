<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PendingTransactionSolver implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//I'm using same class for the tasks scheduler and queue
// be sure of the translation type transfer
// TO-Do
// check busy phones  then get the transaction log  by the relation in the mode and run checks according to the charge type transfer


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        // check all pending top-up requests for transfer by phone status and charge type
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
