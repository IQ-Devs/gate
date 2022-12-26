<?php

namespace App\Enums\Phone;


enum ChargeTransactionStatus: string
{
    case Completed = 'completed';
    case Pending = 'pending';
    case Rejected = 'rejected';
    case Timeout = 'timeout';

}
