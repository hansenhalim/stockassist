<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">Incoming History</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-24">
        @if ($incomingInventories->isEmpty())
            <div class="flex flex-col justify-center items-center h-[70svh]">
                <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                    History is empty
                </div>
            </div>
        @else
            <md-list>
                @foreach ($incomingInventories as $ingredient)
                    <md-list-item href="{{ route('ingredients.show', $ingredient) }}">
                        {{ $ingredient->name }}
                        @if ($ingredient->photo)
                            <img slot="start" style="width: 56px" src="{{ url('storage/' . $ingredient->photo) }}">
                        @else
                            <img slot="start" style="width: 56px" src="{{ asset('assets/img/no_img.png') }}">
                        @endif
                    </md-list-item>
                @endforeach
            </md-list>
        @endif
    </div>
</x-app-layout>
