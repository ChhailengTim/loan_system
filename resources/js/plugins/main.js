// https://github.com/nuxt/nuxt.js/issues/3221
import Vue from 'vue'

Vue.mixin({
    methods: {
        /**
         * Get full name
         * @param {*} name
         * @param {*} local
         */
        getFullLocalName(latin, local) {
            var name = {
                latin_name: latin,
                local_name: local,
            }
            return JSON.stringify(name)
        },
        getNameByLang(name) {
            if (name != '' && name != null) {
                try {
                    name = JSON.parse(name)
                    if (localStorage.lang == 'kh') {
                        return name.local_name
                    } else {
                        return name.latin_name
                    }
                } catch (e) {
                    return name
                }
            } else {
                return null
            }
        },
    },
})
