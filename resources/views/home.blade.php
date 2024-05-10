<x-app-layout>
    <div class="flex justify-between">
        <div>Welcome, {{ auth()->user()->name }}!</div>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button class="underline font-semibold text-red-500" type="submit">Logout</button>
        </form>
    </div>
</x-app-layout>
