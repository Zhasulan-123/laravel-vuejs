import { createRouter, createWebHistory } from 'vue-router';
import authUser from "@/api/auth.user";

const routes = [
    {
        path: '/',
        name: 'Home',
        meta: { title: 'Интернет Магазин' },
        component: () => import('@/views/shop/Home.vue')
    },
    {
        path: '/search',
        name: 'Search',
        meta: { title: 'Поиск' },
        component: () => import('@/views/shop/Search.vue')
    },
    {
        path: '/categories',
        name: 'Categories',
        meta: { title: 'Поиск Категорий' },
        component: () => import('@/views/shop/Categories.vue')
    },
    {
        path: '/login',
        name: 'Login',
        meta: { title: 'Авторизация' },
        component: () => import('@/views/user/Login.vue')
    },
    {
        path: '/registration',
        name: 'Registration',
        meta: { title: 'Регистрация' },
        component: () => import('@/views/user/Registration.vue')
    },
    {
        path: '/user',
        name: 'User',
        meta: { title: 'Пользователь', user: true },
        component: () => import('@/views/user/User.vue')
    }
]

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes
})

router.beforeEach((to, from, next) => {
    document.title = `${to.meta.title}`;
    const currentUser = authUser.isLoggedIn();
    const reqAuthUser = to.matched.some(record => record.meta.user);
    if (reqAuthUser && !currentUser) {
        next('/login')
    } else {
        next()
    }
});

export default router
