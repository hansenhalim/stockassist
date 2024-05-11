import "./bootstrap";

import Alpine from "alpinejs";

import "@material/web/common.js";

import { styles as typescaleStyles } from "@material/web/typography/md-typescale-styles.js";

document.adoptedStyleSheets.push(typescaleStyles.styleSheet);

window.Alpine = Alpine;

Alpine.start();
