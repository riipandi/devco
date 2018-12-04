import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';

window._ = require('lodash');

try {
  window.Popper = require('popper.js').default;
  window.$ = window.jQuery = require('jquery');
  require('bootstrap');

  // FontAwesome v5
  require('@fortawesome/fontawesome');
  require('@fortawesome/fontawesome-free-solid');
  require('@fortawesome/fontawesome-free-regular');
  require('@fortawesome/fontawesome-free-brands');
} catch (e) {}

/**
 * Load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
  window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
  console.error('CSRF token not found: https://bit.ly/2q54adw');
}

/**
 * Load Vue libraries and the goodies.
 */

window.Vue = require('vue');

window.Vue.component('fa-icon', FontAwesomeIcon)
