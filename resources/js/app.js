import "./bootstrap";

import Alpine from "alpinejs";

import "@material/web/all.js";
import { styles as typescaleStyles } from "@material/web/typography/md-typescale-styles.js";

window.Alpine = Alpine;

Alpine.start();

document.adoptedStyleSheets.push(typescaleStyles.styleSheet);
