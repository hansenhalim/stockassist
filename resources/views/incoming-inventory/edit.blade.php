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
        <div class="flex flex-col justify-center items-center h-[74svh]">
            <div class="md-typescale-headline-medium" style="color: var(--md-sys-color-on-primary-container);">
                No item found
            </div>
            <md-filled-tonal-button href="{{ route('shops.create') }}" class="mt-4">
                Add item
                <div slot="icon" class="w-6 h-6">
                    <md-icon class="material-icons">add</md-icon>
                </div>
            </md-filled-tonal-button>
        </div>
    </div>

    <div class="flex items-center justify-between fixed bottom-0 w-full max-w-md px-4 py-3"
        style="background-color: var(--md-sys-color-surface-container);">
        <md-icon-button href="{{ route('incoming-inventory-items.index') }}">
            <md-icon class="material-icons" style="color: var(--md-sys-color-on-surface);">add</md-icon>
        </md-icon-button>

        <form action="{{ route('incoming-inventories.update') }}" method="post">
            @csrf
            @method('PUT')

            <button type="submit">
                <md-fab variant="secondary" lowered>
                    <md-icon slot="icon" class="material-icons">check</md-icon>
                </md-fab>
            </button>
        </form>
    </div>
</x-app-layout>
