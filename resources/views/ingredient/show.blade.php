<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">{{ $ingredient->name }}</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4">
        <div class="rounded-3xl shadow-md overflow-hidden">
            @if ($ingredient->photo)
                <div class="h-56 bg-center" style="background-image: url('{{ url('storage/' . $ingredient->photo) }}');">
                </div>
            @else
                <div class="h-56 bg-center" style="background-image: url('{{ asset('assets/img/no_img.png') }}');">
                </div>
            @endif
        </div>

        <div class="flex justify-between items-center mt-4">
            <div class="md-typescale-headline-medium">{{ $ingredient->name }}</div>
            <div class="md-typescale-label-large">
                {{ $ingredient->remaining_amount }}&nbsp;{{ $ingredient->unit_of_measure }}</div>
        </div>

        <div class="md-typescale-body-medium mt-1">{{ $ingredient->description ?? 'No description' }}</div>

        <div class="flex justify-between mt-4">
            <md-outlined-button href="{{ route('ingredients.edit', $ingredient) }}">Back</md-outlined-button>
            <div class="flex">
                <form action="{{ route('ingredients.destroy', $ingredient) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <md-text-button>Delete</md-text-button>
                </form>
                <md-filled-button href="{{ route('ingredients.edit', $ingredient) }}"
                    class="ms-1">Edit</md-filled-button>
            </div>
        </div>
    </div>
</x-app-layout>
