<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">{{ $recipe->name }}</div>
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

        <div class="flex justify-between items-center mt-4">
            <div class="md-typescale-title-large">{{ $recipe->name }}</div>
            <div class="md-typescale-label-large">
                {{ $recipe->remaining_amount }}&nbsp;{{ $recipe->unit_of_measure }}</div>
        </div>

        <div class="md-typescale-body-medium mt-1">{{ $recipe->description ?? 'No description' }}</div>

        <div class="md-typescale-label-large mt-4">Ingredients</div>

        <ul class="list-disc ml-4">
            @forelse($recipe->ingredients as $ingredient)
                <li class="md-typescale-body-medium">
                    {{ $ingredient->pivot->quantity }}&nbsp;{{ $ingredient->unit_of_measure }}&nbsp;<span
                        class="lowercase">{{ $ingredient->name }}</span></li>
            @empty
                <p>No ingredients</p>
            @endforelse
        </ul>

        <div class="flex justify-between mt-8">
            <md-outlined-button type="button" onclick="history.back()">Back</md-outlined-button>
            @if (auth()->user()->authenticable instanceof App\Models\Owner)
                <div class="flex">
                    <form action="{{ route('recipes.destroy', $recipe) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <md-text-button>Delete</md-text-button>
                    </form>
                    <md-filled-button href="{{ route('recipes.edit', $recipe) }}"
                        class="ms-1">Edit</md-filled-button>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
