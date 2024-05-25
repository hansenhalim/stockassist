<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">Choose Recipe</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        @if ($recipes->isEmpty())
            <div class="flex flex-col justify-center items-center my-[40svh]">
                <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                    No recipe found
                </div>
            </div>
        @else
            <div class="grid grid-cols-2 gap-2.5">
                @foreach ($recipes as $recipe)
                    <a href="{{ route('release-order-items.create', ['recipe_id' => $recipe]) }}">
                        <div class="w-full rounded-lg overflow-hidden shadow-md border"
                            style="background-color: var(--md-sys-color-surface-container-low);">
                            @if ($recipe->photo)
                                <div class="aspect-square bg-center bg-cover"
                                    style="background-image: url('{{ Storage::url($recipe->photo) }}');">
                                </div>
                            @else
                                <div class="aspect-square bg-center bg-cover"
                                    style="background-image: url('{{ asset('assets/img/no_img.jpg') }}');">
                                </div>
                            @endif
                            <div class="p-4">
                                <div class="md-typescale-body-large" style="color: var(--md-sys-color-on-surface);">
                                    {{ $recipe->name }}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
