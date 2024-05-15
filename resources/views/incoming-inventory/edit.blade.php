<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large flex-grow">Incoming</div>
            <md-icon-button href="{{ route('incoming-inventories.index') }}">
                <md-icon class="material-icons">history</md-icon>
            </md-icon-button>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        @if ($incomingInventory->incomingInventoryItems->isEmpty())
            <div class="flex flex-col justify-center items-center my-[37svh]">
                <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                    No item found
                </div>
                <md-filled-tonal-button href="{{ route('incoming-inventory-items.index') }}" class="mt-2">
                    Add item
                    <div slot="icon" class="w-6 h-6">
                        <md-icon class="material-icons">add</md-icon>
                    </div>
                </md-filled-tonal-button>
            </div>
        @else
            <div class="grid grid-cols-2 gap-2.5">
                @foreach ($incomingInventory->incomingInventoryItems as $incomingInventoryItem)
                    <a href="{{ route('incoming-inventory-items.edit', $incomingInventoryItem) }}">
                        <div class="w-full rounded-lg overflow-hidden shadow-md border"
                            style="background-color: var(--md-sys-color-surface-container-low);">
                            @if ($incomingInventoryItem->ingredient->photo)
                                <div class="aspect-square bg-center bg-cover"
                                    style="background-image: url('{{ url('storage/' . $incomingInventoryItem->ingredient->photo) }}');">
                                </div>
                            @else
                                <div class="aspect-square bg-center bg-cover"
                                    style="background-image: url('{{ asset('assets/img/no_img.png') }}');">
                                </div>
                            @endif
                            <div class="p-4">
                                <div class="md-typescale-body-large" style="color: var(--md-sys-color-on-surface);">
                                    {{ $incomingInventoryItem->ingredient->name }}
                                </div>
                                <div class="md-typescale-body-medium"
                                    style="color: var(--md-sys-color-on-surface-variant);">
                                    {{ $incomingInventoryItem->ingredient->description }}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>

    <div class="flex items-center justify-between fixed bottom-0 w-full max-w-md px-4 py-3"
        style="background-color: var(--md-sys-color-surface-container);">
        <md-icon-button href="{{ route('incoming-inventory-items.index') }}">
            <md-icon class="material-icons" style="color: var(--md-sys-color-on-surface);">add</md-icon>
        </md-icon-button>

        <form action="{{ route('incoming-inventories.update') }}" method="post">
            @csrf
            @method('PUT')

            <div onclick="this.parentNode.submit()">
                <md-fab variant="secondary" lowered>
                    <md-icon slot="icon" class="material-icons">check</md-icon>
                </md-fab>
            </div>
        </form>
    </div>
</x-app-layout>
