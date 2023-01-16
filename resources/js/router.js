import { createRouter, createWebHistory } from "vue-router";
import Navbar from './components/Navbar.vue';
import Questions from './components/Questions.vue';
import MainApp from './components/MainApp.vue';
import Login from './components/Login.vue';
import Signup from './components/Signup.vue';
import Dashboard from './components/Dashboard.vue';

const routes = [
    {
        path: '/ques',
        name: 'Questions',
        component: Questions,
        meta:{
            requiresAuth:true
        }
        
    },
    {
        path: '/signin',
        name : 'Login',
        component: Login,
        meta:{
            requiresAuth:false
        }
    },
    {
        path: '/signup',
        name : 'Register',
        component: Signup,
        meta:{
            requiresAuth:false
        }
    },
    {
        path: '/nav',
         name: 'Navbar',
        component: Navbar,
        meta:{
            requiresAuth:true
        }
        
    },
    {
        path: '/main',
         name: 'Mainapp',
        component: MainApp,
        meta:{
            requiresAuth:true
        }
        
    },
    {
        path: '/dashboard',
         name: 'Dashboard',
        component: Dashboard,
        meta:{
            requiresAuth:true
        }
    },
];

const router = createRouter({

    history: createWebHistory(),
    routes,
})

router.beforeEach((to,from) => {

    // if not logged in, then will be redirected to Login page in clicking to Dashboard
    if(to.meta.requiresAuth &&  !localStorage.getItem( 'token')){
        return { name : 'Login' }   
    }

    //can't access Login page through button after logging in
    if(to.meta.requiresAuth == false && localStorage.getItem('token')){
        return { name : 'Dashboard' }
    }
})

export default router;












// import Vue from 'vue';
// import VueRouter from 'vue-router';
// import Start from './views/Start.vue';

// Vue.use(VueRouter);

// export default new VueRouter({
//     mode: 'history',
//     routes: [
//         {
//             path: '/', name: 'home', component: Start,
//         }
//     ]
// });
