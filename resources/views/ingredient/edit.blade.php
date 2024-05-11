<x-app-layout>
    <form action="{{ route('ingredients.update', $ingredient) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <md-outlined-text-field label="Name" name="name" value="{{ $ingredient->name }}"></md-outlined-text-field>
        <md-outlined-text-field label="Barcode" name="barcode" value="{{ $ingredient->barcode }}"></md-outlined-text-field>
        <md-outlined-text-field label="Description" name="description" value="{{ $ingredient->description }}"></md-outlined-text-field>

        <img src="{{ url('storage/' . $ingredient->photo) }}">

        <input type="file" name="photo">

        @foreach ($measurement_units as $measurement_unit)
            @if($measurement_unit === $ingredient->unit_of_measure)
                <md-radio id="{{ $measurement_unit }}" checked name="unit_of_measure"
                    value="{{ $measurement_unit }}"></md-radio>
            @else
                <md-radio id="{{ $measurement_unit }}" name="unit_of_measure"
                    value="{{ $measurement_unit }}"></md-radio>
            @endif
            <label for="{{ $measurement_unit }}">{{ $measurement_unit }}</label>
        @endforeach

        <md-outlined-button>Update</md-outlined-button>
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
