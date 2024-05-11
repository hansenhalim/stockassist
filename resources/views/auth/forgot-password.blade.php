<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600 dark:text-gray-400">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Email Address -->
        @error('email')
            <md-outlined-text-field class="w-full" type="email" name="email" value="{{ old('email') }}" label="Email" error
                error-text="{{ $message }}"></md-outlined-text-field>
        @else
            <md-outlined-text-field class="w-full" type="email" name="email" value="{{ old('email') }}"
                label="Email"></md-outlined-text-field>
        @enderror

        <div class="flex items-center justify-end mt-4">
            <md-filled-button>Email Password Reset Link</md-filled-button>
        </div>
    </form>
</x-guest-layout>
