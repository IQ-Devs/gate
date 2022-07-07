<?php

namespace App\Jobs;

use App\Authcore;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use phpDocumentor\Reflection\DocBlock\Tags\Author;

class PhoneTokenRenew implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $phonenumber;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Authcore $phonenumber =null)
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
        foreach (Authcore::all() as $phonenumber){


        // condition for expired / not working token  phones with queue time
            if (!$phonenumber->checkToken()){
//                $phonenumber->RefreshToken(); // here maybe we change it to queue and execute one after one at line 49
            }

        }
        }else{
            $this->phonenumber->RefreshToken();
        }
    }
}
