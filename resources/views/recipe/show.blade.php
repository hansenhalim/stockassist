<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large flex-grow">{{ $recipe->name }}</div>
            <md-icon-button onclick="searchBar.style.display = 'block'">
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

        <div id="search-bar" class="mt-4" style="display: none;">
            <form action="{{ route('link-ingredient') }}" method="post">
                @csrf

                <div class="flex">
                    <input id="search-input" type="text" class="bg-lime-100 w-1/2 p-2" oninput="search(this.value)"
                        placeholder="Type to search">
                    <div id="name" style="display: none;" class="bg-lime-100 w-1/2 p-2"></div>
                    <input id="quantity" type="number" name="quantity" min="0.001" step="0.001"
                        class="bg-red-100 w-1/4 p-2" placeholder="qty" style="display: none;">
                    <input id="primary-key" type="hidden" name="ingredient_id" class="hidden">
                    <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                    <button id="search-button" type="submit" class="bg-blue-100 w-1/6 p-2">Insert</button>
                </div>
            </form>

            <div id="container" class="mt-1 w-1/2">
                <!-- <div class="border px-4 py-2">Mango (pcs)</div> -->
            </div>
        </div>

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
                    <md-filled-button href="{{ route('recipes.edit', $recipe) }}" class="ms-1">
                        Edit
                    </md-filled-button>
                </div>
            @endif
        </div>
    </div>

    <script>
        const ingredients = @json($ingredients);

        const searchBar = document.getElementById('search-bar');
        const container = document.getElementById('container');
        const primaryKey = document.getElementById('primary-key');
        const searchInput = document.getElementById('search-input');
        const name = document.getElementById('name');
        const quantity = document.getElementById('quantity');
        const searchButton = document.getElementById('search-button');

        const search = (keyword) => {
            container.innerHTML = '';

            if (keyword === '') return;

            filteredIngredients = ingredients.filter((ingredient) => ingredient.name.toLowerCase().includes(keyword));

            filteredIngredients.forEach(ingredient => {
                const div = document.createElement('div');
                div.className = 'border px-4 py-2';
                div.textContent = `${ingredient.name} (${ingredient.unit_of_measure})`;
                div.addEventListener('click', () => {
                    primaryKey.value = ingredient.id;
                    searchInput.style.display = 'none';
                    container.style.display = 'none';
                    name.style.display = 'block';
                    name.textContent = div.textContent;
                    quantity.style.display = 'block';
                });

                container.appendChild(div);
            });
        }
    </script>
</x-app-layout>
