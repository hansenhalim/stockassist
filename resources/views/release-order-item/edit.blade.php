<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">Edit {{ $releaseOrderItem->recipe->name }}</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        <div class="rounded-3xl shadow-md overflow-hidden">
            @if ($releaseOrderItem->recipe->photo)
                <div class="h-56 bg-center bg-cover"
                    style="background-image: url('{{ Storage::url($releaseOrderItem->recipe->photo) }}');">
                </div>
            @else
                <div class="h-56 bg-center bg-cover"
                    style="background-image: url('{{ asset('assets/img/no_img.jpg') }}');">
                </div>
            @endif
        </div>

        <form action="{{ route('release-order-items.update', $releaseOrderItem) }}" method="post">
            @csrf
            @method('PUT')

            @error('quantity')
                <md-outlined-text-field name="quantity" min="1"
                    value="{{ old('quantity', $releaseOrderItem->quantity) }}" type="number" label="Quantity"
                    class="mt-8 w-full" error error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field name="quantity" min="1"
                    value="{{ old('quantity', $releaseOrderItem->quantity) }}" type="number" label="Quantity"
                    class="mt-8 w-full"></md-outlined-text-field>
            @enderror

            <div class="flex justify-between mt-8">
                <md-outlined-button type="button" onclick="history.back()">Back</md-outlined-button>

                <div class="flex">
                    <md-text-button form="formDelete">Delete</md-text-button>
                    <md-filled-button>
                        Confirm
                        <div slot="icon" class="w-6 h-6">
                            <md-icon class="material-icons">check</md-icon>
                        </div>
                    </md-filled-button>
                </div>
            </div>
        </form>

        <form id="formDelete" action="{{ route('release-order-items.destroy', $releaseOrderItem) }}" method="post">
            @csrf
            @method('DELETE')
        </form>
    </div>
</x-app-layout>
