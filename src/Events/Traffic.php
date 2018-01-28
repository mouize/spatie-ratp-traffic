<?php

namespace RatpTraffic\Events;

use App\Events\DashboardEvent;

class Traffic extends DashboardEvent
{
    /** @var array */
    public $traffics;

    public function __construct(array $traffics)
    {
        $this->traffics = $traffics;
    }
}
