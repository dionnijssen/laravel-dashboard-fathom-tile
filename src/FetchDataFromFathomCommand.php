<?php

namespace Creacoon\FathomTile;

use Based\Fathom\Fathom;
use Illuminate\Console\Command;

class FetchDataFromFathomCommand extends Command
{
    protected $signature = 'dashboard:fetch-data-from-fathom-api';

    protected $description = 'Fetch data for fahtom tile';

    public function handle()
    {
        $fathomClient = new Fathom(config('dashboard.tiles.fathom.api_token'));

        $sites = $this->getSites($fathomClient);

        $siteData = collect();
//        $lastPage = $response->meta->last_page;


        foreach ($sites as $site) {
            $respone = json_decode($fathomClient->reports()->get($site['data']['site_id']));

            // TODO: Collect correct data
            $siteData->push([
                'site_url' => '',
                'current_visitors' => '',
            ]);
        }

        $this->info('All done!');
    }

    private function getSites(Fathom $client)
    {
        $response = json_decode($client->sites()->get(100, true));

        return $response;
    }
}
