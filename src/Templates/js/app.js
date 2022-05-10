window._ = require('lodash');

window.Popper = require('popper.js').default;
window.$ = window.jQuery = require('jquery');

require('bootstrap');

require('admin-lte');

window.JSZip = require( 'jszip' );
require( 'datatables.net-bs4' );
require( 'datatables.net-buttons-bs4' );       
require( 'datatables.net-buttons/js/buttons.html5.js' );
require( 'datatables.net-buttons/js/buttons.print.js' );
require( 'datatables.net-responsive-bs4' );

require('sweetalert2/dist/sweetalert2.all.min.js');

require('jquery-validation/dist/jquery.validate.js');
require('jquery-validation/dist/additional-methods.js');


$.validator.setDefaults({
    errorElement: 'span',
    errorClass: 'is-invalid',  
    errorPlacement: function(error, element) {
        if(element.parent('.input-group').length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    }
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    dataType: "json"
});