<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <md-icon-button href="{{ route('home') }}" class="me-2">
                <md-icon class="material-icons">arrow_back</md-icon>
            </md-icon-button>
            <div class="md-typescale-title-large">{{ auth()->user()->name }}</div>
        </div>
    </x-slot>

    <div class="mx-auto px-4 mb-8">
        <div class="flex flex-col items-center p-6 rounded-3xl" style="background-color: var(--md-sys-color-primary);">
            <a href="{{ route('profile.edit') }}">
                <div class="rounded-full overflow-hidden w-28 h-28 border">
                    @if (auth()->user()->photo)
                        <img class="rounded-full" src="{{ Storage::url(auth()->user()->photo) }}">
                    @else
                        <img class="rounded-full" src="assets/img/no_profile.jpg">
                    @endif
                </div>
            </a>

            @if (auth()->user()->isOwner())
                <div class="md-typescale-label-medium mt-2 px-1 rounded"
                    style="background-color: var(--md-sys-color-primary-container); color: var(--md-sys-color-on-primary-container);">
                    Owner
                </div>
            @else
                <div class="md-typescale-label-medium mt-2 px-1 rounded"
                    style="background-color: var(--md-sys-color-tertiary-container); color: var(--md-sys-color-on-tertiary-container);">
                    Staff
                </div>
            @endif
        </div>

        <md-list>
            <md-list-item type="link" href="{{ route('profile.edit') }}">
                <div slot="headline">Edit profile</div>
                <md-icon slot="start" class="material-icons-outlined">account_circle</md-icon>
            </md-list-item>
            <md-divider></md-divider>
            <md-list-item type="link" href="{{ route('password.edit') }}">
                <div slot="headline">Change password</div>
                <md-icon slot="start" class="material-icons-outlined">lock</md-icon>
            </md-list-item>
            <md-divider></md-divider>
            <md-list-item type="link" href="#">
                <div slot="headline">Bug report</div>
                <md-icon slot="start" class="material-icons-outlined">bug_report</md-icon>
            </md-list-item>
            <md-divider></md-divider>
            <md-list-item type="link"
                href="https://docs.google.com/forms/d/e/1FAIpQLSdpEwDmsl4Zjg_O2Rhc7To_j3I77rm__qetPY4qizHfsTMlRw/viewform?usp=sf_link"
                target="_blank">
                <div slot="headline" style="color: var(--md-sys-color-primary);">Give feedback</div>
                <md-icon slot="start" class="material-icons-outlined"
                    style="color: var(--md-sys-color-primary);">thumb_up</md-icon>
            </md-list-item>
            <md-divider></md-divider>
            <form action="{{ route('logout') }}" method="post">
                @csrf
                <md-list-item type="button" onclick="this.parentNode.submit()">
                    <div slot="headline" style="color: var(--md-sys-color-error);">Logout</div>
                    <md-icon slot="start" class="material-icons-outlined"
                        style="color: var(--md-sys-color-error);">logout</md-icon>
                </md-list-item>
            </form>
        </md-list>

        <div class="md-typescale-body-small text-center" style="color: var(--md-sys-color-outline);">
            StockAssist - v1.1
        </div>
    </div>

</x-app-layout>
