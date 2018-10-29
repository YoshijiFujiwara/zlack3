import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import Login from '../components/login/Login';
import SelectWorkspace from '../components/login/SelectWorkspace';
import ExampleComponent from '../components/ExampleComponent';

const routes = [
    { path: '/login/:workspaceId', component: Login },
    { path: '/select-workspace', component: SelectWorkspace },
    { path: '/get-started', component: SelectWorkspace },

    { path: '/create', component: SelectWorkspace },

    { path: '/', component: ExampleComponent },
];

const router = new VueRouter({
  routes, // `routes: routes` の短縮表記
  hashbang: false, // urlの#を消す
  mode: 'history'
});

export default router;
