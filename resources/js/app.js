/**
 * Load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. Next, we will create a
 * fresh Vue application instance and attach it to the page.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key)))

Vue.component('example-component', require('./components/ExampleComponent.vue'));

/**
 * Create and attach Vue application instance.
 */
const app = new Vue({
  el: '#app'
});
