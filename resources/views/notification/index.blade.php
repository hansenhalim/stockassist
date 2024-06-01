<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">Notification</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        @if ($notifications?->isNotEmpty())
            <md-list>
                @foreach ($notifications as $notification)
                    <md-list-item href="#">
                        <div slot="headline">{{ $notification->data['ingredient_id'] }}</div>

                        <md-icon slot="start" class="material-icons">warning</md-icon>
                    </md-list-item>
                @endforeach
            </md-list>
        @else
            <div class="flex flex-col justify-center items-center my-[40svh]">
                @if ($notifications)
                    <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                        Notification is empty
                    </div>
                @else
                    <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                        You don't have a store
                    </div>
                    <md-filled-tonal-button href="{{ route('shops.create') }}" class="mt-2">
                        Create store
                        <div slot="icon" class="w-6 h-6">
                            <md-icon class="material-icons">add</md-icon>
                        </div>
                    </md-filled-tonal-button>
                @endif
            </div>
        @endif
    </div>
</x-app-layout>