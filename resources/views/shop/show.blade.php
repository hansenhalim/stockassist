<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            @unless (request()->routeIs('shops.index'))
                <md-icon-button href="{{ route('shops.index') }}" class="me-2">
                    <md-icon class="material-icons">arrow_back</md-icon>
                </md-icon-button>
                <div class="md-typescale-title-large">{{ $shop->name }}</div>
            @else
                <div class="md-typescale-title-large">Store</div>
            @endunless
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-24">
        <div class="rounded-3xl shadow-md overflow-hidden">
            @if ($shop->photo)
                <div class="h-56 bg-center bg-cover" style="background-image: url('{{ Storage::url($shop->photo) }}');">
                </div>
            @else
                <div class="h-56 bg-center bg-cover" style="background-image: url('/assets/img/no_img.jpg');">
                </div>
            @endif
        </div>

        <div class="flex justify-between items-center mt-4">
            <div class="md-typescale-title-medium">{{ $shop->name }}</div>
            <div class="md-typescale-title-medium">{{ $shop->zip_code }}</div>
        </div>

        <div class="md-typescale-body-medium mt-2">{{ $shop->address ?? 'No address' }}</div>

        <div class="flex justify-between mt-8">
            @unless (request()->routeIs('shops.index'))
                <md-outlined-button type="button" href="{{ route('shops.index') }}">Back</md-outlined-button>
                <div class="flex">
                    <form action="{{ route('shops.destroy', $shop) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <md-text-button>Delete</md-text-button>
                    </form>
                    <md-filled-button href="{{ route('shops.edit', $shop) }}" class="ms-1">Edit</md-filled-button>
                </div>
            @endunless
        </div>

    </div>
</x-app-layout>
