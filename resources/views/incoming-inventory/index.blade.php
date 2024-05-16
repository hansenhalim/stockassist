<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">Incoming History</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4">
        @if ($incomingInventoriesGroups->isEmpty())
            <div class="flex flex-col justify-center items-center my-[40svh]">
                <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                    History is empty
                </div>
            </div>
        @else
            @foreach ($incomingInventoriesGroups as $group => $incomingInventories)
                <md-list>
                    <div class="md-typescale-title-small">{{ $group }}</div>
                    @foreach ($incomingInventories as $incomingInventory)
                        <md-list-item href="{{ route('incoming-inventories.show', $incomingInventory) }}">
                            <div class="md-typescale-body-medium">
                                {{ $incomingInventory->incomingInventoryItems()->count() }} Items
                            </div>
                            <md-icon slot="start" class="material-icons-outlined">archive</md-icon>
                            <div slot="trailing-supporting-text">
                                {{ $incomingInventory->finalized_at->timezone('Asia/Jakarta')->format('g:i A') }}</div>
                        </md-list-item>
                    @endforeach
                </md-list>
            @endforeach
        @endif
    </div>
</x-app-layout>
