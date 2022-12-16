<?php

namespace Creacoon\FathomTile;

use Spatie\Dashboard\Models\Tile;

class FathomTileStore
{
    private Tile $tile;

    public static function make()
    {
        return new static();
    }

    public function __construct()
    {
        $this->tile = Tile::firstOrCreateForName("fathomData");
    }

    public function setData(array $data): self
    {
        $this->tile->putData('fathomData', $data);

        return $this;
    }

    public function getData(): array
    {
        return$this->tile->getData('fathomData') ?? [];
    }
}
