/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import {rutFilter} from "vue-dni";

require('./bootstrap');

window.Vue = require('vue');
import store from './store'

import VueCroppie from 'vue-croppie';
import 'croppie/croppie.css' // import the croppie css manually

Vue.use(VueCroppie);

import { rutValidator ,rutInputDirective } from "vue-dni";

Vue.directive('rut', rutInputDirective);


import { ValidationProvider, extend } from 'vee-validate';

Vue.component('validation-provider', ValidationProvider);


 extend("rut", rutValidator);

/*var vueRut = require('vue-rut');
Vue.use(vueRut);*/
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
/*Vue.component('perfil-component', require('./components/PerfilComponent.vue').default);
Vue.component('pet-create-component', require('./components/PetCreate.vue').default);
Vue.component('pet-edit-component', require('./components/PetEdit.vue').default);*/
Vue.component('pet-list-component', require('./components/Pets/PetList.vue').default);
Vue.component('buscador-component',require('./components/buscador').default);
Vue.component('perdido-component',require('./components/perdido').default);
Vue.component('comments-component',require('./components/commets').default);
Vue.component('traspaso-component',require('./components/traspaso').default);
Vue.component("loader", require("./components/Loader.vue").default);
Vue.component("alert", require("./components/alert.vue").default);
Vue.component("ModelComponent", require("./components/ModelComponent.vue").default);
/*Vue.component("ExtraPerfil", require("./components/ExtraPerfil.vue").default);*/
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
/*
const app = new Vue({
    el: '#app',
});*/
