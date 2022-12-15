<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class PendingCardSolverJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

//I'm using same class for the tasks scheduler and queue
// be sure of the translation type card
// TO-Do
// check pending card log  by the model and assign them to queue

    public function __construct()
    {
    }

    public function handle()
    {
    }
}
