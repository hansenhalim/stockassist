<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button href="{{ route('ingredients.index') }}" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large flex-grow">Incoming</div>
            <md-icon-button href="{{ route('incoming-inventories.index') }}">
                <md-icon class="material-icons">history</md-icon>
            </md-icon-button>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-24">
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
            <md-list>
                @foreach ($incomingInventory->incomingInventoryItems as $incomingInventoryItem)
                    <md-list-item href="{{ route('incoming-inventory-items.edit', $incomingInventoryItem) }}">
                        <div slot="headline">{{ $incomingInventoryItem->ingredient->name }}</div>

                        @if ($incomingInventoryItem->ingredient->photo)
                            <img slot="start" style="width: 56px" class="rounded-md"
                                src="{{ Storage::url($incomingInventoryItem->ingredient->photo) }}">
                        @else
                            <img slot="start" style="width: 56px" class="rounded-md"
                                src="{{ asset('assets/img/no_img.jpg') }}">
                        @endif

                        <div slot="trailing-supporting-text">
                            &plus;{{ $incomingInventoryItem->quantity }}&nbsp;{{ $incomingInventoryItem->ingredient->unit_of_measure }}
                        </div>
                    </md-list-item>
                @endforeach
            </md-list>

            @error('expected_at')
                <div class="flex mt-4 gap-4 items-center">
                    <label for="expected_at" class="md-typescale-label-medium">Expected At</label>
                    <input type="date" name="expected_at" id="expectedAt" form="confirmForm" class="border flex-grow"
                        style="border-color: var(--md-sys-color-error);">
                </div>
                <span class="md-typescale-body-medium" style="color: var(--md-sys-color-error);">{{ $message }}</span>
            @else
                <div class="flex mt-4 gap-4 items-center">
                    <label for="expected_at" class="md-typescale-label-medium">Expected At</label>
                    <input type="date" name="expected_at" id="expectedAt" form="confirmForm" class="border flex-grow">
                </div>
            @enderror
        @endif
    </div>

    <div class="flex items-center justify-between fixed bottom-0 w-full max-w-md px-4 py-3"
        style="background-color: var(--md-sys-color-surface-container);">
        <md-icon-button href="{{ route('incoming-inventory-items.index') }}">
            <md-icon class="material-icons" style="color: var(--md-sys-color-on-surface);">add</md-icon>
        </md-icon-button>

        @unless ($incomingInventory->incomingInventoryItems->isEmpty())
            <div class="flex-grow">
                <form action="{{ route('incoming-inventories.destroy', $incomingInventory) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <md-icon-button>
                        <md-icon class="material-icons-outlined"
                            style="color: var(--md-sys-color-on-surface);">delete</md-icon>
                    </md-icon-button>
                </form>
            </div>
        @endunless

        <form id="confirmForm" action="{{ route('confirm-incoming') }}" method="post">
            @csrf

            <div onclick="this.parentNode.submit()">
                <md-fab variant="secondary" lowered>
                    <md-icon slot="icon" class="material-icons">check</md-icon>
                </md-fab>
            </div>
        </form>
    </div>

    <script>
        const date = new Date();
        expectedAt.min = new Date(date.getTime() - (date.getTimezoneOffset() * 60000))
            .toISOString()
            .slice(0, 10);
    </script>
</x-app-layout>
