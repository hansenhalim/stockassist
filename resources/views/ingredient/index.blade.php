<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="md-typescale-title-large">Stock</div>
            @if (auth()->user()->authable instanceof App\Models\Owner && $ingredients?->isNotEmpty())
                <md-icon-button href="{{ route('ingredients.create') }}">
                    <md-icon class="material-icons">add</md-icon>
                </md-icon-button>
            @endif
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-28">
        @if ($ingredients?->isNotEmpty())
            <md-list>
                @foreach ($ingredients as $ingredient)
                    <md-list-item href="{{ route('ingredients.show', $ingredient) }}">
                        <div slot="headline">{{ $ingredient->name }}</div>

                        <div slot="supporting-text">
                            {{ number_format($ingredient->remaining_amount) }}&nbsp;{{ $ingredient->unit_of_measure }}
                        </div>

                        @if ($ingredient->photo)
                            <img slot="start" class="rounded-full w-10" src="{{ Storage::url($ingredient->photo) }}">
                        @else
                            <img slot="start" class="rounded-full w-10" src="assets/img/no_img.jpg">
                        @endif

                        @switch($ingredient->level_status)
                            @case(App\Enums\LevelStatus::OVERSTOCK)
                                <div slot="trailing-supporting-text" class="text-indigo-700">
                                    {{ $ingredient->level_status->display() }}</div>
                            @break

                            @case(App\Enums\LevelStatus::IN_STOCK)
                                <div slot="trailing-supporting-text" class="text-green-700">
                                    {{ $ingredient->level_status->display() }}</div>
                            @break

                            @case(App\Enums\LevelStatus::LOW_STOCK)
                                <div slot="trailing-supporting-text" class="text-yellow-700">
                                    {{ $ingredient->level_status->display() }}</div>
                            @break

                            @case(App\Enums\LevelStatus::CRITICAL)
                                <div slot="trailing-supporting-text" class="text-red-700">
                                    {{ $ingredient->level_status->display() }}</div>
                            @break

                            @default
                                <div slot="trailing-supporting-text" style="color: var(--md-sys-color-outline);">n/a</div>
                        @endswitch
                    </md-list-item>
                @endforeach
            </md-list>

            <div class="mt-2">
                {{ $ingredients->links() }}
            </div>

            <div id="floatingActionButton" class="px-4 w-full max-w-md fixed bottom-28 left-1/2 -translate-x-1/2">
                <a href="{{ route('incoming-inventories.edit') }}">
                    <md-fab variant="primary" class="absolute right-4 bottom-0">
                        <md-icon slot="icon" class="material-icons-outlined">archive</md-icon>
                    </md-fab>
                </a>
            </div>
        @else
            <div class="flex flex-col justify-center items-center my-[35svh]">
                @if ($ingredients)
                    <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                        No stock found
                    </div>
                    @if (auth()->user()->authable instanceof App\Models\Owner)
                        <md-filled-tonal-button href="{{ route('ingredients.create') }}" class="mt-2">
                            Create stock
                            <div slot="icon" class="w-6 h-6">
                                <md-icon class="material-icons">add</md-icon>
                            </div>
                        </md-filled-tonal-button>
                    @endif
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

    <script>
        var prevScrollpos = window.pageYOffset;

        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                floatingActionButton.classList.remove("hidden");
            } else {
                floatingActionButton.classList.add("hidden");
            }
            prevScrollpos = currentScrollPos;
        }
    </script>
</x-app-layout>
