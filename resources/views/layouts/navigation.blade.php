<div class="flex justify-evenly absolute bottom-0 w-full surface-container bg-green-50">
    @if (request()->routeIs('home'))
        <div class="text-center p-2">
            <div class="bg-green-100 rounded-full w-16 flex justify-center py-1">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                    <path d="M160-120v-480l320-240 320 240v480H560v-280H400v280H160Z" />
                </svg>
            </div>
            <div class="md-typescale-label-medium mt-1">Home</div>
        </div>
    @else
        <a href="{{ route('home') }}">
            <div class="text-center p-2">
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
        <div class="text-center p-2">
            <div class="bg-green-100 rounded-full w-16 flex justify-center py-1">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                    <path
                        d="M40-360q0-109 91-174.5T340-600q118 0 209 65.5T640-360H40Zm0 160v-80h600v80H40ZM80-40q-17 0-28.5-11.5T40-80v-40h600v40q0 17-11.5 28.5T600-40H80Zm640 0v-320q0-114-78-197T451-668l-11-92h200v-160h80v160h200l-65 648q-3 31-25.5 51.5T776-40h-56Z" />
                </svg>
            </div>
            <div class="md-typescale-label-medium mt-1">Recipe</div>
        </div>
    @else
        <a href="{{ route('recipes.index') }}">
            <div class="text-center p-2">
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
        <div class="text-center p-2">
            <div class="bg-green-100 rounded-full w-16 flex justify-center py-1">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                    <path
                        d="M640-80q-100 0-170-70t-70-170q0-100 70-170t170-70q100 0 170 70t70 170q0 100-70 170T640-80Zm0-80q66 0 113-47t47-113q0-66-47-113t-113-47q-66 0-113 47t-47 113q0 66 47 113t113 47Zm-480 0q-33 0-56.5-23.5T80-240v-304q0-8 1.5-16t4.5-16l80-184h-6q-17 0-28.5-11.5T120-800v-40q0-17 11.5-28.5T160-880h280q17 0 28.5 11.5T480-840v40q0 17-11.5 28.5T440-760h-6l66 152q-19 10-36 21t-32 25l-84-198h-96l-92 216v304h170q5 21 13.5 41.5T364-160H160Zm480-440q-42 0-71-29t-29-71q0-42 29-71t71-29v200q0-42 29-71t71-29q42 0 71 29t29 71H640Z" />
                </svg>
            </div>
            <div class="md-typescale-label-medium mt-1">Stock</div>
        </div>
    @else
        <a href="{{ route('ingredients.index') }}">
            <div class="text-center p-2">
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
        <div class="text-center p-2">
            <div class="bg-green-100 rounded-full w-16 flex justify-center py-1">
                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px">
                    <path
                        d="M160-720v-80h640v80H160Zm0 560v-240h-40v-80l40-200h640l40 200v80h-40v240h-80v-240H560v240H160Zm80-80h240v-160H240v160Z" />
                </svg>
            </div>
            <div class="md-typescale-label-medium mt-1">Store</div>
        </div>
    @else
        <a href="{{ route('shops.index') }}">
            <div class="text-center p-2">
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
