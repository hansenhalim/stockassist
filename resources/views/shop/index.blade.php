<x-app-layout>
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
    </form>
</x-app-layout>
