<?php

namespace Creacoon\FathomTile;

use Livewire\Component;

class FathomTileComponent extends Component
{
    public $position;


    public function mount(string $position)
    {
        $this->position = $position;
    }


    public function render()
    {
        return view('dashboard-fathom-tile::tile', [
            'fathomData' => FathomTileStore::make()->getData(),
            'refreshIntervalInSeconds' => config('dashboard.tiles.skeleton.refresh_interval_in_seconds') ?? 60,
        ]);
    }
}
