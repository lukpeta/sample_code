import 'jquery'

window.$ = window.jQuery = require('jquery');

import '@popperjs/core'; // Edit here
import 'bootstrap/dist/js/bootstrap.bundle';
require('./owl.carousel.min');
require('./jquery.maskMoney');



$(document).ready(function () {

});

$(document).on("focus", ".currencyMask", function () {
    $(this).mask("###0.00", {
        reverse: true
    });
});

$(document).on("focus", ".numbersMask", function () {
    $(this).mask("#", {
        reverse: true
    });
});
