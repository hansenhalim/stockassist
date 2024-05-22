<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">Edit {{ $incomingInventoryItem->ingredient->name }}</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        <div class="rounded-3xl shadow-md overflow-hidden">
            @if ($incomingInventoryItem->ingredient->photo)
                <div class="h-56 bg-center bg-cover"
                    style="background-image: url('{{ Storage::url($incomingInventoryItem->ingredient->photo) }}');">
                </div>
            @else
                <div class="h-56 bg-center bg-cover"
                    style="background-image: url('{{ asset('assets/img/no_img.jpg') }}');">
                </div>
            @endif
        </div>

        <form action="{{ route('incoming-inventory-items.update', $incomingInventoryItem) }}" method="post">
            @csrf
            @method('PUT')

            <div class="flex items-center justify-center mt-8">
                @error('quantity')
                    <md-outlined-text-field name="quantity" min="1"
                        value="{{ old('quantity', $incomingInventoryItem->quantity) }}" type="number" label="Quantity"
                        class="flex-grow" error error-text="{{ $message }}"></md-outlined-text-field>
                @else
                    <md-outlined-text-field name="quantity" min="1"
                        value="{{ old('quantity', $incomingInventoryItem->quantity) }}" type="number" label="Quantity"
                        class="flex-grow"></md-outlined-text-field>
                @enderror
                <div class="w-14 text-center md-typescale-label-large">
                    {{ $incomingInventoryItem->ingredient->unit_of_measure }}
                </div>
            </div>

            <div class="flex justify-between mt-8">
                <md-outlined-button type="button" onclick="history.back()">Back</md-outlined-button>

                <div class="flex">
                    <form action="{{ route('incoming-inventory-items.destroy', $incomingInventoryItem) }}"
                        method="post">
                        @csrf
                        @method('DELETE')
                        <md-text-button>Delete</md-text-button>
                    </form>
                    <md-filled-button>
                        Confirm
                        <div slot="icon" class="w-6 h-6">
                            <md-icon class="material-icons">check</md-icon>
                        </div>
                    </md-filled-button>
                </div>
            </div>
        </form>
    </div>
</x-app-layout>
