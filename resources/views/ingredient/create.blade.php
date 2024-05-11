<x-app-layout>
    <form action="{{ route('ingredients.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <md-outlined-text-field label="Name" name="name"></md-outlined-text-field>
        <md-outlined-text-field label="Barcode" name="barcode"></md-outlined-text-field>
        <md-outlined-text-field label="Description" name="description"></md-outlined-text-field>

        <input type="file" name="photo">

        @foreach ($measurement_units as $measurement_unit)
            <md-radio id="{{ $measurement_unit }}" name="unit_of_measure" value="{{ $measurement_unit }}"></md-radio>
            <label for="{{ $measurement_unit }}">{{ $measurement_unit }}</label>
        @endforeach

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
