<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">Release History</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4">
        @if ($releaseOrdersGroups->isEmpty())
            <div class="flex flex-col justify-center items-center my-[40svh]">
                <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                    History is empty
                </div>
            </div>
        @else
            @foreach ($releaseOrdersGroups as $group => $releaseOrders)
                <md-list>
                    <div class="md-typescale-title-small">{{ $group }}</div>

                    @foreach ($releaseOrders as $releaseOrder)
                        <md-list-item href="{{ route('release-orders.show', $releaseOrder) }}">
                            <div class="md-typescale-label-small">
                                {{ $releaseOrder->finalized_at->timezone('Asia/Jakarta')->format('g:i A') }}
                            </div>

                            <md-icon slot="start" class="material-icons-outlined">archive</md-icon>

                            <div slot="supporting-text" class="line-clamp-2">
                                {{ $releaseOrder->supporting_text }}
                            </div>

                            <div slot="trailing-supporting-text">
                                {{ $releaseOrder->release_order_items_count }} items
                            </div>
                        </md-list-item>
                    @endforeach
                </md-list>
            @endforeach
        @endif
    </div>
</x-app-layout>
