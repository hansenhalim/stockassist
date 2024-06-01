<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button href="{{ route('ingredients.index') }}" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">{{ $ingredient->name }}</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        <md-tabs onchange="switchTab(event)">
            <md-primary-tab active>Analytics</md-primary-tab>
            <md-primary-tab>Details</md-primary-tab>
        </md-tabs>

        <div id="firstTab">
            <img src="{{ asset('assets/img/graph.webp') }}" alt="">

            <div class="flex p-4 mt-2 rounded-3xl"
                style="background-color: var(--md-sys-color-secondary-container); color: var(--md-sys-color-on-secondary-container);">
                <div class="text-center flex-1">
                    <div class="md-typescale-body-small">Lead Time</div>
                    <div class="md-typescale-title-medium">{{ number_format($ingredient->lead_time_avg) }} days</div>
                </div>
                <div class="text-center flex-1 border-x"
                    style="border-color: var(--md-sys-color-on-secondary-container);">
                    <div class="md-typescale-body-small">Daily Demand</div>
                    <div class="md-typescale-title-medium">
                        {{ number_format($ingredient->demand_avg) }}&nbsp;{{ $ingredient->unit_of_measure }}</div>
                </div>
                <div class="text-center flex-1">
                    <div class="md-typescale-body-small">Safety Stock</div>
                    <div class="md-typescale-title-medium">
                        {{ number_format($ingredient->safety_stock) }}&nbsp;{{ $ingredient->unit_of_measure }}</div>
                </div>
            </div>

            <div class="flex p-4 mt-2 rounded-3xl"
                style="background-color: var(--md-sys-color-secondary-container); color: var(--md-sys-color-on-secondary-container);">
                <div class="text-center flex-1">
                    <div class="md-typescale-body-small">Reorder Point</div>
                    <div class="md-typescale-title-medium">
                        {{ number_format($ingredient->reorder_point) }}&nbsp;{{ $ingredient->unit_of_measure }}</div>
                </div>
                <div class="text-center flex-1 border-x"
                    style="border-color: var(--md-sys-color-on-secondary-container);">
                    <div class="md-typescale-body-small">Order Quantity</div>
                    <div class="md-typescale-title-medium">
                        {{ number_format($ingredient->order_quantity) }}&nbsp;{{ $ingredient->unit_of_measure }}</div>
                </div>
                <div class="text-center flex-1">
                    <div class="md-typescale-body-small">Maximum Stock</div>
                    <div class="md-typescale-title-medium">
                        {{ number_format($ingredient->inventory_level_max) }}&nbsp;{{ $ingredient->unit_of_measure }}
                    </div>
                </div>
            </div>

            <md-outlined-button class="mt-8" type="button" href="{{ route('ingredients.index') }}">
                Back
            </md-outlined-button>
        </div>

        <div id="secondTab" class="hidden">
            <div class="rounded-3xl shadow-md overflow-hidden mt-4">
                @if ($ingredient->photo)
                    <div class="h-56 bg-center bg-cover"
                        style="background-image: url('{{ Storage::url($ingredient->photo) }}');">
                    </div>
                @else
                    <div class="h-56 bg-center bg-cover"
                        style="background-image: url('{{ asset('assets/img/no_img.jpg') }}');">
                    </div>
                @endif
            </div>
            <div class="flex justify-between items-center mt-4">
                <div class="md-typescale-title-medium">{{ $ingredient->name }}</div>
                <div class="md-typescale-title-medium">
                    {{ $ingredient->remaining_amount }}&nbsp;{{ $ingredient->unit_of_measure }}</div>
            </div>
            <div class="md-typescale-body-medium mt-2">{{ $ingredient->description ?? 'No description' }}</div>
            <div class="flex justify-between mt-8">
                <md-outlined-button type="button" href="{{ route('ingredients.index') }}">Back</md-outlined-button>
                @if (auth()->user()->authable instanceof App\Models\Owner)
                    <div class="flex">
                        <form action="{{ route('ingredients.destroy', $ingredient) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <md-text-button>Delete</md-text-button>
                        </form>
                        <md-filled-button href="{{ route('ingredients.edit', $ingredient) }}"
                            class="ms-1">Edit</md-filled-button>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        const switchTab = (e) => {
            if (e.target.activeTabIndex === 0) {
                firstTab.classList.remove('hidden');
                secondTab.classList.add('hidden');
            } else if (e.target.activeTabIndex === 1) {
                firstTab.classList.add('hidden');
                secondTab.classList.remove('hidden');
            }
        }
    </script>
</x-app-layout>
