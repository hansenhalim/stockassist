<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large flex-grow">
                Release Items
            </div>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        <md-list>
            @foreach ($releaseOrder->releaseOrderItems as $releaseOrderItem)
                <md-list-item>
                    <div slot="headline">{{ $releaseOrderItem->recipe_name }}</div>

                    @if ($releaseOrderItem->recipe_photo)
                        <img slot="start" style="width: 56px" class="rounded-md"
                            src="{{ Storage::url($releaseOrderItem->recipe_photo) }}">
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
    </div>
</x-app-layout>
