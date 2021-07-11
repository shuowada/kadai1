import VueRouter from 'vue-router';
//import dentakutest from "./components/dentakutest";
import HeaderComponent from "./components/HeaderComponent";
import TaskListComponent from "./components/TaskListComponent";
import TaskCreateComponent from "./components/TaskCreateComponent";
import TaskShowComponent from "./components/TaskShowComponent";
//import Vue from 'vue'
//import App from './App.vue'
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
Vue.use(VueRouter);


const app = new Vue({
    el: '#app',
data: {
        radio: '2',
        text: 'あいうえお'
    },
});




/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('sample-component', require('./components/SampleComponent.vue').default);

Vue.component('header-component', HeaderComponent);
Vue.component('dentakutest-component', dentakutestComponent);


Vue.component('dentaku-component', require('./components/dentaku.vue').default);
Vue.component('hello-component', require('./components/HelloComponent.vue').default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */






/*const app = new Vue({
    el: '#app',
components: {
    FooBar,
  }
});
*/


