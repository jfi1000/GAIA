import Vue from 'vue';
import Vuetify from 'vuetify';
import es from "vuetify/es5/locale/es";
import App from "./App.vue";
import store from "./store";
import router from "./router";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';
//import { ZiggyVue } from 'ziggy';
//import { Ziggy } from './ziggy';


require('./bootstrap');

window.Vue = require('vue').default;
Vue.use(Vuetify);
Vue.use(VueSweetalert2);
//Vue.use(ZiggyVue, Ziggy);
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// Vue.component('clientes-component', require('./components/Clientes.vue').default);

// Vue.component('seguimiento-component', require('./components/Seguimiento.vue').default);

// Vue.component('registro-component', require('./components/Registro.vue').default);


// Vue.component('inicio-component', require('./components/Dashboard.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
// });
Vue.config.productionTip = false;
if (process.env.MIX_APP_ENV === "production") {
    Vue.config.devtools = false;
    Vue.config.debug = false;
    Vue.config.silent = true;
}

new Vue({
    router,
    store,
    vuetify: new Vuetify({
        lang: {
            locales:{es},
            current:"es",
        },
        icons:{
            iconfont: 'mdiSvg',
        
        }
    }),
    render:(h)=>h(App),
    }).$mount("#app");