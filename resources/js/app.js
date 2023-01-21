import { createApp } from 'vue';
import App from './App.vue';
import router from './router.js';
import Navbar from './components/Navbar.vue';
import Category from './components/Category.vue';
import Questions from './components/Questions.vue';
import MainApp from './components/MainApp.vue';

import './bootstrap';

const app = createApp(App);


// let user = document.getElementById("user").value;
// console.log(user);


app.component('Navbar', Navbar);
app.component('main-app', MainApp);
app.component('Category', Category);
app.component('Questions', Questions);

app.use(router);
app.mount('#app');