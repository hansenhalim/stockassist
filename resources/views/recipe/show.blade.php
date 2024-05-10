<x-app-layout>
    <div>{{ $recipe->name }}</div>
    <img src="{{ url('storage/' . $recipe->photo) }}">
    <md-outlined-button href="{{ route('recipes.edit', $recipe) }}">Edit</md-outlined-button>
    <form action="{{ route('recipes.destroy', $recipe) }}" method="post">
        @csrf
        @method('DELETE')
        <md-outlined-button>Delete</md-outlined-button>
    </form>
</x-app-layout>
