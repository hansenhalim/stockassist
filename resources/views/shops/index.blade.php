<x-app-layout>
    <ul>
        @forelse ($shops as $shop)
            <li>{{ $shop->name }}</li>
        @empty
            <p>Create shops</p>
        @endforelse
    </ul>
</x-app-layout>
