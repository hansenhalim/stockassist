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
        <md-tabs onchange="switchTab(event)">
            <md-primary-tab>Pending</md-primary-tab>
            <md-primary-tab>Completed</md-primary-tab>
        </md-tabs>

        <div id="firstTab" class="mt-2">
            @if ($pendingIncomingInventoriesGroups->isEmpty())
                <div class="flex flex-col justify-center items-center my-[40svh]">
                    <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                        No pending history
                    </div>
                </div>
            @else
                @foreach ($pendingIncomingInventoriesGroups as $group => $incomingInventories)
                    <md-list>
                        <div class="md-typescale-title-small">{{ $group }}</div>

                        @foreach ($incomingInventories as $incomingInventory)
                            <md-list-item href="{{ route('incoming-inventories.show', $incomingInventory) }}">
                                <div class="md-typescale-label-small">
                                    {{ $incomingInventory->expected_at->timezone('Asia/Jakarta')->format('g:i A') }}
                                </div>

                                <md-icon slot="start" class="material-icons-outlined">archive</md-icon>

                                <div slot="supporting-text" class="line-clamp-2">
                                    {{ $incomingInventory->supporting_text }}
                                </div>

                                <div slot="trailing-supporting-text">
                                    {{ $incomingInventory->incoming_inventory_items_count }} items
                                </div>
                            </md-list-item>
                        @endforeach
                    </md-list>
                @endforeach
            @endif
        </div>

        <div id="secondTab" class="mt-2 hidden">
            @if ($completedIncomingInventoriesGroups->isEmpty())
                <div class="flex flex-col justify-center items-center my-[40svh]">
                    <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                        History is empty
                    </div>
                </div>
            @else
                @foreach ($completedIncomingInventoriesGroups as $group => $incomingInventories)
                    <md-list>
                        <div class="md-typescale-title-small">{{ $group }}</div>

                        @foreach ($incomingInventories as $incomingInventory)
                            <md-list-item href="{{ route('incoming-inventories.show', $incomingInventory) }}">
                                <div class="md-typescale-label-small">
                                    {{ $incomingInventory->fulfilled_at->timezone('Asia/Jakarta')->format('g:i A') }}
                                </div>

                                <md-icon slot="start" class="material-icons-outlined">archive</md-icon>

                                <div slot="supporting-text" class="line-clamp-2">
                                    {{ $incomingInventory->supporting_text }}
                                </div>

                                <div slot="trailing-supporting-text">
                                    {{ $incomingInventory->incoming_inventory_items_count }} items
                                </div>
                            </md-list-item>
                        @endforeach
                    </md-list>
                @endforeach
            @endif
        </div>
    </div>

    <script>
        const switchTab = (e) => {
            if (e.target.activeTabIndex === 0) {
                firstTab.classList.remove('hidden');
                secondTab.classList.add('hidden');
            } else if (e.target.activeTabIndex === 1) {
                firstTab.classList.add('hidden');
                secondTab.classList.remove('hidden');
            }
        }
    </script>
</x-app-layout>
