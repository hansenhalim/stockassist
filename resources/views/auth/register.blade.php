<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        @error('name')
            <md-outlined-text-field class="w-full" name="name" value="{{ old('name') }}" label="Full Name" error
                error-text="{{ $message }}"></md-outlined-text-field>
        @else
            <md-outlined-text-field class="w-full" name="name" value="{{ old('name') }}"
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

        <div class="flex items-center justify-end mt-4">
            <md-text-button type="button" href="{{ route('login') }}">Already registered?</md-text-button>

            <md-filled-button class="ms-1">Register</md-filled-button>
        </div>
    </form>
</x-guest-layout>
