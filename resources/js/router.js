import { createRouter, createWebHistory } from "vue-router";
import Navbar from './components/Navbar.vue';
import Questions from './components/Questions.vue';
import MainApp from './components/MainApp.vue';
import Category from './components/Category.vue';

const routes = [
        {
            path: '/main',
            name: 'Mainapp',
            component: MainApp,
        },
        {
            path: '/cat/:lang_id',
            name: 'Category',
            component: Category,
            
        },
        {
            // path: '/ques',
            path: '/ques/:ques_id',
            name: 'Questions',
            component: Questions,
        },
        // {
        //     path: '/nav',
        //      name: 'Navbar',
        //     component: Navbar,
        //     // meta:{
        //     //     requiresAuth:true
        //     // }  
        // },
    ];

const router = createRouter({
    
    history: createWebHistory(),
    routes,
})
export default router;