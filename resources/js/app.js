import Vue from 'vue';
import 'bootstrap';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

Vue.component('nav-component', require('./components/nav/NavComponent.vue').default);
Vue.component('header-component', require('./components/header/HeaderComponent.vue').default);
Vue.component('main-component', require('./components/main/MainComponent.vue').default);
Vue.component('example-component', require('./components/Example/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
const app = new Vue({
    el: '#app',
    data: {
      message: 'Hello hello hello'
  }
});
