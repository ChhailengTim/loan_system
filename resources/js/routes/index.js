import Vue from 'vue'
import VueRouter from 'vue-router'
//i18n
import i18n from '../plugins/i18n'

Vue.use(VueRouter)

//For blade
/*  Global Component Are Register Here */
Vue.component('app', require('../layouts/admin').default);


//For Vue
/**
 * Front
 */

//home
 Vue.component('home-front', require('../pages/front/home/').default);

 //Request Loan
 Vue.component('request-loan', require('../pages/front/request_loan/').default);

 //Borrower Review
 Vue.component('borrower-review', require('../pages/front/borrower_review/').default);

  //Bank Review
  Vue.component('bank-review', require('../pages/front/bank_review/').default);



/**
 * Admin
 */
import dashboard from '../pages/admin/dashboard/'
import company from '../pages/admin/company/'
import borrower from '../pages/admin/borrower/'
import guarantor from '../pages/admin/guarantor/'
import loan from '../pages/admin/loan/'


/**
 * Not found & No Permission
 */
import pageNotFound from '../pages/admin/errors/404.vue'
import pageNotPermission from '../pages/admin/errors/403.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/admin',
            name: 'dashboards',
            component: dashboard,
            meta: {
                title: 'dashboard',
            },
        },
        {
            path: '/admin/dashboard',
            name: 'dashboard',
            component: dashboard,
            meta: {
                title: 'dashboard',
            },
        },
        {
            path: '/admin/company',
            name: 'company',
            component: company,
            meta: {
                title: 'company',
            },
        },
        {
            path: '/admin/borrower',
            name: 'borrower',
            component: borrower,
            meta: {
                title: 'borrower',
            },
        },
        {
            path: '/admin/guarantor',
            name: 'guarantor',
            component: guarantor,
            meta: {
                title: 'guarantor',
            },
        },
        {
            path: '/admin/loan',
            name: 'loan',
            component: loan,
            meta: {
                title: 'loan',
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
                // title: '404 | Not Found',
            },
        },
    ],
});


//header title
router.beforeEach((toRoute, fromRoute, next) => {
    window.document.title = toRoute.meta && toRoute.meta.title ? i18n.t(toRoute.meta.title) : 'Digital Loan System';

    next()


})

export default router
