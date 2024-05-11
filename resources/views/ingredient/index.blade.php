<x-app-layout>
    <div class="mx-auto px-4 py-6 mb-16">
        <a class="border" href="{{ route('ingredients.create') }}">Create Ingredient</a>

        @if ($ingredients->isEmpty())
            <md-outlined-button href="{{ route('ingredients.create') }}">
                Create Ingredient
                <svg slot="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                    class="w-5 h-5">
                    <path
                        d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
                </svg>
            </md-outlined-button>
        @else
            <md-list style="max-width: 300px;">
                @foreach ($ingredients as $ingredient)
                    <md-list-item href="{{ route('ingredients.show', $ingredient) }}">
                        {{ $ingredient->name }}
                        @if ($ingredient->photo)
                            <img slot="start" style="width: 56px" src="{{ url('storage/' . $ingredient->photo) }}">
                        @else
                            <img slot="start" style="width: 56px" src="{{ asset('img/no_img.png') }}">
                        @endif
                    </md-list-item>
                    @if (!$loop->last)
                        <md-divider></md-divider>
                    @endif
                @endforeach
            </md-list>
        @endif
    </div>

</x-app-layout>
