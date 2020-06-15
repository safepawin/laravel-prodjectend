/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
require('../dist/js/adminlte');
window.Vue = require('vue');

Vue.component('main-component', require('./components/Maincomponent.vue').default);
Vue.component('cart-component', require('./components/Cartcomponent.vue').default);

const app = new Vue({
    el: '#app',
});

