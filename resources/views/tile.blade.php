<x-dashboard-tile :position="$position">
    <div class="grid grid-rows-auto-1 gap-2 h-full">
        <div
            class="flex items-center justify-center w-10 h-10 rounded-full"
            style="background-color: rgba(255, 255, 255, .9)"
        >
            <div class="text-3xl leading-none -mt-1">
                Fathom
            </div>
        </div>
        <div wire:poll.{{ $refreshIntervalInSeconds }}s class="self-center | divide-y-2">
            <ul>
                @foreach($fathomSites as $site)
                    <li>{{ $site->name }} | {{ $site->current_visitors }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-dashboard-tile>
