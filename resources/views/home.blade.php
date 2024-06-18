<x-app-layout>
    <div class="mx-auto px-4 pt-6 mb-24">
        <div class="flex items-center">
            <a href="{{ route('profile.show') }}">
                <div class="rounded-full overflow-hidden w-12 h-12 border">
                    @if (auth()->user()->photo)
                        <img class="rounded-full" src="{{ Storage::url(auth()->user()->photo) }}">
                    @else
                        <img class="rounded-full" src="assets/img/no_profile.jpg">
                    @endif
                </div>
            </a>

            <div class="md-typescale-title-medium ml-3">
                {{ auth()->user()->name }}
            </div>

            @if (auth()->user()->isOwner())
                <div class="md-typescale-label-small ml-2 px-1 rounded"
                    style="background-color: var(--md-sys-color-primary-container); color: var(--md-sys-color-on-primary-container)">
                    Owner
                </div>
            @else
                <div class="md-typescale-label-small ml-2 px-1 rounded"
                    style="background-color: var(--md-sys-color-tertiary-container); color: var(--md-sys-color-on-tertiary-container)">
                    Staff
                </div>
            @endif

            <div class="flex-grow text-right">
                <md-icon-button href="{{ route('notifications.index') }}">
                    <md-icon class="material-icons-outlined">notifications</md-icon>
                </md-icon-button>
            </div>
        </div>

        <div class="swiper rounded-xl shadow-md mt-8">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <img src="assets/img/info-1.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="assets/img/info-2.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="assets/img/info-3.jpg" alt="">
                </div>
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="md-typescale-title-medium mt-8">Latest News</div>

        <md-list>
            <md-list-item href="/news/1">
                <div class="md-typescale-label-small" style="color: var(--md-sys-color-secondary);">
                    Jumat, 10 Mei 2024 21:30 WIB
                </div>
                <div slot="headline" class="md-typescale-title-medium line-clamp-2">
                    Harga Cabai Rawit Merah Turun Jadi Segini
                </div>
                <img slot="start" class="rounded w-16" src="assets/img/article-thumb-1.jpg">
            </md-list-item>
            <md-list-item href="/news/2">
                <div class="md-typescale-label-small" style="color: var(--md-sys-color-secondary);">
                    Senin, 15 Apr 2024 12:15 WIB
                </div>
                <div slot="headline" class="md-typescale-title-medium line-clamp-2">
                    Lebaran Telah Usai, Harga Cabai hingga Daging Sapi Mulai Turun
                </div>
                <img slot="start" class="rounded w-16" src="assets/img/article-thumb-2.jpg">
            </md-list-item>
            <md-list-item href="/news/3">
                <div class="md-typescale-label-small" style="color: var(--md-sys-color-secondary);">
                    Selasa, 19 Mar 2024 12:19 WIB
                </div>
                <div slot="headline" class="md-typescale-title-medium line-clamp-2">
                    Harga Bahan Pokok Jogja Hari Ini 19 Maret 2024: Cabai Turun, Minyak Naik!
                </div>
                <img slot="start" class="rounded w-16" src="assets/img/article-thumb-3.jpg">
            </md-list-item>
        </md-list>
    </div>
</x-app-layout>
