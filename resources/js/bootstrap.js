window._ = require('lodash');
/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');
window.axios.defaults.withCredentials = true;
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};
window.axios.baseURL = "http://127.0.0.1:8000";

// bootstrap.js
axios.interceptors.request.use(function (config) {
    let loading = true

    if (config.data != undefined) {
        if (config.data.loading != undefined)
            loading = config.data.loading
    }

    if(loading){
        $.LoadingOverlay("show", {
            background  : "rgba(0,0,0,0.1)",
            image       : "",
            fontawesome : "fa fa-fan fa-spin",
            fontawesomeColor: 'rgba(0,0,0,0.2)',
        });
    }
    return config;

}, function (error) {
    $.LoadingOverlay('hide');
    Swal.fire({
        icon: 'error',
        title: 'Oop...',
        text: `${error}`,
        allowOutsideClick: false,
        allowEscapeKey: false
    });
    return Promise.reject(error);
});


axios.interceptors.response.use(function (response) {
    $.LoadingOverlay('hide');
    return response;
}, function (error) {
    $.LoadingOverlay('hide');
    Swal.fire({
        icon: 'error',
        title: 'Oop...',
        text: `${error}`,
        allowOutsideClick: false,
        allowEscapeKey: false
    });
});

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
