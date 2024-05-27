<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">Create Staff</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        <form action="{{ route('admins.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            @error('name')
                <md-outlined-text-field class="w-full mt-4" name="name" value="{{ old('name') }}" label="Full Name"
                    error error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field class="w-full mt-4" name="name" value="{{ old('name') }}"
                    label="Full Name"></md-outlined-text-field>
            @enderror

            <!-- Email Address -->
            @error('email')
                <md-outlined-text-field class="w-full mt-4" type="email" name="email" value="{{ old('email') }}"
                    label="Email" error error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field class="w-full mt-4" type="email" name="email" value="{{ old('email') }}"
                    label="Email"></md-outlined-text-field>
            @enderror

            <!-- Password -->
            @error('password')
                <md-outlined-text-field class="w-full mt-4" type="password" name="password" label="Password" error
                    error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field class="w-full mt-4" type="password" name="password"
                    label="Password"></md-outlined-text-field>
            @enderror

            <!-- Confirm Password -->
            @error('password_confirmation')
                <md-outlined-text-field class="w-full mt-4" type="password" name="password_confirmation"
                    label="Confirm Password" error error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field class="w-full mt-4" type="password" name="password_confirmation"
                    label="Confirm Password"></md-outlined-text-field>
            @enderror

            <div class="flex items-center justify-between mt-8">
                <md-outlined-button type="button" onclick="history.back()">Back</md-outlined-button>
                <md-filled-button>Save</md-filled-button>
            </div>
        </form>
    </div>
</x-app-layout>
