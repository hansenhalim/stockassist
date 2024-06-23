<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button href="{{ route('admins.index') }}" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">{{ $admin->user->name }}</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        <div class="rounded-3xl shadow-md overflow-hidden mt-4">
            @if ($admin->user->photo)
                <div class="h-56 bg-center bg-cover"
                    style="background-image: url('{{ Storage::url($admin->user->photo) }}');">
                </div>
            @else
                <div class="h-56 bg-center bg-cover" style="background-image: url('/assets/img/no_img.jpg');">
                </div>
            @endif
        </div>
        <div class="md-typescale-title-medium mt-4">{{ $admin->user->name }}</div>
        <div class="md-typescale-body-medium mt-2">{{ $admin->user->email }}</div>
        <div class="flex justify-between mt-8">
            <md-outlined-button type="button" href="{{ route('admins.index') }}">Back</md-outlined-button>
            <div class="flex">
                <form action="{{ route('admins.destroy', $admin) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <md-filled-button>Delete</md-filled-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
