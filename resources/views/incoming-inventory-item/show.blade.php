<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            @if (request()->routeIs('shops.index'))
                <div class="md-typescale-title-large">Store</div>
            @else
                <md-icon-button onclick="history.back()" class="me-2">
                    <md-icon class="material-icons">arrow_back</md-icon>
                </md-icon-button>
                <div class="md-typescale-title-large">{{ $shop->name }}</div>
            @endif
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-24">
        <div class="rounded-3xl shadow-md overflow-hidden">
            @if ($shop->photo)
                <div class="h-56 bg-center bg-cover"
                    style="background-image: url('{{ url('storage/' . $shop->photo) }}');">
                </div>
            @else
                <div class="h-56 bg-center bg-cover"
                    style="background-image: url('{{ asset('assets/img/no_img.jpg') }}');">
                </div>
            @endif
        </div>

        <div class="flex justify-between items-center mt-4">
            <div class="md-typescale-title-medium">{{ $shop->name }}</div>
            <div class="md-typescale-title-medium">
                {{ $shop->zip_code }}</div>
        </div>

        <div class="md-typescale-body-medium mt-2">{{ $shop->address ?? 'No address' }}</div>

        <div class="flex justify-between mt-8">
            @unless (request()->routeIs('shops.index'))
                <md-outlined-button type="button" onclick="history.back()">Back</md-outlined-button>
            @endunless
            @if (auth()->user()->authable instanceof App\Models\Owner)
                <div class="flex">
                    @unless (auth()->user()->authable->selectedShop == $shop)
                        <form action="{{ route('shops.destroy', $shop) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <md-text-button>Delete</md-text-button>
                        </form>
                    @endunless
                    <md-filled-button href="{{ route('shops.edit', $shop) }}" class="ms-1">Edit</md-filled-button>
                </div>
            @endif
        </div>

    </div>
</x-app-layout>
