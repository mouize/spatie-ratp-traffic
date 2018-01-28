<?php

namespace TrafficRatp\Events;

use App\Events\DashboardEvent;

class Traffic extends DashboardEvent
{
    /** @var array */
    public $traffic;

    public function __construct(array $traffics)
    {
        $this->traffics = $traffics;
    }
}
