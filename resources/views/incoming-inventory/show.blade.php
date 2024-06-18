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

    <div class="mx-auto px-4 mb-24">
        <md-list>
            @foreach ($incomingInventory->incomingInventoryItems as $incomingInventoryItem)
                <md-list-item>
                    <div slot="headline">{{ $incomingInventoryItem->ingredient_name }}</div>

                    @unless ($incomingInventory->fulfilled_at)
                        <div slot="supporting-text">
                            {{ $incomingInventoryItem->ingredient->remaining_amount }}&nbsp;{{ $incomingInventoryItem->ingredient_unit_of_measure }}
                        </div>
                    @endunless

                    @if ($incomingInventoryItem->ingredient_photo)
                        <img slot="start" class="rounded-full w-10"
                            src="{{ Storage::url($incomingInventoryItem->ingredient_photo) }}">
                    @else
                        <img slot="start" class="rounded-full w-10" src="assets/img/no_img.jpg">
                    @endif

                    <div slot="trailing-supporting-text" style="color: var(--md-sys-color-primary);">
                        &plus;{{ number_format($incomingInventoryItem->quantity) }}&nbsp;{{ $incomingInventoryItem->ingredient_unit_of_measure }}
                    </div>
                </md-list-item>
            @endforeach
        </md-list>
    </div>

    @unless ($incomingInventory->fulfilled_at)
        <div class="flex items-center justify-end fixed bottom-0 w-full max-w-md px-4 py-3"
            style="background-color: var(--md-sys-color-surface-container);">
            <form action="{{ route('incoming-inventories.update', $incomingInventory) }}" method="post">
                @csrf
                @method('PUT')

                <div onclick="this.parentNode.submit()">
                    <md-fab variant="secondary" lowered>
                        <md-icon slot="icon" class="material-icons">check</md-icon>
                    </md-fab>
                </div>
            </form>
        </div>
    @endunless
</x-app-layout>
