<x-app-layout>
    <div class="flex justify-between items-center">
        <div>Welcome, {{ auth()->user()->name }}!</div>

        <form action="{{ route('logout') }}" method="post">
            @csrf
            <md-filled-button>Logout</md-filled-button>
        </form>
    </div>
</x-app-layout>
