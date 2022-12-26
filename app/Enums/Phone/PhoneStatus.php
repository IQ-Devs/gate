<?php

namespace App\Enums\Phone;

enum PhoneStatus: string
{
    case Active = 'active';
    case Disabled = 'disabled';
    case Deleted = 'deleted';
    case Busy = 'busy';
}
