import { createRouter, createWebHistory } from "vue-router";

const router = createRouter({
    history: createWebHistory(import.meta.env.BASE_URL),
    routes: [
        {
            path: "/",
            name: "home",
            component: () => import("../views/HomeView.vue"),
            children: [
                {
                    path: '',
                    name: 'all',
                    component: () => import('../views/category/AllView.vue')
                },
                {
                    path: 'man',
                    name: 'man',
                    component: () => import('../views/category/ManView.vue'),
                },
                {
                    path: 'woman',
                    name: 'woman',
                    component: () => import('../views/category/WomanView.vue'),
                }
            ]
        },
        {
            path: "/login",
            name: "login",
            component: () => import("../views/LoginView.vue"),
        },
        {
            path: "/register",
            name: "register",
            component: () => import("../views/RegisterView.vue"),
        },
        {
            path: "/profile",
            name: "profile",
            component: () => import("../views/UserProfileView.vue"),
        },
        {
            path: "/product/:id",
            name: "product",
            component: () => import("../views/ProductView.vue"),
        },
        {
            path: "/checkout",
            name: "checkout",
            component: () => import("../views/CheckoutView.vue"),
        },
    ],
});

router.beforeEach((to, from, next) => {
    const token = localStorage.getItem('x_xsrf_token')
    if( !token ) {
        if( to.name === 'profile') {
            return next( {
                name: 'home'
            })
        }
    }

    if ( token ) {
        if ( to.name === 'login' || to.name === 'register') {
            return next( {
                name: 'home'
            })
        }
    }

    return next()
})

export default router;
