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

        <div class="swiper rounded-xl shadow-md mt-6">
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
            <div class="mt-4">
                LOW STOCK ALERT!
            </div>
        @endif
    </div>

</x-app-layout>
