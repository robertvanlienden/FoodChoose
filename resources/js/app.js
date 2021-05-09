/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import 'lodash';
require('./hamburger');
require('./shrinkheader');

window.Vue = require('vue');
import vClickOutside from 'v-click-outside'
Vue.use(vClickOutside)

/**
 * VueX store
 */
import Vuex from 'vuex'
Vue.use(Vuex)

import ingredientsstore from './store/IngredientsStore';

const store = new Vuex.Store(
    ingredientsstore
);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

const files = require.context('./', true, /\.vue$/i)
files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
// You can also do it manually...
// Vue.component('example-component',
//     require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store,
});

require('./comfirmdelete');

/**
 * Afer all the Vue stuff, here you can find some custom libs
 *
 * Here is the Slick-Carousel (used on the homeppage)
 */

import 'slick-carousel';

$('.slick-slider').slick({
    dots: true,
    infinite: true,
    speed: 700,
    autoplay:true,
    autoplaySpeed: 3000,
    arrows:true,
    slidesToShow: 1,
    slidesToScroll: 1,
    lazyLoad: 'ondemand',
});
