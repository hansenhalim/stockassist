<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="md-typescale-title-large">Recipe</div>
            @if (auth()->user()->authable instanceof App\Models\Owner && $recipes?->isNotEmpty())
                <md-icon-button href="{{ route('recipes.create') }}">
                    <md-icon class="material-icons">add</md-icon>
                </md-icon-button>
            @endif
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-28">
        @if ($recipes?->isNotEmpty())
            <md-list>
                @foreach ($recipes as $recipe)
                    <md-list-item href="{{ route('recipes.show', $recipe) }}">
                        <div slot="headline">{{ $recipe->name }}</div>

                        @if ($recipe->photo)
                            <img slot="start" class="rounded-full w-10" src="{{ Storage::url($recipe->photo) }}">
                        @else
                            <img slot="start" class="rounded-full w-10" src="{{ asset('assets/img/no_img.jpg') }}">
                        @endif
                    </md-list-item>
                @endforeach
            </md-list>

            <div class="mt-2">
                {{ $recipes->links() }}
            </div>

            <div id="floatingActionButton" class="px-4 w-full max-w-md fixed bottom-28 left-1/2 -translate-x-1/2">
                <a href="{{ route('release-orders.edit') }}">
                    <md-fab variant="primary" class="absolute right-4 bottom-0">
                        <md-icon slot="icon" class="material-icons-outlined">unarchive</md-icon>
                    </md-fab>
                </a>
            </div>
        @else
            <div class="flex flex-col justify-center items-center my-[35svh]">
                @if ($recipes)
                    <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                        No recipe found
                    </div>
                    @if (auth()->user()->authable instanceof App\Models\Owner)
                        <md-filled-tonal-button href="{{ route('recipes.create') }}" class="mt-2">
                            Create recipe
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
