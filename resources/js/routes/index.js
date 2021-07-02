import Vue from 'vue'
import VueRouter from 'vue-router'
//i18n
import i18n from '../plugins/i18n'

Vue.use(VueRouter)

//For blade
/*  Global Component Are Register Here */
Vue.component('app', require('../layouts/app').default);


//For Vue
import dashboard from '../pages/dashboard/'


/**
 * Not found & No Permission
 */
import pageNotFound from '../pages/errors/404.vue'
import pageNotPermission from '../pages/errors/403.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [{
            path: '/',
            name: 'dashboards',
            component: dashboard,
            meta: {
                title: 'dashboard',
            },
        },
        {
            path: '/dashboard',
            name: 'dashboard',
            component: dashboard,
            meta: {
                title: 'dashboard',
            },
        },
        {
            path: '/403',
            name: '403',
            component: pageNotPermission,
            meta: {
                title: '403 | No Permission',
            },
        },
        {
            path: '*',
            name: '404',
            component: pageNotFound,
            meta: {
                title: '404 | Not Found',
            },
        },
    ],
});


//header title
router.beforeEach((toRoute, fromRoute, next) => {
    window.document.title = toRoute.meta && toRoute.meta.title ? i18n.t(toRoute.meta.title) : 'Loan System';

    next()


})

export default router
