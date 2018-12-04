require('./bootstrap');

// Dashboard components.
Vue.component('example-component', require('./components/ExampleComponent.vue'));

// Laravel Passport Components.
Vue.component('passport-client', require('./components/passport/Clients.vue'));
Vue.component('passport-token', require('./components/passport/PersonalAccessTokens.vue'));
Vue.component('passport-authorized', require('./components/passport/AuthorizedClients.vue'));

const app = new Vue({
  el: '#app'
});
