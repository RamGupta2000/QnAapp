import { createApp } from 'vue';
import App from './App.vue';
import router from './router.js';
import Navbar from './components/Navbar.vue';
import Category from './components/Category.vue';
import Questions from './components/Questions.vue';
import MainApp from './components/MainApp.vue';
import Login from './components/Login.vue';

import './bootstrap';

const app = createApp(App);

app.component('Navbar', Navbar);
app.component('main-app', MainApp);
app.component('Category', Category);
app.component('Questions', Questions);
app.component('Login', Login);

app.use(router);
app.mount('#app');