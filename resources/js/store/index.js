import Vue from 'vue';
import Vuex from 'vuex';
import borrower from './borrower'

Vue.use(Vuex);


export default new Vuex.Store({
    strict: true,
    modules: {
        borrower
    },
});
