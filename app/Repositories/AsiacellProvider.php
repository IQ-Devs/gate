<?php

namespace App\Repositories;

use App\Interfaces\CellProviderInterface;
use App\Models\Authcore;

class AsiacellProvider implements CellProviderInterface
{
    private Authcore $authcore;
    public function __construct(Authcore $authcore)
    {
        $this->authcore=$authcore;
    }

    public function balance()
    {

    }
}
