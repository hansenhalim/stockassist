<div class="flex justify-evenly fixed z-10 bottom-0 w-full max-w-md"
    style="background-color: var(--md-sys-color-surface-container);">
    @if (request()->routeIs('home'))
        <div class="text-center py-3">
            <div style="background-color: var(--md-sys-color-secondary-container);"
                class=" rounded-full w-16 flex justify-center py-1">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                    <path d="M160-120v-480l320-240 320 240v480H560v-280H400v280H160Z" />
                </svg>
            </div>
            <div class="md-typescale-label-medium mt-1">Home</div>
        </div>
    @else
        <a href="{{ route('home') }}">
            <div class="text-center py-3">
                <div class="w-16 flex justify-center py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#5f6368">
                        <path
                            d="M240-200h120v-240h240v240h120v-360L480-740 240-560v360Zm-80 80v-480l320-240 320 240v480H520v-240h-80v240H160Zm320-350Z" />
                    </svg>
                </div>
                <div class="md-typescale-label-medium mt-1">Home</div>
            </div>
        </a>
    @endif
    @if (request()->routeIs('recipes.index'))
        <div class="text-center py-3">
            <div style="background-color: var(--md-sys-color-secondary-container);"
                class=" rounded-full w-16 flex justify-center py-1">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                    <path
                        d="M40-360q0-109 91-174.5T340-600q118 0 209 65.5T640-360H40Zm0 160v-80h600v80H40ZM80-40q-17 0-28.5-11.5T40-80v-40h600v40q0 17-11.5 28.5T600-40H80Zm640 0v-320q0-114-78-197T451-668l-11-92h200v-160h80v160h200l-65 648q-3 31-25.5 51.5T776-40h-56Z" />
                </svg>
            </div>
            <div class="md-typescale-label-medium mt-1">Recipe</div>
        </div>
    @else
        <a href="{{ route('recipes.index') }}">
            <div class="text-center py-3">
                <div class="w-16 flex justify-center py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#5f6368">
                        <path
                            d="M533-440q-32-45-84.5-62.5T340-520q-56 0-108.5 17.5T147-440h386ZM40-360q0-109 91-174.5T340-600q118 0 209 65.5T640-360H40Zm0 160v-80h600v80H40ZM720-40v-80h56l56-560H450l-10-80h200v-160h80v160h200L854-98q-3 25-22 41.5T788-40h-68Zm0-80h56-56ZM80-40q-17 0-28.5-11.5T40-80v-40h600v40q0 17-11.5 28.5T600-40H80Zm260-400Z" />
                    </svg>
                </div>
                <div class="md-typescale-label-medium mt-1">Recipe</div>
            </div>
        </a>
    @endif
    @if (request()->routeIs('ingredients.index'))
        <div class="text-center py-3">
            <div style="background-color: var(--md-sys-color-secondary-container);"
                class=" rounded-full w-16 flex justify-center py-1">
                <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M16 22C14.3333 22 12.9167 21.4167 11.75 20.25C10.5833 19.0833 10 17.6667 10 16C10 14.3333 10.5833 12.9167 11.75 11.75C12.9167 10.5833 14.3333 10 16 10C17.6667 10 19.0833 10.5833 20.25 11.75C21.4167 12.9167 22 14.3333 22 16C22 17.6667 21.4167 19.0833 20.25 20.25C19.0833 21.4167 17.6667 22 16 22ZM4 20C3.45 20 2.97917 19.8042 2.5875 19.4125C2.19583 19.0208 2 18.55 2 18V10.4C2 10.2667 2.0125 10.1333 2.0375 10C2.0625 9.86667 2.1 9.73333 2.15 9.6L4.15 5H4C3.71667 5 3.47917 4.90417 3.2875 4.7125C3.09583 4.52083 3 4.28333 3 4V3C3 2.71667 3.09583 2.47917 3.2875 2.2875C3.47917 2.09583 3.71667 2 4 2H11C11.2833 2 11.5208 2.09583 11.7125 2.2875C11.9042 2.47917 12 2.71667 12 3V4C12 4.28333 11.9042 4.52083 11.7125 4.7125C11.5208 4.90417 11.2833 5 11 5H10.85L12.5 8.8C12.1833 8.96667 11.8833 9.14167 11.6 9.325C11.3167 9.50833 11.05 9.71667 10.8 9.95L9.5 11.5L8.5 13.5L8.25 14.8944V16.7307V18C8.33333 18.35 8.44583 18.6958 8.5875 19.0375C8.72917 19.3792 8.9 19.7 9.1 20H4ZM16 9C15.3 9 14.7083 8.75833 14.225 8.275C13.7417 7.79167 13.5 7.2 13.5 6.5C13.5 5.8 13.7417 5.20833 14.225 4.725C14.7083 4.24167 15.3 4 16 4V9C16 8.3 16.2417 7.70833 16.725 7.225C17.2083 6.74167 17.8 6.5 18.5 6.5C19.2 6.5 19.7917 6.74167 20.275 7.225C20.7583 7.70833 21 8.3 21 9H16Z" />
                </svg>
            </div>
            <div class="md-typescale-label-medium mt-1">Stock</div>
        </div>
    @else
        <a href="{{ route('ingredients.index') }}">
            <div class="text-center py-3">
                <div class="w-16 flex justify-center py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#5f6368">
                        <path
                            d="M640-80q-100 0-170-70t-70-170q0-100 70-170t170-70q100 0 170 70t70 170q0 100-70 170T640-80Zm0-80q66 0 113-47t47-113q0-66-47-113t-113-47q-66 0-113 47t-47 113q0 66 47 113t113 47Zm-480 0q-33 0-56.5-23.5T80-240v-304q0-8 1.5-16t4.5-16l80-184h-6q-17 0-28.5-11.5T120-800v-40q0-17 11.5-28.5T160-880h280q17 0 28.5 11.5T480-840v40q0 17-11.5 28.5T440-760h-6l66 152q-19 10-36 21t-32 25l-84-198h-96l-92 216v304h170q5 21 13.5 41.5T364-160H160Zm480-440q-42 0-71-29t-29-71q0-42 29-71t71-29v200q0-42 29-71t71-29q42 0 71 29t29 71H640Z" />
                    </svg>
                </div>
                <div class="md-typescale-label-medium mt-1">Stock</div>
            </div>
        </a>
    @endif
    @if (request()->routeIs('shops.index'))
        <div class="text-center py-3">
            <div style="background-color: var(--md-sys-color-secondary-container);"
                class=" rounded-full w-16 flex justify-center py-1">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                    <path
                        d="M160-720v-80h640v80H160Zm0 560v-240h-40v-80l40-200h640l40 200v80h-40v240h-80v-240H560v240H160Zm80-80h240v-160H240v160Z" />
                </svg>
            </div>
            <div class="md-typescale-label-medium mt-1">Store</div>
        </div>
    @else
        <a href="{{ route('shops.index') }}">
            <div class="text-center py-3">
                <div class="w-16 flex justify-center py-1">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px"
                        fill="#5f6368">
                        <path
                            d="M160-720v-80h640v80H160Zm0 560v-240h-40v-80l40-200h640l40 200v80h-40v240h-80v-240H560v240H160Zm80-80h240v-160H240v160Zm-38-240h556-556Zm0 0h556l-24-120H226l-24 120Z" />
                    </svg>
                </div>
                <div class="md-typescale-label-medium mt-1">Store</div>
            </div>
        </a>
    @endif
</div>
