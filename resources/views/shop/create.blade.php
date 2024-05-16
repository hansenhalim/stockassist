<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">Create Store</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        <label for="photo">
            <div class="relative rounded-3xl shadow-md overflow-hidden">
                <div class="h-56 bg-center bg-cover"
                    style="background-image: url('{{ asset('assets/img/no_img.png') }}');">
                </div>
                <div class="bg-black opacity-50 absolute top-0 w-full h-full"></div>
                <div
                    class="absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 text-white md-typescale-title-small">
                    Upload</div>
            </div>
        </label>

        <form action="{{ route('shops.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <input id="photo" type="file" accept="image/*" name="photo" class="hidden">

            @error('name')
                <md-outlined-text-field name="name" value="{{ old('name') }}" label="Name" class="mt-8 w-full" error
                    error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field name="name" value="{{ old('name') }}" label="Name"
                    class="mt-8 w-full"></md-outlined-text-field>
            @enderror

            @error('address')
                <md-outlined-text-field name="address" value="{{ old('address') }}" label="Address" class="mt-4 w-full"
                    error error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field name="address" value="{{ old('address') }}" label="Address"
                    class="mt-4 w-full"></md-outlined-text-field>
            @enderror

            @error('zip_code')
                <md-outlined-text-field name="zip_code" value="{{ old('zip_code') }}" label="Zip Code" class="mt-4 w-full"
                    error error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field name="zip_code" value="{{ old('zip_code') }}" label="Zip Code"
                    class="mt-4 w-full"></md-outlined-text-field>
            @enderror

            <div class="flex items-center justify-between mt-8">
                <md-outlined-button type="button" onclick="history.back()">Back</md-outlined-button>
                <md-filled-button>Save</md-filled-button>
            </div>
        </form>
    </div>
</x-app-layout>