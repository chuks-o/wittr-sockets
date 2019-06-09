
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import Toasted from 'vue-toasted';
 
Vue.use(Toasted)

Vue.toasted.register('custom', (payload) => {

        // if there is no message passed show default message
        if(! payload.message) {
            return "Oops.. Something Went Wrong.."
        }
        // if there is a message show it with the message
        return payload.message;
    },
    {
        type: 'show',
        position: 'bottom-right',
        iconPack: 'fontawesome',
        icon: 'fa-comment',
        closeOnSwipe: true,
        singleton: true,
    }
);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('tweet-component', require('./components/TweetComponent.vue').default);
Vue.component('timeline-component', require('./components/TimelineComponent.vue').default);
Vue.component('follow-component', require('./components/FollowComponent.vue').default);
Vue.component('profile-card-component', require('./components/ProfileCardComponent.vue').default);
Vue.component('trend-component', require('./components/TrendComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app'
});
