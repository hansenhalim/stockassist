<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="md-typescale-title-large">Store</div>
            <md-icon-button href="{{ route('shops.create') }}">
                <md-icon class="material-icons">add</md-icon>
            </md-icon-button>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-24">
        <div class="flex">
            <form action="{{ route('shop.switch') }}" method="post">
                @csrf
                <md-outlined-select label="Currently at" name="shop_id" onchange="this.form.submit()">
                    @foreach ($shops as $shop)
                        @if ($shop->id === $selectedShop->id)
                            <md-select-option selected
                                value="{{ $shop->id }}">{{ $shop->name }}</md-select-option>
                        @else
                            <md-select-option value="{{ $shop->id }}">{{ $shop->name }}</md-select-option>
                        @endif
                    @endforeach
                </md-outlined-select>
            </form>
        </div>

        <md-list>
            @foreach ($shops as $shop)
                <md-list-item href="{{ route('shops.show', $shop) }}">
                    <div slot="headline">{{ $shop->name }}</div>
                    <div slot="supporting-text" class="line-clamp-1">{{ $shop->address }}</div>
                    <md-icon slot="end" class="material-icons">arrow_right</md-icon>

                    @if ($shop->photo)
                        <img slot="start" style="width: 56px" class="rounded-full"
                            src="{{ url('storage/' . $shop->photo) }}">
                    @else
                        <img slot="start" style="width: 56px" class="rounded-full"
                            src="{{ asset('assets/img/no_img.png') }}">
                    @endif
                </md-list-item>
            @endforeach
        </md-list>
    </div>
</x-app-layout>
