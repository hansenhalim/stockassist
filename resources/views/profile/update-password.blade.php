<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">Change Password</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        <form action="{{ route('password.update') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @error('current_password')
                <md-outlined-text-field name="current_password" type="password" label="Current Password" class="mt-4 w-full"
                    error error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field name="current_password" type="password" label="Current Password"
                    class="mt-4 w-full"></md-outlined-text-field>
            @enderror

            @error('password')
                <md-outlined-text-field name="password" type="password" label="New Password" class="mt-4 w-full" error
                    error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field name="password" type="password" label="New Password"
                    class="mt-4 w-full"></md-outlined-text-field>
            @enderror

            @error('password_confirmation')
                <md-outlined-text-field name="password_confirmation" type="password" label="Confirm Password"
                    class="mt-4 w-full" error error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field name="password_confirmation" type="password" label="Confirm Password"
                    class="mt-4 w-full"></md-outlined-text-field>
            @enderror

            <div class="flex items-center justify-between mt-8">
                <md-outlined-button type="button" onclick="history.back()">Back</md-outlined-button>
                <md-filled-button>Save</md-filled-button>
            </div>
        </form>
    </div>
</x-app-layout>
