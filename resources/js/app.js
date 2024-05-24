import "./bootstrap";

import "@material/web/button/elevated-button.js";
import "@material/web/button/filled-button.js";
import "@material/web/button/filled-tonal-button.js";
import "@material/web/button/outlined-button.js";
import "@material/web/button/text-button.js";

import "@material/web/checkbox/checkbox.js";

// import "@material/web/chips/chip-set.js";
// import "@material/web/chips/assist-chip.js";
// import "@material/web/chips/filter-chip.js";
// import "@material/web/chips/input-chip.js";
// import "@material/web/chips/suggestion-chip.js";

// import "@material/web/dialog/dialog.js";

import "@material/web/divider/divider.js";

import "@material/web/elevation/elevation.js";

import "@material/web/fab/fab.js";
// import "@material/web/fab/branded-fab.js";

// import "@material/web/field/filled-field.js";
// import "@material/web/field/outlined-field.js";

// import "@material/web/focus/md-focus-ring.js";

// import "@material/web/icon/icon.js";

import "@material/web/iconbutton/icon-button.js";
import "@material/web/iconbutton/filled-icon-button.js";
import "@material/web/iconbutton/filled-tonal-icon-button.js";
import "@material/web/iconbutton/outlined-icon-button.js";

import "@material/web/list/list.js";
import "@material/web/list/list-item.js";

// import "@material/web/menu/menu.js";
// import "@material/web/menu/menu-item.js";
// import "@material/web/menu/sub-menu.js";

// import "@material/web/progress/linear-progress.js";
// import "@material/web/progress/circular-progress.js";

import "@material/web/radio/radio.js";

import "@material/web/ripple/ripple.js";

import "@material/web/select/filled-select.js";
import "@material/web/select/outlined-select.js";
import "@material/web/select/select-option.js";

// import "@material/web/slider/slider.js";

// import "@material/web/switch/switch.js";

import "@material/web/tabs/tabs.js";
import "@material/web/tabs/primary-tab.js";
// import "@material/web/tabs/secondary-tab.js";

import "@material/web/textfield/filled-text-field.js";
import "@material/web/textfield/outlined-text-field.js";

import { styles as typescaleStyles } from "@material/web/typography/md-typescale-styles.js";

import Swiper from "swiper";
import { Pagination, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/pagination";
import "swiper/css/autoplay";

new Swiper(".swiper", {
    modules: [Pagination, Autoplay],

    loop: true,

    pagination: {
        el: ".swiper-pagination",
    },

    autoplay: true,
});

document.adoptedStyleSheets.push(typescaleStyles.styleSheet);
