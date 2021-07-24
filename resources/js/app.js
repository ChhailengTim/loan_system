require('./bootstrap');
window.Vue = require('vue');

//router
import router from './routes'


/*Vuex*/
import store from './store';


//plugins
import './plugins'


//i18n
import i18n from './plugins/i18n'


//bootstrap vue
import BootstrapVue from 'bootstrap-vue' //Importing
Vue.use(BootstrapVue); // Telling Vue to use this in whole application


//apex chart
import VueApexCharts from 'vue-apexcharts'
Vue.use(VueApexCharts);
Vue.component('apexchart', VueApexCharts);

//multi_select
import MultiSelect from 'vue-multiselect'
import 'vue-multiselect/dist/vue-multiselect.min.css'
Vue.component('multi-select', MultiSelect);

//Form Wizard
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
Vue.use(VueFormWizard)


//remember language
import { Validator } from 'vee-validate';
if (localStorage.lang != null) {
    i18n.locale = localStorage.lang;
    Validator.localize(localStorage.lang);
}else{
    localStorage.lang = i18n.locale
    Validator.localize(i18n.locale);
}

const app = new Vue({
    el: '#app',
    router,
    store,
    i18n,
    created() {
    },
});
