<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large flex-grow">{{ $recipe->name }}</div>
            <md-icon-button href="#">
                <md-icon class="material-icons">add_shopping_cart</md-icon>
            </md-icon-button>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        <div class="rounded-3xl shadow-md overflow-hidden">
            @if ($recipe->photo)
                <div class="h-56 bg-center bg-cover"
                    style="background-image: url('{{ url('storage/' . $recipe->photo) }}');">
                </div>
            @else
                <div class="h-56 bg-center bg-cover"
                    style="background-image: url('{{ asset('assets/img/no_img.png') }}');">
                </div>
            @endif
        </div>

        <div class="mt-4">
            <div class="md-typescale-title-medium">{{ $recipe->name }}</div>
        </div>

        <div class="md-typescale-body-medium mt-2">{{ $recipe->description ?? 'No description' }}</div>

        @if ($recipe->ingredients->isEmpty())
            <p class="md-typescale-body-large mt-4" style="color: var(--md-sys-color-outline);">No ingredients</p>
        @else
            <div class="md-typescale-label-large mt-4">Ingredients</div>
            <ul class="list-disc ml-4">
                @foreach ($recipe->ingredients as $ingredient)
                    <li class="md-typescale-body-medium">
                        {{ $ingredient->pivot->quantity }}&nbsp;{{ $ingredient->unit_of_measure }}&nbsp;<span
                            class="lowercase">{{ $ingredient->name }}</span></li>
                @endforeach
            </ul>
        @endif

        <div class="flex justify-between mt-8">
            <md-outlined-button type="button" onclick="history.back()">Back</md-outlined-button>
            @if (auth()->user()->authable instanceof App\Models\Owner)
                <div class="flex">
                    <form action="{{ route('recipes.destroy', $recipe) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <md-text-button>Delete</md-text-button>
                    </form>
                    <md-filled-button href="{{ route('recipes.edit', $recipe) }}" class="ms-1">Edit</md-filled-button>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
