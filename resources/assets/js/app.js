
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

// ヘルパークラスの読み込み
import User from './Helpers/User';
window.User = User;

// vuetify
window.Vue = require('vue');
import Vue from 'vue';
import Vuetify from 'vuetify';
Vue.use(Vuetify);
import 'vuetify/dist/vuetify.css';
import colors from 'vuetify/es5/util/colors';


Vue.use(Vuetify, {
  theme: {
    "primary": "#1976D2",
    "secondary": "#424242",
    "accesnt": "#82B1FF",
    "error": "#FF5252",
    "info": "#2196F3",
    "success": "#4CAF50",
    "warning": "#FFC107"
  }
})

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('AppHome', require('./components/AppHome'));
Vue.component('ConfirmUser', require('./components/emails/ConfirmUser')); // 確認コード送信Email
Vue.component('SigninLayout', require('./components/layouts/SigninLayout')); // 頻繁に使うので
Vue.component('GetStartedLayout', require('./components/layouts/GetStartedLayout')); // 頻繁に使うので

import router from './Router/router.js';

const app = new Vue({
    el: '#app',
    router
});