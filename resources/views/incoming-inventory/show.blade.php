<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large flex-grow">
                Incoming Items
            </div>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        @if ($incomingInventory->incomingInventoryItems->isEmpty())
            <div class="flex flex-col justify-center items-center my-[37svh]">
                <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                    No item found
                </div>
            </div>
        @else
            <md-list>
                @foreach ($incomingInventory->incomingInventoryItems as $incomingInventoryItem)
                    <md-list-item href="{{ route('incoming-inventory-items.edit', $incomingInventoryItem) }}">
                        {{ $incomingInventoryItem->ingredient->name }}
                        @if ($incomingInventoryItem->ingredient->photo)
                            <img slot="start" style="width: 56px"
                                src="{{ url('storage/' . $incomingInventoryItem->ingredient->photo) }}">
                        @else
                            <img slot="start" style="width: 56px" src="{{ asset('assets/img/no_img.png') }}">
                        @endif
                        <div slot="trailing-supporting-text">
                            {{ $incomingInventoryItem->quantity }}&nbsp;{{ $incomingInventoryItem->ingredient->unit_of_measure }}
                        </div>
                    </md-list-item>
                @endforeach
            </md-list>
        @endif
    </div>
</x-app-layout>
