/**
 * Manage global libraries like jQuery or THREE from the package.json file
 */

window.Popper = require("popper.js").default;
window.$ = window.jQuery = require("jquery");
require("bootstrap");
