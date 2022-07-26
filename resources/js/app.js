require('./bootstrap');

import Vue from 'vue';

import Vuetify from './plugins/vuetify'

import store from './store/index'

Vue.component('app', require('./components/app').default);

const app = new Vue({
    el: '#app',
    vuetify: Vuetify,
    store,
});
