<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" autocomplete="on">
        @csrf

        <!-- Email Address -->
        <div>
            @error('email')
                <md-outlined-text-field class="w-full" type="email" name="email" value="{{ old('email') }}" label="Email"
                    error error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field class="w-full" type="email" name="email" value="{{ old('email') }}"
                    label="Email"></md-outlined-text-field>
            @enderror
        </div>

        <!-- Password -->
        @error('password')
            <md-outlined-text-field class="w-full mt-4" type="password" name="password" label="Password" error
                error-text="{{ $message }}"></md-outlined-text-field>
        @else
            <md-outlined-text-field class="w-full mt-4" type="password" name="password"
                label="Password"></md-outlined-text-field>
        @enderror

        <!-- Remember Me -->
        <label class="flex items-center mt-2">
            <md-checkbox touch-target="wrapper" name="remember"></md-checkbox>
            Remember me
        </label>

        <div class="flex items-center justify-end mt-4">
            <md-text-button href="{{ route('password.request') }}">Forgot your password?</md-text-button>

            <md-filled-button class="ms-1">Log in</md-filled-button>
        </div>
    </form>
</x-guest-layout>
