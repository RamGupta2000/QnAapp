import { createApp } from 'vue';
import App from './App.vue';
import router from './router.js';
import Questions from './components/Questions.vue';
import Answers from './components/Answers.vue';
import Category from './components/Category.vue';
import './bootstrap';


const app = createApp(App);

app.component('Category', Category);
app.component('Questions', Questions);
app.component('Answers', Answers);

app.use(router);
app.mount('#app');