window._ = require('lodash');

/**
 * Load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs.
 */

try {
  window.Popper = require('popper.js').default;
  window.$ = window.jQuery = require('jquery');
  window.swal = require('sweetalert2');
  require('bootstrap');
} catch (e) {}

/**
 * Load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://bit.ly/2q54adw');
}
