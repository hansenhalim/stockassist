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
                    <md-list-item>
                        <div slot="headline">{{ $incomingInventoryItem->ingredient_name }}</div>

                        @if ($incomingInventoryItem->ingredient_photo)
                            <img slot="start" style="width: 56px" class="rounded-md"
                                src="{{ Storage::url($incomingInventoryItem->ingredient_photo) }}">
                        @else
                            <img slot="start" style="width: 56px" class="rounded-md"
                                src="{{ asset('assets/img/no_img.jpg') }}">
                        @endif

                        <div slot="trailing-supporting-text">
                            &plus;{{ $incomingInventoryItem->quantity }}&nbsp;{{ $incomingInventoryItem->ingredient_unit_of_measure }}
                        </div>
                    </md-list-item>
                @endforeach
            </md-list>
        @endif
    </div>
</x-app-layout>
