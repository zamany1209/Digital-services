/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import VueRouter from 'vue-router';
import routes from './routes';
import App from './App.vue';
import Vue from 'vue';
window.Vue = require('vue').default;

Vue.use(VueRouter);

Vue.component('spinner' , require('vue-simple-spinner'));

const router = new VueRouter({
    routes
});


new Vue({
    router,
    render: h => h(App),
}).$mount('#app');
