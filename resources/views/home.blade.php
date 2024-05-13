<x-app-layout>
    <div class="mx-auto px-4 pt-6 mb-24">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <div class="rounded-full overflow-hidden w-12 h-12">
                    <img src="https://secure.gravatar.com/avatar/e163481ef3a2c52d5e2f283e022cedd5?size=128"
                        alt="">
                </div>
                <div class="md-typescale-body-large ml-3">Hello, <strong>{{ auth()->user()->name }}</strong></div>
            </div>

            <form action="{{ route('logout') }}" method="post">
                @csrf
                <md-filled-button>Logout</md-filled-button>
            </form>
        </div>

        <div class="swiper rounded-xl shadow-md mt-8">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/info-1.jpg') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/info-2.jpg') }}" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="{{ asset('assets/img/info-3.jpg') }}" alt="">
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        @if (true)
            <div class="mt-8 shadow-md rounded-xl overflow-hidden border-2"
                style="background-color: var(--md-sys-color-error-container); color: var(--md-sys-color-on-error-container); border-color: var(--md-sys-color-error);">
                <div class="py-1 md-typescale-title-small flex items-center justify-center"
                    style="background-color: var(--md-sys-color-error); color: var(--md-sys-color-on-error)">
                    <md-icon class="material-icons">warning</md-icon><span class="ms-1">Low Stock Alerts!</span>
                </div>
                <div class="py-2 px-4">store_info</div>
            </div>
        @endif

        <div class="md-typescale-title-medium mt-8">Latest News</div>
        <md-list>
            <md-list-item href="/news/1">
                <div class="md-typescale-label-small" style="color: var(--md-sys-color-secondary);">
                    Thu, Dec 25, 1975 2:15 PM
                </div>
                <div slot="headline" class="md-typescale-title-medium line-clamp-2">
                    H-1 Lebaran Harga Daging Sapi hingga Cabai Makin Mahal!
                </div>
                <img slot="start" class="rounded w-16" src="{{ asset('assets/img/article-thumb-1.jpg') }}">
            </md-list-item>
            <md-list-item href="/news/2">
                <div class="md-typescale-label-small" style="color: var(--md-sys-color-secondary);">
                    Thu, Dec 25, 1975 2:15 PM
                </div>
                <div slot="headline" class="md-typescale-title-medium line-clamp-2">
                    Harga Sembako Jogja Hari Ini 3 April 2024: Telur dan Cabai Merah Turun
                </div>
                <img slot="start" class="rounded w-16" src="{{ asset('assets/img/article-thumb-2.jpg') }}">
            </md-list-item>
            <md-list-item href="/news/3">
                <div class="md-typescale-label-small" style="color: var(--md-sys-color-secondary);">
                    Thu, Dec 25, 1975 2:15 PM
                </div>
                <div slot="headline" class="md-typescale-title-medium line-clamp-2">
                    Menteri Perdagangan Zulhas Prediksi Harga Bawang Merah Turun dalam Waktu Sepekan
                </div>
                <img slot="start" class="rounded w-16" src="{{ asset('assets/img/article-thumb-3.jpg') }}">
            </md-list-item>
        </md-list>
    </div>

</x-app-layout>
