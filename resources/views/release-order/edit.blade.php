<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button href="{{ route('recipes.index') }}" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large flex-grow">Release</div>
            <md-icon-button href="{{ route('release-orders.index') }}">
                <md-icon class="material-icons">history</md-icon>
            </md-icon-button>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        @if ($releaseOrder->releaseOrderItems->isEmpty())
            <div class="flex flex-col justify-center items-center my-[37svh]">
                <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                    No item found
                </div>
                <md-filled-tonal-button href="{{ route('release-order-items.index') }}" class="mt-2">
                    Add item
                    <div slot="icon" class="w-6 h-6">
                        <md-icon class="material-icons">add</md-icon>
                    </div>
                </md-filled-tonal-button>
            </div>
        @else
            <md-list>
                @foreach ($releaseOrder->releaseOrderItems as $releaseOrderItem)
                    <md-list-item href="{{ route('release-order-items.edit', $releaseOrderItem) }}">
                        <div slot="headline">{{ $releaseOrderItem->recipe->name }}</div>

                        @if ($releaseOrderItem->recipe->photo)
                            <img slot="start" style="width: 56px" class="rounded-md"
                                src="{{ Storage::url($releaseOrderItem->recipe->photo) }}">
                        @else
                            <img slot="start" style="width: 56px" class="rounded-md"
                                src="{{ asset('assets/img/no_img.jpg') }}">
                        @endif

                        <div slot="trailing-supporting-text">
                            {{ $releaseOrderItem->quantity }}&nbsp;pcs
                        </div>
                    </md-list-item>
                @endforeach
            </md-list>
        @endif
    </div>

    <div class="flex items-center justify-between fixed bottom-0 w-full max-w-md px-4 py-3"
        style="background-color: var(--md-sys-color-surface-container);">
        <md-icon-button href="{{ route('release-order-items.index') }}">
            <md-icon class="material-icons" style="color: var(--md-sys-color-on-surface);">add</md-icon>
        </md-icon-button>

        @unless ($releaseOrder->releaseOrderItems->isEmpty())
            <div class="flex-grow">
                <form action="{{ route('release-orders.destroy', $releaseOrder) }}" method="post">
                    @csrf
                    @method('DELETE')

                    <md-icon-button>
                        <md-icon class="material-icons-outlined"
                            style="color: var(--md-sys-color-on-surface);">delete</md-icon>
                    </md-icon-button>
                </form>
            </div>
        @endunless

        <form id="confirmForm" action="{{ route('release-orders.update') }}" method="post">
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
