/**
 * Manage global libraries like jQuery or THREE from the package.json file
 */

window.$ = window.jQuery = require("jquery");
window.Popper = require("popper.js").default;
require("bootstrap");

require("jquery.easing");
require("waypoints/lib/jquery.waypoints");
require("stellar.js");
require("owl.carousel");
