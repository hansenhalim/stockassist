<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">Create Recipe</div>
        </div>
    </x-slot>

    <form action="{{ route('recipes.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <md-outlined-text-field label="Name" name="name"></md-outlined-text-field>

        <input type="file" name="photo">

        <md-outlined-button>Create</md-outlined-button>
    </form>
    @if ($errors->any())
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-app-layout>
