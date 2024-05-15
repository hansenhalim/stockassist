<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="md-typescale-title-large">Stock</div>
            @if (auth()->user()->authable instanceof App\Models\Owner)
                @unless ($ingredients->isEmpty())
                    <md-icon-button href="{{ route('ingredients.create') }}">
                        <md-icon class="material-icons">add</md-icon>
                    </md-icon-button>
                @endunless
            @endif
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-24">
        @if ($ingredients->isEmpty())
            <div class="flex flex-col justify-center items-center h-[70svh]">
                <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                    No stock found
                </div>
                <md-filled-tonal-button href="{{ route('ingredients.create') }}" class="mt-4">
                    Create stock
                    <div slot="icon" class="w-6 h-6">
                        <md-icon class="material-icons">add</md-icon>
                    </div>
                </md-filled-tonal-button>
            </div>
        @else
            <md-list>
                @foreach ($ingredients as $ingredient)
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

        <a href="{{ route('incoming-inventories.edit') }}">
            <md-fab label="Incoming" variant="primary" class="fixed bottom-28 right-4">
                <md-icon slot="icon" class="material-icons-outlined">archive</md-icon>
            </md-fab>
        </a>
    </div>
</x-app-layout>
