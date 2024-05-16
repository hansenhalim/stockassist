<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">Choose Stock</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        @if ($ingredients->isEmpty())
            <div class="flex flex-col justify-center items-center my-[40svh]">
                <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                    No stock found
                </div>
            </div>
        @else
            <div class="grid grid-cols-2 gap-2.5">
                @foreach ($ingredients as $ingredient)
                    <a href="{{ route('incoming-inventory-items.create', ['ingredient_id' => $ingredient]) }}">
                        <div class="w-full rounded-lg overflow-hidden shadow-md border"
                            style="background-color: var(--md-sys-color-surface-container-low);">
                            @if ($ingredient->photo)
                                <div class="aspect-square bg-center bg-cover"
                                    style="background-image: url('{{ url('storage/' . $ingredient->photo) }}');">
                                </div>
                            @else
                                <div class="aspect-square bg-center bg-cover"
                                    style="background-image: url('{{ asset('assets/img/no_img.png') }}');">
                                </div>
                            @endif
                            <div class="p-4">
                                <div class="md-typescale-body-large" style="color: var(--md-sys-color-on-surface);">
                                    {{ $ingredient->name }}
                                </div>
                                <div class="md-typescale-body-medium"
                                    style="color: var(--md-sys-color-on-surface-variant);">
                                    {{ $ingredient->description }}
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
