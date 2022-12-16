<?php

namespace Creacoon\FathomTile;

use Illuminate\Support\ServiceProvider;
use Livewire\Livewire;

class FathomTileServiceProvider extends ServiceProvider
{
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                FetchDataFromFathomCommand::class,
            ]);
        }

        $this->publishes([
            __DIR__ . '/../resources/views' => resource_path('views/vendor/dashboard-fathom-tile'),
        ], 'dashboard-fathom-tile-views');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'dashboard-fathom-tile');

        Livewire::component('fathom-tile', FathomTileComponent::class);
    }
}
