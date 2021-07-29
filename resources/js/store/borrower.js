import Vue from "vue";
export default {

    state: {
        data: {},
    },

    getters: {
        getBorrower: (state) => state.data,
    },

    mutations: {
        setBorrower(state, borrower) {
            state.data = borrower;
        },
    },

    actions: {
        fetchBorrower({ commit }, borrower) {
            console.log('VueX', borrower);
            commit('setBorrower', borrower);
        },
    },
};
