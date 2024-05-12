<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="md-typescale-title-large">Recipe</div>
            <md-icon-button href="{{ route('recipes.create') }}">
                <md-icon class="material-icons">add</md-icon>
            </md-icon-button>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-24">
        @if ($recipes->isEmpty())
            <md-outlined-button href="{{ route('recipes.create') }}">
                Create Recipe
                <div slot="icon" class="w-6 h-6">
                    <md-icon class="material-icons">add</md-icon>
                </div>
            </md-outlined-button>
        @else
            <md-list>
                @foreach ($recipes as $recipe)
                    <md-list-item href="{{ route('recipes.show', $recipe) }}">
                        {{ $recipe->name }}
                        @if ($recipe->photo)
                            <img slot="start" style="width: 56px" src="{{ url('storage/' . $recipe->photo) }}">
                        @else
                            <img slot="start" style="width: 56px" src="{{ asset('assets/img/no_img.png') }}">
                        @endif
                    </md-list-item>
                    @if (!$loop->last)
                        <md-divider></md-divider>
                    @endif
                @endforeach
            </md-list>
        @endif

        <a href="{{ route('home') }}">
            <md-fab label="Release" variant="primary" class="fixed bottom-24 right-4">
                <md-icon slot="icon" class="material-icons-outlined">unarchive</md-icon>
            </md-fab>
        </a>
    </div>
</x-app-layout>
