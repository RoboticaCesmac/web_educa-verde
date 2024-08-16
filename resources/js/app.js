/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import { createApp } from 'vue';
import './bootstrap';

/**
 * Next, we will create a fresh Vue application instance. You may then begin
 * registering components with the application instance so they are ready
 * to use in your application's views. An example is included for you.
 */

const app = createApp({});

import AlertComponent from './components/AlertComponent.vue';
import ExampleComponent from './components/ExampleComponent.vue';
import HomeComponent from './components/home/HomeComponent.vue';
import InputComponent from './components/InputComponent.vue';
import LoginComponent from './components/login/LoginComponent.vue';
import ModalComponent from './components/ModalComponent.vue';
import TabelaComponent from './components/TabelaComponent.vue';
import NonoComponent from './components/turmas/nonoAno/NonoComponent.vue';
import OitavoComponent from './components/turmas/oitavoAno/OitavoComponent.vue';
import SetimoComponent from './components/turmas/setimoAno/SetimoComponent.vue';
import SextoComponent from './components/turmas/sextoAno/SextoComponent.vue';
app.component('example-component', ExampleComponent);
app.component('home-component', HomeComponent);
app.component('login-component', LoginComponent);
app.component('sexto-component', SextoComponent);
app.component('setimo-component', SetimoComponent);
app.component('oitavo-component', OitavoComponent);
app.component('nono-component', NonoComponent);
app.component('modal-component', ModalComponent);
app.component('input-component', InputComponent);
app.component('tabela-component', TabelaComponent);
app.component('alert-component', AlertComponent);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// Object.entries(import.meta.glob('./**/*.vue', { eager: true })).forEach(([path, definition]) => {
//     app.component(path.split('/').pop().replace(/\.\w+$/, ''), definition.default);
// });

/**
 * Finally, we will attach the application instance to a HTML element with
 * an "id" attribute of "app". This element is included with the "auth"
 * scaffolding. Otherwise, you will need to add an element yourself.
 */

app.mount('#app');
