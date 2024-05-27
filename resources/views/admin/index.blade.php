<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <md-icon-button href="{{ route('shops.index') }}" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large flex-grow">Staff</div>
            @unless ($admins->isEmpty())
                <md-icon-button href="{{ route('admins.create') }}">
                    <md-icon class="material-icons">add</md-icon>
                </md-icon-button>
            @endunless
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        @if ($admins->isEmpty())
            <div class="flex flex-col justify-center items-center my-[35svh]">
                <div class="md-typescale-body-large" style="color: var(--md-sys-color-outline);">
                    No staff found
                </div>
                <md-filled-tonal-button href="{{ route('admins.create') }}" class="mt-2">
                    Create staff
                    <div slot="icon" class="w-6 h-6">
                        <md-icon class="material-icons">add</md-icon>
                    </div>
                </md-filled-tonal-button>
            </div>
        @else
            <md-list>
                @foreach ($admins as $admin)
                    <md-list-item href="{{ route('admins.show', $admin) }}">
                        <div slot="headline">{{ $admin->user->name }}</div>

                        <div slot="supporting-text">
                            {{ $admin->user->email }}
                        </div>

                        @if ($admin->user->photo)
                            <img slot="start" class="rounded-full w-10" src="{{ Storage::url($admin->user->photo) }}">
                        @else
                            <img slot="start" class="rounded-full w-10" src="{{ asset('assets/img/no_img.jpg') }}">
                        @endif
                    </md-list-item>
                @endforeach
            </md-list>
        @endif
    </div>
</x-app-layout>
