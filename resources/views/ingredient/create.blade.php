<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button onclick="history.back()" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">Create Stock</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        <label for="photo">
            <div class="relative rounded-3xl shadow-md overflow-hidden">
                <div id="previewPhoto" class="h-56 bg-center bg-cover"
                    style="background-image: url('/assets/img/no_img.jpg');">
                </div>
                <div class="bg-black opacity-50 absolute top-0 w-full h-full"></div>
                <div
                    class="absolute top-1/2 -translate-y-1/2 left-1/2 -translate-x-1/2 text-white md-typescale-title-small">
                    Upload
                </div>
            </div>
        </label>

        <form action="{{ route('ingredients.store') }}" method="post" enctype="multipart/form-data">
            @csrf

            <input id="photo" type="file" accept="image/*" name="photo" class="hidden">

            @error('name')
                <md-outlined-text-field name="name" value="{{ old('name') }}" label="Name" class="mt-8 w-full" error
                    error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field name="name" value="{{ old('name') }}" label="Name"
                    class="mt-8 w-full"></md-outlined-text-field>
            @enderror

            @error('barcode')
                <md-outlined-text-field id="barcodeInput" name="barcode" value="{{ old('barcode') }}" label="Barcode"
                    class="mt-4 w-full" error error-text="{{ $message }}">
                    <md-icon-button id="scanBtn" class="hidden" type="button" slot="trailing-icon"
                        onclick="getCameraStream()">
                        <md-icon class="material-icons">qr_code_scanner</md-icon>
                    </md-icon-button>
                </md-outlined-text-field>
            @else
                <md-outlined-text-field id="barcodeInput" name="barcode" value="{{ old('barcode') }}" label="Barcode"
                    class="mt-4 w-full">
                    <md-icon-button id="scanBtn" class="hidden" type="button" slot="trailing-icon"
                        onclick="getCameraStream()">
                        <md-icon class="material-icons">qr_code_scanner</md-icon>
                    </md-icon-button>
                </md-outlined-text-field>
            @enderror

            <video id="scanner" autoplay class="hidden w-full"></video>

            @error('description')
                <md-outlined-text-field name="description" value="{{ old('description') }}" label="Description"
                    class="mt-4 w-full" error error-text="{{ $message }}"></md-outlined-text-field>
            @else
                <md-outlined-text-field name="description" value="{{ old('description') }}" label="Description"
                    class="mt-4 w-full"></md-outlined-text-field>
            @enderror

            <div class="md-typescale-label-large mt-4">Unit of Measure</div>
            @foreach ($measurement_units as $measurement_unit)
                <div class="mt-2 flex items-center">
                    <md-radio id="{{ $measurement_unit }}" name="unit_of_measure"
                        value="{{ $measurement_unit }}"></md-radio>
                    <label for="{{ $measurement_unit }}" class="ms-3">{{ $measurement_unit->display() }}</label>
                </div>
            @endforeach

            <md-outlined-select label="Service Level" name="service_level" class="mt-6 w-full">
                @foreach ($service_levels as $service_level)
                    <md-select-option value="{{ $service_level }}" @selected($service_level === App\Enums\ServiceLevel::MEDIUM)>
                        {{ $service_level->display() }}
                    </md-select-option>
                @endforeach
            </md-outlined-select>

            <md-outlined-select label="Order Cycle" name="order_cycle" class="mt-4 w-full">
                @foreach ($order_cycles as $order_cycle)
                    <md-select-option value="{{ $order_cycle }}" @selected($order_cycle === App\Enums\OrderCycle::MONTHLY)>
                        {{ $order_cycle->display() }}
                    </md-select-option>
                @endforeach
            </md-outlined-select>

            <div class="flex items-center justify-between mt-8">
                <md-outlined-button type="button" onclick="history.back()">Back</md-outlined-button>
                <md-filled-button>Save</md-filled-button>
            </div>
        </form>
    </div>

    <script>
        photo.onchange = evt => {
            const [file] = photo.files;
            if (file) {
                const imageUrl = URL.createObjectURL(file);
                previewPhoto.style.backgroundImage = `url(${imageUrl})`;
            }
        };

        if (("BarcodeDetector" in globalThis)) {
            scanBtn.classList.remove('hidden');

            const barcodeDetector = new BarcodeDetector({
                formats: ['ean_13', 'ean_8', 'upc_a', 'upc_e']
            })

            scanner.addEventListener('play', () => {
                const detectLoop = () => {
                    if (scanner.paused || scanner.ended) return;

                    barcodeDetector
                        .detect(scanner)
                        .then((barcodes) => {
                            barcodes.forEach((barcode) => {
                                scanner.pause();
                                scanner.classList.add('hidden');
                                scanBtn.classList.remove('hidden');
                                barcodeInput.value = barcode.rawValue;
                            });
                        })
                        .catch((err) => {
                            console.log(err);
                        });

                    requestAnimationFrame(detectLoop);
                };
                requestAnimationFrame(detectLoop);
            });
        }

        function getCameraStream() {
            navigator.mediaDevices
                .getUserMedia({
                    video: {
                        facingMode: 'environment'
                    }
                })
                .then((stream) => {
                    scanner.srcObject = stream;
                    scanner.classList.remove('hidden');
                    scanBtn.classList.add('hidden');
                })
                .catch((err) => {
                    console.log(err);
                });
        }
    </script>
</x-app-layout>
