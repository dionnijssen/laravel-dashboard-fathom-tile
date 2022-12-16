<?php

namespace Creacoon\FathomTile;

use Based\Fathom\Fathom;
use Illuminate\Console\Command;

class FetchDataFromFathomCommand extends Command
{
    protected $signature = 'dashboard:fetch-data-from-fathom-api';

    protected $description = 'Fetch data for fathom tile';

    public function handle()
    {
        $fathomClient = new Fathom(config('dashboard.tiles.fathom.api_token'));
        $siteData = collect();

        do {
            $siteCollection = $fathomClient->sites()->get(100, isset($siteId));

            foreach ($siteCollection as $site) {
                $currentVisitors = $fathomClient->sites()->getCurrentVisitors($site->id);

                $siteData->push([
                    'name' => $site->name,
                    'current_visitors' => $currentVisitors->total,
                ]);
            }

        } while ($siteCollection->last()?->id ?? false);


        FathomTileStore::make()->setData($siteData->toArray());
        $this->info('All done!');
    }
}
