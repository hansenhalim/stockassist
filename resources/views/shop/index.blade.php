<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="md-typescale-title-large">Store</div>
            @unless ($shops->isEmpty())
                <md-icon-button href="{{ route('shops.create') }}">
                    <md-icon class="material-icons">add</md-icon>
                </md-icon-button>
            @endunless
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-24">
        @if ($shops->isEmpty())
            <div class="flex flex-col justify-center items-center h-[70svh]">
                <div class="md-typescale-headline-medium" style="color: var(--md-sys-color-on-primary-container);">
                    You don't have a store
                </div>
                <md-filled-tonal-button href="{{ route('shops.create') }}" class="mt-4">
                    Create store
                    <div slot="icon" class="w-6 h-6">
                        <md-icon class="material-icons">add</md-icon>
                    </div>
                </md-filled-tonal-button>
            </div>
        @else
            <form action="{{ route('shop.switch') }}" method="post">
                @csrf

                <md-outlined-select label="Currently at" name="shop_id" onchange="this.form.submit()">
                    @foreach ($shops as $shop)
                        @if ($shop == $selectedShop)
                            <md-select-option value="{{ $shop->id }}" selected>
                                {{ $shop->name }}
                            </md-select-option>
                        @else
                            <md-select-option value="{{ $shop->id }}">
                                {{ $shop->name }}
                            </md-select-option>
                        @endif
                    @endforeach
                </md-outlined-select>
            </form>

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
        @endif
    </div>
</x-app-layout>
