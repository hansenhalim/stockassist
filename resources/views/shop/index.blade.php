<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="md-typescale-title-large">Store</div>
            <md-icon-button href="{{ route('recipes.create') }}">
                <md-icon class="material-icons">add</md-icon>
            </md-icon-button>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-24">
        <form action="{{ route('shop.switch') }}" method="post">
            @csrf

            <md-outlined-select name="shop_id" onchange="this.form.submit()">
                @foreach ($shops as $shop)
                    @if ($shop->id === $selectedShop->id)
                        <md-select-option selected value="{{ $shop->id }}">{{ $shop->name }}</md-select-option>
                    @else
                        <md-select-option value="{{ $shop->id }}">{{ $shop->name }}</md-select-option>
                    @endif
                @endforeach
            </md-outlined-select>

            <md-outlined-button href="{{ route('shops.show', $selectedShop) }}">Show</md-outlined-button>
        </form>
    </div>
</x-app-layout>
