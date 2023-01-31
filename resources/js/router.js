import { createRouter, createWebHistory } from "vue-router";
import Answers from './components/Answers.vue';
import Category from './components/Category.vue';
import Questions from './components/Questions.vue';

const routes = [
    {
        path: '/main',
        name: 'Category',
        component: Category,
    },
    {
        path: '/cat/:lang_id',
        name: 'Questions',
        component: Questions,

    },
    {
        path: '/ques/:ques_id',
        name: 'Answers',
        component: Answers,
    },
    {
        path: '/home', redirect: '/main',
    }
];

const router = createRouter({

    history: createWebHistory(),
    routes,
})
export default router;