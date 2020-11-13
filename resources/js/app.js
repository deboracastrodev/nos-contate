require('./bootstrap');
window.Vue = require('vue');

import App from './App.vue';

import Vue from 'vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import VueSweetalert2 from 'vue-sweetalert2';

import 'sweetalert2/dist/sweetalert2.min.css';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap/dist/js/bootstrap.js';

import {routes} from './routes';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueSweetalert2); //alerts for resquest response


const router = new VueRouter({
  mode: 'history',
  routes: routes
});

let app = new Vue({
  el: '#app',
  router: router,
  render: h => h(App),
});