import axios from 'axios';
import Vue from 'vue';

import store from "./util/store";

axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
axios.defaults.headers.common['X-CSRF-TOKEN'] = document.head.querySelector('meta[name="csrf-token"]').content;

// Убирает подсказку из консоли в браузере
Vue.config.productionTip = false;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    store: store
})
