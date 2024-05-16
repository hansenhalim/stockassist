<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="md-typescale-title-large">Recipe</div>
            @if (auth()->user()->authable instanceof App\Models\Owner)
                @unless ($recipes->isEmpty())
                    <md-icon-button href="{{ route('recipes.create') }}">
                        <md-icon class="material-icons">add</md-icon>
                    </md-icon-button>
                @endunless
            @endif
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-24">
        @if ($recipes->isEmpty())
            <div class="flex flex-col justify-center items-center my-[35svh]">
                <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                    No recipe found
                </div>
                <md-filled-tonal-button href="{{ route('recipes.create') }}" class="mt-2">
                    Create recipe
                    <div slot="icon" class="w-6 h-6">
                        <md-icon class="material-icons">add</md-icon>
                    </div>
                </md-filled-tonal-button>
            </div>
        @else
            <md-list>
                @foreach ($recipes as $recipe)
                    <md-list-item href="{{ route('recipes.show', $recipe) }}">
                        <div slot="headline">
                            {{ $recipe->name }}
                        </div>

                        @if ($recipe->photo)
                            <img slot="start" style="width: 56px" class="rounded-md"
                                src="{{ url('storage/' . $recipe->photo) }}">
                        @else
                            <img slot="start" style="width: 56px" class="rounded-md"
                                src="{{ asset('assets/img/no_img.png') }}">
                        @endif
                    </md-list-item>
                @endforeach
            </md-list>
        @endif

        @unless ($recipes->isEmpty())
            <a href="{{ route('home') }}">
                <md-fab label="Release" variant="primary" class="fixed bottom-28 right-4">
                    <md-icon slot="icon" class="material-icons-outlined">unarchive</md-icon>
                </md-fab>
            </a>
        @endunless
    </div>
</x-app-layout>
