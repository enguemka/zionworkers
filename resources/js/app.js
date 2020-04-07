/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('featured-series', require('./components/FeaturedSeries.vue').default);
Vue.component('updated-series', require('./components/UpdatedSeries.vue').default);
Vue.component('series', require('./components/Serie.vue').default);
Vue.component('all-series', require('./components/AllSeries.vue').default);
Vue.component('write-testimony', require('./components/WriteTestimony.vue').default);
Vue.component('latest-news', require('./components/LatestNews.vue').default);
Vue.component('all-news', require('./components/AllNews.vue').default);
Vue.component('news', require('./components/News.vue').default);
Vue.component('notification', require('./components/Notification.vue').default);
Vue.component('post-item', require('./components/PostItem.vue').default);
Vue.component('nav-item', require('./components/SeriesNavItem.vue').default);
Vue.component('auth-locked', require('./components/AuthLocked.vue').default);
Vue.component('subscribe-btn', require('./components/SubscribeToSeries.vue').default);
Vue.component('watchlist-btn', require('./components/AddToWatchList.vue').default);
Vue.component('subs-btn', require('./components/SubscriptionBtn.vue').default);
Vue.component('watch-btn', require('./components/WatchlistBtn.vue').default);
Vue.component('subscriptions', require('./components/Subscriptions.vue').default);
Vue.component('watch-list', require('./components/WatchList.vue').default);
Vue.component('search-btn', require('./components/SearchBtn.vue').default);
Vue.component('search', require('./components/Search.vue').default);
Vue.component('account-details', require('./components/AccountDetails.vue').default);
Vue.component('change-password', require('./components/ChangePassword.vue').default);
Vue.component('preferences', require('./components/Preferences.vue').default);
Vue.component('phone-navigator', require('./components/PhonePostNavigation.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
