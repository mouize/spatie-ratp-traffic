<?php

namespace RatpTraffic\Console\Ratp;

use GuzzleHttp\Client;
use Illuminate\Console\Command;
use TrafficRatp\Events\Traffic as EventTraffic;

/**
 * Get the Ratp metro and RER traffic (real time)
 *
 * Class Traffic
 * @package App\Console\Components\Ratp
 */
class Traffic extends Command
{
    protected $signature = 'dashboard:ratp-traffic';

    protected $description = 'Get the current RATP traffic for metro and RER';

    public function handle()
    {
        $requestUri = 'https://api-ratp.pierre-grimaud.fr/v3/traffic?_format=json';

        $client = new Client();
        $result = $client->get($requestUri);

        $traffics = json_decode($result->getBody()->getContents(), true)['result'];

        foreach($traffics as $transporter => $statuses) {
            switch($transporter) {
                case 'metros':
                    $prefix = 'M';
                    break;
                case 'rers':
                    $prefix = 'RER ';
                    break;
                default:
                    $prefix = 'T';
            }

            foreach($statuses as $key => $status) {
                $traffics[$transporter][$key]['icon'] = sprintf('images/ratp/%s%s.png', $prefix, $status['line']);
            }
        }

        event(new EventTraffic($traffics));
    }
}
