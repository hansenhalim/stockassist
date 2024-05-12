<x-app-layout>
    <form action="{{ route('recipes.update', $recipe) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <md-outlined-text-field label="Name" name="name" value="{{ $recipe->name }}"></md-outlined-text-field>

        <img src="{{ url('storage/' . $recipe->photo) }}">

        <input type="file" name="photo">

        <md-outlined-button>Save</md-outlined-button>
    </form>
    @if ($errors->any())
        <div class="text-red-500">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</x-app-layout>
