import axios from 'axios';
import Vue from 'vue';

import store from "./util/store";

axios.defaults.baseURL = 'http://messenger.local/'
axios.defaults.withCredentials = true
axios.defaults.headers.common['Authorization'] = 'Bearer 1|PHJ9ITnwXkBEUgV01xTS7MQgVk4Yhua8EE6wPLYq';
axios.defaults.headers.common['Accept'] = 'application/json';
//axios.defaults.headers.common['Access-Control-Allow-Origin'] = 'http://messenger.local/';
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;

// Убирает подсказку из консоли в браузере
Vue.config.productionTip = false;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    store: store
})
