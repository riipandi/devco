require('./bootstrap');

// Dashboard components.
Vue.component('example-component', require('./components/ExampleComponent.vue'));

// Laravel Passport Components.
Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('passport-personal-access-token', require('./components/passport/PersonalAccessTokens.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));

const app = new Vue({
  el: '#app'
});
