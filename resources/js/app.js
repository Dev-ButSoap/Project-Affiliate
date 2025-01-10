import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

import jQuery from 'jquery';
window.$ = window.jQuery = jQuery;

import swal from 'sweetalert2';
window.Swal = swal;