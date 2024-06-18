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
                            <img slot="start" class="rounded-full w-10"
                                src="{{ Storage::url($incomingInventoryItem->ingredient->photo) }}">
                        @else
                            <img slot="start" class="rounded-full w-10" src="assets/img/no_img.jpg">
                        @endif

                        <div slot="trailing-supporting-text">
                            &plus;{{ number_format($incomingInventoryItem->quantity) }}&nbsp;{{ $incomingInventoryItem->ingredient->unit_of_measure }}
                        </div>
                    </md-list-item>
                @endforeach
            </md-list>

            <div id="formModal" class="hidden">
                <div class="bg-black bg-opacity-50 absolute top-0 left-0 w-full h-full flex items-center z-10 px-4">
                    <div class="bg-white p-6 rounded-3xl w-full">
                        <form id="confirmForm" action="{{ route('confirm-incoming') }}" method="post">
                            @csrf

                            <div class="md-typescale-headline-small">Expected At</div>
                            <input required type="date" name="expected_at" id="expectedAt"
                                class="w-full border-2 p-2 rounded mt-4">

                            <div class="flex justify-end mt-6">
                                <md-text-button type="button" onclick="formModal.classList.add('hidden')">
                                    Cancel
                                </md-text-button>
                                <md-text-button>Confirm</md-text-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    </div>

    @if ($incomingInventory->incomingInventoryItems->isNotEmpty())
        <div class="flex items-center justify-end fixed bottom-0 w-full max-w-md px-4 py-3"
            style="background-color: var(--md-sys-color-surface-container);">
            <md-icon-button href="{{ route('incoming-inventory-items.index') }}">
                <md-icon class="material-icons" style="color: var(--md-sys-color-on-surface);">add</md-icon>
            </md-icon-button>

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

            <div onclick="formModal.classList.remove('hidden')">
                <md-fab variant="secondary" lowered>
                    <md-icon slot="icon" class="material-icons">check</md-icon>
                </md-fab>
            </div>
        </div>
    @endif

    <script>
        const date = new Date();
        expectedAt.min = new Date(date.getTime() - (date.getTimezoneOffset() * 60000))
            .toISOString()
            .slice(0, 10);
    </script>
</x-app-layout>
