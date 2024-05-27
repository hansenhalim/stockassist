<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button href="{{ route('recipes.index') }}" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large flex-grow">{{ $recipe->name }}</div>
            <md-icon-button onclick="searchBar.classList.toggle('hidden')">
                <md-icon class="material-icons">add_shopping_cart</md-icon>
            </md-icon-button>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        <div class="rounded-3xl shadow-md overflow-hidden">
            @if ($recipe->photo)
                <div class="h-56 bg-center bg-cover"
                    style="background-image: url('{{ Storage::url($recipe->photo) }}');">
                </div>
            @else
                <div class="h-56 bg-center bg-cover"
                    style="background-image: url('{{ asset('assets/img/no_img.jpg') }}');">
                </div>
            @endif
        </div>

        <div class="mt-4">
            <div class="md-typescale-title-medium">{{ $recipe->name }}</div>
        </div>

        <div class="md-typescale-body-medium mt-2">{{ $recipe->description ?? 'No description' }}</div>

        <div id="searchBar" class="mt-4 hidden">
            <form action="{{ route('link-ingredient') }}" method="post">
                @csrf

                <div class="flex">
                    <input id="searchInput" type="text" class="bg-lime-100 w-1/2 p-2" oninput="search(this.value)"
                        placeholder="Type to search">
                    <div id="ingredientName" class="bg-lime-100 w-1/2 p-2 hidden"></div>
                    <input id="quantity" type="number" name="quantity" min="1" value="1"
                        class="bg-red-100 w-1/4 p-2 hidden" placeholder="qty">
                    <input id="primaryKey" type="hidden" name="ingredient_id" class="hidden">
                    <input type="hidden" name="recipe_id" value="{{ $recipe->id }}">
                    <button type="submit" class="bg-blue-100 w-1/6 p-2">Insert</button>
                </div>
            </form>

            <div id="ingredientContainer" class="mt-1 w-1/2">
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
            <md-outlined-button type="button" href="{{ route('recipes.index') }}">Back</md-outlined-button>
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

        const searchInput = document.getElementById('searchInput');
        const quantity = document.getElementById('quantity');

        const search = (keyword) => {
            ingredientContainer.innerHTML = '';

            if (keyword === '') return;

            filteredIngredients = ingredients.filter((ingredient) => ingredient.name.toLowerCase().includes(keyword));

            filteredIngredients.forEach(ingredient => {
                const div = document.createElement('div');
                div.className = 'border px-4 py-2';
                div.textContent = `${ingredient.name} (${ingredient.unit_of_measure})`;
                div.addEventListener('click', () => {
                    primaryKey.value = ingredient.id;
                    searchInput.style.display = 'none';
                    ingredientContainer.style.display = 'none';
                    ingredientName.classList.remove('hidden');
                    ingredientName.textContent = div.textContent;
                    quantity.classList.remove('hidden');
                });

                ingredientContainer.appendChild(div);
            });
        }
    </script>
</x-app-layout>
