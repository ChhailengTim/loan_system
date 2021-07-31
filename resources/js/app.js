require('./bootstrap');
window.Vue = require('vue');

//Router
import router from './routes'


/*Vuex*/
import store from './store';


//Plugins
import './plugins'


//i18n
import i18n from './plugins/i18n'


//Bootstrap Vue
import BootstrapVue from 'bootstrap-vue' //Importing
Vue.use(BootstrapVue); // Telling Vue to use this in whole application


//Apex Chart
import VueApexCharts from 'vue-apexcharts'
Vue.use(VueApexCharts);
Vue.component('apexchart', VueApexCharts);

//Multi Select
import MultiSelect from 'vue-multiselect'
import 'vue-multiselect/dist/vue-multiselect.min.css'
Vue.component('multi-select', MultiSelect);

//Form Wizard
import VueFormWizard from 'vue-form-wizard'
import 'vue-form-wizard/dist/vue-form-wizard.min.css'
Vue.use(VueFormWizard)

//Notify
import Notifications from 'vue-notification'
Vue.use(Notifications)


//Remember Language
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
