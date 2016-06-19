<?php

namespace App\Components\NewRelic\Events;

use App\Components\DashboardEvent;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

class ApplicationHostsHealthFetched extends DashboardEvent
{
    /**
     * @var array
     */
    public $hosts;

    /**
     * @var string
     */
    public $application;

    public function __construct(array $hosts)
    {
        $this->hosts = $hosts;
        $this->application = Arr::get($hosts, '0.application_name');
    }
}
