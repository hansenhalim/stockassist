<x-app-layout>
    <form action="{{ route('recipes.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <md-outlined-text-field label="Name" name="name"></md-outlined-text-field>

        <input type="file" name="photo">

        <md-outlined-button>Create</md-outlined-button>
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
