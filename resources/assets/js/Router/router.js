import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

import SelectWorkspace from '../components/signin/SelectWorkspace';
import CreateWorkspace from '../components/signin/CreateWorkspace';
import SigninWorkspace from '../components/signin/SigninWorkspace';
import ConfirmEmail from '../components/signin/ConfirmEmail';
import GetStarted from '../components/signin/GetStarted';
import GetStartedFind from '../components/signin/GetStartedFind';
import GetStartedCreate from '../components/signin/GetStartedCreate';

const routes = [
    { path: '/', component: SelectWorkspace },
    { path: '/select-workspace', component: SelectWorkspace },
    { path: '/signin-workspace/:workspace_id', component: SigninWorkspace },
    { path: '/create-workspace', component: CreateWorkspace },
    { path: '/create-workspace/confirm-email', component: ConfirmEmail },
    { path: '/get-started', component: GetStarted },
    { path: '/get-started/find', component: GetStartedFind },
    { path: '/get-started/create', component: GetStartedCreate },
];

const router = new VueRouter({
  routes, // `routes: routes` の短縮表記
  hashbang: false, // urlの#を消す
  mode: 'history'
});

export default router;
