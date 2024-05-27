<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div class="md-typescale-title-large">Store</div>
            @if ($shops->isNotEmpty())
                <md-icon-button href="{{ route('shops.create') }}">
                    <md-icon class="material-icons">add</md-icon>
                </md-icon-button>
            @endif
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-24">
        @if ($shops->isNotEmpty())
            <div class="flex items-center justify-between mt-4">
                <form action="{{ route('switch-shop') }}" method="post">
                    @csrf
                    <md-outlined-select label="Currently at" name="shop_id" onchange="this.form.submit()">
                        @foreach ($shops as $shop)
                            <md-select-option value="{{ $shop->id }}" @selected($shop == $selectedShop)>
                                {{ $shop->name }}
                            </md-select-option>
                        @endforeach
                    </md-outlined-select>
                </form>
                <md-filled-button href="{{ route('admins.index') }}" class="ml-3">
                    Staff
                    <div slot="icon" class="w-6 h-6">
                        <md-icon class="material-icons-outlined">engineering</md-icon>
                    </div>
                </md-filled-button>
            </div>

            <md-list>
                @foreach ($shops as $shop)
                    <md-list-item href="{{ route('shops.show', $shop) }}">
                        <div slot="headline">{{ $shop->name }}</div>

                        <div slot="supporting-text" class="line-clamp-2">{{ $shop->address }}</div>

                        <md-icon slot="end" class="material-icons">arrow_right</md-icon>

                        @if ($shop->photo)
                            <img slot="start" class="rounded-full w-10" src="{{ Storage::url($shop->photo) }}">
                        @else
                            <img slot="start" class="rounded-full w-10" src="{{ asset('assets/img/no_img.jpg') }}">
                        @endif
                    </md-list-item>
                @endforeach
            </md-list>
        @else
            <div class="flex flex-col justify-center items-center my-[35svh]">
                <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                    You don't have a store
                </div>
                <md-filled-tonal-button href="{{ route('shops.create') }}" class="mt-2">
                    Create store
                    <div slot="icon" class="w-6 h-6">
                        <md-icon class="material-icons">add</md-icon>
                    </div>
                </md-filled-tonal-button>
            </div>
        @endif
    </div>
</x-app-layout>
