<x-app-layout>
    <div class="mx-auto px-4 pt-6 mb-24">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <a href="#">
                    <div class="rounded-full overflow-hidden w-12 h-12 border">
                        @if (auth()->user()->photo)
                            <img class="rounded-full" src="{{ url('storage/' . auth()->user()->photo) }}">
                        @else
                            <img class="rounded-full" src="{{ asset('assets/img/no_profile.jpg') }}">
                        @endif
                    </div>
                </a>
                <div class="flex items-center">
                    <div class="md-typescale-body-large ml-3">
                        Hello, <strong>{{ auth()->user()->name }}</strong>
                    </div>

                    @if (auth()->user()->isOwner())
                        <div class="md-typescale-label-small ml-2 px-1 rounded"
                            style="background-color: var(--md-sys-color-primary-container); color: var(--md-sys-color-on-primary-container)">
                            Owner
                        </div>
                    @else
                        <div class="md-typescale-label-small ml-2 px-1 rounded"
                            style="background-color: var(--md-sys-color-tertiary-container); color: var(--md-sys-color-on-tertiary-container)">
                            Admin
                        </div>
                    @endif
                </div>
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

        <div class="mt-8 shadow-md rounded-xl overflow-hidden border-2 hidden" onclick="this.classList.add('hidden')"
            style="background-color: var(--md-sys-color-error-container); color: var(--md-sys-color-on-error-container); border-color: var(--md-sys-color-error);">
            <div class="py-1 md-typescale-title-small flex items-center justify-center"
                style="background-color: var(--md-sys-color-error); color: var(--md-sys-color-on-error)">
                <md-icon class="material-icons">warning</md-icon><span class="ms-1">Low Stock Alerts!</span>
            </div>
            <div class="py-2 px-4">store_info</div>
        </div>

        <div class="md-typescale-title-medium mt-8" onclick="this.previousElementSibling.classList.remove('hidden')">
            Latest News
        </div>

        <md-list>
            <md-list-item href="/news/1">
                <div class="md-typescale-label-small" style="color: var(--md-sys-color-secondary);">
                    Jumat, 10 Mei 2024 21:30 WIB
                </div>
                <div slot="headline" class="md-typescale-title-medium line-clamp-2">
                    Harga Cabai Rawit Merah Turun Jadi Segini
                </div>
                <img slot="start" class="rounded w-16" src="{{ asset('assets/img/article-thumb-1.jpg') }}">
            </md-list-item>
            <md-list-item href="/news/2">
                <div class="md-typescale-label-small" style="color: var(--md-sys-color-secondary);">
                    Senin, 15 Apr 2024 12:15 WIB
                </div>
                <div slot="headline" class="md-typescale-title-medium line-clamp-2">
                    Lebaran Telah Usai, Harga Cabai hingga Daging Sapi Mulai Turun
                </div>
                <img slot="start" class="rounded w-16" src="{{ asset('assets/img/article-thumb-2.jpg') }}">
            </md-list-item>
            <md-list-item href="/news/3">
                <div class="md-typescale-label-small" style="color: var(--md-sys-color-secondary);">
                    Selasa, 19 Mar 2024 12:19 WIB
                </div>
                <div slot="headline" class="md-typescale-title-medium line-clamp-2">
                    Harga Bahan Pokok Jogja Hari Ini 19 Maret 2024: Cabai Turun, Minyak Naik!
                </div>
                <img slot="start" class="rounded w-16" src="{{ asset('assets/img/article-thumb-3.jpg') }}">
            </md-list-item>
        </md-list>
    </div>

</x-app-layout>
