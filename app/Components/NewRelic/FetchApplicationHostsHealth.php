<?php

namespace App\Components\NewRelic;

use App\Components\NewRelic\Events\ApplicationHostsHealthFetched;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Arr;

class FetchApplicationHostsHealth extends Command
{
    protected $signature = 'dashboard:newrelic:hosts-health';
    protected $description = 'Load health of hosts of a specific application';


    public function handle()
    {
        $apiKey = config('new-relic.api_key');
        $applicationId = config('new-relic.application_id');

        $responseBody = (new Client())
            ->get("https://api.newrelic.com/v2/applications/$applicationId/hosts.json", [
                'headers' => [
                    'X-Api-Key' => $apiKey
                ]
            ])
            ->getBody();

        $hosts = Arr::get(json_decode($responseBody, true), 'application_hosts', []);

        event(new ApplicationHostsHealthFetched($hosts));
    }
}
