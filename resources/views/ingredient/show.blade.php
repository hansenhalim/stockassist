<x-app-layout>
    <div>{{ $ingredient->name }}</div>
    <div>{{ $ingredient->barcode }}</div>
    <div>{{ $ingredient->description }}</div>

    <img src="{{ url('storage/' . $ingredient->photo) }}">

    <div>{{ $ingredient->unit_of_measure }}</div>

    <md-outlined-button href="{{ route('ingredients.edit', $ingredient) }}">Edit</md-outlined-button>
    <form action="{{ route('ingredients.destroy', $ingredient) }}" method="post">
        @csrf
        @method('DELETE')
        <md-outlined-button>Delete</md-outlined-button>
    </form>
</x-app-layout>
