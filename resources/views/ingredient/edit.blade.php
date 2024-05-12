<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">Edit {{ $ingredient->name }}</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4">
        <label for="photo">
            <div class="relative rounded-3xl shadow-md overflow-hidden">
                @if ($ingredient->photo)
                    <div class="h-56 bg-center"
                        style="background-image: url('{{ url('storage/' . $ingredient->photo) }}');">
                    </div>
                @else
                    <div class="h-56 bg-center" style="background-image: url('{{ asset('assets/img/no_img.png') }}');">
                    </div>
                @endif
                <div class="bg-black opacity-50 absolute top-0 w-full h-full">
                </div>
                <div
                    class="absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 text-white md-typescale-title-small">
                    Upload</div>
            </div>
        </label>

        <form action="{{ route('ingredients.update', $ingredient) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input id="photo" type="file" accept="image/*" name="photo" class="hidden">

            @error('name')
                <md-outlined-text-field name="name" value="{{ old('name', $ingredient->name) }}" label="Name"
                    class="mt-8 w-full" error error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field name="name" value="{{ old('name', $ingredient->name) }}" label="Name"
                    class="mt-8 w-full"></md-outlined-text-field>
            @enderror

            @error('barcode')
                <md-outlined-text-field name="barcode" value="{{ old('barcode', $ingredient->barcode) }}" label="Barcode"
                    class="mt-4 w-full" error error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field name="barcode" value="{{ old('barcode', $ingredient->barcode) }}" label="Barcode"
                    class="mt-4 w-full"></md-outlined-text-field>
            @enderror

            @error('description')
                <md-outlined-text-field name="description" value="{{ old('description', $ingredient->description) }}"
                    label="Description" class="mt-4 w-full" error
                    error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field name="description" value="{{ old('description', $ingredient->description) }}"
                    label="Description" class="mt-4 w-full"></md-outlined-text-field>
            @enderror

            <div class="md-typescale-title-small mt-4">Unit of Measure</div>
            @foreach ($measurement_units as $measurement_unit)
                <div class="mt-2 flex items-center">
                    <md-radio id="{{ $measurement_unit }}" name="unit_of_measure" value="{{ $measurement_unit }}"
                        @checked($measurement_unit === $ingredient->unit_of_measure)></md-radio>
                    <label for="{{ $measurement_unit }}"
                        class="ms-2">{{ $measurement_unit->display() }}&nbsp;({{ $measurement_unit }})</label>
                </div>
            @endforeach

            <div class="flex items-center justify-between mt-6">
                <md-outlined-button onclick="history.back()">Back</md-outlined-button>
                <md-filled-button>Save</md-filled-button>
            </div>
        </form>
    </div>
</x-app-layout>
