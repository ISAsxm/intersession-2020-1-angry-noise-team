import Vue from 'vue';
import VueSimpleAlert from "vue-simple-alert";
import 'bootstrap';
import '@fortawesome/fontawesome-free/js/all.js';
import '@fortawesome/fontawesome-free/css/all.css';

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

Vue.use(VueSimpleAlert);
Vue.component('nav-component', require('./components/NavComponent.vue').default);
Vue.component('header-component', require('./components/HeaderComponent.vue').default);
Vue.component('main-component', require('./components/MainComponent.vue').default);
Vue.component('aboutus-component', require('./components/AboutusComponent.vue').default);
Vue.component('tool-component', require('./components/ToolComponent.vue').default);
Vue.component('footer-component', require('./components/FooterComponent.vue').default);

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
